const userRepository = require('../repositories/user.repository')
const customError = require('../utils/custom_error')

exports.listUsers = async () => {
  return await userRepository.listUser()
}

exports.activateUser = async (userId) => {
  const user = await userRepository.getUser(userId)
  if (!user) {
    throw customError(404, 'User not found')
  }

  return await userRepository.activateUser(userId)
}
