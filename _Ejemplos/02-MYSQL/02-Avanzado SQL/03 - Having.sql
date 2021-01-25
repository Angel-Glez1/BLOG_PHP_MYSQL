SELECT 
	COUNT( c.FKPOSTEO ) AS TOTAL,
	p.TITULO,
	c.FKPOSTEO AS ID
FROM 
	comentarios AS c
	RIGHT JOIN posteos AS p ON p.ID = c.FKPOSTEO

/* El where puede trabajar con cualquier columna que exista, aunque no la pidamos en el SELECT */
WHERE p.ID < 9 -- esto sucede ANTES del listado del SELECT (NO podemos usar un ALIAS de columna)

GROUP BY c.FKPOSTEO -- esto discrimina la función de agregado (un contador distinto por cada ID)

/* El having obligatoriamente trabaja con columnas que existan en el SELECT */
HAVING TOTAL > 2  -- esto suecede DESPUES del listado del SELECT (trabaja con las columnas pedidas o sus ALIAS)

; -- este punto y coma es final de instrucción nomás