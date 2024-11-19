FROM mcr.microsoft.com/devcontainers/php:1-8.2-bookworm

# ENV DEBIAN_FRONTEND=noninteractive

RUN apt update && apt upgrade -y \
    && apt install software-properties-common lsb-release apt-transport-https ca-certificates -y

# RUN DEBIAN_FRONTEND=noninteractive add-apt-repository ppa:ondrej/php -y && apt-get update

# Install MariaDB client
RUN apt install -y mariadb-client 
#php8.2-mysql

# Install php-mysql driver
RUN docker-php-ext-install mysqli pdo pdo_mysql

# [Optional] Uncomment this section to install additional OS packages.
# RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
#     && apt-get -y install --no-install-recommends <your-package-list-here>

# [Optional] Uncomment this line to install global node packages.
# RUN su vscode -c "source /usr/local/share/nvm/nvm.sh && npm install -g <your-package-here>" 2>&1

