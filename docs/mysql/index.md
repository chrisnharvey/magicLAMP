# MySQL

magicLAMP comes with a MariaDB 10.3 server that can be used by any of your projects with zero configuration.
It is available at the host ```mysql.localhost``` on port ```3306```

The default username is ```root``` with no password.

## phpMyAdmin

phpMyAdmin is available at ```http://phpmyadmin.localhost``` . It is configured to automatically connect to the
MySQL server without asking for a password.

## Access from workspace

The workspace container contains the MySQL Client CLI which you can use to connect to the MariaDB server.

You can connect to the MariaDB server using the following command:

```
mysql -h mysql.localhost -u root
```

You can also use ```mysqldump``` using the following command:

```
mysqldump -h mysql.localhost -u root
```