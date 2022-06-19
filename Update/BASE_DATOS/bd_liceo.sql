--
-- PostgreSQL database dump
--

-- Dumped from database version 14.2
-- Dumped by pg_dump version 14.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: apoderados; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.apoderados (
    id_apoderado integer NOT NULL,
    rut_apoderado character varying(10) NOT NULL,
    dv_rut_apoderado character varying(1) NOT NULL,
    apellido_paterno_apoderado character varying(25) NOT NULL,
    apellido_materno_apoderado character varying(25) NOT NULL,
    nombres_apoderado character varying(50) NOT NULL,
    estado_apoderado boolean DEFAULT true
);


--
-- Name: apoderados_id_apoderado_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.apoderados_id_apoderado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: apoderados_id_apoderado_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.apoderados_id_apoderado_seq OWNED BY public.apoderados.id_apoderado;


--
-- Name: asignaturas; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.asignaturas (
    id_asignatura integer NOT NULL,
    asignatura character varying(25) NOT NULL
);


--
-- Name: asignaturas_id_asignatura_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.asignaturas_id_asignatura_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: asignaturas_id_asignatura_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.asignaturas_id_asignatura_seq OWNED BY public.asignaturas.id_asignatura;


--
-- Name: atrasos; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.atrasos (
    id_atraso integer NOT NULL,
    fecha_hora_actual timestamp without time zone NOT NULL,
    fecha_atraso date NOT NULL,
    hora_atraso time without time zone NOT NULL,
    id_estudiante integer NOT NULL,
    estado_atraso character varying(25) NOT NULL,
    id_usuario_justifica integer NOT NULL
);


--
-- Name: atrasos_id_atraso_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.atrasos_id_atraso_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: atrasos_id_atraso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.atrasos_id_atraso_seq OWNED BY public.atrasos.id_atraso;


--
-- Name: cursos; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.cursos (
    id_curso integer NOT NULL,
    curso character varying(2) NOT NULL
);


--
-- Name: cursos_id_curso_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.cursos_id_curso_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: cursos_id_curso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.cursos_id_curso_seq OWNED BY public.cursos.id_curso;


--
-- Name: detalle_tipo_funcionario; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.detalle_tipo_funcionario (
    id_detalle_tipo_funcionario integer NOT NULL,
    detalle_tipo_funcionario character varying NOT NULL,
    id_tipo_funcionario integer NOT NULL
);


--
-- Name: detalle_tipo_funcionario_id_detalle_tipo_funcionario_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.detalle_tipo_funcionario_id_detalle_tipo_funcionario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: detalle_tipo_funcionario_id_detalle_tipo_funcionario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.detalle_tipo_funcionario_id_detalle_tipo_funcionario_seq OWNED BY public.detalle_tipo_funcionario.id_detalle_tipo_funcionario;


--
-- Name: estados; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.estados (
    id_estado integer NOT NULL,
    nombre_estado character varying NOT NULL
);


--
-- Name: estados_id_estado_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.estados_id_estado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: estados_id_estado_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.estados_id_estado_seq OWNED BY public.estados.id_estado;


--
-- Name: estudiantes; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.estudiantes (
    id_estudiante integer NOT NULL,
    rut_estudiante character varying(10) NOT NULL,
    dv_rut_estudiante character varying(1) NOT NULL,
    apellido_paterno_estudiante character varying(25) NOT NULL,
    apellido_materno_estudiante character varying(25) NOT NULL,
    nombres_estudiante character varying(50) NOT NULL,
    nombre_social_estudiante character varying(25),
    fecha_nacimiento_estudiante date,
    id_estado integer DEFAULT 1
);


--
-- Name: estudiantes_id_estudiante_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.estudiantes_id_estudiante_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: estudiantes_id_estudiante_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.estudiantes_id_estudiante_seq OWNED BY public.estudiantes.id_estudiante;


--
-- Name: funcionarios; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.funcionarios (
    id_funcionario integer NOT NULL,
    rut_funcionario character varying(10) NOT NULL,
    dv_rut_funcionario character varying(1) NOT NULL,
    apellido_paterno_funcionario character varying(25) NOT NULL,
    apellido_materno_funcionario character varying(25) NOT NULL,
    nombres_funcionarios character varying(50) NOT NULL,
    sexo_funcionario character varying(1),
    fecha_nacimiento_funcionario date,
    id_tipo_funcionario integer NOT NULL,
    id_detalle_tipo_funcionario integer NOT NULL,
    id_estado integer DEFAULT 1
);


--
-- Name: funcionarios_id_funcionario_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.funcionarios_id_funcionario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: funcionarios_id_funcionario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.funcionarios_id_funcionario_seq OWNED BY public.funcionarios.id_funcionario;


--
-- Name: inasistencias; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.inasistencias (
    id_inasistencia integer NOT NULL,
    id_estudiante integer NOT NULL,
    id_tipo_inasistencia integer NOT NULL,
    estado_justificacion boolean DEFAULT false,
    id_apoderado_justifica integer NOT NULL,
    fecha_inicio_inasistencia date NOT NULL,
    fecha_termino_inasistencia date NOT NULL,
    motivo_inasistencia character varying(50) NOT NULL,
    documento_presentado boolean DEFAULT false,
    prueba_pendiente boolean DEFAULT false,
    id_asignatura integer
);


--
-- Name: inasistencias_id_inasistencia_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.inasistencias_id_inasistencia_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: inasistencias_id_inasistencia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.inasistencias_id_inasistencia_seq OWNED BY public.inasistencias.id_inasistencia;


--
-- Name: matriculas; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.matriculas (
    id_matricula integer NOT NULL,
    matricula integer NOT NULL,
    id_estudiante integer NOT NULL,
    id_apoderado_titula integer NOT NULL,
    id_apoderado_suplente integer,
    id_curso integer NOT NULL,
    anio_lectivo integer NOT NULL
);


--
-- Name: matriculas_id_matricula_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.matriculas_id_matricula_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: matriculas_id_matricula_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.matriculas_id_matricula_seq OWNED BY public.matriculas.id_matricula;


--
-- Name: privilegios; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.privilegios (
    id_privilegio integer NOT NULL,
    descripcion character varying(25) NOT NULL
);


--
-- Name: privilegios_id_privilegio_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.privilegios_id_privilegio_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: privilegios_id_privilegio_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.privilegios_id_privilegio_seq OWNED BY public.privilegios.id_privilegio;


--
-- Name: tipo_funcionario; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.tipo_funcionario (
    id_tipo_funcionario integer NOT NULL,
    tipo_funcionario character varying NOT NULL
);


--
-- Name: tipo_funcionario_id_tipo_funcionario_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.tipo_funcionario_id_tipo_funcionario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: tipo_funcionario_id_tipo_funcionario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.tipo_funcionario_id_tipo_funcionario_seq OWNED BY public.tipo_funcionario.id_tipo_funcionario;


--
-- Name: tipo_inasistencia; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.tipo_inasistencia (
    id_tipo_inasistencia integer NOT NULL,
    tipo_inasistencia character varying(25) NOT NULL
);


--
-- Name: tipo_inasistencia_id_tipo_inasistencia_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.tipo_inasistencia_id_tipo_inasistencia_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: tipo_inasistencia_id_tipo_inasistencia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.tipo_inasistencia_id_tipo_inasistencia_seq OWNED BY public.tipo_inasistencia.id_tipo_inasistencia;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.usuarios (
    id_usuario integer NOT NULL,
    nombre_usuario character varying(25) NOT NULL,
    clave_usuario character varying(25) NOT NULL,
    id_funcionario integer NOT NULL,
    id_privilegio integer NOT NULL,
    fecha_creacion date NOT NULL
);


--
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.usuarios_id_usuario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.usuarios_id_usuario_seq OWNED BY public.usuarios.id_usuario;


--
-- Name: apoderados id_apoderado; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.apoderados ALTER COLUMN id_apoderado SET DEFAULT nextval('public.apoderados_id_apoderado_seq'::regclass);


--
-- Name: asignaturas id_asignatura; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.asignaturas ALTER COLUMN id_asignatura SET DEFAULT nextval('public.asignaturas_id_asignatura_seq'::regclass);


--
-- Name: atrasos id_atraso; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.atrasos ALTER COLUMN id_atraso SET DEFAULT nextval('public.atrasos_id_atraso_seq'::regclass);


--
-- Name: cursos id_curso; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cursos ALTER COLUMN id_curso SET DEFAULT nextval('public.cursos_id_curso_seq'::regclass);


--
-- Name: detalle_tipo_funcionario id_detalle_tipo_funcionario; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.detalle_tipo_funcionario ALTER COLUMN id_detalle_tipo_funcionario SET DEFAULT nextval('public.detalle_tipo_funcionario_id_detalle_tipo_funcionario_seq'::regclass);


--
-- Name: estados id_estado; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.estados ALTER COLUMN id_estado SET DEFAULT nextval('public.estados_id_estado_seq'::regclass);


--
-- Name: estudiantes id_estudiante; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.estudiantes ALTER COLUMN id_estudiante SET DEFAULT nextval('public.estudiantes_id_estudiante_seq'::regclass);


--
-- Name: funcionarios id_funcionario; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.funcionarios ALTER COLUMN id_funcionario SET DEFAULT nextval('public.funcionarios_id_funcionario_seq'::regclass);


--
-- Name: inasistencias id_inasistencia; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.inasistencias ALTER COLUMN id_inasistencia SET DEFAULT nextval('public.inasistencias_id_inasistencia_seq'::regclass);


--
-- Name: matriculas id_matricula; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.matriculas ALTER COLUMN id_matricula SET DEFAULT nextval('public.matriculas_id_matricula_seq'::regclass);


--
-- Name: privilegios id_privilegio; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.privilegios ALTER COLUMN id_privilegio SET DEFAULT nextval('public.privilegios_id_privilegio_seq'::regclass);


--
-- Name: tipo_funcionario id_tipo_funcionario; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tipo_funcionario ALTER COLUMN id_tipo_funcionario SET DEFAULT nextval('public.tipo_funcionario_id_tipo_funcionario_seq'::regclass);


--
-- Name: tipo_inasistencia id_tipo_inasistencia; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tipo_inasistencia ALTER COLUMN id_tipo_inasistencia SET DEFAULT nextval('public.tipo_inasistencia_id_tipo_inasistencia_seq'::regclass);


--
-- Name: usuarios id_usuario; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id_usuario SET DEFAULT nextval('public.usuarios_id_usuario_seq'::regclass);


--
-- Data for Name: apoderados; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.apoderados (id_apoderado, rut_apoderado, dv_rut_apoderado, apellido_paterno_apoderado, apellido_materno_apoderado, nombres_apoderado, estado_apoderado) FROM stdin;
\.


--
-- Data for Name: asignaturas; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.asignaturas (id_asignatura, asignatura) FROM stdin;
\.


--
-- Data for Name: atrasos; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.atrasos (id_atraso, fecha_hora_actual, fecha_atraso, hora_atraso, id_estudiante, estado_atraso, id_usuario_justifica) FROM stdin;
\.


--
-- Data for Name: cursos; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.cursos (id_curso, curso) FROM stdin;
\.


--
-- Data for Name: detalle_tipo_funcionario; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.detalle_tipo_funcionario (id_detalle_tipo_funcionario, detalle_tipo_funcionario, id_tipo_funcionario) FROM stdin;
\.


--
-- Data for Name: estados; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.estados (id_estado, nombre_estado) FROM stdin;
\.


--
-- Data for Name: estudiantes; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.estudiantes (id_estudiante, rut_estudiante, dv_rut_estudiante, apellido_paterno_estudiante, apellido_materno_estudiante, nombres_estudiante, nombre_social_estudiante, fecha_nacimiento_estudiante, id_estado) FROM stdin;
\.


--
-- Data for Name: funcionarios; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.funcionarios (id_funcionario, rut_funcionario, dv_rut_funcionario, apellido_paterno_funcionario, apellido_materno_funcionario, nombres_funcionarios, sexo_funcionario, fecha_nacimiento_funcionario, id_tipo_funcionario, id_detalle_tipo_funcionario, id_estado) FROM stdin;
\.


--
-- Data for Name: inasistencias; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.inasistencias (id_inasistencia, id_estudiante, id_tipo_inasistencia, estado_justificacion, id_apoderado_justifica, fecha_inicio_inasistencia, fecha_termino_inasistencia, motivo_inasistencia, documento_presentado, prueba_pendiente, id_asignatura) FROM stdin;
\.


--
-- Data for Name: matriculas; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.matriculas (id_matricula, matricula, id_estudiante, id_apoderado_titula, id_apoderado_suplente, id_curso, anio_lectivo) FROM stdin;
\.


--
-- Data for Name: privilegios; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.privilegios (id_privilegio, descripcion) FROM stdin;
\.


--
-- Data for Name: tipo_funcionario; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.tipo_funcionario (id_tipo_funcionario, tipo_funcionario) FROM stdin;
\.


--
-- Data for Name: tipo_inasistencia; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.tipo_inasistencia (id_tipo_inasistencia, tipo_inasistencia) FROM stdin;
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.usuarios (id_usuario, nombre_usuario, clave_usuario, id_funcionario, id_privilegio, fecha_creacion) FROM stdin;
\.


--
-- Name: apoderados_id_apoderado_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.apoderados_id_apoderado_seq', 1, false);


--
-- Name: asignaturas_id_asignatura_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.asignaturas_id_asignatura_seq', 1, false);


--
-- Name: atrasos_id_atraso_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.atrasos_id_atraso_seq', 1, false);


--
-- Name: cursos_id_curso_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.cursos_id_curso_seq', 1, false);


--
-- Name: detalle_tipo_funcionario_id_detalle_tipo_funcionario_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.detalle_tipo_funcionario_id_detalle_tipo_funcionario_seq', 1, false);


--
-- Name: estados_id_estado_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.estados_id_estado_seq', 1, false);


--
-- Name: estudiantes_id_estudiante_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.estudiantes_id_estudiante_seq', 1, false);


--
-- Name: funcionarios_id_funcionario_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.funcionarios_id_funcionario_seq', 1, false);


--
-- Name: inasistencias_id_inasistencia_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.inasistencias_id_inasistencia_seq', 1, false);


--
-- Name: matriculas_id_matricula_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.matriculas_id_matricula_seq', 1, false);


--
-- Name: privilegios_id_privilegio_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.privilegios_id_privilegio_seq', 1, false);


--
-- Name: tipo_funcionario_id_tipo_funcionario_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.tipo_funcionario_id_tipo_funcionario_seq', 1, false);


--
-- Name: tipo_inasistencia_id_tipo_inasistencia_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.tipo_inasistencia_id_tipo_inasistencia_seq', 1, false);


--
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.usuarios_id_usuario_seq', 1, false);


--
-- Name: apoderados pk_id_apoderado; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.apoderados
    ADD CONSTRAINT pk_id_apoderado PRIMARY KEY (id_apoderado);


--
-- Name: asignaturas pk_id_asignatura; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.asignaturas
    ADD CONSTRAINT pk_id_asignatura PRIMARY KEY (id_asignatura);


--
-- Name: atrasos pk_id_atraso; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.atrasos
    ADD CONSTRAINT pk_id_atraso PRIMARY KEY (id_atraso);


--
-- Name: cursos pk_id_curso; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.cursos
    ADD CONSTRAINT pk_id_curso PRIMARY KEY (id_curso);


--
-- Name: detalle_tipo_funcionario pk_id_detalle_tipo_funcionario; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.detalle_tipo_funcionario
    ADD CONSTRAINT pk_id_detalle_tipo_funcionario PRIMARY KEY (id_detalle_tipo_funcionario);


--
-- Name: estados pk_id_estado; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.estados
    ADD CONSTRAINT pk_id_estado PRIMARY KEY (id_estado);


--
-- Name: estudiantes pk_id_estudiante; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.estudiantes
    ADD CONSTRAINT pk_id_estudiante PRIMARY KEY (id_estudiante);


--
-- Name: funcionarios pk_id_funcionario; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.funcionarios
    ADD CONSTRAINT pk_id_funcionario PRIMARY KEY (id_funcionario);


--
-- Name: inasistencias pk_id_inasistencia; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.inasistencias
    ADD CONSTRAINT pk_id_inasistencia PRIMARY KEY (id_inasistencia);


--
-- Name: matriculas pk_id_matricula; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.matriculas
    ADD CONSTRAINT pk_id_matricula PRIMARY KEY (id_matricula);


--
-- Name: privilegios pk_id_privilegio; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.privilegios
    ADD CONSTRAINT pk_id_privilegio PRIMARY KEY (id_privilegio);


--
-- Name: tipo_funcionario pk_id_tipo_funcionario; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tipo_funcionario
    ADD CONSTRAINT pk_id_tipo_funcionario PRIMARY KEY (id_tipo_funcionario);


--
-- Name: tipo_inasistencia pk_id_tipo_inasistencia; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tipo_inasistencia
    ADD CONSTRAINT pk_id_tipo_inasistencia PRIMARY KEY (id_tipo_inasistencia);


--
-- Name: usuarios pk_id_usuario; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT pk_id_usuario PRIMARY KEY (id_usuario);


--
-- Name: fki_fk_id_apoderado_justifica; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_apoderado_justifica ON public.inasistencias USING btree (id_apoderado_justifica);


--
-- Name: fki_fk_id_apoderado_suplente; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_apoderado_suplente ON public.matriculas USING btree (id_apoderado_suplente);


--
-- Name: fki_fk_id_apoderado_titula; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_apoderado_titula ON public.matriculas USING btree (id_apoderado_titula);


--
-- Name: fki_fk_id_asignatura; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_asignatura ON public.inasistencias USING btree (id_asignatura);


--
-- Name: fki_fk_id_curso; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_curso ON public.matriculas USING btree (id_curso);


--
-- Name: fki_fk_id_detalle_tipo_funcionario; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_detalle_tipo_funcionario ON public.funcionarios USING btree (id_detalle_tipo_funcionario);


--
-- Name: fki_fk_id_estado_estudiante; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_estado_estudiante ON public.estudiantes USING btree (id_estado);


--
-- Name: fki_fk_id_estado_funcionario; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_estado_funcionario ON public.funcionarios USING btree (id_estado);


--
-- Name: fki_fk_id_estudiante; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_estudiante ON public.atrasos USING btree (id_estudiante);


--
-- Name: fki_fk_id_funcionario; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_funcionario ON public.usuarios USING btree (id_funcionario);


--
-- Name: fki_fk_id_privilegio; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_privilegio ON public.usuarios USING btree (id_privilegio);


--
-- Name: fki_fk_id_tipo_funcionario; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_tipo_funcionario ON public.detalle_tipo_funcionario USING btree (id_tipo_funcionario);


--
-- Name: fki_fk_id_tipo_funcionario_tf; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_tipo_funcionario_tf ON public.funcionarios USING btree (id_tipo_funcionario);


--
-- Name: fki_fk_id_tipo_inasistencia; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_tipo_inasistencia ON public.inasistencias USING btree (id_tipo_inasistencia);


--
-- Name: fki_fk_id_usuario_justifica; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_usuario_justifica ON public.atrasos USING btree (id_usuario_justifica);


--
-- Name: fki_i; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_i ON public.detalle_tipo_funcionario USING btree (id_tipo_funcionario);


--
-- Name: inasistencias fk_id_apoderado_justifica; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.inasistencias
    ADD CONSTRAINT fk_id_apoderado_justifica FOREIGN KEY (id_apoderado_justifica) REFERENCES public.apoderados(id_apoderado) ON UPDATE CASCADE NOT VALID;


--
-- Name: matriculas fk_id_apoderado_suplente; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.matriculas
    ADD CONSTRAINT fk_id_apoderado_suplente FOREIGN KEY (id_apoderado_suplente) REFERENCES public.apoderados(id_apoderado) ON UPDATE CASCADE NOT VALID;


--
-- Name: matriculas fk_id_apoderado_titula; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.matriculas
    ADD CONSTRAINT fk_id_apoderado_titula FOREIGN KEY (id_apoderado_titula) REFERENCES public.apoderados(id_apoderado) ON UPDATE CASCADE NOT VALID;


--
-- Name: inasistencias fk_id_asignatura; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.inasistencias
    ADD CONSTRAINT fk_id_asignatura FOREIGN KEY (id_asignatura) REFERENCES public.asignaturas(id_asignatura) ON UPDATE CASCADE NOT VALID;


--
-- Name: matriculas fk_id_curso; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.matriculas
    ADD CONSTRAINT fk_id_curso FOREIGN KEY (id_curso) REFERENCES public.cursos(id_curso) ON UPDATE CASCADE NOT VALID;


--
-- Name: funcionarios fk_id_detalle_tipo_funcionario; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.funcionarios
    ADD CONSTRAINT fk_id_detalle_tipo_funcionario FOREIGN KEY (id_detalle_tipo_funcionario) REFERENCES public.detalle_tipo_funcionario(id_detalle_tipo_funcionario) ON UPDATE CASCADE NOT VALID;


--
-- Name: estudiantes fk_id_estado_estudiante; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.estudiantes
    ADD CONSTRAINT fk_id_estado_estudiante FOREIGN KEY (id_estado) REFERENCES public.estados(id_estado) ON UPDATE CASCADE NOT VALID;


--
-- Name: funcionarios fk_id_estado_funcionario; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.funcionarios
    ADD CONSTRAINT fk_id_estado_funcionario FOREIGN KEY (id_estado) REFERENCES public.estados(id_estado) ON UPDATE CASCADE NOT VALID;


--
-- Name: atrasos fk_id_estudiante; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.atrasos
    ADD CONSTRAINT fk_id_estudiante FOREIGN KEY (id_estudiante) REFERENCES public.estudiantes(id_estudiante) ON UPDATE CASCADE NOT VALID;


--
-- Name: matriculas fk_id_estudiante; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.matriculas
    ADD CONSTRAINT fk_id_estudiante FOREIGN KEY (id_estudiante) REFERENCES public.estudiantes(id_estudiante) ON UPDATE CASCADE NOT VALID;


--
-- Name: inasistencias fk_id_estudiante; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.inasistencias
    ADD CONSTRAINT fk_id_estudiante FOREIGN KEY (id_estudiante) REFERENCES public.estudiantes(id_estudiante) ON UPDATE CASCADE NOT VALID;


--
-- Name: usuarios fk_id_funcionario; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT fk_id_funcionario FOREIGN KEY (id_funcionario) REFERENCES public.funcionarios(id_funcionario) ON UPDATE CASCADE NOT VALID;


--
-- Name: usuarios fk_id_privilegio; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT fk_id_privilegio FOREIGN KEY (id_privilegio) REFERENCES public.privilegios(id_privilegio) ON UPDATE CASCADE NOT VALID;


--
-- Name: funcionarios fk_id_tipo_funcionario; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.funcionarios
    ADD CONSTRAINT fk_id_tipo_funcionario FOREIGN KEY (id_tipo_funcionario) REFERENCES public.tipo_funcionario(id_tipo_funcionario) ON UPDATE CASCADE NOT VALID;


--
-- Name: detalle_tipo_funcionario fk_id_tipo_funcionario; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.detalle_tipo_funcionario
    ADD CONSTRAINT fk_id_tipo_funcionario FOREIGN KEY (id_tipo_funcionario) REFERENCES public.tipo_funcionario(id_tipo_funcionario) ON UPDATE CASCADE NOT VALID;


--
-- Name: inasistencias fk_id_tipo_inasistencia; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.inasistencias
    ADD CONSTRAINT fk_id_tipo_inasistencia FOREIGN KEY (id_tipo_inasistencia) REFERENCES public.tipo_inasistencia(id_tipo_inasistencia) ON UPDATE CASCADE NOT VALID;


--
-- Name: atrasos fk_id_usuario_justifica; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.atrasos
    ADD CONSTRAINT fk_id_usuario_justifica FOREIGN KEY (id_usuario_justifica) REFERENCES public.usuarios(id_usuario) ON UPDATE CASCADE NOT VALID;


--
-- PostgreSQL database dump complete
--

