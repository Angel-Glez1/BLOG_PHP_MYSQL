SELECT 
	p.ID,
	p.TITULO,
	SUBSTRING_INDEX( p.TEXTO, ' ', 20 ) AS PREVIEW,
	p.TEXTO,
	p.FECHA_ALTA,
	DATE_FORMAT( p.FECHA_ALTA, '%d/%m/%Y a las %H:%ihs' ) AS FECHA_SPA, 
	p.ESTADO,
	p.CONTADOR, 
	p.FOTO,
	CONCAT( 
		u.NOMBRE,
		' ',
		u.APELLIDO 
	) AS AUTOR,
	IFNULL( 
		GROUP_CONCAT( -- esta función une en una sola columna, varias filas distintas...
			DISTINCT c.CATEGORIA -- para que no se repita el nombre de categoría (no es nuestro caso)
			ORDER BY CATEGORIA  -- ordenadas alfabéticamente de la A-Z
			SEPARATOR ', '  -- con esta cadena de texto entre categoría y categoría.
		) , 
		'sin categorizar' 
	) AS CATEGORIAS
FROM 
	posteos AS p 
	JOIN usuarios AS u ON p.FKAUTOR = u.ID
	LEFT JOIN relacion AS r ON r.FKPOSTEO = p.ID 
	LEFT JOIN categorias AS c ON c.ID = r.FKCATEGORIA
GROUP BY p.ID -- Este group by afecta diretamente al GROUP_CONCAT, va a concatenar las categorías separandolas por cada posteo distinto de la tabla