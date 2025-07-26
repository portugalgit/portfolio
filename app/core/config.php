<?php

/***
App config
***/
define('APP_NAME','ACELNET');
define('APP_ADMIN','Administrador');
define('APP_DESC','Loja acelnet');

/***
database config
**/
if($_SERVER['SERVER_NAME'] == 'localhost')
{
    //database config for local server
    define('DBHOST','localhost');
    define('DBNAME','db_acelnet');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBDRIVER','mysql');
    
    //root path e.g localhost
    define('ROOT','http://localhost/acelnet/public');

}else
{
    //database config for live server
    define('DBHOST','localhost');
    define('DBNAME','db_acelnet');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBDRIVER','mysql');
    
    //root path e.g https://www.yourwebsites.com
    define('ROOT','http://');
}