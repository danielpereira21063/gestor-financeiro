<?php

define('APP', dirname(__FILE__));
define('APP_NAME', 'Gestor Financeiro');
define('APP_VERSION', '1.0');

$ambiente = "d";

if($ambiente == "d" /*desenvolvimento*/) {
    define('BASE_URL', 'http://127.0.0.1/gestor-financeiro');
    define('MYSQL_HOST', '127.0.0.1');
    define('MYSQL_PORT', '3306');
    define('MYSQL_DB', 'gestor-financeiro_teste');
    define('MYSQL_USERNAME', 'root');
    define('MYSQL_PASSWD', '');
} else {
    //producao
    define('BASE_URL', 'http://danielsanches.epizy.com/gestor-financeiro');
    define('MYSQL_HOST', 'sql209.epizy.com');
    define('MYSQL_PORT', '3306');
    define('MYSQL_DB', 'epiz_29841848_gestor_financeiro');
    define('MYSQL_USERNAME', 'epiz_29841848');
    define('MYSQL_PASSWD', 'HLA5O8RnlDHW');
}