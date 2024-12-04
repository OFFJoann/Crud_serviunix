# Listado de todos los datos de los empleados del departamento “Ti”
SELECT empleados.* 
FROM empleados
JOIN departamentos ON empleados.departamento_id = departamentos.id
WHERE departamentos.nombre_departamento = 'Ti';


# Listados de los 3 departamentos que más gastos producen
SELECT departamentos.nombre_departamento, SUM(gastos.gastos) AS total_gastos
FROM gastos
JOIN departamentos ON gastos.departamento_id = departamentos.id
GROUP BY departamentos.id
ORDER BY total_gastos DESC
LIMIT 3;


# Listado de datos del empleado con mayor salario
SELECT * FROM empleados
ORDER BY sueldo DESC
LIMIT 1;


# Cantidad de empleados con salarios menor a 1,500.000
SELECT COUNT(*) AS empleados_con_salarios_bajos
FROM empleados
WHERE sueldo < 1500000;


(Estas consultas por favor ejecutarlas como query en la base de datos)

