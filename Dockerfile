FROM php:8.1-apache

RUN apt-get update && apt-get install -y curl && rm -r /var/lib/apt/lists/*

WORKDIR /var/wwww/html

COPY . .

EXPOSE 80