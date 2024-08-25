const Joi = require('joi')

const activatedUser = Joi.object({
  user_id: Joi.number().required(),
})

module.exports = { activatedUser }
