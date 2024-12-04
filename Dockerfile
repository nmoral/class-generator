# Use the official PHP image as a base
FROM php:8.1-cli

# Install Xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Create a new user and group
RUN groupadd -g 1000 appuser && \
    useradd -r -u 1000 -g appuser appuser

# Set the working directory
WORKDIR /app

# Copy the application files
COPY . /app

# Change ownership of the application files
RUN chown -R appuser:appuser /app


# Configure Xdebug
RUN touch /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "zend_extension=xdebug.so" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Switch to the new user
USER appuser

# Command to run the application
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
