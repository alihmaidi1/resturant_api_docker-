const express = require("express");
const http = require("http");
const socketServer = require("./socket");
const socket = require("socket.io");
class Server {



    constructor() {
        this.app = express();
        this.port = 5000;
        this.host = "localhost";
        this.server = http.createServer(this.app);
    }

    runServer() {

        let listen = this.server.listen(this.port, this.host, () => {
            console.log("the serever is running")
        });
        let io = socket(listen);
        new socketServer(io);



    }

}

const app = new Server();
app.runServer()