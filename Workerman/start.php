<?php
/**
 * This file is part of workerman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link http://www.workerman.net/
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

if(count($argv) < 4){
    echo "参数错误";
    exit;
}

class FLAGS_DEPLOYED{
    const DEVELOPMENT = 'development';
    const TESTING = 'testing';
    const PRODUCTION = 'production';
    const CLOSE = 'maintance';
}

$port = $argv[3];
if($argv[2] == "-d"){
    $port = $argv[3];
    $env = $argv[4];
}else{
    $port = $argv[2];
    $env = $argv[3];
}
switch($env){
    case "development":
        define('DEPLOY_STATUS' , FLAGS_DEPLOYED::DEVELOPMENT);
        break;
    case "testing":
        define('DEPLOY_STATUS' , FLAGS_DEPLOYED::TESTING);
        break;
    case "production":
        define('DEPLOY_STATUS' , FLAGS_DEPLOYED::PRODUCTION);
        break;
    default:
        define('DEPLOY_STATUS' , FLAGS_DEPLOYED::DEVELOPMENT);
}
define('FCPATH', __DIR__);
require_once "Config/Constants.php"; //config infos
require_once __DIR__ . '/Workerman/Autoloader.php';





use Workerman\Worker;


// 开启的端口
$worker = new Worker('JsonNL://0.0.0.0:' . $port);
// 启动多少服务进程
if($env == "production"){
    $worker->count = 12;
}else{
    $worker->count = 4;
}
// worker名称，php start.php status 时展示使用
$worker->name = 'JsonRpc';


$worker->onMessage = function($connection, $data)
{
    $statistic_address = 'udp://127.0.0.1:55656';
    // 判断数据是否正确
    if(empty($data['class']) || empty($data['method']) || !isset($data['param_array']))
    {
        // 发送数据给客户端，请求包错误
        return $connection->send(array('code'=>400, 'msg'=>'bad request', 'data'=>null));
    }
    // 获得要调用的类、方法、及参数
    $class = $data['class'];
    $method = $data['method'];
    $param_array = $data['param_array'];

    //@TODO
    //StatisticClient::tick($class, $method);
    $success = false;
    // 判断类对应文件是否载入
    if(!class_exists($class))
    {
        $include_file = __DIR__ . "/Services/$class.php";
        if(is_file($include_file))
        {
            require_once $include_file;
        }
        if(!class_exists($class))
        {
            $code = 404;
            $msg = "class $class not found";
            //StatisticClient::report($class, $method, $success, $code, $msg, $statistic_address);
            // 发送数据给客户端 类不存在
            return $connection->send(array('code'=>$code, 'msg'=>$msg, 'data'=>null));
        }
    }

    // 调用类的方法
    try
    {
        $ret = call_user_func_array(array($class, $method), $param_array);
        //StatisticClient::report($class, $method, 1, 0, '', $statistic_address);
        // 发送数据给客户端，调用成功，data下标对应的元素即为调用结果
        return $connection->send(array('code'=>0, 'msg'=>'ok', 'data'=>$ret));
    }
        // 有异常
    catch(Exception $e)
    {
        // 发送数据给客户端，发生异常，调用失败
        $code = $e->getCode() ? $e->getCode() : 500;
        //StatisticClient::report($class, $method, $success, $code, $e, $statistic_address);
        return $connection->send(array('code'=>$code, 'msg'=>$e->getMessage(), 'data'=>$e));
    }

};


// 如果不是在根目录启动，则运行runAll方法
if(!defined('GLOBAL_START'))
{
    Worker::runAll();
}