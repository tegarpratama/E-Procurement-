module.exports = (code, message) => {
  const customError = new Error()
  customError.statusCode = code
  customError.message = message

  return customError
}
