const Joi = require("joi");
module.exports = Joi.object({
    token: Joi.string().required(),
    type: Joi.number().valid(1, 2).required()
});