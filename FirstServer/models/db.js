const Sequelize = require('sequelize')

//config de conexao
const sequelize = new Sequelize('projzemis','root','',{
    host: "localhost",
    dialect: 'mysql'
})

module.exports = {
    Sequelize: Sequelize,
    sequelize: sequelize
}