DROP DATABASE IF EXISTS blog;
CREATE DATABASE IF NOT EXISTS blog CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE blog;

CREATE TABLE generos( 
	IDGENERO TINYINT(2) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, -- 3 digitos... 0 / 255 - -128 / 127  001 002
	GENERO VARCHAR(45) NOT NULL UNIQUE
)ENGINE=innoDB;

CREATE TABLE paises( 
	ID SERIAL, -- BIGINT(16) UNSIGNED AUTO_INCREMENT NOT NULL ---> 9999999999999999 / 150
	PAIS VARCHAR(50) NOT NULL UNIQUE,
	PRIMARY KEY( ID )
)ENGINE=innoDB;

CREATE TABLE usuarios( 
	ID INT UNSIGNED UNIQUE PRIMARY KEY AUTO_INCREMENT, -- PRIMARY KEY ASUME UNIQUE...  
	NOMBRE VARCHAR(60), 
	APELLIDO VARCHAR(50), 
	AVATAR VARCHAR(60),
	EMAIL VARCHAR(100) UNIQUE NOT NULL,
	CLAVE CHAR(40) NOT NULL, -- SHA1 -> 40 / MD5 -> 32
	FECHA_ALTA DATETIME, -- 01/01/2018 - 1/1/18
	ESTADO TINYINT(1) DEFAULT 1, -- 0 inactivo / 1 activo
	NIVEL ENUM('administrador','moderador','lector') DEFAULT 'lector',
	FKPAIS BIGINT(16) UNSIGNED,
	FKGENERO TINYINT(2) UNSIGNED, -- pudo haber sido un ENUM...
	
	CONSTRAINT FKIDPAIS FOREIGN KEY(FKPAIS) REFERENCES paises(ID)  ON DELETE RESTRICT ON UPDATE CASCADE,
	CONSTRAINT FKIDGENERO FOREIGN KEY(FKGENERO) REFERENCES generos(IDGENERO)
)ENGINE=innoDB;

CREATE TABLE posteos( 
	ID INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	TITULO VARCHAR(255) NOT NULL,
	FOTO VARCHAR(50),
	TEXTO TEXT NOT NULL,
	FECHA_ALTA DATETIME,
	CONTADOR INT UNSIGNED DEFAULT 0,
	ESTADO TINYINT(1) DEFAULT 1,
	FKAUTOR INT UNSIGNED,
	CONSTRAINT FKIDAUTOR FOREIGN KEY (FKAUTOR) REFERENCES usuarios(ID)
)ENGINE=innoDB;

CREATE TABLE comentarios( 
	ID INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	FKUSUARIO INT UNSIGNED NOT NULL,
	FKPOSTEO INT UNSIGNED NOT NULL,
	COMENTARIO TEXT NOT NULL,
	FECHA_ALTA DATETIME,
	ESTADO TINYINT(1) DEFAULT 1,
	CONSTRAINT FKIDUSUARIO FOREIGN KEY(FKUSUARIO) REFERENCES usuarios(ID) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT FKIDPOSTEO FOREIGN KEY(FKPOSTEO) REFERENCES posteos(ID) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=innoDB;

CREATE TABLE categorias( 
	ID TINYINT(2) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT, -- 99 CATEGORIAS
	CATEGORIA VARCHAR(100) NOT NULL UNIQUE
)ENGINE=innoDB;

CREATE TABLE relacion( 
	FKPOSTEO INT UNSIGNED NOT NULL,
	FKCATEGORIA TINYINT(2) UNSIGNED NOT NULL,
	PRIMARY KEY( FKPOSTEO, FKCATEGORIA ), -- CLAVE COMPUESTA
	
	CONSTRAINT FKIDPOSTEOC 
	FOREIGN KEY(FKPOSTEO) 
	REFERENCES posteos(ID) 
	ON DELETE CASCADE 
	ON UPDATE CASCADE,
	
	
	CONSTRAINT FKIDCATEGORIAC 
	FOREIGN KEY(FKCATEGORIA) 
	REFERENCES categorias(ID) 
	ON DELETE CASCADE 
	ON UPDATE CASCADE
)ENGINE=innoDB;

/******** INSERCIONES **********/


INSERT INTO generos ( GENERO ) VALUES ( 'masculino' ), ( 'femenino' );

INSERT INTO paises (PAIS) VALUES ('Argentina'),('Bolivia'),('Brasil'), ('Chile'), ('Colombia'), ('Costa Rica'), ('Cuba'), ('Ecuador'), ('El Salvador'), ('Guayana Francesa'), ('Granada'), ('Guatemala'), ('Guayana'), ('Hait??'), ('Honduras'), ('Jamaica'), ('M??xico'), ('Nicaragua'), ('Paraguay'), ('Panam??'), ('Per??'), ('Puerto Rico'), ('Rep??blica Dominicana'), ('Surinam'),('Uruguay'), ('Venezuela');

INSERT INTO usuarios 
	( NOMBRE, APELLIDO, EMAIL, CLAVE, FKPAIS, FKGENERO, FECHA_ALTA, NIVEL ) 
VALUES 
	( 'German', 'Rodriguez','german@bloomit.com', '1234', 1, 1, '2018-02-01 00:00:00', 'administrador' ),
	( 'John', 'Doe','johndoe@email.com', '1234', 4, NULL, '2018-02-10 14:22:00', 'moderador' ),
	( 'Lady', 'Marmelade','lady.marmelade@bitmail.com', '1234', 6, NULL, '2018-02-10 15:12:00', 'lector' ),
	( 'Dolores', 'Fuertes','fuertesdolores@email.com', '1234', 1, 2, '2018-02-14 09:32:00', 'lector' ),
	( NULL, NULL,'annie@email.com', '1234', 17, NULL, '2018-02-20 22:56', 'lector' ),
	( NULL, NULL,'chavo@email.com', '1234', 17, 1, '2018-02-24 13:22', 'lector'   ),
	( 'Aquiles', 'Bailo','dancingman@email.com', '1234', 3, 1, '2018-02-24 16:21', 'moderador' ),
	( 'Margarita', 'Flores','blooming@email.com', '1234', 1, 2, '2018-02-24 18:43', 'lector' ),
	( 'Selva', 'Negra','selva@email.com', '1234', 17, 2, '2018-02-24 20:30', 'lector' ),
	( NULL, 'Flores','flores@bloomit.com', '1234', 1, NULL, '2018-02-26 06:45', 'lector' ),
	( 'Jane', 'Doe','janedoe@bloomit.com', '1234', NULL, 2, '2018-02-26 22:32', 'lector' ),
	( 'Root', 'Nobody','root.nobody@email.com', '1234', NULL, NULL, '2018-02-27 01:42', 'administrador' ),
	( NULL, NULL,'testing.user@bloomit.com', '1234', NULL, NULL, '2018-02-27 08:21', 'lector' ),
	( NULL, NULL,'fake.user@bloomit.com', '1234', NULL, NULL, '2018-02-27 10:11', 'lector' ),
	( NULL, NULL,'null.undefined@bloomit.com', '1234', NULL, NULL, '2018-02-27 21:18', 'lector' ),
	( NULL, NULL,'bit@bloomit.com', '1234', NULL, NULL, '2018-02-28 00:00', 'lector' ),
	( 'Omar', 'Ciano','marciano@email.com', '1234', NULL, NULL, '2018-02-28 12:00', 'lector' ),
	( 'Cindy', 'Entes','sindientes@email.com', '1234', NULL, NULL, '2018-02-28 23:55', 'lector' ),
	( 'Elena', 'No','elenano@bloomit.com', '1234', 16,2, '2018-03-01 00:00', 'moderador' ),
	( 'Omar', 'Garita','garita.omar@email.com', '1234', NULL, NULL, '2018-03-01 15:53', 'lector' ),
	( NULL, NULL,'admin@bloomit.com', '1234', NULL, NULL, '2018-03-02 05:44', 'lector' ),
	( NULL, NULL,'user@bloomit.com', '1234', NULL, NULL, '2018-03-04 19:30', 'lector' );


INSERT INTO categorias (CATEGORIA) VALUES ('Programaci??n'), ('Dise??o'), ('Tecnologia'), ('Cursos'), ('Educaci??n');

INSERT INTO posteos 
	(TITULO, TEXTO, FECHA_ALTA, CONTADOR, FKAUTOR )
VALUES
	('Primer posteo', 'Este es un hola mundo para rellenar las publicaciones del blog', '2018-03-10 22:54', 5, 1 ),
	('Segundo posteo', 'Seguimos cargando datos de prueba para testear las publicaciones', '2018-03-11 11:20', 20, 1 ),
	('Tercer texto', 'Un posteo m??s para el Blog de Backend', '2018-03-10', 21, 1 ),
	('Cuarto posteo', 'Este es un hola mundo para rellenar las publicaciones del blog', '2018-03-10', 7, 1 ),
	('PHP es un gran lenguaje', 'PHP es un lenguaje de c??digo abierto muy popular, adecuado para desarrollo web y que puede ser incrustado en HTML. Es popular porque un gran n??mero de p??ginas y portales web est??n creadas con PHP. C??digo abierto significa que es de uso libre y gratuito para todos los programadores que quieran usarlo. Incrustado en HTML significa que en un mismo archivo vamos a poder combinar c??digo PHP con c??digo HTML, siguiendo unas reglas. PHP se utiliza para generar p??ginas web din??micas. Recordar que llamamos p??gina est??tica a aquella cuyos contenidos permanecen siempre igual, mientras que llamamos p??ginas din??micas a aquellas cuyo contenido no es el mismo siempre. Por ejemplo, los contenidos pueden cambiar en base a los cambios que haya en una base de datos, de b??squedas o aportaciones de los usuarios, etc.', '2018-03-10', 3, 1 ),
	('Con MySQL podr??s hacer una web autoadministrable', 'MySQL es un sistema de administraci??n de bases de datos (Database Management System, DBMS) para bases de datos relacionales. As??, MySQL no es m??s que una aplicaci??n que permite gestionar archivos llamados de bases de datos. Existen muchos tipos de bases de datos, desde un simple archivo hasta sistemas relacionales orientados a objetos. MySQL, como base de datos relacional, utiliza multiples tablas para almacenar y organizar la informaci??n. MySQL fue escrito en C y C++ y destaca por su gran adaptaci??n a diferentes entornos de desarrollo, permitiendo su interactuaci??n con los lenguajes de programaci??n m??s utilizados como PHP, Perl y Java y su integraci??n en distintos sistemas operativos.', '2018-03-10', 200, 1 ),
	('Aprende FrontEnd', 'HTML es un lenguaje de marcado que se utiliza para el desarrollo de p??ginas de Internet. Se trata de la sigla que corresponde a HyperText Markup Language, es decir, Lenguaje de Marcas de Hipertexto, que podr??a ser traducido como Lenguaje de Formato de Documentos para Hipertexto. EL HTML se encarga de desarrollar una descripci??n sobre los contenidos que aparecen como textos y sobre su estructura, complementando dicho texto con diversos objetos (como fotograf??as, animaciones, etc). Es un lenguaje muy simple y general que sirve para definir otros lenguajes que tienen que ver con el formato de los documentos. El texto en ??l se crea a partir de etiquetas, tambi??n llamadas tags, que permiten interconectar diversos conceptos y formatos.', '2018-03-10', 123, 1 ),
	('Javascript Master', 'Javascript es un lenguaje que puede ser utilizado por profesionales y para quienes se inician en el desarrollo y dise??o de sitios web. No requiere de compilaci??n ya que el lenguaje funciona del lado del cliente, los navegadores son los encargados de interpretar estos c??digos. Muchos confunden el Javascript con el Java pero ambos lenguajes son diferentes y tienes sus caracter??sticas singulares. Javascript tiene la ventaja de ser incorporado en cualquier p??gina web, puede ser ejecutado sin la necesidad de instalar otro programa para ser visualizado.', '2018-03-10', 321, 1 ),
	('Proximamente Linux', 'LINUX (o GNU/LINUX, m??s correctamente) es un Sistema Operativo como MacOS, DOS o Windows. Es decir, Linux es el software necesario para que tu ordenador te permita utilizar programas como: editores de texto, juegos, navegadores de Internet, etc. Linux puede usarse mediante un interfaz gr??fico al igual que Windows o MacOS, pero tambi??n puede usarse mediante l??nea de comandos como DOS. Linux tiene su origen en Unix. ??ste apareci?? en los a??os sesenta, desarrollado por los investigadores Dennis Ritchie y Ken Thompson, de los Laboratorios Telef??nicos Bell. 	Andrew Tanenbaum desarroll?? un sistema operativo parecido a Unix (llamado Minix) para ense??ar a sus alumnos el dise??o de un sistema operativo. Debido al enfoque docente de Minix, Tanenbaum nunca permiti?? que ??ste fuera modificado, ya que podr??an introducirse complicaciones en el sistema para sus alumnos. Un estudiante finland??s llamado Linus Torvalds, constatando que no era posible extender Minix, decidi?? escribir su propio sistema operativo compatible con Unix. ', '2018-03-10', 14, 1 );

/******** CLAVES PASADAS A MD5 *****/

UPDATE usuarios SET CLAVE = SHA1( CLAVE );

/******* COMENTARIOS **************/

INSERT INTO comentarios VALUES 
( NULL, 1, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae suscipit ex, nec consequat nisl. Aliquam eleifend eros sapien, nec venenatis tortor semper in. Sed sed ornare odio, sit amet ullamcorper lectus. Proin bibendum laoreet lorem id lobortis. Maecenas auctor erat sed magna aliquam, in fringilla magna faucibus. Suspendisse convallis est augue, nec pretium arcu vulputate sed. Nulla convallis sapien laoreet posuere aliquam', '2018-01-15 23:57:11', 1 ),
( NULL, 2, 8, 'Nulla pretium purus in nibh elementum tristique. Ut non neque in odio sagittis ullamcorper. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed egestas condimentum neque quis ultricies. Fusce ac pulvinar orci. Nam sollicitudin malesuada blandit. Phasellus dui justo, porta eget mi sed, vulputate pulvinar lacus. Aliquam id tellus at lorem feugiat pellentesque ac sit amet sem. Sed ac eros tincidunt, malesuada tellus id, faucibus est', '2018-01-17 08:12:09', 1 ),
( NULL, 9, 9, 'Qu?? contenidos van a ense??ar en ese curso? Para cu??ndo planean habilitarlo?', '2018-01-22 14:20:22', 1 ),
( NULL, 6, 7, 'Morbi a urna aliquet, rhoncus justo quis, cursus dui. Nam et leo suscipit, tempor arcu eu, convallis lectus. Quisque vehicula dictum enim, vitae fringilla tellus ullamcorper et. In sit amet erat tellus. Cras hendrerit, risus sit amet porttitor dapibus, lectus lorem tristique urna, a viverra quam lorem non arcu. In id ex nec elit dignissim luctus vitae vel elit. Vivamus consequat purus vel sollicitudin sollicitudin. Pellentesque nisi mi, aliquam sed posuere et, faucibus in tellus. Nulla feugiat, augue sit amet tristique tristique, ligula dui mollis sapien, ac egestas leo felis a ante. Maecenas eu nisi accumsan, finibus dolor nec, hendrerit justo. Duis quis euismod tellus. Aliquam et dictum leo, quis sagittis mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae', '2018-01-23 07:53:21', 1 ),
( NULL, 3, 5, 'Con PHP pude hacer mi primer CMS para un Blog completo', '2018-01-23 22:30:00', 1 ),
( NULL, 1, 2, 'Proin ultrices rhoncus justo quis consequat. Pellentesque in ultricies ex. Nunc sed sapien placerat, faucibus ante non, pulvinar est. Suspendisse potenti. Sed porttitor molestie diam, quis aliquet ligula aliquet in. Phasellus vestibulum elit sit amet auctor pellentesque. Sed consequat est sit amet quam vestibulum, at consectetur leo tincidunt.', '2018-01-30 07:53:21', 1 ),
( NULL, 9, 7, 'Aliquam nulla orci, molestie eu elit nec, porta auctor lectus. Nunc sed urna nec ligula tempor dictum porta id quam. Phasellus vehicula blandit nisl sed efficitur. Nulla feugiat, justo efficitur lacinia pretium, mauris nisi blandit dui, sed finibus turpis erat molestie enim. Vivamus interdum vel nibh sollicitudin semper', '2018-02-01 07:53:21', 1 ),
( NULL, 3, 8, 'Ense??an manipulaci??n del DOM para hacer sitios interactivos y din??micos?', '2018-02-03 22:30:00', 1 ),
( NULL, 7, 5, 'Joya bro, despu??s pasanos el link', '2018-02-03 22:43:18', 1 ),
( NULL, 1, 9, 'Manejo de comandos para manipular archivos, carpetas, permisos. Configuraci??n del sistema y la red. Montaje de servidor b??sico, Apache y MySQL.\nPara el verano del 2021 estar?? disponible', '2018-02-05 20:02:03', 1 ),
( NULL, 11, 1, 'Nullam justo turpis, iaculis ut gravida vitae, venenatis eget mauris. Nam tristique ligula ipsum, eget rhoncus orci tristique laoreet. Nulla eros neque, eleifend mollis augue vitae, rutrum condimentum nisl. Vestibulum eu metus eu mi pellentesque semper a vitae erat. Curabitur congue ac dui ac tincidunt.', '2018-02-06 19:39:03', 1 ),
( NULL, 8, 1, 'Ut consequat viverra porttitor. Praesent malesuada lectus aliquet accumsan condimentum. Aliquam viverra magna eget turpis feugiat semper tempor in nisl. Phasellus tellus diam, suscipit sit amet est vel, ornare dapibus velit', '2018-02-06 17:02:01', 1 ),
( NULL, 3, 5, 'Lo sub?? en esta direcci??n https://www.bitdigitalacademy.com/blog gracias a todos!', '2018-02-06 22:30:00', 1 ),
( NULL, 9, 9, 'Excelente, ya voy reservando mi cupo para ese curso, me interesa', '2018-02-06 23:12:56', 1 ),
( NULL, 1, 8, 'S??, podr??s aprender DOM completo, basado en ECMA 6', '2018-02-07 23:52:13', 1 ),
( NULL, 12, 9, 'Usted no tiene permisos para acceder a ese curso XD XD', '2018-02-08 04:49:04', 1 ),
( NULL, 20, 8, 'Lo mucho que avanz?? Javascript pone el peligro el uso de jQuery? Porque pareciera que ya dej?? de ser tan fundamental para lograr algunos objetivos', '2018-02-10 21:31:11', 1 );