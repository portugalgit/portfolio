<?php
//CONECTA A BASE DE DADOS DIRETAMENTE
class Database
{
    //função conectar a base de dados
    private function connect()
    {
        //1º passa o hostname e nome da base a string
        $str = DBDRIVER.":hostname=".DBHOST.";dbname=".DBNAME;
        //2º inicializa a conexão username e password
        return new PDO($str,DBUSER,DBPASS);
    }
    
    //função consultar a base de dados:vai 1.consultar,2.receber dados em array e 3. receber dados objecto(instancias).
    public function query($query,$data = [],$type = 'object')
    {
        //3º executa a fução conectar() para entrar na base de dados
        $con = $this->connect();
        //4º preparar a consulta na base de dados
        $stm = $con->prepare($query);
        //5º se a query da consulta foi estabelecida
        if($stm)
        {
            //6º verifica e executa para e passa os dados na variavel $data
            $check = $stm->execute($data);
            //5º verifica se tem conexão e fecha a sessão
            if($check)
            {
                    //6º recebe array object
                    $type = PDO::FETCH_OBJ;
                
                    //7º se for diferente de object
                    if($type != 'object')
                    {
                        //8º entrega o array associativo
                        $type = PDO::FETCH_ASSOC;
                    }
                
                    //9º passa o resultado da consulta 
                    $result = $stm->fetchAll($type);
                
                    //10º se existir array e tiver mais de um resultado
                    if(is_array($result) && count($result) > 0)
                    {
                        //11ºretorna o resultado
                        return $result;
                    }
                    
                }
                
            }
            //12º retorna falso se não existe 
            return false;
    }
        //função criar tabelas
        public function create_tables()
        {
            //13º cria a tabela de usuarios caso não existir
            $query = "
            
            CREATE TABLE IF NOT EXISTS`users` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `email` varchar(100) NOT NULL,
            `firstname` varchar(255) NOT NULL,
            `lastname` varchar(30) NOT NULL,
            `password` varchar(30) NOT NULL,
            `role` varchar(20) NOT NULL,
            `date` date DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `email` (`email`),
            KEY `firstname` (`email`),
            KEY `lastname` (`email`),
            KEY `date` (`date`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
            
            ";
            
            //14º executa a query
            $this->query($query);
        }
}