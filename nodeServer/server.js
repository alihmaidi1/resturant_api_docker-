var express = require("express");
var http = require("http");
var socket = require("socket.io");

class Server {

    constructor() {

        this.app = express();
        this.port = 5000;
        this.host = "localhost";
        this.server = http.createServer(this.app);

    }

    runServer() {

        this.server.listen(this.port, this.host, () => {

            console.log("the server is running")
        });

    }

}

var app = new Server();
app.runServer()