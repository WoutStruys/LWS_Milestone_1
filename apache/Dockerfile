FROM ubuntu:24.04

ARG DEBIAN_FRONTEND=noninteractive

# Install Apache, PHP, and required tools
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
      apache2 \
      php \
      php-mysql \
      libapache2-mod-php \
      curl \
      ca-certificates && \
    rm -rf /var/lib/apt/lists/*

# Enable needed Apache modules (no SSL)
RUN a2enmod rewrite

# Create non-root user and set permissions
# - UID 1001 for webapp
# - Add to www-data group
# - Ensure Apache runtime and web dirs are writable
RUN useradd -m -u 1001 webapp && \
    usermod -a -G www-data webapp && \
    mkdir -p /var/run/apache2 /var/lock/apache2 /var/log/apache2 /var/www/html && \
    chown -R webapp:www-data /var/run/apache2 /var/lock/apache2 /var/log/apache2 /var/www/html

# Make Apache drop privileges to webapp
RUN sed -ri 's/^export APACHE_RUN_USER=.*/export APACHE_RUN_USER=webapp/' /etc/apache2/envvars && \
    sed -ri 's/^export APACHE_RUN_GROUP=.*/export APACHE_RUN_GROUP=www-data/' /etc/apache2/envvars

# Site config
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80

# Run as non-root
USER webapp

# Start Apache
CMD ["apache2ctl", "-D", "FOREGROUND"]