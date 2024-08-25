const express = require('express')
const userController = require('../controllers/user.controller')
const validate = require('../middleware/validate')
const { activatedUser } = require('../validations/user.validation')

const router = express.Router()

router.get('/', userController.listUsers)
router.put(
  '/:user_id/verified',
  validate(activatedUser),
  userController.activatedUser
)

module.exports = router
