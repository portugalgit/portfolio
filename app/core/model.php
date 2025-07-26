<?php

//MODEL - AUXILIAR DATABASE
class Model extends Database
{ 
    
    //variavel protege a tabela de dados
    protected $table = "";
    
    //insere os dados na tabela e retorna os dados
    public function insert($data)
    {
        //mostra a coluna senão estiver vazia
        if(!empty($this->allowedColumns))
        {
          //faça um loop aos dados da tebala como chave
            foreach ($data as $key => $value){
                //se a coluna não for diferente permite a coluna
                if(!in_array($key, $this->allowedColumns))
                {
                    //se for invalido bloqueia a inserção dos dados da coluna
                    unset($data[$key]);
                }
               
            }
        }
        
        //recebe os campos chave da coluna users do array
        $keys = array_keys($data);
        //recebe os campos chave da linha users do array
        $values = array_values($data);
        //inserir os dados na tabela de usuarios
        $query = "insert into " . $this->table;
        //separa os dados da tabela chave do array
        $query .= " (".implode(",", $keys) .") values (:".implode(",:", $keys) .")";
        
        //chama a consula e insere os valores na tabela
        $this->query($query,$data);
        
    }
   
    //procurar a tabela e retorna os dados 
    public function where($data)
    {
        //pega o primeiro array como a chave {array [0] => email}
        $keys = array_keys($data);
        //select * from users where
        $query = "select * from ".$this->table." where ";
        
        // faça um loop ao (array {[0] => email}) como chave coluna email
        foreach ($keys as $key){
            //select * from users where email=:email &&
            $query .= $key . "=:" . $key . " && ";
        }
        
        //select * from users where email=:email e remova os espaços
        $query = trim($query,"&& ");
        //retora todos arrays com os seus dados:Array[0...n] e resultado
        $res = $this->query($query,$data);
        
        //se o array existir ou seja o email do convidado então
        if(is_array($res))
        {
            //mostra somente os dados do convidado
            return $res;
        }
        
        //caso não for, retorna falso
        return false;
                        
    }
    
}