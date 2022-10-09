module.exports = (socket, next) => {

    if (socket[1].resturantId == undefined || socket[1].message == undefined) {

        next(new Error("ResturantId Or Message Is Not Correct"));

    } else {


        next()
    }


}