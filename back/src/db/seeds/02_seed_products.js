exports.seed = async function (knex) {
  const valueProducts = []

  for (let i = 0; i < 5; i++) {
    valueProducts.push({
      id: i + 1,
      name: `Barang ${i + 1}`,
      description: `Deskripsi barang #ID${i + 1}`,
      user_id: 1,
      created_at: knex.fn.now(),
      updated_at: knex.fn.now(),
    })
  }

  await knex('products').del()
  await knex('products').insert(valueProducts)
}
