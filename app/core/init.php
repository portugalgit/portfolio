<?php
//1. procurar as class criada no models automaticamente
spl_autoload_register(function($class_name)
 {
     //2. procure dentro do models
    require "../app/models/" .$class_name . ".php";
     
 });

//3. responsavel por incluir as classes
require "config.php";
require "functions.php";
require "database.php";
require "model.php";
require "controller.php";
require "app.php";