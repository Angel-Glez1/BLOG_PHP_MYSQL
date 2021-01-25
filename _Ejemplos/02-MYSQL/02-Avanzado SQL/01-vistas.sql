CREATE or REPLACE VIEW test_usuarios AS ( 
	SELECT 
		CONCAT( NOMBRE, '') AS NOMBRE,
		APELLIDO,
		EMAIL,
		GENERO
	FROM 
		usuarios AS u 
		JOIN generos AS g ON IDGENERO = u.FKGENERO
);

/* LISTADO DE TODOS LOS USUARIOS CON SUS DATOS PROCESADOS */
CREATE VIEW listado_usuarios AS( 
	SELECT 
		u.ID, 
		NOMBRE, 
		APELLIDO,
		IFNULL( GENERO, 'sin genero' ) as GENERO,
		IFNULL( 
			CONCAT( 
				LEFT( NOMBRE, 1 ), 
				'. ',
				UPPER( APELLIDO )
			) ,
			SUBSTRING_INDEX( EMAIL, '@' , 1 )
		) AS NOMBRE_USUARIO,
		SUBSTRING_INDEX( 
			SUBSTRING_INDEX( EMAIL, '@', -1),
			'.',
			1 
		) AS EMPRESA_MAIL,
		IFNULL( 
			AVATAR, 
			IF( 
				GENERO = 'masculino', 
				'000_masculino.jpg', 
					IF( 
						GENERO = 'femenino',
						'000_femenino.jpg',
						'000_default.jpg'
					)
			) 
		)AS AVATAR,
		EMAIL,
		NIVEL,
		FECHA_ALTA,
		DATE_FORMAT( FECHA_ALTA , '%d-%m-%Y %H:%ihs' ) AS FECHA_ESPANIOL,
		IF( ESTADO = 1 , 'Activo', 'Inactivo' ) AS ESTADO,
		CASE 
			WHEN PERIOD_DIFF( DATE_FORMAT( NOW( ), '%Y%m' ), DATE_FORMAT(FECHA_ALTA, '%Y%m' ) ) < 1 THEN 
				CONCAT(
					DATEDIFF( NOW( ), FECHA_ALTA ), 
					' dias' 
				)
			WHEN PERIOD_DIFF( DATE_FORMAT( NOW( ), '%Y%m' ), DATE_FORMAT(FECHA_ALTA, '%Y%m' ) ) > 11 THEN 
				CONCAT( 
					FLOOR( PERIOD_DIFF( DATE_FORMAT( NOW( ), '%Y%m' ), DATE_FORMAT(FECHA_ALTA, '%Y%m' ) ) / 12 ),
					' años'
					)
			ELSE 
				CONCAT( 
					PERIOD_DIFF( DATE_FORMAT( NOW( ), '%Y%m' ), DATE_FORMAT(FECHA_ALTA, '%Y%m' ) ),
					' meses'
				)
		
		END AS TIEMPO,
		IFNULL( p.PAIS , 'sin nacionalidad' ) AS NACIONALIDAD
	FROM 
		usuarios AS u 
		LEFT JOIN generos AS g ON g.IDGENERO = u.FKGENERO
		LEFT JOIN paises AS p ON p.ID = u.FKPAIS	
);

/* VISTA DE POSTEOS */

CREATE VIEW listado_posteos AS ( 
	SELECT 
		p.ID,
		p.TITULO,
		SUBSTRING_INDEX( p.TEXTO, ' ', 20 ) AS PREVIEW,
		p.TEXTO,
		p.FECHA_ALTA,
		DATE_FORMAT( p.FECHA_ALTA, '%d/%m/%Y a las %H:%ihs' ) AS FECHA_SPA, 
		IF( p.ESTADO = 1, 'Activo', 'Inactivo' ) as ESTADO,
		p.CONTADOR, 
		p.FOTO,
		CONCAT( 
			u.NOMBRE,
			' ',
			u.APELLIDO 
		) AS AUTOR,
		IFNULL( 
			GROUP_CONCAT(
				DISTINCT c.CATEGORIA 
				ORDER BY CATEGORIA 
				SEPARATOR ', ' 
			) , 
			'sin categorizar' 
		) AS CATEGORIAS,
		( 
			SELECT 
				COUNT( FKPOSTEO ) 
			FROM comentarios 
			WHERE FKPOSTEO = p.ID
		) as CANTIDAD
	FROM 
		posteos AS p 
		JOIN usuarios AS u ON p.FKAUTOR = u.ID
		LEFT JOIN relacion AS r ON r.FKPOSTEO = p.ID 
		LEFT JOIN categorias AS c ON c.ID = r.FKCATEGORIA
	GROUP BY p.ID
);