const axios = require("axios");
// const checkTokenValidation = require("../validation/checkTokenValidation");
module.exports = (socket, next) => {
    let token = socket.handshake.query.token;
    let type = socket.handshake.query.type;
    // let { error } = checkTokenValidation.validate({ token, type });

    // if (error) {

    //     next(new Error(error.message));

    // }

    let url = (type == 1) ? "user" : "admin";
    axios.post(process.env.LARAVEL_SERVER + "/api/" + url + "/checkToken", undefined, {

        headers: {

            Authorization: `Bearer ${token}`

        }

    }).then((res) => {

        socket.user = res.data;
        socket.type = type;
        socket.id = ((type == 1) ? "user_" : "admin_") + res.data.id
        console.log("dddd")
        next()

    }).catch((err) => {

        console.log("dddd")


        next(new Error("Token Error"));


    })














}