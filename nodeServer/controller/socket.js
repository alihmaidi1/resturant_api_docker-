const ChatModel = require("../models/chat");
const messageModel = require("../models/message");
const resturantschema = require("../validation/resturantSendMessage");
const userschema = require("../validation/userSendMessage");
const socketvalidate = require("../util/socketvalidate");
exports.resturantSendMessage = (socket) => {

    return async(data, callback) => {

        let bool1 = await resturantschema.validation(data);
        if (!bool1) {

            return callback({ status: 401 });
        }

        let user = socket.user;
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

        return callback({ status: 200 })

    }

}

exports.userSendMessage = (socket) => {

    return async(data, callback) => {

        let bool1 = await userschema.validation(data);
        if (!bool1) {

            return callback({ status: 401 });
        }


        let user = socket.user;
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
        return callback({ status: 200 });



    }

}