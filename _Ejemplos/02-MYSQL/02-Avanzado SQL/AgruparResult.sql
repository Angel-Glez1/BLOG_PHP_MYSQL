/*
|------------------------------------------------------------------------------
|           AGRUPAR RESULTADOS
|-----------------------------------------------------------------------------
|   
|   Cuando usamos las funciones de agregado como COUNT, MAX, SUM
|   Tenemos que usar la funcion GROUP BY para que esa columna que 
|   nos crea las pueda agrupar por alguna columna que deseamos
|
*/

-- Contar cuantos usuarios hay y agruparlos por el pais de origen
SELECT COUNT(ID) FROM usuarios GROUP BY nacionalidad;

-- Si queremos filtar los resultados y vamos usar un alias pues aqui tenemos que usar haviing

/*
|------------------------------------------------------------------------------
|          Relacion muchos a muchos
|-----------------------------------------------------------------------------
|   
|   Cuando tenemos una relacion de muchos a muchos como puede ser 
|   que un posteo pertenezca a muchas categorias por ejemplo
|   NODEJS puede pertenecer a las categorias 
|   Javascript, backend , Servidor .ect y cuando queramos mostar
|   a que categorias perternece podemos ese post se van a repetir los podeos 
|   por que como son varias categorias va crear un fila con el mismo posteo
|   pero diferente categoria.
|
|   Para evitar esto tenemos que usar la funcion GROUP_CONCANT esta es 
|   una funcione de agregado osea que cuando lo ejecutemos solo nos va a
|   mostar una fila, para evitar esa funcion tenemos que agrupar los resultados 

*/

-- Vamos a mostar las categorias alas que pertenece un posteo
SELECT posteos.id ,
       usuarios.nombre,
       GROUP_CONCANT(categorias.categoria, SEPARATOR ', ')
FROM
    posteos 
INNER JOIN usuarios  ON usuarios.id = posteos.FKUSUARIO,            
INNER JOIN categorias  ON categorias.id = posteos.FKCATEGORIA,            
GROUP BY posteos.id;