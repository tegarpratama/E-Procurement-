const hashPassword = require('../../utils/hash_password')

exports.seed = async function (knex) {
  const valueUsers = [
    {
      id: 1,
      name: 'admin',
      email: 'admin@gmail.com',
      password: await hashPassword('password'),
      role: 'admin',
      is_verified: 1,
      created_at: knex.fn.now(),
      updated_at: knex.fn.now(),
    },
  ]

  for (let i = 1; i <= 5; i++) {
    valueUsers.push({
      id: i + 1,
      name: `Vendor ${i}`,
      email: 'vendor${i}@gmail.com',
      password: await hashPassword('password'),
      role: 'vendor',
      is_verified: 0,
      created_at: knex.fn.now(),
      updated_at: knex.fn.now(),
    })
  }

  await knex('users').del()
  await knex('users').insert(valueUsers)
}
