/*
|-----------------------------------------------------------------------------------------
|                               ALTER TABLE (Modificar tablas)
|-----------------------------------------------------------------------------------------
|
|   Con codigo sql podemos modificar una tabla con diferentest accion.
|
|   1)-Renombrar una tabla
|   2)-Agregar una colunma 
|   3)-Elimnar una columna 
|
*/


-- Eliminar una tabla
DROP TABLE usuarios;

-- Renombrar una tabla
ALTER TABLE usuarios RENAME users;

-- Agregar una nueva columna
ALTER TABLE usuarios ADD COLUMN telefono INT AFTER sexo;
ALTER TABLE posteos ADD COLUMN PREFERENCIAS SET('comentar', 'descargar', 'enviar');


-- Renombrar una colunma
ALTER TABLE usuarios RENAME COLUMN 


-- Agregar un CONSTRAINT
ALTER TABLE usuarios ADD CONSTRAINT FK_ID_CEL FOREIGN KEY ( telefono_ID ) REFERENCES telefonos(ID);