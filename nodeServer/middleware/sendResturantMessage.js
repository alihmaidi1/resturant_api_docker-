const resturantSendMessageValidation = require("../validation/resturantSendMessage");
module.exports = async(socket, next) => {
    let userId = socket[1].userId;
    let message = socket[1].message;
    let { error } = await resturantSendMessageValidation.validateAsync({ userId, message });

    if (error) {

        return next(new Error(error.message));


    }

    return next();


}