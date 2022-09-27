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
-- Name: apoderado; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.apoderado (
    id_apoderado integer NOT NULL,
    rut_apoderado character varying(10) NOT NULL,
    dv_rut_apoderado character varying(1) NOT NULL,
    apellido_paterno_apoderado character varying(25) NOT NULL,
    apellido_materno_apoderado character varying(25) NOT NULL,
    nombres_apoderado character varying(50) NOT NULL,
    estado_apoderado boolean DEFAULT true,
    telefono_apoderado character varying
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

ALTER SEQUENCE public.apoderados_id_apoderado_seq OWNED BY public.apoderado.id_apoderado;


--
-- Name: asignatura; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.asignatura (
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

ALTER SEQUENCE public.asignaturas_id_asignatura_seq OWNED BY public.asignatura.id_asignatura;


--
-- Name: atraso; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.atraso (
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

ALTER SEQUENCE public.atrasos_id_atraso_seq OWNED BY public.atraso.id_atraso;


--
-- Name: bloque_clase; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.bloque_clase (
    id_bloque integer NOT NULL,
    horario_bloque character varying NOT NULL
);


--
-- Name: bloque_clase_id_bloque_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.bloque_clase_id_bloque_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: bloque_clase_id_bloque_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.bloque_clase_id_bloque_seq OWNED BY public.bloque_clase.id_bloque;


--
-- Name: curso; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.curso (
    id_curso integer NOT NULL,
    curso character varying(2) NOT NULL,
    anio_curso integer
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

ALTER SEQUENCE public.cursos_id_curso_seq OWNED BY public.curso.id_curso;


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
-- Name: dia_semana; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.dia_semana (
    id_dia integer NOT NULL,
    nombre_dia character varying NOT NULL
);


--
-- Name: dias_id_dia_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.dias_id_dia_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: dias_id_dia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.dias_id_dia_seq OWNED BY public.dia_semana.id_dia;


--
-- Name: estado; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.estado (
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

ALTER SEQUENCE public.estados_id_estado_seq OWNED BY public.estado.id_estado;


--
-- Name: estudiante; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.estudiante (
    id_estudiante integer NOT NULL,
    rut_estudiante character varying(10) NOT NULL,
    dv_rut_estudiante character varying(1) NOT NULL,
    apellido_paterno_estudiante character varying(25) NOT NULL,
    apellido_materno_estudiante character varying(25) NOT NULL,
    nombres_estudiante character varying(50) NOT NULL,
    nombre_social_estudiante character varying(25),
    fecha_nacimiento_estudiante date,
    id_estado integer DEFAULT 1,
    beneficio_junaeb integer,
    sexo_estudiante character varying(1) NOT NULL
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

ALTER SEQUENCE public.estudiantes_id_estudiante_seq OWNED BY public.estudiante.id_estudiante;


--
-- Name: estudiantes_suspendidos; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.estudiantes_suspendidos (
    id_suspension integer NOT NULL,
    id_estudiante integer NOT NULL,
    fecha_inicio_suspension date NOT NULL,
    fecha_termino_suspension date NOT NULL
);


--
-- Name: estudiantes_suspendidos_id_suspension_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.estudiantes_suspendidos_id_suspension_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: estudiantes_suspendidos_id_suspension_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.estudiantes_suspendidos_id_suspension_seq OWNED BY public.estudiantes_suspendidos.id_suspension;


--
-- Name: funcionario; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.funcionario (
    id_funcionario integer NOT NULL,
    rut_funcionario character varying(10) NOT NULL,
    dv_rut_funcionario character varying(1) NOT NULL,
    apellido_paterno_funcionario character varying(25) NOT NULL,
    apellido_materno_funcionario character varying(25) NOT NULL,
    nombres_funcionario character varying(50) NOT NULL,
    sexo_funcionario character varying(1),
    fecha_nacimiento_funcionario date,
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

ALTER SEQUENCE public.funcionarios_id_funcionario_seq OWNED BY public.funcionario.id_funcionario;


--
-- Name: horario; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.horario (
    id_clase integer NOT NULL,
    id_curso integer NOT NULL,
    id_asignatura integer NOT NULL,
    id_dia integer NOT NULL,
    id_bloque integer NOT NULL,
    id_docente integer NOT NULL,
    estado_clase boolean DEFAULT true NOT NULL
);


--
-- Name: horario_id_clase_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.horario_id_clase_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: horario_id_clase_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.horario_id_clase_seq OWNED BY public.horario.id_clase;


--
-- Name: inasistencia_estudiante; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.inasistencia_estudiante (
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
-- Name: inasistencia_funcionario; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.inasistencia_funcionario (
    id_inasistencia integer NOT NULL,
    id_funcionario integer NOT NULL,
    fecha_inicio date NOT NULL,
    fecha_termino date NOT NULL,
    dias_inasistencia integer NOT NULL,
    id_funcionario_reemplazante integer,
    ordinario integer,
    id_tipo_inasistencia integer NOT NULL
);


--
-- Name: inasistencia_funcionario_id_inasistencia_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.inasistencia_funcionario_id_inasistencia_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: inasistencia_funcionario_id_inasistencia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.inasistencia_funcionario_id_inasistencia_seq OWNED BY public.inasistencia_funcionario.id_inasistencia;


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

ALTER SEQUENCE public.inasistencias_id_inasistencia_seq OWNED BY public.inasistencia_estudiante.id_inasistencia;


--
-- Name: matricula; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.matricula (
    id_matricula integer NOT NULL,
    numero_matricula integer NOT NULL,
    id_estudiante integer NOT NULL,
    id_apoderado_titular integer,
    id_apoderado_suplente integer,
    id_curso integer NOT NULL,
    anio_lectivo integer NOT NULL,
    fecha_ingreso_estudiante date,
    fecha_retiro_estudiante date
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

ALTER SEQUENCE public.matriculas_id_matricula_seq OWNED BY public.matricula.id_matricula;


--
-- Name: privilegio; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.privilegio (
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

ALTER SEQUENCE public.privilegios_id_privilegio_seq OWNED BY public.privilegio.id_privilegio;


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
-- Name: usuario; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.usuario (
    id_usuario integer NOT NULL,
    nombre_usuario character varying(25) NOT NULL,
    clave_usuario character varying(25) NOT NULL,
    id_funcionario integer NOT NULL,
    id_privilegio integer NOT NULL,
    fecha_creacion timestamp without time zone NOT NULL
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

ALTER SEQUENCE public.usuarios_id_usuario_seq OWNED BY public.usuario.id_usuario;


--
-- Name: apoderado id_apoderado; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.apoderado ALTER COLUMN id_apoderado SET DEFAULT nextval('public.apoderados_id_apoderado_seq'::regclass);


--
-- Name: asignatura id_asignatura; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.asignatura ALTER COLUMN id_asignatura SET DEFAULT nextval('public.asignaturas_id_asignatura_seq'::regclass);


--
-- Name: atraso id_atraso; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.atraso ALTER COLUMN id_atraso SET DEFAULT nextval('public.atrasos_id_atraso_seq'::regclass);


--
-- Name: bloque_clase id_bloque; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.bloque_clase ALTER COLUMN id_bloque SET DEFAULT nextval('public.bloque_clase_id_bloque_seq'::regclass);


--
-- Name: curso id_curso; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.curso ALTER COLUMN id_curso SET DEFAULT nextval('public.cursos_id_curso_seq'::regclass);


--
-- Name: detalle_tipo_funcionario id_detalle_tipo_funcionario; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.detalle_tipo_funcionario ALTER COLUMN id_detalle_tipo_funcionario SET DEFAULT nextval('public.detalle_tipo_funcionario_id_detalle_tipo_funcionario_seq'::regclass);


--
-- Name: dia_semana id_dia; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.dia_semana ALTER COLUMN id_dia SET DEFAULT nextval('public.dias_id_dia_seq'::regclass);


--
-- Name: estado id_estado; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.estado ALTER COLUMN id_estado SET DEFAULT nextval('public.estados_id_estado_seq'::regclass);


--
-- Name: estudiante id_estudiante; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.estudiante ALTER COLUMN id_estudiante SET DEFAULT nextval('public.estudiantes_id_estudiante_seq'::regclass);


--
-- Name: estudiantes_suspendidos id_suspension; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.estudiantes_suspendidos ALTER COLUMN id_suspension SET DEFAULT nextval('public.estudiantes_suspendidos_id_suspension_seq'::regclass);


--
-- Name: funcionario id_funcionario; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.funcionario ALTER COLUMN id_funcionario SET DEFAULT nextval('public.funcionarios_id_funcionario_seq'::regclass);


--
-- Name: horario id_clase; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.horario ALTER COLUMN id_clase SET DEFAULT nextval('public.horario_id_clase_seq'::regclass);


--
-- Name: inasistencia_estudiante id_inasistencia; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.inasistencia_estudiante ALTER COLUMN id_inasistencia SET DEFAULT nextval('public.inasistencias_id_inasistencia_seq'::regclass);


--
-- Name: inasistencia_funcionario id_inasistencia; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.inasistencia_funcionario ALTER COLUMN id_inasistencia SET DEFAULT nextval('public.inasistencia_funcionario_id_inasistencia_seq'::regclass);


--
-- Name: matricula id_matricula; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.matricula ALTER COLUMN id_matricula SET DEFAULT nextval('public.matriculas_id_matricula_seq'::regclass);


--
-- Name: privilegio id_privilegio; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.privilegio ALTER COLUMN id_privilegio SET DEFAULT nextval('public.privilegios_id_privilegio_seq'::regclass);


--
-- Name: tipo_funcionario id_tipo_funcionario; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tipo_funcionario ALTER COLUMN id_tipo_funcionario SET DEFAULT nextval('public.tipo_funcionario_id_tipo_funcionario_seq'::regclass);


--
-- Name: tipo_inasistencia id_tipo_inasistencia; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tipo_inasistencia ALTER COLUMN id_tipo_inasistencia SET DEFAULT nextval('public.tipo_inasistencia_id_tipo_inasistencia_seq'::regclass);


--
-- Name: usuario id_usuario; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id_usuario SET DEFAULT nextval('public.usuarios_id_usuario_seq'::regclass);


--
-- Data for Name: apoderado; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.apoderado (id_apoderado, rut_apoderado, dv_rut_apoderado, apellido_paterno_apoderado, apellido_materno_apoderado, nombres_apoderado, estado_apoderado, telefono_apoderado) FROM stdin;
6	14737827	0	PAREJA	REBOLLEDO	SERGIO	t	569-87998723
3	14234234	K	GONZALEZ	MEZA	EDUARDO ESTEBAN	t	569-23432321
1	15152374	9	ASTUDILLO	MEZA	JOHANNA ANDREA	t	569-88437343
2	15152374	9	HORMAZABAL	POBLETE	RICARDO ANTONIO	t	569-34934223
7	15677684	K	AP_PATRENO	AP_MATERNO	USUARIO DE PRUEBA	t	569-34234234
4	18342560	9	ESPINOZA	ESPARZA	LORENZO ANDRES	t	569-32498383
5	55555555	5	AP PATERNO PRUEBA 2	AP MATERNO	PRUEBA DE APODERADO	t	569-98798723
\.


--
-- Data for Name: asignatura; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.asignatura (id_asignatura, asignatura) FROM stdin;
\.


--
-- Data for Name: atraso; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.atraso (id_atraso, fecha_hora_actual, fecha_atraso, hora_atraso, id_estudiante, estado_atraso, id_usuario_justifica) FROM stdin;
\.


--
-- Data for Name: bloque_clase; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.bloque_clase (id_bloque, horario_bloque) FROM stdin;
\.


--
-- Data for Name: curso; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.curso (id_curso, curso, anio_curso) FROM stdin;
20	7C	2023
15	1I	2022
16	1J	2022
17	1K	2022
18	7A	2022
19	7B	2022
21	2A	2022
22	2B	2022
23	2C	2022
24	2D	2022
25	2E	2022
26	2F	2022
27	3A	2022
28	3B	2022
29	3C	2022
30	3D	2022
31	3E	2022
32	3F	2022
33	3G	2022
34	3H	2022
35	3I	2022
36	3J	2022
37	4A	2022
38	4B	2022
39	4C	2022
40	4D	2022
41	4E	2022
42	4F	2022
43	4G	2022
44	4H	2022
45	4I	2022
46	4J	2022
47	4K	2022
48	4L	2022
49	4M	2022
1	7A	2022
2	7B	2022
3	7C	2022
4	8A	2022
5	8B	2022
6	8C	2022
7	1A	2022
8	1B	2022
9	1C	2022
10	1D	2022
11	1E	2022
12	1F	2022
13	1G	2022
14	1H	2022
\.


--
-- Data for Name: detalle_tipo_funcionario; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.detalle_tipo_funcionario (id_detalle_tipo_funcionario, detalle_tipo_funcionario, id_tipo_funcionario) FROM stdin;
1	secretaria(o)	2
2	ingeniero informático	3
3	técnico informático	2
4	director(a)	1
5	soporte informático	2
\.


--
-- Data for Name: dia_semana; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.dia_semana (id_dia, nombre_dia) FROM stdin;
\.


--
-- Data for Name: estado; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.estado (id_estado, nombre_estado) FROM stdin;
1	activo
2	inactivo
3	licencia
4	retiro
5	susopension
\.


--
-- Data for Name: estudiante; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.estudiante (id_estudiante, rut_estudiante, dv_rut_estudiante, apellido_paterno_estudiante, apellido_materno_estudiante, nombres_estudiante, nombre_social_estudiante, fecha_nacimiento_estudiante, id_estado, beneficio_junaeb, sexo_estudiante) FROM stdin;
1	20760531	K	HORMAZABAL	ASTUDILLO	CONSTANZA ISIDORA	JUANA	2010-03-15	1	1	F
2	22876876	3	CONTRERAS	MENDEZ	LUIS LORENZO	PANCHO	2010-05-22	4	1	M
3	11111111	1	AP PRUEBA	AM PRUEBA	NOMBRE PRUEBA	NPRUEBA	2022-09-23	1	1	M
4	22222222	2	KJH	KHJ	KJSF	KJ	2022-09-13	1	1	M
\.


--
-- Data for Name: estudiantes_suspendidos; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.estudiantes_suspendidos (id_suspension, id_estudiante, fecha_inicio_suspension, fecha_termino_suspension) FROM stdin;
\.


--
-- Data for Name: funcionario; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.funcionario (id_funcionario, rut_funcionario, dv_rut_funcionario, apellido_paterno_funcionario, apellido_materno_funcionario, nombres_funcionario, sexo_funcionario, fecha_nacimiento_funcionario, id_detalle_tipo_funcionario, id_estado) FROM stdin;
1	18342560	9	sandoval	luengo	mario domingo	M	1993-01-07	5	1
\.


--
-- Data for Name: horario; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.horario (id_clase, id_curso, id_asignatura, id_dia, id_bloque, id_docente, estado_clase) FROM stdin;
\.


--
-- Data for Name: inasistencia_estudiante; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.inasistencia_estudiante (id_inasistencia, id_estudiante, id_tipo_inasistencia, estado_justificacion, id_apoderado_justifica, fecha_inicio_inasistencia, fecha_termino_inasistencia, motivo_inasistencia, documento_presentado, prueba_pendiente, id_asignatura) FROM stdin;
\.


--
-- Data for Name: inasistencia_funcionario; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.inasistencia_funcionario (id_inasistencia, id_funcionario, fecha_inicio, fecha_termino, dias_inasistencia, id_funcionario_reemplazante, ordinario, id_tipo_inasistencia) FROM stdin;
1	1	2022-09-01	2022-09-05	5	\N	\N	1
\.


--
-- Data for Name: matricula; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.matricula (id_matricula, numero_matricula, id_estudiante, id_apoderado_titular, id_apoderado_suplente, id_curso, anio_lectivo, fecha_ingreso_estudiante, fecha_retiro_estudiante) FROM stdin;
3	125	2	4	1	3	2022	2022-03-02	\N
2	95	1	3	2	3	2022	2022-03-02	\N
4	123	3	\N	\N	18	2022	2022-09-20	\N
5	222	4	4	\N	5	2022	2022-09-14	\N
\.


--
-- Data for Name: privilegio; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.privilegio (id_privilegio, descripcion) FROM stdin;
1	administrador
2	soporte
3	estándar
4	restringido
\.


--
-- Data for Name: tipo_funcionario; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.tipo_funcionario (id_tipo_funcionario, tipo_funcionario) FROM stdin;
1	docente
2	asistente
3	asistente profesional
4	docente directivo
5	auxiliar
\.


--
-- Data for Name: tipo_inasistencia; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.tipo_inasistencia (id_tipo_inasistencia, tipo_inasistencia) FROM stdin;
1	LICENCIA MÉDICA
\.


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.usuario (id_usuario, nombre_usuario, clave_usuario, id_funcionario, id_privilegio, fecha_creacion) FROM stdin;
1	msandoval	msandoval	1	1	2022-06-21 00:00:00
\.


--
-- Name: apoderados_id_apoderado_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.apoderados_id_apoderado_seq', 7, true);


--
-- Name: asignaturas_id_asignatura_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.asignaturas_id_asignatura_seq', 1, false);


--
-- Name: atrasos_id_atraso_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.atrasos_id_atraso_seq', 12, true);


--
-- Name: bloque_clase_id_bloque_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.bloque_clase_id_bloque_seq', 1, false);


--
-- Name: cursos_id_curso_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.cursos_id_curso_seq', 49, true);


--
-- Name: detalle_tipo_funcionario_id_detalle_tipo_funcionario_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.detalle_tipo_funcionario_id_detalle_tipo_funcionario_seq', 5, true);


--
-- Name: dias_id_dia_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.dias_id_dia_seq', 1, false);


--
-- Name: estados_id_estado_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.estados_id_estado_seq', 5, true);


--
-- Name: estudiantes_id_estudiante_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.estudiantes_id_estudiante_seq', 7, true);


--
-- Name: estudiantes_suspendidos_id_suspension_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.estudiantes_suspendidos_id_suspension_seq', 1, false);


--
-- Name: funcionarios_id_funcionario_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.funcionarios_id_funcionario_seq', 1, true);


--
-- Name: horario_id_clase_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.horario_id_clase_seq', 1, false);


--
-- Name: inasistencia_funcionario_id_inasistencia_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.inasistencia_funcionario_id_inasistencia_seq', 2, true);


--
-- Name: inasistencias_id_inasistencia_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.inasistencias_id_inasistencia_seq', 1, false);


--
-- Name: matriculas_id_matricula_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.matriculas_id_matricula_seq', 8, true);


--
-- Name: privilegios_id_privilegio_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.privilegios_id_privilegio_seq', 4, true);


--
-- Name: tipo_funcionario_id_tipo_funcionario_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.tipo_funcionario_id_tipo_funcionario_seq', 5, true);


--
-- Name: tipo_inasistencia_id_tipo_inasistencia_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.tipo_inasistencia_id_tipo_inasistencia_seq', 1, true);


--
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.usuarios_id_usuario_seq', 1, true);


--
-- Name: bloque_clase bloque_clase_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.bloque_clase
    ADD CONSTRAINT bloque_clase_pkey PRIMARY KEY (id_bloque);


--
-- Name: dia_semana dias_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.dia_semana
    ADD CONSTRAINT dias_pkey PRIMARY KEY (id_dia);


--
-- Name: horario horario_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.horario
    ADD CONSTRAINT horario_pkey PRIMARY KEY (id_clase);


--
-- Name: inasistencia_funcionario inasistencia_funcionario_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.inasistencia_funcionario
    ADD CONSTRAINT inasistencia_funcionario_pkey PRIMARY KEY (id_inasistencia);


--
-- Name: apoderado pk_id_apoderado; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.apoderado
    ADD CONSTRAINT pk_id_apoderado PRIMARY KEY (id_apoderado);


--
-- Name: asignatura pk_id_asignatura; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.asignatura
    ADD CONSTRAINT pk_id_asignatura PRIMARY KEY (id_asignatura);


--
-- Name: atraso pk_id_atraso; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.atraso
    ADD CONSTRAINT pk_id_atraso PRIMARY KEY (id_atraso);


--
-- Name: curso pk_id_curso; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.curso
    ADD CONSTRAINT pk_id_curso PRIMARY KEY (id_curso);


--
-- Name: detalle_tipo_funcionario pk_id_detalle_tipo_funcionario; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.detalle_tipo_funcionario
    ADD CONSTRAINT pk_id_detalle_tipo_funcionario PRIMARY KEY (id_detalle_tipo_funcionario);


--
-- Name: estado pk_id_estado; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.estado
    ADD CONSTRAINT pk_id_estado PRIMARY KEY (id_estado);


--
-- Name: estudiante pk_id_estudiante; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.estudiante
    ADD CONSTRAINT pk_id_estudiante PRIMARY KEY (id_estudiante);


--
-- Name: funcionario pk_id_funcionario; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.funcionario
    ADD CONSTRAINT pk_id_funcionario PRIMARY KEY (id_funcionario);


--
-- Name: inasistencia_estudiante pk_id_inasistencia; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.inasistencia_estudiante
    ADD CONSTRAINT pk_id_inasistencia PRIMARY KEY (id_inasistencia);


--
-- Name: matricula pk_id_matricula; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.matricula
    ADD CONSTRAINT pk_id_matricula PRIMARY KEY (id_matricula);


--
-- Name: privilegio pk_id_privilegio; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.privilegio
    ADD CONSTRAINT pk_id_privilegio PRIMARY KEY (id_privilegio);


--
-- Name: estudiantes_suspendidos pk_id_suspension; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.estudiantes_suspendidos
    ADD CONSTRAINT pk_id_suspension PRIMARY KEY (id_suspension);


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
-- Name: usuario pk_id_usuario; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT pk_id_usuario PRIMARY KEY (id_usuario);


--
-- Name: fki_fk_id_apoderado_justifica; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_apoderado_justifica ON public.inasistencia_estudiante USING btree (id_apoderado_justifica);


--
-- Name: fki_fk_id_apoderado_suplente; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_apoderado_suplente ON public.matricula USING btree (id_apoderado_suplente);


--
-- Name: fki_fk_id_apoderado_titula; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_apoderado_titula ON public.matricula USING btree (id_apoderado_titular);


--
-- Name: fki_fk_id_asignatura; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_asignatura ON public.inasistencia_estudiante USING btree (id_asignatura);


--
-- Name: fki_fk_id_curso; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_curso ON public.matricula USING btree (id_curso);


--
-- Name: fki_fk_id_detalle_tipo_funcionario; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_detalle_tipo_funcionario ON public.funcionario USING btree (id_detalle_tipo_funcionario);


--
-- Name: fki_fk_id_estado_estudiante; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_estado_estudiante ON public.estudiante USING btree (id_estado);


--
-- Name: fki_fk_id_estado_funcionario; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_estado_funcionario ON public.funcionario USING btree (id_estado);


--
-- Name: fki_fk_id_estudiante; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_estudiante ON public.atraso USING btree (id_estudiante);


--
-- Name: fki_fk_id_funcionario; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_funcionario ON public.usuario USING btree (id_funcionario);


--
-- Name: fki_fk_id_privilegio; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_privilegio ON public.usuario USING btree (id_privilegio);


--
-- Name: fki_fk_id_tipo_funcionario; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_tipo_funcionario ON public.detalle_tipo_funcionario USING btree (id_tipo_funcionario);


--
-- Name: fki_fk_id_tipo_inasistencia; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_tipo_inasistencia ON public.inasistencia_estudiante USING btree (id_tipo_inasistencia);


--
-- Name: fki_fk_id_usuario_justifica; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_usuario_justifica ON public.atraso USING btree (id_usuario_justifica);


--
-- Name: fki_i; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_i ON public.detalle_tipo_funcionario USING btree (id_tipo_funcionario);


--
-- Name: inasistencia_estudiante fk_id_apoderado_justifica; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.inasistencia_estudiante
    ADD CONSTRAINT fk_id_apoderado_justifica FOREIGN KEY (id_apoderado_justifica) REFERENCES public.apoderado(id_apoderado) ON UPDATE CASCADE NOT VALID;


--
-- Name: matricula fk_id_apoderado_suplente; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.matricula
    ADD CONSTRAINT fk_id_apoderado_suplente FOREIGN KEY (id_apoderado_suplente) REFERENCES public.apoderado(id_apoderado) ON UPDATE CASCADE NOT VALID;


--
-- Name: matricula fk_id_apoderado_titula; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.matricula
    ADD CONSTRAINT fk_id_apoderado_titula FOREIGN KEY (id_apoderado_titular) REFERENCES public.apoderado(id_apoderado) ON UPDATE CASCADE NOT VALID;


--
-- Name: inasistencia_estudiante fk_id_asignatura; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.inasistencia_estudiante
    ADD CONSTRAINT fk_id_asignatura FOREIGN KEY (id_asignatura) REFERENCES public.asignatura(id_asignatura) ON UPDATE CASCADE NOT VALID;


--
-- Name: matricula fk_id_curso; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.matricula
    ADD CONSTRAINT fk_id_curso FOREIGN KEY (id_curso) REFERENCES public.curso(id_curso) ON UPDATE CASCADE NOT VALID;


--
-- Name: funcionario fk_id_detalle_tipo_funcionario; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.funcionario
    ADD CONSTRAINT fk_id_detalle_tipo_funcionario FOREIGN KEY (id_detalle_tipo_funcionario) REFERENCES public.detalle_tipo_funcionario(id_detalle_tipo_funcionario) ON UPDATE CASCADE NOT VALID;


--
-- Name: estudiante fk_id_estado_estudiante; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.estudiante
    ADD CONSTRAINT fk_id_estado_estudiante FOREIGN KEY (id_estado) REFERENCES public.estado(id_estado) ON UPDATE CASCADE NOT VALID;


--
-- Name: funcionario fk_id_estado_funcionario; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.funcionario
    ADD CONSTRAINT fk_id_estado_funcionario FOREIGN KEY (id_estado) REFERENCES public.estado(id_estado) ON UPDATE CASCADE NOT VALID;


--
-- Name: atraso fk_id_estudiante; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.atraso
    ADD CONSTRAINT fk_id_estudiante FOREIGN KEY (id_estudiante) REFERENCES public.estudiante(id_estudiante) ON UPDATE CASCADE NOT VALID;


--
-- Name: matricula fk_id_estudiante; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.matricula
    ADD CONSTRAINT fk_id_estudiante FOREIGN KEY (id_estudiante) REFERENCES public.estudiante(id_estudiante) ON UPDATE CASCADE NOT VALID;


--
-- Name: inasistencia_estudiante fk_id_estudiante; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.inasistencia_estudiante
    ADD CONSTRAINT fk_id_estudiante FOREIGN KEY (id_estudiante) REFERENCES public.estudiante(id_estudiante) ON UPDATE CASCADE NOT VALID;


--
-- Name: estudiantes_suspendidos fk_id_estudiante; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.estudiantes_suspendidos
    ADD CONSTRAINT fk_id_estudiante FOREIGN KEY (id_estudiante) REFERENCES public.estudiante(id_estudiante) NOT VALID;


--
-- Name: usuario fk_id_funcionario; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT fk_id_funcionario FOREIGN KEY (id_funcionario) REFERENCES public.funcionario(id_funcionario) ON UPDATE CASCADE NOT VALID;


--
-- Name: usuario fk_id_privilegio; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT fk_id_privilegio FOREIGN KEY (id_privilegio) REFERENCES public.privilegio(id_privilegio) ON UPDATE CASCADE NOT VALID;


--
-- Name: detalle_tipo_funcionario fk_id_tipo_funcionario; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.detalle_tipo_funcionario
    ADD CONSTRAINT fk_id_tipo_funcionario FOREIGN KEY (id_tipo_funcionario) REFERENCES public.tipo_funcionario(id_tipo_funcionario) ON UPDATE CASCADE NOT VALID;


--
-- Name: inasistencia_estudiante fk_id_tipo_inasistencia; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.inasistencia_estudiante
    ADD CONSTRAINT fk_id_tipo_inasistencia FOREIGN KEY (id_tipo_inasistencia) REFERENCES public.tipo_inasistencia(id_tipo_inasistencia) ON UPDATE CASCADE NOT VALID;


--
-- Name: atraso fk_id_usuario_justifica; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.atraso
    ADD CONSTRAINT fk_id_usuario_justifica FOREIGN KEY (id_usuario_justifica) REFERENCES public.usuario(id_usuario) ON UPDATE CASCADE NOT VALID;


--
-- PostgreSQL database dump complete
--

