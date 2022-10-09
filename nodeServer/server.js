const express = require("express");
const http = require("http");
const socket = require("socket.io");
const socketClass = require("./socket");
class Server {

    constructor() {

        this.app = express();
        this.port = 5000;
        this.host = "localhost";
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