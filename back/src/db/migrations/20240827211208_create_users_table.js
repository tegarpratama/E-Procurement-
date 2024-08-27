exports.up = function (knex) {
  return knex.schema.createTable('users', (table) => {
    table.increments('id').primary()
    table.string('name', 100).notNullable()
    table.string('email', 100).notNullable()
    table.string('password', 255).notNullable()
    table.enu('role', ['admin', 'vendor']).notNullable().defaultTo('vendor')
    table.boolean('is_verified').defaultTo(false)
    table.timestamp('created_at').defaultTo(knex.fn.now())
    table
      .timestamp('updated_at')
      .defaultTo(knex.raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))
  })
}

exports.down = function (knex) {
  return knex.schema.dropTable('users')
}
