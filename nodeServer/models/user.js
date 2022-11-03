const db = require("../util/database");

class User {


    async getCountUserById(id) {

        let count;
        return await db.execute(`SELECT COUNT(id) as countid from users WHERE id=${id}`).then((res) => {

            count = res[0].countid;
            return count;


        }).catch((error) => {

            throw new Error(error.message)

        })

    }

}

const userModel = new User();

module.exports = userModel;