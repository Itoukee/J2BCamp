FROM node:alpine
WORKDIR /usr/app
COPY package.json /usr/app
RUN npm install --quiet
RUN apk update && apk add --no-cache nmap && \
    echo @edge http://nl.alpinelinux.org/alpine/edge/community >> /etc/apk/repositories && \
    echo @edge http://nl.alpinelinux.org/alpine/edge/main >> /etc/apk/repositories && \
    apk update && \
    apk add --no-cache \
      chromium \
      harfbuzz \
      freetype \
      ttf-freefont \
      nss \
ENV PUPPETEER_SKIP_CHROMIUM_DOWNLOAD=true
COPY . .
EXPOSE 4242