<?php 

$orden = 10;
$total = 0;
$compra = [
            [ 'nombre' => 'pc' , 'precio' => 234.21 ],
            [ 'nombre' => 'mouse' , 'precio' => 200.70 ],
            [ 'nombre' => 'audifonos' , 'precio' => 89.10 ],
            ];

/*
|-------------------------------------------------------------------------------------
|       Formatiar string y numeros con sprintf()
|-------------------------------------------------------------------------------------
|
|   El formateo de string es la posibilidad de mostrar de diferente manera algun dato.
|   sea numerico o sea string 
|   aqui vamos aver como hacer que los numeros se muestres de alguna forma 
|   
|   sprintf() -> Nos permite formatiar dichos numeros par que todo salga bien.
|                 Por medio de token 
|
|   %s   ->String
|   %d   ->Int de tipo entero
|   %u   ->Int sin negativo Y si pon uno con degativo pero cambia bien feo este casi no se usa
|   %f   ->Int con decimales
|   %.2f ->Me da solo los dos primeros decimales depes del punto
|   %2s  ->Esto se ocupa cuando el acomodo de los datos estas direfen el numero hace referencia 
|            ala pocision en donde va a tomar ese dato.
|   %05s ->Esto sirve para regenar el string o un numero el 0 es el valor con el que vamos a regenar
|          el 5 son las veces que se va a repetir el 0 y la s como sabemos es que el dato lo va a  tratar como 
|          string Esto lo regena de izquerda a derecha asi 00000Angel, Si lo que quiero 
|          es que lo rellene de derecha izquerda Solo le pongo un NEGATIVO AL PRINCIPIO
|          Angel00000 EN CASO DE QUE SEAN NUEMEROS TEN CUIDADO POR QUE DE ESTO 000010 
|          pasa a esto 1000000 y claramente ya no es lo mismo.             
|   '.   ->Esto solo es el ejemplo de como escapar un caracter resevado del spritnf podemos escapar
|           cualquier simbolo '$ '% 
|
*/ 

/*
|--------------------------------------------------------------------------------------------
|       Formatiar numeros con number_format();
|--------------------------------------------------------------------------------------------
|
|   Esta funcion es mas simple ya que solo no pide el numero o la varible donde este guardado
|   el valor numerico para formatiarlo 
|   numbrr_format(  
|                 $numero -> El numero que vamos a formatiar
|                 2       -> El numero de decimales que quiero que me muestre    
|                 '.'     -> El simbolo que va a representar los decimales.
|                 ','     -> El simbolo que va a representar los miles
|                )
|
*/ 


/*
|~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
|    Regenar string con str_pad();
|~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
|
|   str_pad -> Hace referencia al padding que significa relleno
|               Pide 4 argumento el ultimo es optativo.
                str_pad(
                    $elstrin,
                    4   -> El numero de veces que va a repetir el caracter que le indiquemos
                   '%' ->  El simbolo o puede ser palabra con lo que o va a rellenar.
                   STR_PAD_LEFT -> ESTO ES PARA QUE LADO VA A RELLENAR DESDE LA IZQUERDA O DEREACHA
                   STR_PAD_RIGHT -> ESTO ES PARA QUE LADO VA A RELLENAR DESDE LA IZQUERDA O DEREACHA
                )
|
|
|
*/







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Rellenar String con sprintf -->
    <h1>Num° order <?= sprintf( '%09d', $orden) ?></h1>

    <!-- Rellenar strin con un str_pad  -->
    <h1>Num° order <?= str_pad($orden, 10 , '#' ,STR_PAD_LEFT  ) ?></h1>
    <table border="1" >
        <thead>
            <tr>
                <th>Nombre</th>
                <th>total</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($compra as $key): ?>
            <tr>
                <?= sprintf("<td>%s</td>", $key['nombre']);  ?>
                <?= sprintf("<td>%.2f</td>", $key['precio']);  ?>
                
            </tr>
         <?php $total += $key['precio']; endforeach;    ?>
         <tr>
            <td>Pago final</td>
            <td><?= number_format($total, 2 , '.' , ',' )  ?></td>
         </tr>
        </tbody>
    </table> 
</body>
</html>

