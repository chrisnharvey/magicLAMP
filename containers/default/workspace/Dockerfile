FROM ubuntu:18.04

RUN apt-get update

RUN DEBIAN_FRONTEND=noninteractive apt-get install -qq curl putty-tools mysql-client sqlite python3-pip unzip bzip2 wget git git-lfs ssh curl sudo nano vim software-properties-common zsh apt-transport-https ca-certificates curl gnupg-agent software-properties-common

RUN curl -fsSL https://download.docker.com/linux/ubuntu/gpg | apt-key add -
RUN apt-key fingerprint 0EBFCD88
RUN add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
RUN DEBIAN_FRONTEND=noninteractive apt-get install -qq docker-ce-cli docker-compose

RUN useradd magicLAMP -m -s /bin/zsh
ADD ./home /home/magicLAMP
RUN chown -R magicLAMP:magicLAMP /home/magicLAMP
RUN echo "magicLAMP ALL=(ALL) NOPASSWD: ALL" > /etc/sudoers

RUN mkdir /opt/magicLAMP
RUN ZSH=/opt/magicLAMP/oh-my-zsh sh -c "$(curl -fsSL https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh)" "" --unattended

RUN git clone https://github.com/zsh-users/zsh-autosuggestions /opt/magicLAMP/oh-my-zsh/plugins/zsh-autosuggestions
RUN git clone https://github.com/zsh-users/zsh-syntax-highlighting.git /opt/magicLAMP/oh-my-zsh/plugins/zsh-syntax-highlighting

RUN chown magicLAMP:magicLAMP -R /opt/magicLAMP

RUN pip3 install awscli

RUN curl -LO https://storage.googleapis.com/kubernetes-release/release/`curl -s https://storage.googleapis.com/kubernetes-release/release/stable.txt`/bin/linux/amd64/kubectl
RUN mv kubectl /usr/local/bin
RUN chmod +x /usr/local/bin/kubectl

RUN curl --location "https://github.com/weaveworks/eksctl/releases/download/latest_release/eksctl_$(uname -s)_amd64.tar.gz" | tar xz -C /tmp
RUN mv /tmp/eksctl /usr/local/bin

RUN curl --location https://github.com/digitalocean/doctl/releases/download/v1.41.0/doctl-1.41.0-linux-amd64.tar.gz | tar xz -C /tmp
RUN mv /tmp/doctl /usr/local/bin

RUN runuser -l magicLAMP -c "curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.3/install.sh | zsh"
RUN runuser -l magicLAMP -c "source /home/magicLAMP/.zshrc && nvm install --lts"

RUN curl --location "https://github.com/stripe/stripe-cli/releases/download/v1.4.0/stripe_1.4.0_linux_x86_64.tar.gz" | tar xz -C /tmp
RUN mv /tmp/stripe /usr/local/bin/stripe
RUN chmod +x /usr/local/bin/stripe

RUN LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php -y

RUN apt-get update

RUN DEBIAN_FRONTEND=noninteractive apt-get install -qq php5.6 php5.6-imagick php5.6-bcmath php5.6-sqlite php5.6-gd php5.6-mysql php5.6-dev php5.6-zip php5.6-dom php5.6-curl php5.6-mbstring php7.0 php7.0-imagick php7.0-bcmath php7.0-sqlite php7.0-gd php7.0-mysql php7.0-dev php7.0-zip php7.0-dom php7.0-curl php7.0-mbstring php7.1 php7.1-imagick php7.1-bcmath php7.1-sqlite php7.1-gd php7.1-mysql php7.1-dev php7.1-zip php7.1-dom php7.1-curl php7.1-mbstring php7.2 php7.2-imagick php7.2-bcmath php7.2-sqlite php7.2-gd php7.2-mysql php7.2-dev php7.2-zip php7.2-dom php7.2-curl php7.2-mbstring php7.3 php7.3-imagick php7.3-bcmath php7.3-sqlite php7.3-gd php7.3-mysql php7.3-dev php7.3-zip php7.3-dom php7.3-curl php7.3-mbstring php7.4 php7.4-imagick php7.4-bcmath php7.4-sqlite php7.4-gd php7.4-mysql php7.4-dev php7.4-zip php7.4-dom php7.4-curl php7.4-mbstring libhiredis-dev nghttp2 libmemcached-dev pkg-config zlib1g-dev

RUN DEBIAN_FRONTEND=noninteractive apt-get install -qq redis-tools iputils-ping screen

RUN update-alternatives --remove-all php
RUN update-alternatives --remove-all phpize
RUN update-alternatives --remove-all php-config
RUN update-alternatives --remove-all phar
RUN update-alternatives --remove-all phar.phar

ADD php/switch-php-version /usr/src/magicLAMP/switch-php-version
ADD php/5.6 /usr/bin/5.6
ADD php/7.0 /usr/bin/7.0
ADD php/7.1 /usr/bin/7.1
ADD php/7.2 /usr/bin/7.2
ADD php/7.3 /usr/bin/7.3
ADD php/7.4 /usr/bin/7.4

RUN chmod +x /usr/bin/5.6
RUN chmod +x /usr/bin/7.0
RUN chmod +x /usr/bin/7.1
RUN chmod +x /usr/bin/7.2
RUN chmod +x /usr/bin/7.3
RUN chmod +x /usr/bin/7.4

RUN mkdir -p /opt/magicLAMP/php/5.6
RUN ln -s /usr/bin/php5.6 /opt/magicLAMP/php/5.6/php
RUN ln -s /usr/bin/phpize5.6 /opt/magicLAMP/php/5.6/phpize
RUN ln -s /usr/bin/phar5.6 /opt/magicLAMP/php/5.6/phar
RUN ln -s /usr/bin/phar.phar5.6 /opt/magicLAMP/php/5.6/phar.phar
RUN ln -s /usr/bin/php-config5.6 /opt/magicLAMP/php/5.6/php-config

RUN mkdir -p /opt/magicLAMP/php/7.0
RUN ln -s /usr/bin/php7.0 /opt/magicLAMP/php/7.0/php
RUN ln -s /usr/bin/phpize7.0 /opt/magicLAMP/php/7.0/phpize
RUN ln -s /usr/bin/phar7.0 /opt/magicLAMP/php/7.0/phar
RUN ln -s /usr/bin/phar.phar7.0 /opt/magicLAMP/php/7.0/phar.phar
RUN ln -s /usr/bin/php-config7.0 /opt/magicLAMP/php/7.0/php-config

RUN mkdir -p /opt/magicLAMP/php/7.1
RUN ln -s /usr/bin/php7.1 /opt/magicLAMP/php/7.1/php
RUN ln -s /usr/bin/phpize7.1 /opt/magicLAMP/php/7.1/phpize
RUN ln -s /usr/bin/phar7.1 /opt/magicLAMP/php/7.1/phar
RUN ln -s /usr/bin/phar.phar7.1 /opt/magicLAMP/php/7.1/phar.phar
RUN ln -s /usr/bin/php-config7.1 /opt/magicLAMP/php/7.1/php-config

RUN mkdir -p /opt/magicLAMP/php/7.2
RUN ln -s /usr/bin/php7.2 /opt/magicLAMP/php/7.2/php
RUN ln -s /usr/bin/phpize7.2 /opt/magicLAMP/php/7.2/phpize
RUN ln -s /usr/bin/phar7.2 /opt/magicLAMP/php/7.2/phar
RUN ln -s /usr/bin/phar.phar7.2 /opt/magicLAMP/php/7.2/phar.phar
RUN ln -s /usr/bin/php-config7.2 /opt/magicLAMP/php/7.2/php-config

RUN mkdir -p /opt/magicLAMP/php/7.3
RUN ln -s /usr/bin/php7.3 /opt/magicLAMP/php/7.3/php
RUN ln -s /usr/bin/phpize7.3 /opt/magicLAMP/php/7.3/phpize
RUN ln -s /usr/bin/phar7.3 /opt/magicLAMP/php/7.3/phar
RUN ln -s /usr/bin/phar.phar7.3 /opt/magicLAMP/php/7.3/phar.phar
RUN ln -s /usr/bin/php-config7.3 /opt/magicLAMP/php/7.3/php-config

RUN mkdir -p /opt/magicLAMP/php/7.4
RUN ln -s /usr/bin/php7.4 /opt/magicLAMP/php/7.4/php
RUN ln -s /usr/bin/phpize7.4 /opt/magicLAMP/php/7.4/phpize
RUN ln -s /usr/bin/phar7.4 /opt/magicLAMP/php/7.4/phar
RUN ln -s /usr/bin/phar.phar7.4 /opt/magicLAMP/php/7.4/phar.phar
RUN ln -s /usr/bin/php-config7.4 /opt/magicLAMP/php/7.4/php-config

RUN 5.6 pecl install -f swoole-2.0.10 --enable-sockets --enable-openssl --enable-http2 --enable-async-redis --enable-timewheel --enable-mysqlnd --enable-ringbuffer
RUN 5.6 pecl uninstall -r swoole
RUN echo "extension=swoole.so" > /etc/php/5.6/cli/conf.d/50-swoole.ini
RUN 7.0 pecl install -f swoole-4.3.6 --enable-sockets --enable-openssl --enable-http2 --enable-async-redis --enable-timewheel --enable-mysqlnd --enable-ringbuffer
RUN 7.0 pecl uninstall -r swoole
RUN echo "extension=swoole.so" > /etc/php/7.0/cli/conf.d/50-swoole.ini
RUN 7.1 pecl install -f swoole --enable-sockets --enable-openssl --enable-http2 --enable-async-redis --enable-timewheel --enable-mysqlnd --enable-ringbuffer
RUN 7.1 pecl uninstall -r swoole
RUN echo "extension=swoole.so" > /etc/php/7.1/cli/conf.d/50-swoole.ini
RUN 7.2 pecl install -f swoole --enable-sockets --enable-openssl --enable-http2 --enable-async-redis --enable-timewheel --enable-mysqlnd --enable-ringbuffer
RUN 7.2 pecl uninstall -r swoole
RUN echo "extension=swoole.so" > /etc/php/7.2/cli/conf.d/50-swoole.ini
RUN 7.3 pecl install -f swoole --enable-sockets --enable-openssl --enable-http2 --enable-async-redis --enable-timewheel --enable-mysqlnd --enable-ringbuffer
RUN 7.3 pecl uninstall -r swoole
RUN echo "extension=swoole.so" > /etc/php/7.3/cli/conf.d/50-swoole.ini
RUN 7.4 pecl install -f swoole --enable-sockets --enable-openssl --enable-http2 --enable-async-redis --enable-timewheel --enable-mysqlnd --enable-ringbuffer
RUN 7.4 pecl uninstall -r swoole
RUN echo "extension=swoole.so" > /etc/php/7.4/cli/conf.d/50-swoole.ini

RUN 5.6 pecl install -f memcached-2.2.0
RUN 5.6 pecl uninstall -r memcached
RUN echo "extension=memcached.so" > /etc/php/5.6/cli/conf.d/50-memcached.ini
RUN 7.0 pecl install -f memcached
RUN 7.0 pecl uninstall -r memcached
RUN echo "extension=memcached.so" > /etc/php/7.0/cli/conf.d/50-memcached.ini
RUN 7.1 pecl install -f memcached
RUN 7.1 pecl uninstall -r memcached
RUN echo "extension=memcached.so" > /etc/php/7.1/cli/conf.d/50-memcached.ini
RUN 7.2 pecl install -f memcached
RUN 7.2 pecl uninstall -r memcached
RUN echo "extension=memcached.so" > /etc/php/7.2/cli/conf.d/50-memcached.ini
RUN 7.3 pecl install -f memcached
RUN 7.3 pecl uninstall -r memcached
RUN echo "extension=memcached.so" > /etc/php/7.3/cli/conf.d/50-memcached.ini
RUN 7.4 pecl install -f memcached
RUN 7.4 pecl uninstall -r memcached
RUN echo "extension=memcached.so" > /etc/php/7.4/cli/conf.d/50-memcached.ini

ADD install-composer.sh /root/install-composer.sh
RUN chmod +x /root/install-composer.sh
RUN 7.4 /root/install-composer.sh

RUN runuser -l magicLAMP -c "mkdir -p /opt/magicLAMP/composer/5.6"
RUN runuser -l magicLAMP -c "mkdir -p /opt/magicLAMP/composer/7.0"
RUN runuser -l magicLAMP -c "mkdir -p /opt/magicLAMP/composer/7.1"
RUN runuser -l magicLAMP -c "mkdir -p /opt/magicLAMP/composer/7.2"
RUN runuser -l magicLAMP -c "mkdir -p /opt/magicLAMP/composer/7.3"
RUN runuser -l magicLAMP -c "mkdir -p /opt/magicLAMP/composer/7.4"
RUN runuser -l magicLAMP -c "cd /opt/magicLAMP/composer/5.6 && 5.6 composer require laravel/installer psy/psysh:@stable"
RUN runuser -l magicLAMP -c "cd /opt/magicLAMP/composer/7.0 && 7.0 composer require laravel/installer psy/psysh:@stable"
RUN runuser -l magicLAMP -c "cd /opt/magicLAMP/composer/7.1 && 7.1 composer require laravel/installer psy/psysh:@stable"
RUN runuser -l magicLAMP -c "cd /opt/magicLAMP/composer/7.2 && 7.2 composer require laravel/installer psy/psysh:@stable"
RUN runuser -l magicLAMP -c "cd /opt/magicLAMP/composer/7.3 && 7.3 composer require laravel/installer psy/psysh:@stable"
RUN runuser -l magicLAMP -c "cd /opt/magicLAMP/composer/7.4 && 7.4 composer require laravel/installer psy/psysh:@stable"

ADD magicLAMP.art /usr/src/magicLAMP/magicLAMP.art
ADD magicLAMP.sh /usr/src/magicLAMP/magicLAMP.sh

RUN echo "source /usr/src/magicLAMP/magicLAMP.sh" >> /etc/zsh/zshrc
