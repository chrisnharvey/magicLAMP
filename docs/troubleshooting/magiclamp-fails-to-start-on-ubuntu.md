# magicLAMP fails to start on Ubuntu

If you're running Ubuntu on your host system, you may run into an issue
where the dnsmasq container fails to start. This is because Ubuntu runs
the systemd-resolved DNS resolver which listens on port 53 which is required
by the magicLAMP DNS resolver.

To work around this issue, you need to
[disable systemd-resolved](https://askubuntu.com/questions/907246/how-to-disable-systemd-resolved-in-ubuntu)
on your system.

This is an [known issue](https://github.com/chrisnharvey/magicLAMP/issues/8)
and will be resolved in a future version of magicLAMP.