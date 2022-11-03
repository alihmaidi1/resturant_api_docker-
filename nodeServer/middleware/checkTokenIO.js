const axios = require("axios");
module.exports = (socket, next) => {
    let token = socket.handshake.headers.token;
    axios.post(process.env.LARAVEL_SERVER + "/api" + "/checkToken", undefined, {

        headers: {

            Authorization: `Bearer ${token}`

        }

    }).then((res) => {

        socket.user = res.data;
        next()

    }).catch((err) => {

        next(new Error(err));

    })














}