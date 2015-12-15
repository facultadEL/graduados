SET client_encoding = 'UTF8';


CREATE TABLE tipo_dni (
    id_tipo_dni serial NOT NULL primary key,
    nombre_tipo_dni character varying (5)
);
INSERT INTO tipo_dni(nombre_tipo_dni)VALUES('DNI');
INSERT INTO tipo_dni(nombre_tipo_dni)VALUES('LC');
INSERT INTO tipo_dni(nombre_tipo_dni)VALUES('LE');

CREATE TABLE nivel_carrera (
    id_nivel_carrera serial NOT NULL primary key,
    nombre_nivel_carrera character varying
);
INSERT INTO nivel_carrera(id_nivel_carrera,nombre_nivel_carrera)VALUES(1,'Grado');
INSERT INTO nivel_carrera(id_nivel_carrera,nombre_nivel_carrera)VALUES(2,'Posgrado');
INSERT INTO nivel_carrera(id_nivel_carrera,nombre_nivel_carrera)VALUES(3,'Pregrado');

CREATE TABLE carrera(
    id_carrera serial NOT NULL primary key,
    nombre_carrera character varying,
    nivel_carrera_fk integer references nivel_carrera(id_nivel_carrera)
);
INSERT INTO carrera(id_carrera,nombre_carrera,nivel_carrera_fk) VALUES('1','Ing. en Sistemas de Información','1');
INSERT INTO carrera(id_carrera,nombre_carrera,nivel_carrera_fk) VALUES('2','Ing. Electrónica','1');
INSERT INTO carrera(id_carrera,nombre_carrera,nivel_carrera_fk) VALUES('3','Ing. Química','1');
INSERT INTO carrera(id_carrera,nombre_carrera,nivel_carrera_fk) VALUES('4','Ing. Mecánica','1');
INSERT INTO carrera(id_carrera,nombre_carrera,nivel_carrera_fk) VALUES('5','Lic. en Administración Rural','1');
INSERT INTO carrera(id_carrera,nombre_carrera,nivel_carrera_fk) VALUES('6','Mecatrónica','3');
INSERT INTO carrera(id_carrera,nombre_carrera,nivel_carrera_fk) VALUES('7','Analista en Sistemas de Información','3');
INSERT INTO carrera(id_carrera,nombre_carrera,nivel_carrera_fk) VALUES('8','Técnico en Administración Rural','3');
INSERT INTO carrera(id_carrera,nombre_carrera,nivel_carrera_fk) VALUES('9','Técnico Electrónico','3');
INSERT INTO carrera(id_carrera,nombre_carrera,nivel_carrera_fk) VALUES('10','Técnico Química','3');
INSERT INTO carrera(id_carrera,nombre_carrera,nivel_carrera_fk) VALUES('11','Licenciatura en Lengua Inglesa','1');
INSERT INTO carrera(id_carrera,nombre_carrera,nivel_carrera_fk) VALUES('12','Tecnico Sup. en Negociacion de Bienes','3');
INSERT INTO carrera(id_carrera,nombre_carrera,nivel_carrera_fk) VALUES('13','Especialista en Higiene y Segurid_carreraad','2');
INSERT INTO carrera(id_carrera,nombre_carrera,nivel_carrera_fk) VALUES('14','Lic. en Educación Física','1');
INSERT INTO carrera(id_carrera,nombre_carrera,nivel_carrera_fk) VALUES('15','Maestría en Ingeniería Gerencial','2');
INSERT INTO carrera(id_carrera,nombre_carrera,nivel_carrera_fk) VALUES('16','Licenciatura en Tecnologia Educativa','2');
INSERT INTO carrera(id_carrera,nombre_carrera,nivel_carrera_fk) VALUES('17','Especialista en Tecnologia de los Alimentos','2');

CREATE TABLE alumno (
    id_alumno serial NOT NULL primary key,
    nombre_alumno character varying (30),
    apellido_alumno character varying (30),
    facebook_alumno character varying (40),
    numerodni_alumno character varying (10),
    tipodni_alumno integer references tipo_dni(id_tipo_dni),
    foto_alumno character varying (100),
    carrera_alumno integer references carrera(id_carrera),
    ancho_final character varying,
    alto_final character varying,
    fechanacimiento_alumno character varying (10),
    calle_alumno character varying (50),
    numerocalle_alumno character varying (10),
    gra_depto character varying (5),
    gra_piso character varying (5),
    mail_alumno character varying (60),
    mail_alumno2 character varying (60),
    twitter_alumno character varying (40),
    localidad_nac_alumno integer references localidad(id),
    localidad_trabajo_alumno integer references localidad(id),
    localidad_viviendo_alumno integer references localidad(id),
    perfilacademico_alumno text,
    perfil_laboral_alumno text,
    gra_docente boolean default false,
    gra_especialidad character varying (40)
);

CREATE TABLE grupo_alumnos (
    id_grupo_alumnos serial NOT NULL primary key,
    nombre_grupo character varying (100),
    descripcion_grupo character varying (300)
);

CREATE TABLE alumnos_por_grupo (
    id_alumnos_por_grupo serial NOT NULL primary key,
    grupo_fk integer references grupo_alumnos(id_grupo_alumnos),
    alumno_fk integer references alumno(id_alumno)
);

CREATE TABLE seguimiento_alumno (
    id_seguimiento_alumno serial NOT NULL primary key,
    dia_seguimiento character varying,
    hora_seguimiento character varying,
    tipo_comunicacion_seguimiento character varying,
    motivo_comunicacion_seguimiento character varying,
    alumno_fk integer references alumno(id_alumno)
);



CREATE TABLE telefonos_del_alumno (
    id_telefonos_del_alumno serial NOT NULL primary key,
    caracteristica_alumno character varying (10),
    telefono_alumno character varying (20),
    duenio_del_telefono character varying (40),
    alumno_fk integer references alumno(id_alumno)
);