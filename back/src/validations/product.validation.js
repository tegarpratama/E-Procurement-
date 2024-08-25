const Joi = require('joi')

const createProduct = Joi.object({
  name: Joi.string().required(),
  description: Joi.string().required(),
})

const detailProduct = Joi.object({
  product_id: Joi.number().required(),
})

module.exports = { createProduct, detailProduct }
