FROM node:alpine
WORKDIR /usr/app
COPY node/package.json /usr/app
RUN npm install --quiet
COPY . .

EXPOSE 4242