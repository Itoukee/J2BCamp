FROM zenato/puppeteer
USER root
WORKDIR /usr/app
COPY node/package.json /usr/app
RUN npm install
COPY . .
EXPOSE 4242