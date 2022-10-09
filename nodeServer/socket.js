const helper = require("./util/helper");
const db = require("./util/database");
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


            if (socket.type == 1) { //user account
                this.runUserSendMessage(socket, socket.user)
            } else { //resturant account

                this.runResturantMessage(socket, socket.user)

            }

        })

    }


    runResturantMessage(socket, user) {

        socket.use(SendResturantMessage).on("sendResturantMessage", async(data) => {


            let chatNumber = await ChatModel.getCountChat(user.id, data.id);
            if (chatNumber == 0) {
                let chat = await ChatModel.insertChat(user.id, data.id);
                let message = await messageModel.insertMessage(chat.id, data.message, 1);
            } else {

                let chats = await ChatModel.getAllChat(user.id, data.id);
                let firstChatId = chats[0].id;
                let message = await messageModel.insertMessage(firstChatId, data.message, 1);

            }



        })



    }





    runUserSendMessage(socket, user) {

        socket.use(SendUserMessage).on("sendUserMessage", async(data) => {

            let chatNumber = await ChatModel.getCountChat(data.resturantId, user.id);
            if (chatNumber == 0) {
                let chat = await ChatModel.insertChat(data.resturantId, user.id);
                let message = await messageModel.insertMessage(chat.id, data.message, 0);
            } else {

                let chats = await ChatModel.getAllChat(data.resturantId, user.id);
                let firstChatId = chats[0].id;
                let message = await messageModel.insertMessage(firstChatId, data.message, 0);

            }


        })

    }


}