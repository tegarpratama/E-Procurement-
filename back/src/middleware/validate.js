module.exports = validate = (schema) => (req, res, next) => {
  const { error } = schema.validate(
    { ...req.body, ...req.params },
    { abortEarly: false }
  )

  if (error) {
    let errorMessage = []
    error.details.forEach((el) => {
      errorMessage.push({
        label: el.path[0],
        message: el.message.replace(/\"/g, ''),
      })
    })

    return res.status(400).json({
      status: 'failed',
      message: 'validation error',
      errors: errorMessage,
    })
  }

  next()
}
