const axios = require("axios");
module.exports = (socket, next) => {
    let token = socket.handshake.query.token;
    let type = socket.handshake.query.type;
    if (token == undefined || (type != 1 && type != 2)) {

        next(new Error("Token Or Type Connection is Not Correct"));


    } else {

        let url = (type == 1) ? "user" : "admin";
        axios.post(process.env.LARAVEL_SERVER + "/api/" + url + "/checkToken", undefined, {

            headers: {
                Authorization: `Bearer ${token}`

            }

        }).then((res) => {

            socket.user = res.data;
            socket.type = type;
            next()

        }).catch((err) => {


            next(new Error("Token Error"));


        })






    }







}