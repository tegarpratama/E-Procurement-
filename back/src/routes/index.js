const express = require('express')
const authRoute = require('./auth.routes')
const userRoute = require('./user.routes')
const productRoute = require('./product.routes')
const auth = require('../middleware/login')

const router = express.Router()

router.use('/auth', authRoute)
router.use('/users', auth, userRoute)
router.use('/products', auth, productRoute)

module.exports = router
