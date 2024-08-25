const Joi = require('joi')

const register = Joi.object({
  name: Joi.string().required(),
  email: Joi.string().email().required(),
  password: Joi.string().min(4).required(),
  password_confirm: Joi.string().valid(Joi.ref('password')).required(),
})

const login = Joi.object({
  email: Joi.string().email().required(),
  password: Joi.string().required(),
})

module.exports = { register, login }
