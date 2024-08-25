const express = require('express')
const productController = require('../controllers/product.controller')
const validate = require('../middleware/validate')
const {
  createProduct,
  detailProduct,
} = require('../validations/product.validation')

const router = express.Router()

router.get('/', productController.listProduct)
router.post('/', validate(createProduct), productController.createProduct)
router.delete(
  '/:product_id/delete',
  validate(detailProduct),
  productController.deleteProduct
)

module.exports = router
