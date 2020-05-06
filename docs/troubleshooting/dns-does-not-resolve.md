# DNS does not resolve

On some systems, `.localhost` is not automatically resolved to `127.0.0.1`.

This can be resolved by using a DNS resolver built-in to magicLAMP which will resolve
all `.localhost` addresses to `127.0.0.1`.

This resolver is not enabled by default, but it can be enabled by renaming `docker-compose.override.dns.yml`
to `docker-compose.override.yml` followed by running `docker-compose up -d` in the terminal.

You will then need to update your DNS resolver in the network settings of your operating system and
set the DNS server to `127.0.0.1`.

## magicLAMP now fails to start on Ubuntu

If you're running Ubuntu on your host system, you may run into an issue
where the dnsmasq_external container fails to start. This is because Ubuntu runs
the systemd-resolved DNS resolver which listens on port 53 which is required
by the magicLAMP DNS resolver.

To work around this issue, you need to
[disable systemd-resolved](https://askubuntu.com/questions/907246/how-to-disable-systemd-resolved-in-ubuntu)
on your system.