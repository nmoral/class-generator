# Use the official PHP image as a base
FROM php:8.3-cli

# Install Xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Create a new user and group
RUN groupadd -g 1000 appuser && \
    useradd -r -u 1000 -g appuser appuser

# Set the working directory
WORKDIR /app

# Copy the application files
COPY . /app

# Change ownership of the application files
RUN chown -R appuser:appuser /app


# Switch to the new user
USER appuser

# Command to run the application
CMD ["php", "-S", "0.0.0.0:8000", "-t", "app"]
