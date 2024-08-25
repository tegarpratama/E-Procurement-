const productService = require('../services/product.service')

exports.listProduct = async (req, res, next) => {
  try {
    const result = await productService.listProduct({
      user_id: req.user,
      ...req.query,
    })

    res.status(200).json({
      status: 'success',
      message: 'List Products',
      data: result,
    })
  } catch (error) {
    next(error)
  }
}

exports.createProduct = async (req, res, next) => {
  try {
    console.log(req.user)
    const [productId] = await productService.createProduct({
      ...req.body,
      user_id: req.user,
    })

    res.status(201).json({
      status: 'success',
      message: 'Successfully created product',
      data: {
        product_id: productId,
      },
    })
  } catch (error) {
    next(error)
  }
}

exports.deleteProduct = async (req, res, next) => {
  try {
    await productService.deleteProduct(req.params.product_id)

    res.status(200).json({
      status: 'success',
      message: 'Successfully deleted product',
    })
  } catch (error) {
    next(error)
  }
}
