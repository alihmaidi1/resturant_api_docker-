const express = require("express");
const http = require("http");
const socket = require("socket.io");
const socketClass = require("./socket");
require("dotenv").config();
class Server {

    constructor() {

        this.app = express();
        this.app.use(express.json())
        this.port = process.env.APP_PORT;
        this.host = process.env.APP_HOST;
        this.http = http.createServer(this.app);
        this.socket = socket(this.http, {

            cors: {
                origin: "*"
            }

        });
    }

    runServer() {

        new socketClass(this.socket).runEvents();
        let server = this.http.listen(this.port, this.host, () => {
            console.log(`the server is run in port ${this.port}`)
        })


    }



}

module.exports = Server;