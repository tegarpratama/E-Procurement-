const userService = require('../services/user.service')

exports.listUsers = async (req, res, next) => {
  try {
    const result = await userService.listUsers()
    res.status(200).json({
      status: 'success',
      message: "List user's",
      data: result,
    })
  } catch (error) {
    next(error)
  }
}

exports.activatedUser = async (req, res, next) => {
  try {
    await userService.activateUser(req.params.user_id)
    res.status(201).json({
      status: 'success',
      message: 'The user account has been successfully activated',
    })
  } catch (error) {
    next(error)
  }
}
