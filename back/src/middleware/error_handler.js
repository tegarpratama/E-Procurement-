const errorHandler = (err, req, res, next) => {
  let { statusCode, message } = err
  if (!err.statusCode) statusCode = 500
  if (!err.message) message = 'Internal Server Error'

  res.status(statusCode).json({
    status: 'failed',
    message: message,
  })
}

module.exports = errorHandler
