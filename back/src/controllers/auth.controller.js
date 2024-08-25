const authService = require('../services/auth.service')

exports.registerUser = async (req, res, next) => {
  try {
    const [userId] = await authService.registerUser(req.body)
    res.status(201).json({
      status: 'success',
      message: 'Register sucessfully',
      data: {
        id: userId,
      },
    })
  } catch (error) {
    next(error)
  }
}

exports.loginUser = async (req, res, next) => {
  try {
    const result = await authService.loginUser(req.body)
    res.status(200).json({
      status: 'success',
      message: 'Login sucessfully',
      data: result,
    })
  } catch (error) {
    next(error)
  }
}
