ARG PHP_VERSION=8.1-apache
FROM php:$PHP_VERSION

## Install dependency
RUN apt-get update && \
    apt-get install -y \
    curl && \
    rm -r /var/lib/apt/lists/*

## Set working directory
WORKDIR /var/www/html

## copy all source-code
COPY . .

EXPOSE 80

# Health check every 5 minutes and set timeout 3 seconds using curl
HEALTHCHECK --interval=5m --timeout=3s \
    CMD curl -f http://localhost:80 || exit 1

# Build image
# docker build -t zaidanbucket/aws-bucket .
# docker run -d -p 80:80 zaidanbucket/aws-bucket
# docker push zaidanbucket/aws-bucket