const jwt = require('jsonwebtoken')

module.exports = async (req, res, next) => {
  const token = req.headers['authorization'] || req.headers['Authorization']
  if (!token || token === null || token === '') {
    return res.status(401).json({
      status: 'failed',
      message: 'Unauthorize',
    })
  }

  jwt.verify(token, process.env.JWT_SECRET, async (err, user) => {
    try {
      if (err) {
        return response(res, 401, err.message)
      }

      req.user = user.user

      return next()
    } catch (error) {
      return res.status(401).json({
        status: 'failed',
        message: 'Unauthorize',
      })
    }
  })
}
