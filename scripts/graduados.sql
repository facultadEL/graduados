--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.9
-- Dumped by pg_dump version 9.1.4
-- Started on 2015-06-26 15:13:30

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 177 (class 3079 OID 11646)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 1939 (class 0 OID 0)
-- Dependencies: 177
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 166 (class 1259 OID 267159)
-- Dependencies: 5
-- Name: alumno; Type: TABLE; Schema: public; Owner: extension; Tablespace: 
--

CREATE TABLE alumno (
    id_alumno integer NOT NULL,
    nombre_alumno character varying,
    apellido_alumno character varying,
    mail_alumno character varying,
    facebook_alumno character varying,
    numerodni_alumno character varying,
    tipodni_alumno integer,
    perfilacademico_alumno character varying,
    foto_alumno character varying,
    carrera_alumno integer,
    ancho_final character varying,
    alto_final character varying,
    fechanacimiento_alumno character varying,
    calle_alumno character varying,
    numerocalle_alumno character varying,
    gra_depto character varying (5),
    gra_piso character varying (5),
    mail_alumno2 character varying,
    twitter_alumno character varying,
    provincia_nac_alumno character varying,
    localidad_nac_alumno character varying,
    provincia_trabajo_alumno character varying,
    localidad_trabajo_alumno character varying,
    provincia_viviendo_alumno character varying,
    localidad_viviendo_alumno character varying,
    perfil_laboral_alumno character varying
);


ALTER TABLE public.alumno OWNER TO extension;

--
-- TOC entry 165 (class 1259 OID 267157)
-- Dependencies: 166 5
-- Name: alumno_id_alumno_seq; Type: SEQUENCE; Schema: public; Owner: extension
--

CREATE SEQUENCE alumno_id_alumno_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.alumno_id_alumno_seq OWNER TO extension;

--
-- TOC entry 1940 (class 0 OID 0)
-- Dependencies: 165
-- Name: alumno_id_alumno_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: extension
--

ALTER SEQUENCE alumno_id_alumno_seq OWNED BY alumno.id_alumno;


--
-- TOC entry 174 (class 1259 OID 267223)
-- Dependencies: 5
-- Name: alumnos_por_grupo; Type: TABLE; Schema: public; Owner: extension; Tablespace: 
--

CREATE TABLE alumnos_por_grupo (
    id_alumnos_por_grupo integer NOT NULL,
    grupo_fk integer,
    alumno_fk integer
);


ALTER TABLE public.alumnos_por_grupo OWNER TO extension;

--
-- TOC entry 173 (class 1259 OID 267221)
-- Dependencies: 174 5
-- Name: alumnos_por_grupo_id_alumnos_por_grupo_seq; Type: SEQUENCE; Schema: public; Owner: extension
--

CREATE SEQUENCE alumnos_por_grupo_id_alumnos_por_grupo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.alumnos_por_grupo_id_alumnos_por_grupo_seq OWNER TO extension;

--
-- TOC entry 1941 (class 0 OID 0)
-- Dependencies: 173
-- Name: alumnos_por_grupo_id_alumnos_por_grupo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: extension
--

ALTER SEQUENCE alumnos_por_grupo_id_alumnos_por_grupo_seq OWNED BY alumnos_por_grupo.id_alumnos_por_grupo;


--
-- TOC entry 164 (class 1259 OID 267148)
-- Dependencies: 5
-- Name: carrera; Type: TABLE; Schema: public; Owner: extension; Tablespace: 
--

CREATE TABLE carrera (
    id_carrera integer NOT NULL,
    nombre_carrera character varying,
    nivel_carrera_fk integer
);


ALTER TABLE public.carrera OWNER TO extension;

--
-- TOC entry 163 (class 1259 OID 267146)
-- Dependencies: 164 5
-- Name: carrera_id_carrera_seq; Type: SEQUENCE; Schema: public; Owner: extension
--

CREATE SEQUENCE carrera_id_carrera_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.carrera_id_carrera_seq OWNER TO extension;

--
-- TOC entry 1942 (class 0 OID 0)
-- Dependencies: 163
-- Name: carrera_id_carrera_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: extension
--

ALTER SEQUENCE carrera_id_carrera_seq OWNED BY carrera.id_carrera;


--
-- TOC entry 172 (class 1259 OID 267212)
-- Dependencies: 5
-- Name: grupo_alumnos; Type: TABLE; Schema: public; Owner: extension; Tablespace: 
--

CREATE TABLE grupo_alumnos (
    id_grupo_alumnos integer NOT NULL,
    nombre_grupo character varying,
    descripcion_grupo character varying
);


ALTER TABLE public.grupo_alumnos OWNER TO extension;

--
-- TOC entry 171 (class 1259 OID 267210)
-- Dependencies: 5 172
-- Name: grupo_alumnos_id_grupo_alumnos_seq; Type: SEQUENCE; Schema: public; Owner: extension
--

CREATE SEQUENCE grupo_alumnos_id_grupo_alumnos_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.grupo_alumnos_id_grupo_alumnos_seq OWNER TO extension;

--
-- TOC entry 1943 (class 0 OID 0)
-- Dependencies: 171
-- Name: grupo_alumnos_id_grupo_alumnos_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: extension
--

ALTER SEQUENCE grupo_alumnos_id_grupo_alumnos_seq OWNED BY grupo_alumnos.id_grupo_alumnos;


--
-- TOC entry 176 (class 1259 OID 268599)
-- Dependencies: 5
-- Name: nivel_carrera; Type: TABLE; Schema: public; Owner: extension; Tablespace: 
--

CREATE TABLE nivel_carrera (
    id_nivel_carrera integer NOT NULL,
    nombre_nivel_carrera character varying
);


ALTER TABLE public.nivel_carrera OWNER TO extension;

--
-- TOC entry 175 (class 1259 OID 268597)
-- Dependencies: 5 176
-- Name: nivel_carrera_id_nivel_carrera_seq; Type: SEQUENCE; Schema: public; Owner: extension
--

CREATE SEQUENCE nivel_carrera_id_nivel_carrera_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nivel_carrera_id_nivel_carrera_seq OWNER TO extension;

--
-- TOC entry 1944 (class 0 OID 0)
-- Dependencies: 175
-- Name: nivel_carrera_id_nivel_carrera_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: extension
--

ALTER SEQUENCE nivel_carrera_id_nivel_carrera_seq OWNED BY nivel_carrera.id_nivel_carrera;


--
-- TOC entry 170 (class 1259 OID 267196)
-- Dependencies: 5
-- Name: seguimiento_alumno; Type: TABLE; Schema: public; Owner: extension; Tablespace: 
--

CREATE TABLE seguimiento_alumno (
    id_seguimiento_alumno integer NOT NULL,
    dia_seguimiento character varying,
    hora_seguimiento character varying,
    tipo_comunicacion_seguimiento character varying,
    motivo_comunicacion_seguimiento character varying,
    alumno_fk integer
);


ALTER TABLE public.seguimiento_alumno OWNER TO extension;

--
-- TOC entry 169 (class 1259 OID 267194)
-- Dependencies: 170 5
-- Name: seguimiento_alumno_id_seguimiento_alumno_seq; Type: SEQUENCE; Schema: public; Owner: extension
--

CREATE SEQUENCE seguimiento_alumno_id_seguimiento_alumno_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.seguimiento_alumno_id_seguimiento_alumno_seq OWNER TO extension;

--
-- TOC entry 1945 (class 0 OID 0)
-- Dependencies: 169
-- Name: seguimiento_alumno_id_seguimiento_alumno_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: extension
--

ALTER SEQUENCE seguimiento_alumno_id_seguimiento_alumno_seq OWNED BY seguimiento_alumno.id_seguimiento_alumno;


--
-- TOC entry 168 (class 1259 OID 267180)
-- Dependencies: 5
-- Name: telefonos_del_alumno; Type: TABLE; Schema: public; Owner: extension; Tablespace: 
--

CREATE TABLE telefonos_del_alumno (
    id_telefonos_del_alumno integer NOT NULL,
    caracteristica_alumno character varying,
    telefono_alumno character varying,
    duenio_del_telefono character varying,
    alumno_fk integer
);


ALTER TABLE public.telefonos_del_alumno OWNER TO extension;

--
-- TOC entry 167 (class 1259 OID 267178)
-- Dependencies: 5 168
-- Name: telefonos_del_alumno_id_telefonos_del_alumno_seq; Type: SEQUENCE; Schema: public; Owner: extension
--

CREATE SEQUENCE telefonos_del_alumno_id_telefonos_del_alumno_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.telefonos_del_alumno_id_telefonos_del_alumno_seq OWNER TO extension;

--
-- TOC entry 1946 (class 0 OID 0)
-- Dependencies: 167
-- Name: telefonos_del_alumno_id_telefonos_del_alumno_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: extension
--

ALTER SEQUENCE telefonos_del_alumno_id_telefonos_del_alumno_seq OWNED BY telefonos_del_alumno.id_telefonos_del_alumno;


--
-- TOC entry 162 (class 1259 OID 267137)
-- Dependencies: 5
-- Name: tipo_dni; Type: TABLE; Schema: public; Owner: extension; Tablespace: 
--

CREATE TABLE tipo_dni (
    id_tipo_dni integer NOT NULL,
    nombre_tipo_dni character varying,
    descripcion_tipo_dni character varying
);


ALTER TABLE public.tipo_dni OWNER TO extension;

--
-- TOC entry 161 (class 1259 OID 267135)
-- Dependencies: 5 162
-- Name: tipo_dni_id_tipo_dni_seq; Type: SEQUENCE; Schema: public; Owner: extension
--

CREATE SEQUENCE tipo_dni_id_tipo_dni_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_dni_id_tipo_dni_seq OWNER TO extension;

--
-- TOC entry 1947 (class 0 OID 0)
-- Dependencies: 161
-- Name: tipo_dni_id_tipo_dni_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: extension
--

ALTER SEQUENCE tipo_dni_id_tipo_dni_seq OWNED BY tipo_dni.id_tipo_dni;


--
-- TOC entry 1905 (class 2604 OID 267162)
-- Dependencies: 165 166 166
-- Name: id_alumno; Type: DEFAULT; Schema: public; Owner: extension
--

ALTER TABLE ONLY alumno ALTER COLUMN id_alumno SET DEFAULT nextval('alumno_id_alumno_seq'::regclass);


--
-- TOC entry 1909 (class 2604 OID 267226)
-- Dependencies: 173 174 174
-- Name: id_alumnos_por_grupo; Type: DEFAULT; Schema: public; Owner: extension
--

ALTER TABLE ONLY alumnos_por_grupo ALTER COLUMN id_alumnos_por_grupo SET DEFAULT nextval('alumnos_por_grupo_id_alumnos_por_grupo_seq'::regclass);


--
-- TOC entry 1904 (class 2604 OID 267151)
-- Dependencies: 164 163 164
-- Name: id_carrera; Type: DEFAULT; Schema: public; Owner: extension
--

ALTER TABLE ONLY carrera ALTER COLUMN id_carrera SET DEFAULT nextval('carrera_id_carrera_seq'::regclass);


--
-- TOC entry 1908 (class 2604 OID 267215)
-- Dependencies: 171 172 172
-- Name: id_grupo_alumnos; Type: DEFAULT; Schema: public; Owner: extension
--

ALTER TABLE ONLY grupo_alumnos ALTER COLUMN id_grupo_alumnos SET DEFAULT nextval('grupo_alumnos_id_grupo_alumnos_seq'::regclass);


--
-- TOC entry 1910 (class 2604 OID 268602)
-- Dependencies: 175 176 176
-- Name: id_nivel_carrera; Type: DEFAULT; Schema: public; Owner: extension
--

ALTER TABLE ONLY nivel_carrera ALTER COLUMN id_nivel_carrera SET DEFAULT nextval('nivel_carrera_id_nivel_carrera_seq'::regclass);


--
-- TOC entry 1907 (class 2604 OID 267199)
-- Dependencies: 170 169 170
-- Name: id_seguimiento_alumno; Type: DEFAULT; Schema: public; Owner: extension
--

ALTER TABLE ONLY seguimiento_alumno ALTER COLUMN id_seguimiento_alumno SET DEFAULT nextval('seguimiento_alumno_id_seguimiento_alumno_seq'::regclass);


--
-- TOC entry 1906 (class 2604 OID 267183)
-- Dependencies: 168 167 168
-- Name: id_telefonos_del_alumno; Type: DEFAULT; Schema: public; Owner: extension
--

ALTER TABLE ONLY telefonos_del_alumno ALTER COLUMN id_telefonos_del_alumno SET DEFAULT nextval('telefonos_del_alumno_id_telefonos_del_alumno_seq'::regclass);


--
-- TOC entry 1903 (class 2604 OID 267140)
-- Dependencies: 162 161 162
-- Name: id_tipo_dni; Type: DEFAULT; Schema: public; Owner: extension
--

ALTER TABLE ONLY tipo_dni ALTER COLUMN id_tipo_dni SET DEFAULT nextval('tipo_dni_id_tipo_dni_seq'::regclass);


--
-- TOC entry 1916 (class 2606 OID 267167)
-- Dependencies: 166 166
-- Name: alumno_pkey; Type: CONSTRAINT; Schema: public; Owner: extension; Tablespace: 
--

ALTER TABLE ONLY alumno
    ADD CONSTRAINT alumno_pkey PRIMARY KEY (id_alumno);


--
-- TOC entry 1924 (class 2606 OID 267228)
-- Dependencies: 174 174
-- Name: alumnos_por_grupo_pkey; Type: CONSTRAINT; Schema: public; Owner: extension; Tablespace: 
--

ALTER TABLE ONLY alumnos_por_grupo
    ADD CONSTRAINT alumnos_por_grupo_pkey PRIMARY KEY (id_alumnos_por_grupo);


--
-- TOC entry 1914 (class 2606 OID 267156)
-- Dependencies: 164 164
-- Name: carrera_pkey; Type: CONSTRAINT; Schema: public; Owner: extension; Tablespace: 
--

ALTER TABLE ONLY carrera
    ADD CONSTRAINT carrera_pkey PRIMARY KEY (id_carrera);


--
-- TOC entry 1922 (class 2606 OID 267220)
-- Dependencies: 172 172
-- Name: grupo_alumnos_pkey; Type: CONSTRAINT; Schema: public; Owner: extension; Tablespace: 
--

ALTER TABLE ONLY grupo_alumnos
    ADD CONSTRAINT grupo_alumnos_pkey PRIMARY KEY (id_grupo_alumnos);


--
-- TOC entry 1926 (class 2606 OID 268607)
-- Dependencies: 176 176
-- Name: nivel_carrera_pkey; Type: CONSTRAINT; Schema: public; Owner: extension; Tablespace: 
--

ALTER TABLE ONLY nivel_carrera
    ADD CONSTRAINT nivel_carrera_pkey PRIMARY KEY (id_nivel_carrera);


--
-- TOC entry 1920 (class 2606 OID 267204)
-- Dependencies: 170 170
-- Name: seguimiento_alumno_pkey; Type: CONSTRAINT; Schema: public; Owner: extension; Tablespace: 
--

ALTER TABLE ONLY seguimiento_alumno
    ADD CONSTRAINT seguimiento_alumno_pkey PRIMARY KEY (id_seguimiento_alumno);


--
-- TOC entry 1918 (class 2606 OID 267188)
-- Dependencies: 168 168
-- Name: telefonos_del_alumno_pkey; Type: CONSTRAINT; Schema: public; Owner: extension; Tablespace: 
--

ALTER TABLE ONLY telefonos_del_alumno
    ADD CONSTRAINT telefonos_del_alumno_pkey PRIMARY KEY (id_telefonos_del_alumno);


--
-- TOC entry 1912 (class 2606 OID 267145)
-- Dependencies: 162 162
-- Name: tipo_dni_pkey; Type: CONSTRAINT; Schema: public; Owner: extension; Tablespace: 
--

ALTER TABLE ONLY tipo_dni
    ADD CONSTRAINT tipo_dni_pkey PRIMARY KEY (id_tipo_dni);


--
-- TOC entry 1929 (class 2606 OID 267173)
-- Dependencies: 166 1913 164
-- Name: alumno_carrera_alumno_fkey; Type: FK CONSTRAINT; Schema: public; Owner: extension
--

ALTER TABLE ONLY alumno
    ADD CONSTRAINT alumno_carrera_alumno_fkey FOREIGN KEY (carrera_alumno) REFERENCES carrera(id_carrera);


--
-- TOC entry 1928 (class 2606 OID 267168)
-- Dependencies: 166 162 1911
-- Name: alumno_tipodni_alumno_fkey; Type: FK CONSTRAINT; Schema: public; Owner: extension
--

ALTER TABLE ONLY alumno
    ADD CONSTRAINT alumno_tipodni_alumno_fkey FOREIGN KEY (tipodni_alumno) REFERENCES tipo_dni(id_tipo_dni);


--
-- TOC entry 1932 (class 2606 OID 268750)
-- Dependencies: 174 1915 166
-- Name: alumnos_por_grupo_alumno_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: extension
--

ALTER TABLE ONLY alumnos_por_grupo
    ADD CONSTRAINT alumnos_por_grupo_alumno_fk_fkey FOREIGN KEY (alumno_fk) REFERENCES alumno(id_alumno);


--
-- TOC entry 1933 (class 2606 OID 268755)
-- Dependencies: 172 1921 174
-- Name: alumnos_por_grupo_grupo_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: extension
--

ALTER TABLE ONLY alumnos_por_grupo
    ADD CONSTRAINT alumnos_por_grupo_grupo_fk_fkey FOREIGN KEY (grupo_fk) REFERENCES grupo_alumnos(id_grupo_alumnos);


--
-- TOC entry 1927 (class 2606 OID 268608)
-- Dependencies: 164 176 1925
-- Name: carrera_nivel_carrera_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: extension
--

ALTER TABLE ONLY carrera
    ADD CONSTRAINT carrera_nivel_carrera_fk_fkey FOREIGN KEY (nivel_carrera_fk) REFERENCES nivel_carrera(id_nivel_carrera);


--
-- TOC entry 1931 (class 2606 OID 267205)
-- Dependencies: 166 1915 170
-- Name: seguimiento_alumno_alumno_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: extension
--

ALTER TABLE ONLY seguimiento_alumno
    ADD CONSTRAINT seguimiento_alumno_alumno_fk_fkey FOREIGN KEY (alumno_fk) REFERENCES alumno(id_alumno);


--
-- TOC entry 1930 (class 2606 OID 267189)
-- Dependencies: 166 1915 168
-- Name: telefonos_del_alumno_alumno_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: extension
--

ALTER TABLE ONLY telefonos_del_alumno
    ADD CONSTRAINT telefonos_del_alumno_alumno_fk_fkey FOREIGN KEY (alumno_fk) REFERENCES alumno(id_alumno);


--
-- TOC entry 1938 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-06-26 15:13:32

--
-- PostgreSQL database dump complete
--

