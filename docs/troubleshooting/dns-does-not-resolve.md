# DNS does not resolve

On some systems, `.localhost` is not automatically resolved to `127.0.0.1`.

This can be resolved by using a DNS resolver built-in to magicLAMP which will resolve
all `.localhost` addresses to `127.0.0.1`.

This resolver is not enabled by default, but it can be enabled by renaming `docker-compose.override.dns.yml`
to `docker-compose.override.yml` followed by running `docker-compose up -d` in the terminal.

You will then need to update your DNS resolver in the network settings of your operating system and
set the DNS server to `127.0.0.1`.