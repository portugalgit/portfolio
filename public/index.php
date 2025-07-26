<?php
//1º INDEX 'TO' -> APP


//1º inicializa a chamada do index
session_start();

//2º pega o arquivo de inicialização
require "../app/core/init.php";

//3º chama a classe e executa
$app = new App();