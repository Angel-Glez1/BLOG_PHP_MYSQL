SELECT * FROM listado_usuarios
INTO OUTFILE "c://xampp/htdocs/Blog-php/_Ejemplos/02-MYSQL/users.csv"
CHARACTER SET latin1
FIELDS TERMINATED BY ","
LINES TERMINATED BY "\n";