FROM ubuntu:18.04

# Update apt repos then install curl, software-properties-common and PHP ppa
RUN apt-get update && \
    apt-get install -qq curl software-properties-common && \
    LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php -y

# Add Docker repo
RUN curl -fsSL https://download.docker.com/linux/ubuntu/gpg | apt-key add - && \
    apt-key fingerprint 0EBFCD88 && \
    add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"

# Install required packages
RUN DEBIAN_FRONTEND=noninteractive apt-get install -qq --no-install-suggests --no-install-recommends \
    # General tools
    curl putty-tools unzip bzip2 wget git git-lfs ssh sudo nano vim zsh apt-transport-https ca-certificates gnupg-agent build-essential \
    libhiredis-dev nghttp2 libmemcached-dev pkg-config zlib1g-dev docker-ce-cli docker-compose redis-tools iputils-ping screen \
    # DB tools
    mysql-client sqlite \
    # Python
    python3-pip \
    # PHP 5.6
    php5.6-cli php5.6-imagick php5.6-bcmath php5.6-sqlite3 php5.6-gd php5.6-mysql php5.6-pgsql php5.6-dev php5.6-zip php5.6-xml php5.6-curl php5.6-mbstring \
    # PHP 7.0
    php7.0-cli php7.0-imagick php7.0-bcmath php7.0-sqlite3 php7.0-gd php7.0-mysql php7.0-pgsql php7.0-dev php7.0-zip php7.0-xml php7.0-curl php7.0-mbstring \
    # PHP 7.1
    php7.1-cli php7.1-imagick php7.1-bcmath php7.1-sqlite3 php7.1-gd php7.1-mysql php7.1-pgsql php7.1-dev php7.1-zip php7.1-xml php7.1-curl php7.1-mbstring \
    # PHP 7.2
    php7.2-cli php7.2-imagick php7.2-bcmath php7.2-sqlite3 php7.2-gd php7.2-mysql php7.2-pgsql php7.2-dev php7.2-zip php7.2-xml php7.2-curl php7.2-mbstring \
    # PHP 7.3
    php7.3-cli php7.3-imagick php7.3-bcmath php7.3-sqlite3 php7.3-gd php7.3-mysql php7.3-pgsql php7.3-dev php7.3-zip php7.3-xml php7.3-curl php7.3-mbstring \
    # PHP 7.4
    php7.4-cli php7.4-imagick php7.4-bcmath php7.4-sqlite3 php7.4-gd php7.4-mysql php7.4-pgsql php7.4-dev php7.4-zip php7.4-xml php7.4-curl php7.4-mbstring \
    # PHP 8.0
    php8.0-cli php8.0-imagick php8.0-bcmath php8.0-sqlite3 php8.0-gd php8.0-mysql php8.0-pgsql php8.0-dev php8.0-zip php8.0-xml php8.0-curl php8.0-mbstring

# Add magicLAMP user
RUN useradd magicLAMP -m -s /bin/zsh && \
    echo "magicLAMP ALL=(ALL) NOPASSWD: ALL" > /etc/sudoers
ADD --chown=magicLAMP:magicLAMP ./home /home/magicLAMP

# Add the default magicLAMP zshrc file
ADD ./home/.zshrc /usr/src/magicLAMP/.zshrc

# Install oh-my-zsh
RUN mkdir /opt/magicLAMP && \
    ZSH=/opt/magicLAMP/oh-my-zsh sh -c "$(curl -fsSL https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh)" "" --unattended

# Add temporary update script
ADD ./update.sh /opt/magicLAMP/update.sh
RUN chmod +x /opt/magicLAMP/update.sh

# Add oh-my-zsh plugins
RUN git clone https://github.com/zsh-users/zsh-autosuggestions /opt/magicLAMP/oh-my-zsh/plugins/zsh-autosuggestions && \
    git clone https://github.com/zsh-users/zsh-syntax-highlighting.git /opt/magicLAMP/oh-my-zsh/plugins/zsh-syntax-highlighting

# Make magicLAMP own /opt/magicLAMP
RUN chown magicLAMP:magicLAMP -R /opt/magicLAMP

RUN git clone https://github.com/eduardnikolenko/minima.git "/opt/magicLAMP/oh-my-zsh/custom/themes/minima" && \
    ln -s "/opt/magicLAMP/oh-my-zsh/custom/themes/minima/minima.zsh-theme" "/opt/magicLAMP/oh-my-zsh/custom/themes/minima.zsh-theme"

# Install ngrok
RUN wget https://bin.equinox.io/c/4VmDzA7iaHb/ngrok-stable-linux-amd64.zip -O /tmp/ngrok.zip && \
    unzip /tmp/ngrok.zip && \
    mv ngrok /usr/local/bin

# Install AWS CLI
RUN pip3 install awscli

# Install Kubernetes
RUN curl -LO https://storage.googleapis.com/kubernetes-release/release/`curl -s https://storage.googleapis.com/kubernetes-release/release/stable.txt`/bin/linux/amd64/kubectl && \
    mv kubectl /usr/local/bin && \
    chmod +x /usr/local/bin/kubectl

# Install eksctl
RUN curl --location "https://github.com/weaveworks/eksctl/releases/download/latest_release/eksctl_$(uname -s)_amd64.tar.gz" | tar xz -C /tmp && \
    mv /tmp/eksctl /usr/local/bin

# Install doctl
RUN curl --location https://github.com/digitalocean/doctl/releases/download/v1.41.0/doctl-1.41.0-linux-amd64.tar.gz | tar xz -C /tmp && \
    mv /tmp/doctl /usr/local/bin

# Install Stripe CLI
RUN curl --location "https://github.com/stripe/stripe-cli/releases/download/v1.4.0/stripe_1.4.0_linux_x86_64.tar.gz" | tar xz -C /tmp && \
    mv /tmp/stripe /usr/local/bin/stripe && \
    chmod +x /usr/local/bin/stripe

# Install nvm and LTS NodeJS
RUN runuser -l magicLAMP -c "curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.3/install.sh | zsh" && \
    runuser -l magicLAMP -c "source /home/magicLAMP/.zshrc && nvm install --lts"

# Remove any default PHP versions
RUN update-alternatives --remove-all php && \
    update-alternatives --remove-all phpize && \
    update-alternatives --remove-all php-config && \
    update-alternatives --remove-all phar && \
    update-alternatives --remove-all phar.phar

ADD php/switch-php-version /usr/src/magicLAMP/switch-php-version
ADD php/5.6 php/7.0 php/7.1 php/7.2 php/7.3 php/7.4 /usr/bin/

# Make PHP version switchers executable
RUN chmod +x /usr/bin/5.6 && \
    chmod +x /usr/bin/7.0 && \
    chmod +x /usr/bin/7.1 && \
    chmod +x /usr/bin/7.2 && \
    chmod +x /usr/bin/7.3 && \
    chmod +x /usr/bin/7.4

# Symlink PHP versons into a directory so they can be used in PATH
RUN mkdir -p /opt/magicLAMP/php/5.6 && \
    mkdir -p /opt/magicLAMP/php/7.0 && \
    mkdir -p /opt/magicLAMP/php/7.1 && \
    mkdir -p /opt/magicLAMP/php/7.2 && \
    mkdir -p /opt/magicLAMP/php/7.3 && \
    mkdir -p /opt/magicLAMP/php/7.4 && \
    mkdir -p /opt/magicLAMP/php/8.0 && \
    ln -s /usr/bin/php5.6 /opt/magicLAMP/php/5.6/php && \
    ln -s /usr/bin/phpize5.6 /opt/magicLAMP/php/5.6/phpize && \
    ln -s /usr/bin/phar5.6 /opt/magicLAMP/php/5.6/phar && \
    ln -s /usr/bin/phar.phar5.6 /opt/magicLAMP/php/5.6/phar.phar && \
    ln -s /usr/bin/php-config5.6 /opt/magicLAMP/php/5.6/php-config && \
    ln -s /usr/bin/php7.0 /opt/magicLAMP/php/7.0/php && \
    ln -s /usr/bin/phpize7.0 /opt/magicLAMP/php/7.0/phpize && \
    ln -s /usr/bin/phar7.0 /opt/magicLAMP/php/7.0/phar && \
    ln -s /usr/bin/phar.phar7.0 /opt/magicLAMP/php/7.0/phar.phar && \
    ln -s /usr/bin/php-config7.0 /opt/magicLAMP/php/7.0/php-config && \
    ln -s /usr/bin/php7.1 /opt/magicLAMP/php/7.1/php && \
    ln -s /usr/bin/phpize7.1 /opt/magicLAMP/php/7.1/phpize && \
    ln -s /usr/bin/phar7.1 /opt/magicLAMP/php/7.1/phar && \
    ln -s /usr/bin/phar.phar7.1 /opt/magicLAMP/php/7.1/phar.phar && \
    ln -s /usr/bin/php-config7.1 /opt/magicLAMP/php/7.1/php-config && \
    ln -s /usr/bin/php7.2 /opt/magicLAMP/php/7.2/php && \
    ln -s /usr/bin/phpize7.2 /opt/magicLAMP/php/7.2/phpize && \
    ln -s /usr/bin/phar7.2 /opt/magicLAMP/php/7.2/phar && \
    ln -s /usr/bin/phar.phar7.2 /opt/magicLAMP/php/7.2/phar.phar && \
    ln -s /usr/bin/php-config7.2 /opt/magicLAMP/php/7.2/php-config && \
    ln -s /usr/bin/php7.3 /opt/magicLAMP/php/7.3/php && \
    ln -s /usr/bin/phpize7.3 /opt/magicLAMP/php/7.3/phpize && \
    ln -s /usr/bin/phar7.3 /opt/magicLAMP/php/7.3/phar && \
    ln -s /usr/bin/phar.phar7.3 /opt/magicLAMP/php/7.3/phar.phar && \
    ln -s /usr/bin/php-config7.3 /opt/magicLAMP/php/7.3/php-config && \
    ln -s /usr/bin/php7.4 /opt/magicLAMP/php/7.4/php && \
    ln -s /usr/bin/phpize7.4 /opt/magicLAMP/php/7.4/phpize && \
    ln -s /usr/bin/phar7.4 /opt/magicLAMP/php/7.4/phar && \
    ln -s /usr/bin/phar.phar7.4 /opt/magicLAMP/php/7.4/phar.phar && \
    ln -s /usr/bin/php-config7.4 /opt/magicLAMP/php/7.4/php-config && \
    ln -s /usr/bin/php8.0 /opt/magicLAMP/php/8.0/php && \
    ln -s /usr/bin/phpize8.0 /opt/magicLAMP/php/8.0/phpize && \
    ln -s /usr/bin/phar8.0 /opt/magicLAMP/php/8.0/phar && \
    ln -s /usr/bin/phar.phar8.0 /opt/magicLAMP/php/8.0/phar.phar && \
    ln -s /usr/bin/php-config8.0 /opt/magicLAMP/php/8.0/php-config

# Install Swoole for each PHP version
RUN yes | 5.6 pecl install -f swoole-2.0.10 && \
    5.6 pecl uninstall -r swoole && \
    echo "extension=swoole.so" > /etc/php/5.6/cli/conf.d/50-swoole.ini && \
    yes | 7.0 pecl install -f swoole-4.3.6 && \
    7.0 pecl uninstall -r swoole && \
    echo "extension=swoole.so" > /etc/php/7.0/cli/conf.d/50-swoole.ini && \
    yes | 7.1 pecl install -f swoole && \
    7.1 pecl uninstall -r swoole && \
    echo "extension=swoole.so" > /etc/php/7.1/cli/conf.d/50-swoole.ini && \
    yes | 7.2 pecl install -f swoole && \
    7.2 pecl uninstall -r swoole && \
    echo "extension=swoole.so" > /etc/php/7.2/cli/conf.d/50-swoole.ini && \
    yes | 7.3 pecl install -f swoole && \
    7.3 pecl uninstall -r swoole && \
    echo "extension=swoole.so" > /etc/php/7.3/cli/conf.d/50-swoole.ini && \
    yes | 7.4 pecl install -f swoole && \
    7.4 pecl uninstall -r swoole && \
    echo "extension=swoole.so" > /etc/php/7.4/cli/conf.d/50-swoole.ini && \
    yes | 8.0 pecl install -f swoole && \
    8.0 pecl uninstall -r swoole && \
    echo "extension=swoole.so" > /etc/php/8.0/cli/conf.d/50-swoole.ini

# Install Memcached for each PHP version
RUN 5.6 pecl install -f memcached-2.2.0 && \
    5.6 pecl uninstall -r memcached && \
    echo "extension=memcached.so" > /etc/php/5.6/cli/conf.d/50-memcached.ini && \
    7.0 pecl install -f memcached && \
    7.0 pecl uninstall -r memcached && \
    echo "extension=memcached.so" > /etc/php/7.0/cli/conf.d/50-memcached.ini && \
    7.1 pecl install -f memcached && \
    7.1 pecl uninstall -r memcached && \
    echo "extension=memcached.so" > /etc/php/7.1/cli/conf.d/50-memcached.ini && \
    7.2 pecl install -f memcached && \
    7.2 pecl uninstall -r memcached && \
    echo "extension=memcached.so" > /etc/php/7.2/cli/conf.d/50-memcached.ini && \
    7.3 pecl install -f memcached && \
    7.3 pecl uninstall -r memcached && \
    echo "extension=memcached.so" > /etc/php/7.3/cli/conf.d/50-memcached.ini && \
    7.4 pecl install -f memcached && \
    7.4 pecl uninstall -r memcached && \
    echo "extension=memcached.so" > /etc/php/7.4/cli/conf.d/50-memcached.ini && \
    8.0 pecl install -f memcached && \
    8.0 pecl uninstall -r memcached && \
    echo "extension=memcached.so" > /etc/php/8.0/cli/conf.d/50-memcached.ini

# Install composer
ADD install-composer.sh /root/install-composer.sh
RUN chmod +x /root/install-composer.sh && 7.4 /root/install-composer.sh

# Add magicLAMP composer paths and install laravel/install and psy/psysh
RUN runuser -l magicLAMP -c "mkdir -p /opt/magicLAMP/composer/5.6" && \
    runuser -l magicLAMP -c "mkdir -p /opt/magicLAMP/composer/7.0" && \
    runuser -l magicLAMP -c "mkdir -p /opt/magicLAMP/composer/7.1" && \
    runuser -l magicLAMP -c "mkdir -p /opt/magicLAMP/composer/7.2" && \
    runuser -l magicLAMP -c "mkdir -p /opt/magicLAMP/composer/7.3" && \
    runuser -l magicLAMP -c "mkdir -p /opt/magicLAMP/composer/7.4" && \
    runuser -l magicLAMP -c "mkdir -p /opt/magicLAMP/composer/8.0" && \
    runuser -l magicLAMP -c "cd /opt/magicLAMP/composer/5.6 && 5.6 composer require laravel/installer psy/psysh:@stable" && \
    runuser -l magicLAMP -c "cd /opt/magicLAMP/composer/7.0 && 7.0 composer require laravel/installer psy/psysh:@stable" && \
    runuser -l magicLAMP -c "cd /opt/magicLAMP/composer/7.1 && 7.1 composer require laravel/installer psy/psysh:@stable" && \
    runuser -l magicLAMP -c "cd /opt/magicLAMP/composer/7.2 && 7.2 composer require laravel/installer psy/psysh:@stable" && \
    runuser -l magicLAMP -c "cd /opt/magicLAMP/composer/7.3 && 7.3 composer require laravel/installer psy/psysh:@stable" && \
    runuser -l magicLAMP -c "cd /opt/magicLAMP/composer/7.4 && 7.4 composer require laravel/installer psy/psysh:@stable" && \
    runuser -l magicLAMP -c "cd /opt/magicLAMP/composer/8.0 && 8.0 composer require laravel/installer psy/psysh:@stable"

# Add magicLAMP shell scripts
ADD magicLAMP.art magicLAMP.sh /usr/src/magicLAMP/

# Run magicLAMP shell script in zshrc
RUN echo "source /usr/src/magicLAMP/magicLAMP.sh" >> /etc/zsh/zshrc
