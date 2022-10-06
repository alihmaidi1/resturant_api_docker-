var express = require("express");
var http = require("http");
var socket = require("socket.io");
var application = express();
var port = 5000;
var server = http.createServer(application);
server.listen(port);