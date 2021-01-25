/*
|
|   Con mysql podemos mostrar la fecha de alta como nosotros se nos haga mas conveniente,
|   con la funcion DATA_FORMAT () que dentro resive los parametros que nos permite inidicare como mostrar 
|   tenemos que usar el simbolo de porsentaje y la letra que haga referencia a como la vamos a mostar
|   %d -> 0-31
|   %w -> lunes a domingo
|   %M -> enero a diciembre
|   %m -> 0-12
|   %y -> 2 digitos 
|   %Y -> 4 digitos
|   %H -> Hora en 0 a 24
|   %h -> hora 1-12
|   %i -> minuto
|   %s -> sefunod
|   %p -> am o pm (esto se ocupa cuando solicute la hora en formato de 12 horas )
*/

SELECT DATE_FORMAT(FECHA_ALTA, "%d-%m-$y");


Tambien podemos sacar la fecha en formato tipo HACE 3 dias
con la funcion DATEDIFF(FECHA_ACTUAL(NOW()) ,FECHA_ALTA)


/*

    Tambien podemos hacer que MYSQL nos diga que fecha va hacer dentro de tantos dias
    Necesitamos la funcion DATE_ADD(FECHA_ALTA, INTERVAL 45 DAY)
*/  