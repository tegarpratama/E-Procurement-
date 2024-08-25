const db = require('../config/database')

exports.getRole = async (userId) => {
  return await db('users').where('id', userId).first('role')
}

exports.listProduct = async (conditions) => {
  console.log(conditions)
  return await db('products as p')
    .join('users as u', 'u.id', 'p.user_id')
    .where((build) => {
      if (conditions.role == 'vendor') {
        build.where('p.user_id', conditions.user_id)
      }

      if (conditions.search) {
        build.where('p.name', 'like', `%${conditions.search}%`)
      }
    })
    .select('p.*', 'u.name as vendor_name')
}

exports.creteProduct = async (data) => {
  return await db('products').insert(data)
}

exports.detailProduct = async (productId) => {
  return await db('products').where('id', productId).first('id')
}

exports.deleteProduct = async (productId) => {
  return await db('products').where('id', productId).del()
}
