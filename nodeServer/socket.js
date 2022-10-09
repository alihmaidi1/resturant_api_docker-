const helper = require("./util/helper");
const db = require("./util/database");
const checkTokenIO = require("./middleware/checkTokenIO");
const SendUserMessage = require("./middleware/sendUserMessage");
const SendResturantMessage = require("./middleware/sendResturantMessage");
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


            let room = db.execute(`select count(*) as count1 from chats where resturant_id=${data.resturantId} and user_id=${user.id}`).then((res) => {

                let count = res[0][0].count1;
                console.log(count)
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



            }).catch((err) => {

                console.log("error223")

            })







        })



    }





    runUserSendMessage(socket, user) {

        socket.use(SendUserMessage).on("sendUserMessage", (data) => {

            let room = db.execute(`select count(*) as count1 from chats where resturant_id=${data.resturantId} and user_id=${user.id}`)

            room.then((res) => {

                let count = res[0][0].count1;

                console.log(count)
                if (count == 0) {

                    db.execute(`insert into chats(resturant_id,user_id) values(${data.resturantId},${user.id})`).then((response) => {

                        let id = response[0].insertId;
                        console.log(helper.getCurrentTimestamp())
                        db.execute(`insert into messages(chat_id,content,sendBy,created_at) values(${id},${data.message},0,"${helper.getCurrentTimestamp()}")`).then((res) => {

                            console.log("done11")
                        }).catch((err) => {

                            console.log(err)
                        })

                    }).catch((err) => {

                        console.log(err)
                    })


                } else {

                    db.execute(`select * from chats where resturant_id=${data.resturantId} and user_id=${user.id}`).then((res) => {

                        let chatId = res[0][0].id;

                        db.execute(`insert into messages(chat_id,content,sendBy,created_at,updated_at) values(${chatId},${data.message},0,"${helper.getCurrentTimestamp()}","${helper.getCurrentTimestamp()}")`).then((res) => {

                            console.log(res)
                        }).catch((err) => {

                            console.log(err)
                        })



                    }).catch((err) => {

                        console.log("error")
                    })


                }
            })




        })

    }


}