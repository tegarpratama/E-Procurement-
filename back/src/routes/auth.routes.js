const express = require('express')
const authController = require('../controllers/auth.controller')
const validate = require('../middleware/validate')
const { register, login } = require('../validations/auth.validation')
const router = express.Router()

router.post('/register', validate(register), authController.registerUser)
router.post('/login', validate(login), authController.loginUser)

module.exports = router
