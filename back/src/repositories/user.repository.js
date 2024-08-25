const db = require('../config/database')

exports.listUser = async () => {
  return await db('users')
    .whereNot('role', 'admin')
    .select('id', 'name', 'email', 'is_verified', 'created_at')
}

exports.getUser = async (userId) => {
  return await db('users').where('id', userId).first('id')
}

exports.activateUser = async (userId) => {
  return await db('users').where('id', userId).update({
    is_verified: 1,
  })
}
