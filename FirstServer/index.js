const express = require("express");
const app = express();
const handlebars = require('express-handlebars')
const bodyParser = require('body-parser')
const Concorrentes = require('./models/Post')


//template config
app.engine('handlebars', handlebars({defaultLayout: 'main'}))
app.set('view engine', 'handlebars')
//body parser
app.use(bodyParser.urlencoded({extended: false}))
app.use(bodyParser.json())

//rotas
app.get("/", function(req, res){
    res.render('index')
});

app.get("/cadastrar", function(req, res){
    res.render('cadastrar')
});

app.get("/editar/:id", function(req, res){
    res.render('cadastrar')
});

app.get("/conteudo", function(req, res){
    Concorrentes.findAll().then(function(posts){
       res.render('conteudo', {posts: posts}) 
    })
    // res.render('conteudo')
});

app.get('/conteudo/:id', function(req,res){
    Concorrentes.destroy({where: {'id': req.params.id}}).then(function(){
        res.redirect('back');
    }).catch(function(erro){
        res.send("Erro ao deletar!")
    })
});


//posts ######form de cadastro
app.post("/cadastrar", function(req, res){
      Concorrentes.create({
        nome: req.body.inpNome,
        telefone: req.body.inpTelefone,
        email: req.body.inpEmail,
        nascimento: req.body.inpNascimento,
        cursFacaul: req.body.radioFacul,
        pretSalarial: req.body.inpSalarial,
        habilidades: req.body.inpHabilidades,
        // especial: req.body.radioMarcar
        }).then(function(){
            res.redirect('conteudo')
        }).catch(function(erro){
            res.redirect('cadastrar')
        })  
    
});

//update cadastro
app.post('/editar/:id', function(req,res){
    Concorrentes.update({
        nome: 'teste de update',
        telefone: req.body.inpTelefone,
        email: req.body.inpEmail,
        nascimento: req.body.inpNascimento,
        cursFacaul: req.body.radioFacul,
        pretSalarial: req.body.inpSalarial,
        habilidades: req.body.inpHabilidades
        },
        // especial: req.body.radioMarcar
        {where: {'id': req.params.id}}
    ).then(function(){
        res.redirect('back');
    }).catch(function(erro){
        res.send("Erro ao atualizar!")
    })
});



app.listen(8081, function(){
    console.log("Servidor rodando perfeitamente!")
});