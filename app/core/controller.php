<?php
/**
PASSO nº3 - CLASS Controller: rebece informação da CLASSE APP;
PASSO nº4 - CLASS APP pede a CLASSE Controller para:
            1º localizar dentro dela se o visitante existe;
            2º senão existe para lançar o alerta 404;
            3º senão receber dados, pode direcionar para o home;
PASSO nº5 - CLASS Controller: visualiza e pede os dados a views
**/

//PATROA
class Controller
{
    //7ºmetodo ver:1ºlocaliza o frm, 2ºreceber os dados do frm em array. 
    public function view($view,$data = [])
    {
        //1º patroa manda validar todos os dados extraido
        extract($data);
        
        //2º patroa verifica se existe o quarto no sistema
        $filename = "../app/views/" .$view. ".view.php";
        //3º se existir 
        if(file_exists($filename))
        {
            //4º patroa acompanha o visitante até o quarto
            require $filename;
            //5º ou então senão existir no sistema
        }else{
            //6º o quarto não foi encontrado
            echo "O formulario não foi encontrado ".$filename;
            
        }
    }
}