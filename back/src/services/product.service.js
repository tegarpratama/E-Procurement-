const productRepository = require('../repositories/product.repository')
const customError = require('../utils/custom_error')

exports.listProduct = async (request) => {
  const role = await productRepository.getRole(request.user_id)
  return await productRepository.listProduct({ ...request, role: role.role })
}

exports.createProduct = async (request) => {
  const product = {
    name: request.name,
    description: request.description,
    user_id: request.user_id,
  }

  return await productRepository.creteProduct(product)
}

exports.deleteProduct = async (productId) => {
  const product = await productRepository.detailProduct(productId)
  if (!product) {
    throw customError(404, 'Product not found')
  }

  return await productRepository.deleteProduct(productId)
}
