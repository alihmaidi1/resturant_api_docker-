const checkTokenIO = require("./middleware/checkTokenIO");
const socketController = require("./controller/socket");
module.exports = class socket {
    constructor(io) {

        this.io = io;

    }

    config() {

        this.io.use((socket, next) => {

            if (socket.user.type == 1) {

                socket.id = "admin:" + socket.user.id;
                return next()
            }
            if (socket.user.type == 2) {

                socket.id = "user:" + socket.user.id;
                return next()
            }
            return next(new Error("we have error"))

        })
    }
    runEvents() {

        this.runConnection()

    }

    runConnection() {

        this.io.use(checkTokenIO)
        this.config()
        this.io.on("connection", (socket) => {
            socket.on("sendResturantMessage", socketController.resturantSendMessage(socket))
            socket.on("sendUserMessage", socketController.userSendMessage(socket))

        })

    }








}