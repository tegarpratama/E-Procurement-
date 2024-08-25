const db = require('../config/database')

exports.register = async (data) => {
  return await db('users').insert(data)
}

exports.emailExist = async (email) => {
  return await db('users')
    .where('email', email)
    .first('id', 'name', 'password', 'role', 'is_verified')
}
