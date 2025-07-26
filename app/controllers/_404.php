<?php
/**
PASSO nº6 - CLASS Home Ext Controller: visualiza e pede os dados a views
**/

//HOME CONTROLLER - PAGINA 404
class _404 extends Controller
{
    //1º patroa chama a funcionaria assistente
    public function index()
    {
        //2º assistente validar todos os dados extraido do 404
        $data['titulo'] = "404";
        
        //3º assistente - pega os dados extraido em cada campo e apresenta em array ($data = []) = '[firstname] => Afonso' ao frm '404' que apresenta.
        $this->view('404',$data);
    }
}