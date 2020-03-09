# Redis

magicLAMP comes with a Redis 5 server that can be used by any of your projects with zero configuration.
It is available at the host ```redis.localhost``` on port ```6379```

## Access from workspace

The workspace container contains the Redis CLI which you can use to connect to the Redis server.

You can connect to the Redis server using the following command

```
redis -h redis.localhost
```