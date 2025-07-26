<?php
/**
PASSO nº1 - CLASSE APP: recebe os dados da URL (.htaccess);
PASSO nº2 - CLASSE APP: entrega os dados a class HOME - SEGURANÇA DA CASA;
**/

class App
{
    //SEGURANÇA DA CASA
    protected $controller = '_404';
    //MORDOMO DA CASA
    protected $method = 'index';
    
    //1ºexecuta 
    function __construct()
    {
        //2º porteiro pede o relatorio
        $arr = $this->getURL();
        //4º porteiro verifica se o visitante existe no sistema
        $filename = "../app/controllers/" .ucfirst($arr[0]). ".php";
        //5º se existir
        if(file_exists($filename))
        {
            //6º porteiro acompanha o visitante até o segurança da casa
            require $filename;
            //7º o segurança da casa o acompanha até ao mordomo da casa
            $this->controller = $arr[0]; 
            //8º visitante existindo no sistema merece entrar na casa
            unset($arr[0]);
            //9º ou então senão existisse no sistema
        }else{
            //10º segurança lançava o codigo alerta vermelho 404 "intruso"
           require "../app/controllers/" .$this->controller. ".php";
        }
        
        //11º segurança passa responsabilidade ao mordomo da casa
        $mycontroller = new $this->controller(); 
        //12º mordomo questiona se conhece alguém na casa 
        $mymethod = $arr[1] ?? $this->method;
        //13º verifica na casa
        if(!empty($arr[1]))
        {     
            //14º se exitir somente mordomo e o segurança
            if(method_exists($mycontroller, strtolower($mymethod)))
            {
            //15º permanecer com o mordomo
            $this->method = strtolower($mymethod);
            //16º e se quem ele procura for encontrado lhe leva ao patrao
            unset($arr[1]);
            }
        } 
            //17º mostra todos os patrões da casa
            $arr = array_values($arr);
           
            //18º depois disso chamam todos, o segurança, o mordomo para lhe ceder um quarto na casa e viver a vontade            
            call_user_func_array([$mycontroller,$this->method], $arr);
        
    }
    
    //3º guarda o relatorio
    private function getURL()
    { 
        //3.1º vigilante verifica se tem visitante novo, senão chama o policia
        $url = $_GET['url'] ?? 'home';
        //3.2º olha limpa os espaços em branco na rua, procura o visitante
        $url = filter_var($url,FILTER_SANITIZE_URL);
        //3.3º separa os visitante dos peões de passagem
        $arr = explode("/", $url);
        //3.4º dá o relatorio
        return $arr;
    }
}