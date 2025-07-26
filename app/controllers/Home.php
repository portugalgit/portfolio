<?php
/**
PASSO nº6 - CLASS Home Ext Controller: visualiza e pede os dados a views
**/

//HOME CONTROLLER - PAGINA HOME
class Home extends Controller
{ 
    //1º patroa chama a funcionaria assistente
    public function index()
    {      
        //2º assistente validar todos os dados extraido da Home
        $data['titulo'] = "Home";
        
        //3º assistente - pega os dados extraido em cada campo e apresenta em array ($data = []) = '[firstname] => Afonso' ao frm 'home' que apresenta.
        $this->view('home',$data);
    }
    
}