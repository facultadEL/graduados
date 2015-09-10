--filtro carrera sin nivel
SELECT id_alumno FROM alumno INNER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) INNER JOIN alumnos_por_grupo ON(alumnos_por_grupo.alumno_fk = alumno.id_alumno) WHERE grupo_fk = 23 AND carrera_alumno = 1 ORDER BY id_alumno;
SELECT id_alumno,nombre_alumno,apellido_alumno,nombre_carrera FROM alumno INNER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) WHERE carrera_alumno = 1 ORDER BY id_alumno;

--filtro nivel carrera
SELECT id_alumno FROM alumno INNER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) INNER JOIN alumnos_por_grupo ON(alumnos_por_grupo.alumno_fk = alumno.id_alumno) WHERE grupo_fk = 23 AND nivel_carrera_fk = 1 ORDER BY id_alumno;
SELECT id_alumno,nombre_alumno,apellido_alumno,nombre_carrera FROM alumno INNER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) WHERE nivel_carrera_fk = 1 ORDER BY id_alumno;

--filtro grupo
SELECT id_alumno FROM alumno INNER JOIN alumnos_por_grupo ON(alumnos_por_grupo.alumno_fk = alumno.id_alumno) WHERE grupo_fk = 23 ORDER BY id_alumno;
SELECT id_alumno,nombre_alumno,apellido_alumno,nombre_carrera FROM alumno INNER JOIN carrera ON(carrera.id_carrera = alumno.carrera_alumno) ORDER BY id_alumno;

