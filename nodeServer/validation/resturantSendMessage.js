const Joi = require("joi");
const userModel = require("../models/user");
const checkUserId = async(id) => {

    const count = await userModel.getCountUserById(id);
    if (count == 0) {

        throw new Error("User Is Not Exists In Our Database ");

    }

}

module.exports = Joi.object({

    userId: Joi.number().external(checkUserId).required(),
    message: Joi.string().required()

});