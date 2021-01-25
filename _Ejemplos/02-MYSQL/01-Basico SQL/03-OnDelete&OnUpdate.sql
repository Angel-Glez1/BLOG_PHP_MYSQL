/*
-----------------------------------------------------------------------------------------------------------------------
|                        ON DELETE & ON UPDATE
-----------------------------------------------------------------------------------------------------------------------
|
|
|   Cuando creamos llaves foraneas osea que le vamos a prestar el ID a otra tabla para poder 
|    relacionarlas por defecto no podemos eliminar registros que esten ocupando ese ID
|   Por ejemplo:
|    Tenemos una tabla de paises y cada pais tiene un ID
|    TABLA **PAISES
|    +-------------+--------------+
|    |     ID      |   NOMBRE     |
|    +-------------+--------------+                               
|    |     1       |   México     |
|    |     2       |   Espáña     |  
|    +-------------+--------------+
|
|    Vamos a ocupar la informacion de la tabla PAISES para que en una tabla de usuarios puedan eligir de que paises son
|    TABLA **Usuarios
|    +-------------+--------------+--------------+
|    | ID          |    NOMBRE    |  PAIS_ID     |    
|    +-------------+--------------+--------------+                               
|    |    1        |   Julian     |   1          |
|    |    2        |   Panfilo    |   1          |
|    +-------------+--------------+--------------+
|    Ahora por defecto si vamos ala tabla de paises y quiero eliminar mexico no podria por que 
|    en la tabla de usuarios los dos registros que tengo estan haciendo referencia al ID de mexico.
|    Esto pasa por que MYSQL no permite eliminar registros de una tabla que este prestando su infomarcion
|    a otra y que esta misma este ocupando dicha informacion. OJO si elimino España si lo podria hacer ya 
|    que ese valor no esta siendo requerido en otra tabla.
|
|
|    AHORA para poder eliminar un registro de una tabla que este prestando su informacion a otra, Lo que tenemos que hacer es
|    ala hora de crear las foreign key le tenemos que agregar alguno de los siguentes atributos.
|
|    ---ON DELETE ó ON UPDATE. 
|    Y su par tenemos que indicarle que tipo de accion va hacer si elimina mos un registro de una tabla que su informacion
|    este siendo ocupada por otra.
|    LAS ACCION SON 
|    °RESTRICT => Esta es por defecto ósea que no puedo eliminar un registro de una tabla que este prestando su info a otra.
|    °CASCADE  => Esta accion hace lo contrario SI ELIMINO UN REGISTRO DE UNA TABLA QUE ESTE PRESTADO SU INFORMACION A OTRA 
|                 TABLA TODOS LOS REGISTROS QUE ESTEN OCUPANDO ESA INFORMACION TAMBIEN VAN HACER ELIMINADO |
|
|    ¡¡¡¡¡¡   IMPORTANTE !!!!!
|    TIENES QUE HACER UN ANALIZIS DE COMO QUIERES QUE SE COMPORTEN UN UN REGISTRO SI ES ELIMINADA.
|    Y ESTO SE HACE CUANDO CREAS LAS FORENIGN VAMOS HACER EL EJEMPLO EN CODIGO
|
*/

CREATE TABLE paises(

    ID          INT PRIMARY KEY AUTO_INCREMENT,
    NOMBRE      VARCHAR(200)

)ENGINE=innoBD;


CREATE TABLE users(

    ID          INT PRIMARY KEY AUTO_INCREMENT,
    NOMBRE      VARCHAR(200),
    PAIS_ID     INT,


    CONSTRAINT fk_id_pais   -- Nombre del constraint
    FOREIGN KEY (PAIS_ID)   -- En que columna vamos a guardar la infomacion de foreing key
    REFERENCES paises (ID)  -- De que tabla viene
    ON DELETE RESTRICT      -- Que pasa si elimino un registro
    ON UPDATE CASCADE       -- Que pasa si actualizo un error


)ENGINE=innoDB;

