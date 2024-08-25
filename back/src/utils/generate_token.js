const jwt = require('jsonwebtoken')
const randomString = require('./random_string')

require('dotenv').config()

module.exports = (user) => {
  const jwtOptions = {
    expiresIn: '1d',
    jwtid: randomString(30).toLocaleLowerCase(),
  }

  return {
    token: jwt.sign(
      {
        user: user.id,
        role: user.role,
      },
      process.env.JWT_SECRET,
      jwtOptions
    ),
    jwtid: jwtOptions.jwtid,
  }
}
