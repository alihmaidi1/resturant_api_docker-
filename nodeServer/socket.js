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

        socket.use(SendResturantMessage).on("sendResturantMessage", (data) => {

            let count = ChatDB.getCountChat(data.resturantId, data.id);
            console.log(count);

            if (count == 0) {
                db.execute(`insert into chats(resturant_id,user_id) values(${data.resturantId},${user.id})`).then((response) => {
                    let id = response[0].insertId;
                    console.log(helper.getCurrentTimestamp())
                    db.execute(`insert into messages(chat_id,content,sendBy,created_at) values(${id},${data.message},1,"${helper.getCurrentTimestamp()}")`).then((responsee) => {


                    }).catch((error) => {

                        console.log("error34")

                    })


                }).catch((error) => {


                    console.log("error3434")

                })




            } else {


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