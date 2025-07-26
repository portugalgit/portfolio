<?php
/**
PASSO nº6 - CLASS Home Ext Controller: visualiza e pede os dados a views
**/

//HOME CONTROLLER - PAGINA INSCRIÇÃO
class Signup extends Controller
{ 
       
    //1º patroa chama a funcionaria assistente
    public function index()
    { 
        //Debug mostra o frm
        //show($_POST); 
        
        //declarar a variavel [errors] => Array
        $data['errors'] = [];
        
        //2º assistente busca modelo: 'User Object'
        $user = new User();
        
        //3º assistente - pega o frm e valida os dados conforme as regras
        if($_SERVER['REQUEST_METHOD'] == "POST")
        { 
            if($user->validate($_POST))
            {
                //acerta o datatime do campo data no formulario
                $_POST['date'] = date("Y-m-d H:i:s");
                //4º insere os dados do formulario na tabela de usuarios
                $user->insert($_POST);
            }
        }
        //recolhe os erros do frm user [error] => Array e guarda
        $data['error'] = $user->errors;
        //show($user->allowedColumns);
        
       //3º assistente validar todos os dados extraido da inscrição [titulo] => Signup
       $data['titulo'] = "Signup";
       //4º assistente - pega os dados extraido em cada campo e apresenta em array ($data = []) = '[firstname] => Afonso' ao frm 'signup' que apresenta.
       $this->view('signup',$data);
       
    }
    
}