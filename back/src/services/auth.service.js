const bcrypt = require('bcrypt')
const authRepository = require('../repositories/auth.repository')
const hashPassword = require('../utils/hash_password')
const generateToken = require('../utils/generate_token')
const customError = require('../../src/utils/custom_error')

exports.registerUser = async (request) => {
  const emailExist = await authRepository.emailExist(request.email)
  if (emailExist) {
    throw customError(400, 'Email already registered')
  }

  const valueInserted = {
    name: request.name,
    email: request.email,
    role: 'vendor',
    is_verified: 0,
    password: await hashPassword(request.password),
  }

  return await authRepository.register(valueInserted)
}

exports.loginUser = async (request) => {
  const user = await authRepository.emailExist(request.email)
  if (!user) {
    throw customError(401, 'Wrong email or password')
  }

  const passwordMatch = await bcrypt.compare(request.password, user.password)
  if (!passwordMatch) {
    throw customError(401, 'Wrong email or password')
  }

  if (user.is_verified == 0) {
    throw customError(401, 'Your account has not been activated by the admin')
  }

  const { token } = generateToken(user)
  const result = {
    id: user.id,
    name: user.name,
    role: user.role,
    token: token,
  }

  return result
}
