## build
    docker build -t workerman:2.0.0 .  
    
## run 
    docker run -v $(pwd):/app -e ENV=env \
    -i -t -d -p HostPort:20160  workerman:2.0.0
    
## test run
     docker run -v $(pwd):/app -e ENV=test \
        -i -t -d -p 20163:20160  workerman:2.0.0