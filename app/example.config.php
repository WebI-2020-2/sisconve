<?php

# configurações servidor
const SERVER = "localhost";

# configurações banco de dados
const HOST = "localhost";
const USER = 'postgres';
const PASSWORD = 'password';
const DATABASE = 'sisconve';
const PORT = '5432';

# não alterar
define('APP', dirname(__FILE__));
define('URL','http://'.SERVER.'/sisconve');
define('APP_NOME','Sisconve');

const APP_VERSAO = '1.0.0';