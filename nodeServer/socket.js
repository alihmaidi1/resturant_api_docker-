const checkTokenIO = require("./middleware/checkTokenIO");
const SendUserMessage = require("./middleware/sendUserMessage");
const SendResturantMessage = require("./middleware/sendResturantMessage");
const ChatModel = require("./models/chat");
const messageModel = require("./models/message");

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

            this.runUserSendMessage(socket, socket.user)
            this.runResturantSendMessage(socket, socket.user)


        })

    }

    runResturantSendMessage(socket, user) {
        socket.on("sendResturantMessage", async(data) => {
            let chatNumber = await ChatModel.getCountChat(user.id, data.user_id);
            if (chatNumber == 0) {
                let chat = await ChatModel.insertChat(user.id, data.user_id);
                let message = await messageModel.insertMessage(chat.id, data.message, 1);
                socket.to("user:" + data.user_id).emit("new message", message)

            } else {

                let chats = await ChatModel.getAllChat(user.id, data.user_id);
                let firstChatId = chats[0].id;
                let message = await messageModel.insertMessage(firstChatId, data.message, 1);
                socket.to("user:" + data.user_id).emit("new message", message)
            }



        })



    }





    runUserSendMessage(socket, user) {

        socket.on("sendUserMessage", async(data) => {


            let chatNumber = await ChatModel.getCountChat(data.resturant_id, user.id);
            if (chatNumber == 0) {
                let chat = await ChatModel.insertChat(data.resturant_id, user.id);
                let message = await messageModel.insertMessage(chat.id, data.message, 2);
                socket.to("admin:" + data.resturant_id).emit("new message", message)
            } else {

                let chats = await ChatModel.getAllChat(data.resturant_id, user.id);
                let firstChatID = chats[0].id;
                let message = await messageModel.insertMessage(firstChatID, data.message, 2);
                socket.to("admin:" + data.resturant_id).emit("new message", message)
            }


        })

    }


}