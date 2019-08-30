const db = require('./db')


//gerar tabelas
const Usuarios = db.sequelize.define('usuarios', {
    nome: {type: db.Sequelize.STRING},
    loginId: {type: db.Sequelize.STRING},
    email: {type: db.Sequelize.STRING},
    senha: {type: db.Sequelize.TEXT} 
})

const Concorrentes = db.sequelize.define('concorrentes', {
    nome: {type: db.Sequelize.STRING},
    telefone: {type: db.Sequelize.TEXT},
    email: {type: db.Sequelize.STRING},
    nascimento: {type: db.Sequelize.DATE},
    cursFacaul: {type: db.Sequelize.BOOLEAN},
    pretSalarial: {type: db.Sequelize.FLOAT},
    habilidades: {type: db.Sequelize.STRING}
    // especial: {type: db.Sequelize.BOOLEAN}
})

//comentar apos criar as tabelas pela primeira vez
// Usuarios.sync({force: true})
// Concorrentes.sync({force: true})

//inserts para teste
// Usuarios.create({
//     nome: "Administrador",
//     loginId: "admin",
//     email: "admin@teste.com",
//     senha: "123"
// })



//callback de conexao
// sequelize.authenticate().then(function(){
//     console.log("Successfully!")
// }).catch(function(erro){
//     console.log("Fail to connect on DB: "+erro)
// })


module.exports = Concorrentes
