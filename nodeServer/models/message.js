const helper = require("../util/helper");
const db = require("../util/database");
class message {

    insertMessage(chatId, content, sendBy) {

        return db.execute(`insert into messages(chat_id,content,sendBy,created_at,updated_at) values(${chatId},"${content}",${sendBy},"${helper.getCurrentTimestamp()}","${helper.getCurrentTimestamp()}")`).then(async(res) => {

            let id = res[0].insertId;

            return await db.execute(`SELECT * FROM messages WHERE id=${id}`).then((res) => {

                let message = res[0][0];
                return message;


            }).catch((err) => {

                throw new Error(err);

            })


        }).catch((err) => {

            throw new Error(err);

        })


    }



}

const messageModel = new message();

module.exports = messageModel;