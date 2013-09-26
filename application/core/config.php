<?php

if(environment === 'test'){
    define('db_host', 'localhost');
    define('db_username', 'root');
    define('db_password', '');
    define('db_name', 'db');
}else if(environment === 'live'){
    define('db_host', 'host.com');
    define('db_username', 'usr');
    define('db_password', 'pwd');
    define('db_name', 'db');
};

?>
