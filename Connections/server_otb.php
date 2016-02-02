<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_server_otb = "localhost";
$database_server_otb = "sis_otb";
$username_server_otb = "root";
$password_server_otb = "";
$server_otb = mysql_pconnect($hostname_server_otb, $username_server_otb, $password_server_otb) or trigger_error(mysql_error(),E_USER_ERROR); 
?>