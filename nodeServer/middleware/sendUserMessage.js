const userSendMessageValidation = require("../validation/userSendMessage");

module.exports = async(socket, next) => {

    // let message = socket[1].message;
    // let resturantId = socket[1].resturantId;
    // console.log("middleware")
    // let { error } = await userSendMessageValidation.validateAsync({ message, resturantId });
    // if (error) {


    //     next(new Error(error.message));

    // }

    next()

}