const db = require("../util/database");

class Resturant {


    getResturantCountById(id) {


        let count;
        return db.execute(`SELECT COUNT(id) as countid from resturants WHERE id=${id}`).then((res) => {

            count = res[0].countid;
            return count;


        }).catch((error) => {

            throw new Error(error.message)

        })



    }


}

const resturantModel = new Resturant();
module.exports = resturantModel;