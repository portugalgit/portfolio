<?php
//MODEL - AUXILIAR DO MODELO
//User Object ( 
class User extends Model
{ 
    //[errors] => Array
    public $errors = [];
    //[table:protected] => users
    protected $table = "users";
    
    //[allowedColumns:protected] => Array
    protected $allowedColumns = [
    //campo colunas da tabela users    
        'email', //[0] => email
        'firstname', //[1] => firstname
        'lastname', //[2] => lastname
        'password', //[3] => password
        'role', //[4] => role
        'date', //[5] => date
    ];
     
    //valida os dados do formulario e retorna os dados
    public function validate($data)
    {  
        //Array ()- sempre que existir erro passa variavel guardar 
        $this->errors = [];

        //validar os dados do campo se esta correto
        if(empty($data['firstname']))
        {
            //recolher a informaçao se ouver erro no formulario
            $this->errors['firstname'] = "Por favor o primeiro nome";
        }
        
        //validar os dados do campo se esta correto
        if(empty($data['lastname']))
        {
            //recolher a informaçao se ouver erro no formulario
            $this->errors['lastname'] = "Por favor o ultimo nome";
        }
        
        //consulata o email na base de dados
        if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
        {
            //recolher a informaçao se ouver erro no formulario
            $this->errors['email'] = "O email não é valido!";
        }else
        //procura validar se o email é igual ao email
        if($this->where(['email'=>$data['email']]))
        {
            //recolher a informaçao se ouver erro no formulario
            $this->errors['email'] = "O email já existe";
        }
        
        //validar os dados do campo se esta correto
        if(empty($data['password']))
        {
            //recolher a informaçao se ouver erro no formulario
            $this->errors['password'] = "Por favor a password";
        }
        
        //validar os dados do campo se esta correto
        if($data['password'] !== $data['retype_password'])
        {
            //recolher a informaçao se ouver erro no formulario
            $this->errors['password'] = "Password não pode ser diferente";
        }
        
        //validar os dados do campo se esta correto
        if(empty($data['terms']))
        {
            //recolher a informaçao se ouver erro no formulario
            $this->errors['terms'] = "Por favor aceita os termos";
        }
        
        //se estiver vazio
        if(empty($this->errors))
        {
            //retorna verdade
            return true;
        }
            //senão retorna falso
            return false;
    }
    
}