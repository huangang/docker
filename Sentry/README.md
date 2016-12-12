# sentry-docker-composer

### Install
```bash
1. docker-compose up -d redis postgres
2. docker run --rm sentry config generate-secret-key
3. insert generated key into ```SENTRY_SECRET_KEY``` var
4. docker run -it --rm -e SENTRY_SECRET_KEY='<secret-key>' \
    -e SENTRY_REDIS_HOST=redis \
    -e SENTRY_POSTGRES_HOST=postgres \
    -e SENTRY_DB_USER=sentry \
    -e SENTRY_DB_PASSWORD=sentry_pass \
    -e SENTRY_DB_NAME=sentry \
    --link sentry_postgres_1:postgres \
    --link sentry_redis_1:redis \
    --net sentry_default sentry upgrade
5. set default user and password
6. docker-compose up -d
```
