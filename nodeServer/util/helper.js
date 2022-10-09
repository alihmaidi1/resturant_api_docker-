exports.getCurrentTimestamp = function() {

    let date = new Date();
    let year = date.getFullYear();
    let month = ("0" + (date.getMonth() + 1)).slice(-2);
    let hours = date.getHours();
    let minutes = date.getMinutes();
    let seconds = date.getSeconds();
    let day = date.getDate();
    return (year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds);

}