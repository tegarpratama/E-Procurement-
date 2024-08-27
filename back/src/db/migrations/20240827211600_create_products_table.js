exports.up = function (knex) {
  return knex.schema.createTable('products', (table) => {
    table.increments('id').primary()
    table.string('name', 255).notNullable()
    table.text('description').notNullable()
    table.integer('user_id').unsigned().notNullable()
    table.timestamp('created_at').defaultTo(knex.fn.now())
    table
      .timestamp('updated_at')
      .defaultTo(knex.raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))

    table
      .foreign('user_id')
      .references('id')
      .inTable('users')
      .onDelete('CASCADE')
  })
}

exports.down = function (knex) {
  return knex.schema.dropTable('products')
}
