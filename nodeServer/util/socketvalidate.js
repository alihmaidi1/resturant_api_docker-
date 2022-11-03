exports.validate = (schema, data) => async(socket, next) => {

    try {

        await schema.validateAsync(data)
        next()
    } catch (error) {

        next(new Error(error.message))
    }

}