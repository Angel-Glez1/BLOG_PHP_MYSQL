<?php 

// mk => make que significa crear 


// Me dice los segundos desde el 10-enero-1970 el dia que inicio la infomatica.
time();

// Me indica el intervalo de segundos de mi la fecha del 10-enero-1970 hasta la fecha que le indique
// mktime(HORA, MINUTOS, SEGUNDOS, MES, DIA, AÑO)
// mktime(10,60,5,12,23,2000);

/* Me da la fecha actual

    y => Me da los ultimos dos digitos del año
    Y => me da todos los digitos del año

    m => Numero del mes
    M => Nombre del mes solo los 3 primeros caracters

    d => Numero del dia
    D => Nombre del dia, con solo 3 caracteres



*/
$minutos = time();

date('Y-M-D h:i:s', $minutos);


//Le puedo agregar dias a mis   
// strtotime('+10 day', time());


// Setear zonas horarias
date_default_timezone_set('America/Mexico_city');
echo date('d-M-Y h:i:s');





?>