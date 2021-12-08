FROM zenika/alpine-chrome
USER root
ENV CHROME_BIN="/usr/bin/chromium-browser"
FROM node:alpine
RUN apk add --no-cache nss
WORKDIR /usr/app
COPY package.json /usr/app
RUN npm install --quiet
COPY . .

EXPOSE 4242