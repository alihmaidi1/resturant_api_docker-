const checkTokenIO = require("./middleware/checkTokenIO");
const SendUserMessage = require("./middleware/sendUserMessage");
const SendResturantMessage = require("./middleware/sendResturantMessage");
const ChatModel = require("./models/chat");
const messageModel = require("./models/message");
module.exports = class socket {
    constructor(io) {

        this.io = io;

    }

    runEvents() {

        this.runConnection()

    }

    runConnection() {

        this.io.use(checkTokenIO)
        this.io.on("connection", (socket) => {

            console.log(socket.id)
            if (socket.type == 1) { //user account
                this.runUserSendMessage(socket, socket.user)
            } else { //resturant account

                this.runResturantSendMessage(socket, socket.user)

            }

        })

    }

    runResturantSendMessage(socket, user) {
        socket.on("sendResturantMessage", async(data) => {
            console.log("dfdfd")
            let chatNumber = await ChatModel.getCountChat(user.id, data.userId);
            if (chatNumber == 0) {
                let chat = await ChatModel.insertChat(user.id, data.userId);
                let message = await messageModel.insertMessage(chat.id, data.message, 1);
                socket.to("user_" + data.userId).emit("new message", message)
                console.log("no no")

            } else {

                let chats = await ChatModel.getAllChat(user.id, data.userId);
                let firstChatId = chats[0].id;
                let message = await messageModel.insertMessage(firstChatId, data.message, 1);
                socket.to("user_" + data.userId).emit("new message", message)
                console.log("no no")
            }



        })



    }





    runUserSendMessage(socket, user) {

        socket.on("sendUserMessage", async(data) => {

            console.log("dfdfd")

            let chatNumber = await ChatModel.getCountChat(data.resturantId, user.id);
            if (chatNumber == 0) {
                let chat = await ChatModel.insertChat(data.resturantId, user.id);
                let message = await messageModel.insertMessage(chat.id, data.message, 0);
                socket.to("admin_" + data.resturantId).emit("new message", message)
            } else {

                let chats = await ChatModel.getAllChat(data.resturantId, user.id);
                let firstChatId = chats[0].id;
                let message = await messageModel.insertMessage(firstChatId, data.message, 0);
                socket.to("admin_" + data.resturantId).emit("new message", message)
                console.log("admin_" + data.resturantId)
            }


        })

    }


}