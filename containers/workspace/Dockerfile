FROM ubuntu:18.04

RUN apt-get update

RUN DEBIAN_FRONTEND=noninteractive apt-get install -qq curl unzip bzip2 chromium-browser wget git git-lfs ssh curl sudo nano software-properties-common fish zsh

RUN useradd magic -m -s /bin/bash 
RUN echo "magic ALL=(ALL) NOPASSWD: ALL" > /etc/sudoers

RUN curl -sL https://deb.nodesource.com/setup_10.x | bash -

RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list

RUN LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php -y

RUN apt-get update

RUN DEBIAN_FRONTEND=noninteractive apt-get install -qq nodejs yarn php5.6 php5.6-sqlite php5.6-gd php5.6-mysql php5.6-dev php5.6-zip php5.6-dom php5.6-curl php5.6-mbstring php7.0 php7.0-sqlite php7.0-gd php7.0-mysql php7.0-dev php7.0-zip php7.0-dom php7.0-curl php7.0-mbstring php7.1 php7.1-sqlite php7.1-gd php7.1-mysql php7.1-dev php7.1-zip php7.1-dom php7.1-curl php7.1-mbstring php7.2 php7.2-sqlite php7.2-gd php7.2-mysql php7.2-dev php7.2-zip php7.2-dom php7.2-curl php7.2-mbstring php7.3 php7.3-sqlite php7.3-gd php7.3-mysql php7.3-dev php7.3-zip php7.3-dom php7.3-curl php7.3-mbstring php7.4 php7.4-sqlite php7.4-gd php7.4-mysql php7.4-dev php7.4-zip php7.4-dom php7.4-curl php7.4-mbstring redis-tools

ADD install-composer.sh /root/install-composer.sh
RUN chmod +x /root/install-composer.sh
RUN /root/install-composer.sh

ADD composer/composer5.6 /usr/bin/composer5.6
ADD composer/composer7.0 /usr/bin/composer7.0
ADD composer/composer7.1 /usr/bin/composer7.1
ADD composer/composer7.2 /usr/bin/composer7.2
ADD composer/composer7.3 /usr/bin/composer7.3
ADD composer/composer7.4 /usr/bin/composer7.4

RUN chmod +x /usr/bin/composer*

ADD magicLAMP /etc/magicLAMP.art
ADD bashrc /etc/magicLAMP.bash

RUN echo "source /etc/magicLAMP.bash" >> /etc/bash.bashrc