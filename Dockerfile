# Use PHP 8.2 with Apache on Debian Bookworm as the base image
FROM php:8.2-apache-bookworm

# Install system dependencies
RUN apt-get update && apt-get install -y && \
    a2enmod rewrite
 
# Set the working directory to the Apache document root
WORKDIR /var/www/html

    # Create a directory for the project to store some files 
RUN mkdir -p /opt/ci && \
    # Create a flag file to indicate that the container has been initialized
    touch /opt/ci/flags && \
    # Create a flag file to indicate that the container has been initialized
    echo 'ServerName localhost' >> /etc/apache2/apache2.conf

COPY dep/ /var/www/html/

RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    # Create a backup of the original files to be copied over to the project when the container is started for the first time
    mkdir -p /var/www/html_backup && cp -a . /var/www/html_backup && \
    # Clean up
    apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
    mv cons/000-default.conf /etc/apache2/sites-available/000-default.conf && \
    mv cons/.htaccess /var/www/html/.htaccess && \
    mv cons/docker-entrypoint.sh /opt/ci/docker-entrypoint.sh

# Expose port 80
EXPOSE 80

# Ensure the entrypoint script is executable.
RUN chmod +x /var/www/html/docker-entrypoint.sh

# Start Apache server in the foreground
ENTRYPOINT ["/opt/ci/docker-entrypoint.sh"]