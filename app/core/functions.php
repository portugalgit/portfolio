<?php

//DEBUG
function show($ver)
{
    //Debug para filtrar as informações do array
    echo'<pre>';
    print_r($ver);
    echo'</pre>';
}

//receber o valor do campo frm chave ou seja o que recebe o valor:(''email, password, firstname, lastname etc.)
function set_value($key)
{
    //se o campo do frm não estiver vazio
    if(!empty($_POST[$key]))
    {
        //retorna a informação do campo do frm chave
        return $_POST[$key];
    }
        //retorna vazio
        return ''; 
}

//DEBUG
function showServer()
{
    //Debug para filtrar as configurações do servidor local
    echo "<pre>";
    print_r($_SERVER);
}

//EXTRA INSATNCIAR A CLASSE
function extra()
{
        $db = new Database();
        $db->query();
    
        $con = $this->connect();
        var_dump($con);
    
        show($_POST);
}

//FUNÇÃO EXTRA PARA CRIAR TABELA NA BASE DE DADOS
function tabelaBD()
{ 
        $db = new Database();
        //2º chama função criar tabela na base de dados 
        $db->create_tables();
}

//FUNÇÃO INSERIR DADOS TEMPORARIO NA TABELA USER
function inserirArr()
{
    $user = new User();
    if($user->validate($_POST))
    {
        //pegar os dados da tabela de usuarios
        $query = "insert into users (firstname,lastname,email,password,role,date) values (:firstname,:lastname,:email,:password,:role,:date)";
        
        //pega do frm e insere os dados nas colunas
        $arr['firstname'] = $_POST['firstname'];
        $arr['lastname'] = $_POST['lastname'];
        $arr['email'] = $_POST['password'];
        $arr['password'] = $_POST['password'];
        $arr['role'] = "user";
        $arr['date'] = date("Y-m-d H:i:s");
        
        $db = new Database();
        $db->query($query,$arr);
    }
    
    //DEBUG
    show($user->errors);
    show($_POST);
         
}

//FUNÇÃO PARA REDIRECIONAR O LINK DA PAGINA
function redirect($link)
{
    header("Location: ". ROOT. "/" $link);
    die;
}
         
