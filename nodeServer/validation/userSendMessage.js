let joi = require("joi");

exports.validation = async(data) => {

    let schema = joi.object({

        message: joi.string().required(),
        resturant_id: joi.number().required()

    });
    try {

        await schema.validateAsync(data);
        return true;

    } catch (error) {

        console.log(error.message)
        return false;
    }


}