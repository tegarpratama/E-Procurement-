require('dotenv').config({
  path: process.env.NODE_ENV ? `.env.${process.env.NODE_ENV}` : '.env',
})
const express = require('express')
const db = require('./src/config/database')
const routes = require('./src/routes/index')
const errorHandler = require('./src/middleware/error_handler')

db.raw('SELECT 1')
  .then(() => {
    if (process.env.NODE_ENV != 'test') {
      console.log('database connected')
    }
  })
  .catch((e) => {
    console.log(`failed to connect database: ${e.stack}`)
  })

const app = express()

app.get('/api/check-health', (_, res) => {
  res.json({
    message: "It's work!",
  })
})

app.use(express.json())
app.use('/api', routes)
app.use(errorHandler)

module.exports = app
