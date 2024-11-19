FROM ubuntu:latest AS base

ENV DEBIAN_FRONTEND noninteractive

# Install dependencies
RUN apt update && apt-get install -y \
    sudo \
    nano \
    autoconf \
    autogen \
    language-pack-en-base \
    wget \
    zip \
    unzip \
    curl \
    rsync \
    ssh \
    openssh-client \
    openssh-server \
    git \
    supervisor \
    openssl \
    build-essential \
    apt-utils \
    software-properties-common \
    nasm \
    libjpeg-dev \
    libpng-dev \
    libpng16-16 \
    php8.3 \
    php8.3-cli \
    php8.3-common \
    php8.3-fpm \
    php8.3-mysql \
    php8.3-zip \
    php8.3-gd \
    php8.3-mbstring \
    php8.3-curl \
    php8.3-xml \
    php8.3-bcmath \
    php8.3-pdo \
    php8.3-sqlite3 \
    nginx \
    # mysql-server \
    libsqlite3-dev

RUN useradd -m docker && echo "docker:docker" | chpasswd && adduser docker sudo

RUN add-apt-repository -y ppa:ondrej/php
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer self-update
RUN command -v composer

# Install nodejs
RUN apt install -y ca-certificates gnupg
RUN mkdir -p /etc/apt/keyrings
RUN curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg
ENV NODE_MAJOR 20
RUN echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_$NODE_MAJOR.x nodistro main" | tee /etc/apt/sources.list.d/nodesource.list
RUN apt update && apt install -y nodejs

# Install nginx
RUN apt install -y nginx
# Write Nginx configuration
RUN echo "\
server {\n\
    listen 80;\n\
    server_name localhost;  # Ganti dengan domain atau IP Anda\n\
    root /var/www/html/public;  # Pastikan ini mengarah ke direktori 'public' Laravel\n\
    index index.php index.html index.htm;\n\
\n\
    location / {\n\
        try_files \$uri \$uri/ /index.php?\$query_string;\n\
    }\n\
\n\
    location ~ \\.php$ {\n\
        include fastcgi_params;\n\
        fastcgi_pass unix:/run/php/php8.3-fpm.sock;  # Pastikan ini sesuai dengan versi PHP Anda\n\
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;\n\
    }\n\
\n\
    location ~ \\.ht {\n\
        deny all;  # Menolak akses ke file .htaccess\n\
    }\n\
}\n\
" > /etc/nginx/sites-available/default


COPY . /var/www/html
WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html/*

# Ganti kepemilikan direktori ke pengguna yang digunakan oleh Nginx (biasanya www-data)
RUN chown -R www-data:www-data /var/www/html/storage
RUN chown -R www-data:www-data /var/www/html/bootstrap/cache

# Atur izin direktori
RUN chmod -R 755 /var/www/html/storage
RUN chmod -R 755 /var/www/html/bootstrap/cache

# Buat direktori untuk proses SSH
RUN mkdir /var/run/sshd

# Buat user untuk SSH dengan nama "tajillah" dan password "sandi123"
RUN useradd -m -s /bin/bash tajillah && echo "tajillah:sandi123" | chpasswd

# Izinkan login root jika diperlukan (opsional)
RUN echo 'PermitRootLogin yes' >> /etc/ssh/sshd_config

RUN echo "\
    #!/bin/sh\n\
    # Memulai SSH service\n\
    service ssh start\n\
    # Memulai PHP-FPM service\n\
    service php8.3-fpm start\n\
    # Memulai Nginx dalam mode foreground\n\
    nginx -g 'daemon off;'\n\
" > /start.sh

# Berikan izin eksekusi untuk /start.sh
RUN chmod +x /start.sh


# RUN echo "\
#     #!/bin/sh\n\
#     service php8.3-fpm start\n\
#     nginx -g 'daemon off;'\n\
#     " > /start.sh

EXPOSE 8080 22

CMD ["sh", "/start.sh"]


# # Menghapus entri lama di known_hosts untuk [localhost]:2222
# ssh-keygen -R "[localhost]:2222"
# # Coba sambungkan kembali ke server dan tambahkan host key baru
# ssh tajillah@localhost -p 2222
