const Joi = require("joi");
const resturantModel = require("../models/resturant");

const checkResturantId = async(id) => {


    const count = await resturantModel.getResturantCountById(id);
    if (count == 0) {

        throw new Error("User Is Not Exists In Our Database ");

    }



}

module.exports = Joi.object({

    message: Joi.string().required(),
    resturantId: Joi.number().external(checkResturantId).required()

});