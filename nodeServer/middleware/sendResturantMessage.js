module.exports = (socket, next) => {

    if (socket[1].userId == undefined || socket[1].message == undefined) {

        next(new Error("UserId Or Message Is Not Correct"));

    } else {


        next()
    }


}