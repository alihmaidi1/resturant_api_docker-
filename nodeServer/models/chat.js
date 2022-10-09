const db = require("../util/database");
class Chat {


    getCountChat(resturantId = "", UserId = "") {
        return db.execute(`select count(*) as count1 from chats where resturant_id=${resturantId} and user_id=${UserId}`).then((res) => {

                let count = res[0][0].count1;
                return count;

            })
            .catch((err) => {

                throw new Error("We Have Error")

            })

    }

    getAllChat(resturantId = "", userId = "") {

        return db.execute(`select * from chats where resturant_id=${resturantId} and user_id=${userId}`).then((res) => {

            let chats = res[0];

            return chats;




        }).catch((err) => {

            throw new Error("We Have Error");

        })






    }

    insertChat(resturantId, UserId) {

        return db.execute(`insert into chats(resturant_id,user_id) values(${resturantId},${UserId})`).then(async(res) => {

            let id = res[0].insertId;
            return await db.execute(`SELECT * FROM chats WHERE id=${id}`).then((res) => {

                let chat = res[0][0];
                return chat;

            }).catch((err) => {

                throw new Error("We Have Error")

            })

        }).catch((error) => {

            throw new Error("We Have Error");

        })



    }

}

const ChatModels = new Chat();
module.exports = ChatModels;