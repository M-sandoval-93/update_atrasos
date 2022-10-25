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
    ap_apoderado character varying(25) NOT NULL,
    am_apoderado character varying(25) NOT NULL,
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
    id_usuario_justifica integer,
    fecha_hora_justificacion time without time zone,
    id_apoderado_justifica integer
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
    anio_lectivo integer
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
    ap_estudiante character varying(25) NOT NULL,
    am_estudiante character varying(25) NOT NULL,
    nombres_estudiante character varying(50) NOT NULL,
    nombre_social character varying(25),
    fecha_nacimiento date,
    id_estado integer DEFAULT 1,
    junaeb integer,
    sexo character varying(1) NOT NULL
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
-- Name: suspencion_estudiante; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.suspencion_estudiante (
    id_suspension integer NOT NULL,
    id_estudiante integer NOT NULL,
    fecha_inicio date NOT NULL,
    fecha_termino date NOT NULL
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

ALTER SEQUENCE public.estudiantes_suspendidos_id_suspension_seq OWNED BY public.suspencion_estudiante.id_suspension;


--
-- Name: funcionario; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.funcionario (
    id_funcionario integer NOT NULL,
    rut_funcionario character varying(10) NOT NULL,
    dv_rut_funcionario character varying(1) NOT NULL,
    ap_funcionario character varying(25) NOT NULL,
    am_funcionario character varying(25) NOT NULL,
    nombres_funcionario character varying(50) NOT NULL,
    sexo character varying(1),
    fecha_nacimiento date,
    id_estado integer DEFAULT 1,
    id_tipo_funcionario integer
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
    estado_clase boolean DEFAULT true NOT NULL,
    anio_lectivo integer NOT NULL
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
    fecha_inicio date NOT NULL,
    fecha_termino date NOT NULL,
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
    dias_inasistencia double precision NOT NULL,
    id_tipo_inasistencia integer NOT NULL,
    id_reemplazante integer,
    ordinario integer
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
    matricula integer NOT NULL,
    id_estudiante integer NOT NULL,
    id_ap_titular integer,
    id_ap_suplente integer,
    id_curso integer NOT NULL,
    anio_lectivo integer NOT NULL,
    fecha_ingreso date,
    fecha_retiro date
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
-- Name: suspencion_estudiante id_suspension; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.suspencion_estudiante ALTER COLUMN id_suspension SET DEFAULT nextval('public.estudiantes_suspendidos_id_suspension_seq'::regclass);


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

COPY public.apoderado (id_apoderado, rut_apoderado, dv_rut_apoderado, ap_apoderado, am_apoderado, nombres_apoderado, estado_apoderado, telefono_apoderado) FROM stdin;
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

COPY public.atraso (id_atraso, fecha_hora_actual, fecha_atraso, hora_atraso, id_estudiante, estado_atraso, id_usuario_justifica, fecha_hora_justificacion, id_apoderado_justifica) FROM stdin;
14	2022-10-21 09:16:09.898322	2022-10-21	09:16:09.898322	1410	sin justificar	\N	\N	\N
16	2022-10-21 12:51:24.878716	2022-10-21	12:51:24.878716	1408	justificado	\N	\N	\N
20	2022-10-22 20:39:20.519245	2022-10-22	20:39:20.519245	1410	sin justificar	\N	\N	\N
13	2022-10-21 09:10:09.463569	2021-10-22	09:10:09.463569	1408	sin justificar	\N	\N	\N
21	2022-10-23 00:27:23.878637	2022-10-22	00:27:23.878637	1422	sin justificar	\N	\N	\N
19	2022-10-22 20:12:14.603698	2022-10-23	20:12:14.603698	2204	sin justificar	\N	\N	\N
\.


--
-- Data for Name: bloque_clase; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.bloque_clase (id_bloque, horario_bloque) FROM stdin;
\.


--
-- Data for Name: curso; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.curso (id_curso, curso, anio_lectivo) FROM stdin;
137	7A	2022
138	7B	2022
139	7C	2022
140	8A	2022
141	8B	2022
142	8C	2022
143	1A	2022
144	1B	2022
145	1C	2022
146	1D	2022
147	1E	2022
148	1F	2022
149	1G	2022
150	1H	2022
151	1I	2022
152	1J	2022
153	1K	2022
154	2A	2022
155	2B	2022
156	2C	2022
157	2D	2022
158	2E	2022
159	2F	2022
160	2G	2022
161	2H	2022
162	2I	2022
163	2J	2022
164	3A	2022
165	3B	2022
166	3C	2022
167	3D	2022
168	3E	2022
169	3F	2022
170	3G	2022
171	3H	2022
172	3I	2022
173	4A	2022
174	4B	2022
175	4C	2022
176	4D	2022
177	4E	2022
178	4F	2022
179	4G	2022
180	4H	2022
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
5	suspención
\.


--
-- Data for Name: estudiante; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.estudiante (id_estudiante, rut_estudiante, dv_rut_estudiante, ap_estudiante, am_estudiante, nombres_estudiante, nombre_social, fecha_nacimiento, id_estado, junaeb, sexo) FROM stdin;
1401	23125479	K	MOYA	VARGAS	CRISTÓBAL ALONSO	\N	2009-09-16	1	1	M
1402	23073889	0	MEDEL	TRONCOSO	JULIETA BELÉN	\N	2009-07-15	1	1	F
1403	20760478	K	FUENTEALBA	CUEVAS	VICENTE SALVADOR	\N	2010-02-27	1	1	M
1404	23135977	K	IBÁÑEZ	CASTILLO	CATALINA BELÉN	\N	2009-09-27	1	1	F
1405	22490032	5	QUIROZ	URIBE	FRANCISCO JAVIER	\N	2007-09-02	1	1	M
1406	23188843	8	GUZMÁN	RAMÍREZ	FELIPE IGNACIO	\N	2009-11-19	1	1	M
1407	20760462	3	AGUAYO	MUÑOZ	ANGELA EMILIA	\N	2010-02-20	1	1	F
1409	23058394	3	BASTÍAS	ENCINA	MAXIMILIANO ALEXANDER	\N	2009-06-26	1	1	M
1411	23067702	6	BERRÍOS	LARENAS	TOMÁS IGNACIO	\N	2009-07-10	1	1	M
1412	23142205	6	CASTILLO	VEGA	ANA MARTINA BELÉN	\N	2009-10-05	1	1	F
1413	23148549	K	CONCHA	CASTRO	NICOLÁS LEÓN VICENTE	\N	2009-10-11	1	1	M
1414	23248031	9	GUTIÉRREZ	ESPINOSA	ANTONIA	\N	2010-02-12	1	1	F
1415	20760467	4	IRRIBARRA	JORQUERA	ROCÍO PASCUALA	\N	2010-02-26	1	1	F
1416	23198106	3	VILLALOBOS	VÁSQUEZ	MAXIMILIANO ANTONIO	\N	2009-12-08	1	1	M
1417	23227264	3	ALFARO	ROJAS	MARTINA IGNACIA	\N	2010-01-18	1	1	F
1418	23071610	2	SEPÚLVEDA	IBÁÑEZ	FLORENCIA ANTONIA	\N	2009-07-13	1	1	F
1419	20760422	4	CATALÁN	POBLETE	TANIA ALIVETT	\N	2010-03-03	1	1	F
1420	23154611	1	RAMOS	VÁSQUEZ	DIEGO ANDRÉS	\N	2009-10-14	1	1	M
1421	23328520	K	CASTRO	LUCERO	DANIEL FRANCISCO	\N	2010-05-17	1	1	M
1422	23173353	1	PAVEZ	CASTILLO	LORETTA ANTONIA	\N	2009-11-13	1	1	F
1423	23330275	9	ÁVILA	HERNÁNDEZ	VALENTINA BELÉN	\N	2010-05-18	1	1	F
1424	23257039	3	HUERAMAN	HERNÁNDEZ	MATÍAS FELIPE	\N	2010-02-18	1	1	M
1425	23157555	3	NORAMBUENA	SOTO	MARTÍN PATRICIO	\N	2009-10-26	1	1	M
1426	22810202	4	GAJARDO	CORTÉS	JOSEFA IGNACIA	\N	2008-09-03	1	1	F
1427	23121831	9	DE LA PAZ	MONTESINO	ANTONELLA CAROLINA	\N	2009-09-12	1	1	F
1428	23220937	2	ZÁRATE	VALENZUELA	MAXIMILIANO EXEQUIEL	\N	2010-01-08	1	1	M
1429	23082207	7	CASTRO	CARTER	RICARDO AQUILES	\N	2009-07-24	1	1	M
1430	22989376	9	MARDONES	PARRA	EMERSON IGNACIO	\N	2009-04-02	1	1	M
1431	22471705	9	ARAVENA	YÁÑEZ	TECSSIA ALEJANDRA	\N	2007-08-09	1	1	F
1432	23177755	5	ACHU	ARAYA	CAMILA IGNACIA	\N	2009-11-23	1	1	F
1433	20760582	4	BURGOS	URRUTIA	CARLOS MARTÍN	\N	2010-03-21	1	1	M
1434	23247895	0	CANALES	ASTUDILLO	EMILIO ALEXIS	\N	2010-02-10	1	1	M
1435	23150065	0	JIMÉNEZ	YÁÑEZ	VALENTINA IGNACIA	\N	2009-10-17	1	1	F
1436	22831024	7	LEIVA	MEZA	LUKAS ANTONIO	\N	2008-09-18	1	1	M
1437	23227639	8	MARTÍNEZ	HENRÍQUEZ	EMILIA BELÉN	\N	2010-01-19	1	1	F
1438	26037017	0	MENDEZ	CAICEDO	FRANGELY LISBETH	\N	2009-11-13	1	1	F
1439	23046413	8	ORO	REYES	GABRIELA PAZ	\N	2009-06-11	1	1	F
1440	23228948	1	RIQUELME	VILLA	RICARDO ANDRÉS	\N	2010-01-18	1	1	M
1441	23229747	6	VALENZUELA	TORREZ	VICENTE RODRIGO	\N	2010-01-08	1	1	M
1442	23097663	5	YÁÑEZ	ROJAS	LUIS ORLANDO JAVIER	\N	2009-08-12	1	1	M
1443	23000700	4	RIVERA	GALLEGUILLOS	DANIELA MONSERRAT	\N	2009-04-21	1	1	F
1444	23072769	4	GONZÁLEZ	CAMPOS	AGUSTINA IGNACIA	\N	2009-07-15	1	1	F
1445	23191544	3	TORO	SERRANO	DARINKA IVONNE	\N	2009-11-27	1	1	F
1446	23248128	5	AVENDAÑO	ACOSTA	AMANDA ANAHI	\N	2010-02-11	1	1	F
1447	23145059	9	MUÑOZ	MUÑOZ	BRILLITE ARACELI	\N	2009-09-29	1	1	F
1448	23206980	5	HERNÁNDEZ	GONZÁLEZ	ALEXANDRA ESTEFANÍA	\N	2009-12-26	1	1	F
1449	23155315	0	ROJAS	VENEGAS	CRISTÓBAL GONZALO	\N	2009-10-22	1	1	M
1450	20760592	1	YÁÑEZ	ÁLVAREZ	FLORENCIA EMILIA	\N	2010-03-22	1	1	F
1451	23086955	3	SALGADO	BAEZ	MARTINA ISIDORA	\N	2009-08-03	1	1	F
1452	23270108	0	VELÁSQUEZ	ALARCÓN	JAVIER IGNACIO	\N	2010-03-09	1	1	M
1453	23354824	3	TORO	VERGARA	FELIPE ANTONIO	\N	2010-06-22	1	1	M
1454	23166205	7	ACOSTA	MORALES	GABRIEL ANDRÉS	\N	2009-11-07	1	1	M
1455	23206214	2	CAQUILPÁN	LOBOS	DANIELA JAVIERA	\N	2009-12-22	1	1	F
1456	20760475	5	DIAZ	CAMPOS	LISSETTE ARELY	\N	2010-03-02	1	1	F
1457	23209471	0	FUENTES	CONTRERAS	HÉCTOR ALEXIS ANTONIO	\N	2009-12-22	1	1	M
1458	23073519	0	GARRIDO	PÉREZ	CAMILA ANDREA	\N	2009-07-17	1	1	F
1459	22729016	1	GUERRERO	SÁNCHEZ	MAXIMILIANO BAUTISTA	\N	2008-05-27	1	1	M
1460	23211710	9	LOYOLA	ARAVENA	EMILIANO ALONSO	\N	2009-12-29	1	1	M
1461	23207154	0	MARTÍNEZ	AMPAI	RENATO SAMUEL	\N	2009-12-22	1	1	M
1462	23056798	0	MONCADA	NORAMBUENA	MAXIMILIANO ALEJANDRO	\N	2009-06-23	1	1	M
1463	22989941	4	PIZARRO	MOLINA	AGUSTÍN ORLANDO	\N	2009-04-03	1	1	M
1464	23116666	1	SOTO	CERDA	VALENTINA IGNACIA	\N	2009-08-28	1	1	F
1465	23234737	6	TAPIA	RAMÍREZ	AYLIN RAQUEL	\N	2010-01-21	1	1	F
1466	23255515	7	OJEDA	NAVARRO	VICTORIA STEPHANIA	\N	2010-02-22	1	1	F
1467	23002640	8	VIEIRA	LOBOS	RENATA ESPERANZA	\N	2009-04-22	1	1	F
1468	27492823	9	RAMOS	HERNANDEZ	EMMANUEL	\N	2010-03-30	1	1	M
1469	23195766	9	ALARCÓN	CATALDO	ABIGAIL BETZABÉ	\N	2009-12-07	1	1	F
1470	23114533	8	HERNÁNDEZ	RODRÍGUEZ	MARTÍN ALEJANDRO	\N	2009-09-04	1	1	M
1471	20760706	1	VALENZUELA	BUSTAMANTE	MARTÍN IGNACIO	\N	2010-04-06	1	1	M
1472	22744156	9	ZAMORANO	PINO	TOMÁS LEÓN	\N	2008-06-11	1	1	M
1473	23158581	8	IBÁÑEZ	SEPÚLVEDA	CONSTANZA IGNACIA	\N	2009-10-28	1	1	F
1474	22831476	5	RAMÍREZ	CISTERNAS	RAFAELA BELÉN	\N	2008-09-13	1	1	F
1475	22843951	7	LUENGO	MAUREIRA	MAYRA POLET	\N	2008-10-01	1	1	F
1476	22784526	0	ÁLVAREZ	VALDÉS	ISIDORA ANTONIA	\N	2008-08-01	1	1	F
1477	22950298	0	ARELLANO	TRONCOSO	BENJAMÍN ALFREDO	\N	2009-02-19	1	1	M
1478	22876093	5	BUSTOS	SEPÚLVEDA	FABIOLA IGNACIA	\N	2008-11-23	1	1	F
1400	20760531	K	HORMAZÁBAL	ASTUDILLO	CONSTANZA ISIDORA	\N	2010-03-15	5	1	F
1410	23235359	7	BECERRA	CASTILLO	AMARO ANDRÉS	STELL	2010-01-28	1	1	M
1479	22481309	0	CABRERA	ÁLVAREZ	CRISTÓBAL ALEJANDRO	\N	2007-08-19	1	1	M
1480	22985511	5	CONCHA	OJEDA	GABRIEL ALEJANDRO	\N	2009-04-03	1	1	M
1481	22877512	6	ALFARO	RINALDI	MIGUEL ANGEL	\N	2008-11-15	1	1	M
1482	22770270	2	RODRÍGUEZ	AMPUERO	TOMÁS ALONSO	\N	2008-07-15	1	1	M
1483	22872724	5	SEPÚLVEDA	ESPINOZA	MAXIMILIANO ALBERTO	\N	2008-11-15	1	1	M
1484	22795253	9	URRUTIA	CASTILLO	ESTEFANÍA CLEMENTINA ALMENDRA	\N	2008-08-16	1	1	F
1485	22821287	3	GUMUCIO	LAZO	PASTORA VERONICA	\N	2008-09-09	1	1	F
1486	22897003	4	FIGUEROA	LUENGO	AMARO GERMÁN	\N	2008-12-12	1	1	M
1487	22966750	5	GUERRERO	SUAZO	SOFÍA KATALINA	\N	2009-03-09	1	1	F
1488	22927304	3	MÉNDEZ	ROMERO	BENJAMÍN EDUARDO	\N	2009-01-21	1	1	M
1489	22916853	3	NORAMBUENA	MÉNDEZ	JULIETA ANTONIA	\N	2009-01-09	1	1	F
1490	22800634	3	PÉREZ	FARIÑA	IVONNE ALEJANDRA	\N	2008-08-23	1	1	F
1491	22905258	6	QUELOPANA	VILLAR	TAMARA BELÉN	\N	2008-12-27	1	1	F
1492	22910944	8	QUEZADA	BARRA	GABRIELA ANTONIA	\N	2009-01-03	1	1	F
1493	22943057	2	REYES	ORELLANA	BENJAMÍN ANDRÉS	\N	2009-02-11	1	1	M
1494	22799478	9	MÉNDEZ	MOLINA	LUIS FERNANDO	\N	2008-08-18	1	1	M
1495	22863595	2	ZURITA	ROJAS	CARLOS HUGO	\N	2008-11-08	1	1	M
1496	22945589	3	ALVAREZ	ARAVENA	AYLEEN YSMENIA DENIS	\N	2009-02-11	1	1	F
1497	22964296	0	BELDA	HERRERA	PAOLO JESÚS	\N	2009-03-04	1	1	M
1498	22843080	3	ÓRDENES	AYALA	VICENTE ERNESTO DE MONSERRAT	\N	2008-10-09	1	1	M
1499	23012093	5	CASTILLO	VÁSQUEZ	NATALI ESTEFANÍA	\N	2009-04-28	1	1	F
1500	22975535	8	MASCARÓ	REYES	IGNACIA CATALINA	\N	2009-03-19	1	1	F
1501	22833002	7	MÉNDEZ	PINO	BENJAMÍN ALONSO	\N	2008-09-25	1	1	M
1502	22733317	0	ÁLVAREZ	VALDÉS	AILEEN AZUL	\N	2008-05-28	1	1	F
1503	22614918	K	BASTÍAS	ESPINOZA	ANGÉLICA MONSERRAT	\N	2008-01-11	1	1	F
1504	22932599	K	BRAVO	YÁÑEZ	MARTÍN LUCIANO	\N	2009-01-29	1	1	M
1505	22886132	4	CASTILLO	MORALES	AUGUSTO HERNÁN	\N	2008-11-28	1	1	M
1506	22845186	K	CAUCAMÁN	CABELLO	ANTONELA AGUSTINA	\N	2008-10-17	1	1	F
1507	22825403	7	CONTRERAS	AYALA	ALONSO ENRIQUE	\N	2008-09-20	1	1	M
1508	23061898	4	DÍAZ	TRONCOSO	MATÍAS JAVIER	\N	2009-06-27	1	1	M
1509	22982331	0	ECHAGÜE	IBÁÑEZ	JOSEFA IGNACIA	\N	2009-03-30	1	1	F
1510	23020395	4	GUTIÉRREZ	MUÑOZ	FLORENCIA ANGÉLICA	\N	2009-05-15	1	1	F
1511	22965880	8	JAQUE	NORAMBUENA	EMILIA CONSTANZA	\N	2009-03-07	1	1	F
1512	22751819	7	LARENAS	TOLEDO	SEBASTIÁN IGNACIO	\N	2008-06-24	1	1	M
1513	22784566	K	LEIVA	DINAMARCA	LAURYN PAZ	\N	2008-08-02	1	1	F
1514	22739454	4	MAUREIRA	CONTRERAS	GABRIEL ANDRÉS	\N	2008-06-05	1	1	M
1515	22857650	6	MORALES	CUEVAS	FRANCO BASTIÁN	\N	2008-10-30	1	1	M
1516	22819706	8	MUÑOZ	HIDALGO	SOFÍA MILLARAY	\N	2008-09-11	1	1	F
1517	22781694	5	PENROZ	MORALES	MARTÍN VICENTE	\N	2008-07-28	1	1	M
1518	22802938	6	PARRA	POVEA	CÉSAR BENJAMÍN	\N	2008-08-23	1	1	M
1519	22976800	K	REYES	BARROS	FRANCISCA ANAI	\N	2009-03-22	1	1	F
1520	22721561	5	ROSALES	FLORES	JUAN CARLOS	\N	2008-05-19	1	1	M
1521	22975865	9	VILCHES	HERNÁNDEZ	ANTHONELLA ALEXANDRA	\N	2009-03-21	1	1	F
1522	22986371	1	SOTO	GONZÁLEZ	KARLA ANAHI	\N	2009-03-21	1	1	F
1523	22818173	0	BUSTOS	MUÑOZ	RENATO ANDRÉS	\N	2008-09-13	1	1	M
1524	22982702	2	GUTIÉRREZ	ROJAS	CAMILA TRINIDAD	\N	2009-03-30	1	1	F
1525	22559937	8	ORTEGA	CARTER	JOAQUÍN ALEJANDRO	\N	2007-11-24	1	1	M
1526	22830550	2	RAMÍREZ	NAVARRETE	LUCAS IGNACIO	\N	2008-10-04	1	1	M
1527	22757348	1	ANTÚNEZ	SOBARZO	MIA ANASTASIA	\N	2008-06-29	1	1	F
1528	22829256	7	ARAVENA	CÁRDENAS	FERNANDA ALELÍ	\N	2008-09-23	1	1	F
1529	22632797	5	CÁRCAMO	GONZÁLEZ	MARTINA PAZ	\N	2008-02-05	1	1	F
1530	23015239	K	CASTILLO	MUÑOZ	PEDRO AARON	\N	2009-05-06	1	1	M
1531	22785650	5	CASTRO	MARTIN	SEBASTIÁN ANDRÉS	\N	2008-07-30	1	1	M
1532	22875718	7	CHAVARRÍA	VILLENAS	MARTHINA IGNACIA	\N	2008-11-11	1	1	F
1533	23014142	8	FLORES	MEJÍAS	JULIETA FRANCISCA	\N	2009-04-30	1	1	F
1534	22984029	0	HERNÁNDEZ	NOVOA	JOSEFINA SOFÍA	\N	2009-03-26	1	1	F
1535	22788402	9	HORMAZÁBAL	NORAMBUENA	ANDREE IGNACIO	\N	2008-08-02	1	1	M
1536	23056948	7	MÉNDEZ	MARTÍNEZ	BENJAMÍN ALBERTO	\N	2009-06-24	1	1	M
1537	22837838	0	MUÑOZ	HUERTA	MAITE	\N	2008-10-07	1	1	F
1538	22963387	2	QUINTANA	SALAS	EMILY DANNAE	\N	2009-03-06	1	1	F
1539	22897363	7	REYES	CIFUENTES	GIANFRANCO ANTONIO	\N	2008-12-15	1	1	M
1540	22932037	8	RIVERA	DÍAZ	JUAN PABLO	\N	2009-01-27	1	1	M
1541	22761428	5	VALDERRAMA	COFRÉ	DANIELA NICOLE	\N	2008-07-04	1	1	F
1542	22902632	1	VIVANCO	CASTILLO	ALMENDRA NOEMÍ	\N	2008-12-18	1	1	F
1543	22918439	3	PINILLA	FERNÁNDEZ	MARTÍN TOMÁS	\N	2009-01-12	1	1	M
1544	22728849	3	BRITO	CASTRO	JOSÉ OSVALDO REY	\N	2008-05-25	1	1	M
1545	22918507	1	JORQUERA	SÁNCHEZ	MAITE ARACELY	\N	2009-01-12	1	1	F
1546	22744952	7	GAMINAO	HERNÁNDEZ	DAIRA LIS	\N	2008-05-23	1	1	F
1547	23021217	1	LÓPEZ	CASTRO	ALEJANDRA ANTONIA	\N	2009-05-14	1	1	F
1548	22950570	K	MOLINA	CABALLERO	HUGO ALONSO	\N	2009-02-14	1	1	M
1549	22626636	4	CANDIA	MAUREIRA	CRISTÓBAL AMARO	\N	2008-01-27	1	1	M
1550	22488411	7	FUENTES	URRUTIA	MARTÍN ABRAHAM	\N	2007-08-31	1	1	M
1551	22529275	2	GARRIDO	VÁSQUEZ	FERNANDA BELÉN	\N	2007-10-20	1	1	F
1552	22564483	7	GUTIÉRREZ	BENAVIDES	LEONOR ANTONIA	\N	2007-11-29	1	1	F
1553	22207615	3	HERMOSILLA	GONZÁLEZ	VILMA VICTORIA	\N	2006-09-13	1	1	F
1554	22736013	5	LEIVA	ÁLVAREZ	MAXIMILIANO DAVID	\N	2008-06-04	1	1	M
1555	22448836	K	LÓPEZ	HERNÁNDEZ	ALINE ANTONIA	\N	2007-07-16	1	1	F
1556	22508261	8	MARTÍNEZ	ROCA	MANUEL PATRICIO	\N	2007-09-20	1	1	M
1557	22584957	9	MORA	PARADA	FELIPE ANDRÉS	\N	2007-12-25	1	1	M
1558	22618765	0	MOYA	VARGAS	RENATA OLIVIA	\N	2008-01-20	1	1	F
1559	22870963	8	MUÑOZ	GÓMEZ	BELÉN ANAY	\N	2008-03-15	1	1	F
1560	22575528	0	MUÑOZ	RODRÍGUEZ	JOAQUÍN ANTONIO	\N	2007-12-10	1	1	M
1561	26793776	1	NSENGIYUMVA		EDOUINE	\N	2007-09-26	1	1	M
1562	22559858	4	ROJAS	HENRÍQUEZ	MATÍAS BENJAMÍN	\N	2007-11-26	1	1	M
1563	22414357	5	SOTOMAYOR	ALFARO	DIEGO IGNACIO	\N	2007-06-07	1	1	M
1564	22673632	8	VERGARA	POVEDA	VICENTE AGUSTÍN	\N	2008-03-18	1	1	M
1565	22744567	K	VERGARA	URRUTIA	SOFÍA ANTONIA	\N	2008-06-15	1	1	F
1566	22539583	7	BASTÍAS	ENCINA	ISIDORA ANASTASIA	\N	2007-11-02	1	1	F
1567	22666842	K	FREIRE	PÉREZ	BENJAMÍN ALONSO	\N	2008-03-10	1	1	M
1568	22610412	7	FUENTES	GONZÁLEZ	VICTORIA SOLEDAD	\N	2008-01-15	1	1	F
1569	22541107	7	MUÑOZ	GONZÁLEZ	JAIME NICOLÁS	\N	2007-11-03	1	1	M
1570	22684838	K	PINTO	MORALES	ALONZO AGUSTÍN	\N	2008-03-31	1	1	M
1571	22544056	5	OYARCE	CAMPOS	VALENTINA ESPERANZA	\N	2007-11-06	1	1	F
1572	22706793	4	SOTO	ZAPATA	MATÍAS ALONSO	\N	2008-04-27	1	1	M
1573	22468871	7	BAIGORRI	SÁNCHEZ	AMELI MILENKA	\N	2007-07-27	1	1	F
1574	22479861	K	FIGUEROA	VARGAS	JOSEFA IGNACIA	\N	2007-08-10	1	1	F
1575	22532831	5	MÉNDEZ	MORALES	MADELEINE DARLIN	\N	2007-10-22	1	1	F
1576	22570497	K	ROMERO	QUEUPIL	MARCELO RODRIGO	\N	2007-12-10	1	1	M
1577	22577658	K	SEPÚLVEDA	CARRIÓN	JOAQUÍN IGNACIO	\N	2007-12-06	1	1	M
1578	22467225	K	TAPIA	HERNÁNDEZ	ANAÍS ANTONELA	\N	2007-08-04	1	1	F
1579	22523408	6	CATIL	INOSTROZA	CONSTANZA FRANCISCA	\N	2007-10-08	1	1	F
1580	22517877	1	MANRÍQUEZ	MORÁN	FERNANDA ANTONIA	\N	2007-10-04	1	1	F
1581	22654764	9	FUENTES	GUTIÉRREZ	FERNANDA ANAÍS	\N	2008-02-24	1	1	F
1582	22615674	7	MERCADO	ABURTO	FRANCISCA ANDREA	\N	2008-01-15	1	1	F
1583	22348810	2	LÓPEZ	FLORES	AARON ALEXANDER	\N	2007-03-14	1	1	M
1584	22458907	7	MORALES	CÁCERES	JAVIER ALONSO	\N	2007-07-11	1	1	M
1585	22700585	8	ORTEGA	GUTIÉRREZ	CARLOS ANDRÉS	\N	2008-04-19	1	1	M
1586	22473504	9	PINOCHET	RAMOS	ISAIAS ANDRÉS	\N	2007-08-11	1	1	M
1587	22483441	1	SALGADO	GUTIÉRREZ	TRINIDAD ISIDORA	\N	2007-08-24	1	1	F
1588	22474923	6	SALINAS	SOTO	CONSTANZA BELÉN	\N	2007-08-12	1	1	F
1589	22583189	0	VÁSQUEZ	CHANDÍA	CAMILA IGNACIA	\N	2007-12-17	1	1	F
1590	22625208	8	VÁSQUEZ	MUÑOZ	VICENTE ALEXIS	\N	2008-01-28	1	1	M
1591	22656038	6	VERDUGO	CUEVAS	RENATA IGNACIA CATALINA	\N	2008-02-25	1	1	F
1592	22500692	K	VERGARA	ESCOBAR	FELIPE ANDRÉS	\N	2007-09-14	1	1	M
1593	26824063	2	ZURITA	MUÑOZ	VICENTE IGNACIO	\N	2007-11-25	1	1	M
1594	22665115	2	BERNAL	FUENTES	LUCAS GABRIEL	\N	2008-03-07	1	1	M
1595	22529167	5	GONZÁLEZ	ASTUDILLO	BRANDON RODRIGO	\N	2007-10-19	1	1	M
1596	22466892	9	GONZÁLEZ	NEIRA	MARIANO ANTONIO	\N	2007-08-02	1	1	M
1597	22478609	3	HIDALGO	SILVA	JOSÉ TOMÁS	\N	2007-08-17	1	1	M
1598	22473690	8	HUINCA	ARÁNGUIZ	VICENTE ANTONIO	\N	2007-08-08	1	1	M
1599	22470415	1	IBÁÑEZ	ESCOBAR	JOSÉ MIGUEL	\N	2007-08-06	1	1	M
1600	22373016	7	LASTRA	CASTILLO	FERNANDA EMILIA	\N	2007-04-10	1	1	F
1601	22713218	3	SOTO	SEPÚLVEDA	ANTONIA IGNACIA BEATRIZ	\N	2008-05-05	1	1	F
1602	22664164	5	GUTIÉRREZ	GONZÁLEZ	JOSEFA CRISTIANE	\N	2008-03-07	1	1	F
1603	22750810	8	ALARCÓN	TRONCOSO	PAULA JAVIERA	\N	2008-06-15	1	1	F
1604	22488586	5	ÁLVAREZ	CONSTELA	CRISTIAN ALEJANDRO	\N	2007-09-01	1	1	M
1605	22538641	2	MUÑOZ	ROCA	JAVIER ALEJANDRO	\N	2007-10-24	1	1	M
1606	22702706	1	RAMOS	VÁSQUEZ	TRINIDAD IGNACIA	\N	2008-04-23	1	1	F
1607	22610865	3	RIVAS	SOLÍS	MARTÍN ANDRÉS	\N	2008-01-11	1	1	M
1608	22452497	8	ÁVILA	VÁSQUEZ	MATILDE NOEMÍ	\N	2007-07-20	1	1	F
1609	22555705	5	BARROS	ORELLANA	VILARIHT ESTER	\N	2007-11-16	1	1	F
1610	22667971	5	BUSTAMANTE	CANALES	BENJAMÍN ALONSO	\N	2008-03-09	1	1	M
1611	22571499	1	ARENAS	VENEGAS	FRANCISCA IGNACIA	\N	2007-12-07	1	1	F
1612	22501025	0	ALARCÓN	MUÑOZ	BENJAMÍN AGUSTÍN	\N	2007-09-18	1	1	M
1613	22646868	4	JORQUERA	GUAJARDO	CRISTÓBAL MATEO	\N	2008-02-18	1	1	M
1614	22593117	8	CALDERÓN	JILBERTO	CAROLINA PAZ	\N	2008-01-01	1	1	F
1615	22589631	3	CERDA	LÓPEZ	GERALDY BELÉN	\N	2007-12-23	1	1	F
1616	22436971	9	CONTRERAS	CATALÁN	MACKARENA ANTONIA	\N	2007-07-09	1	1	F
1617	22357866	7	DÍAZ	PINO	SIMÓN FELIPE	\N	2007-03-23	1	1	M
1618	22539394	K	FUENTES	LAGOS	ISIDORA TRINIDAD	\N	2007-10-26	1	1	F
1619	22754798	7	GARCÍA	TRONCOSO	ANA MARTINA TABITA	\N	2008-06-26	1	1	F
1620	22524444	8	GONZÁLEZ	ANDRADE	DANAE VICTORIA	\N	2007-10-15	1	1	F
1621	22727262	7	GONZÁLEZ	TAPIA	ANGELA PATRICIA	\N	2008-05-23	1	1	F
1622	22443755	2	LUPALLANTE	GONZÁLEZ	LAURA VERÓNICA	\N	2007-07-10	1	1	F
1623	22504945	9	MARCHANT	ROCA	RENATO LUIS	\N	2007-09-23	1	1	M
1624	22446501	7	PÉREZ	SALINAS	FLORENCIA IGNACIA	\N	2007-07-09	1	1	F
1625	22446527	0	PÉREZ	SALINAS	RENATA DEL CARMEN	\N	2007-07-09	1	1	F
1626	22340372	7	QUEZADA	MARCHANT	FLORENCIA	\N	2007-02-23	1	1	F
1627	22340386	7	QUEZADA	MARCHANT	JOSEFA	\N	2007-02-23	1	1	F
1628	22728802	7	RETAMAL	GAETE	ANGELO BENJAMÍN	\N	2008-05-15	1	1	M
1629	22554432	8	REYES	ZURITA	JAVIERA CONSTANZA	\N	2007-11-20	1	1	F
1630	22728108	1	SAGREDO	BARROS	EDWIN AMARO	\N	2008-05-22	1	1	M
1631	22622129	8	SEPÚLVEDA	REYES	FERNANDA ISIDORA	\N	2008-01-26	1	1	F
1632	22692448	5	TAPIA	RAMÍREZ	EMYLY CONSTANSA	\N	2008-04-13	1	1	F
1633	22435895	4	VÁSQUEZ	VEGA	MACARENA PÍA	\N	2007-07-03	1	1	F
1634	22689297	4	VIVANCO	LUENGO	MARTÍN ANDRÉS	\N	2008-04-06	1	1	M
1635	22448468	2	ZAPATA	BARRERA	JAVIERA MONSERRAT	\N	2007-07-17	1	1	F
1636	21823813	0	VILLALOBOS	ACUÑA	EMIRY GHISLEINE ANTONIA	\N	2005-04-23	1	1	F
1637	22342332	9	CONTRERAS	BRAVO	EMILIA DE LA PAZ	\N	2007-03-01	1	1	F
1638	22115902	0	QUIROZ	URIBE	PATRICIO ANDRES	\N	2006-05-04	1	1	M
1639	22567646	1	ZÚÑIGA	PARRA	ANDRÉS ALEXANDER	\N	2007-11-28	1	1	M
1640	22485182	0	ALARCÓN	MELLA	ALISON ANDREA	\N	2007-08-16	1	1	F
1641	22668693	2	ARAVENA	GONZÁLEZ	ELIZABET JUDITH	\N	2008-03-12	1	1	F
1642	22578493	0	CÁRCAMO	MONTECINOS	JEREMÍAS ALEJANDRO	\N	2007-12-13	1	1	M
1643	22512640	2	PINCHEIRA	TORRES	CAMILA ANTONIA	\N	2007-09-28	1	1	F
1644	22535671	8	AGUILERA	RAMIREZ	EMILIA ANAIS	\N	2007-10-27	1	1	F
1645	22430391	2	MOLINA	CABALLERO	ISABEL	\N	2007-06-26	1	1	F
1646	22529140	3	ARAYA	VALVERDE	VALENTINA ALEXANDRA	\N	2007-10-19	1	1	F
1647	22586311	3	ESQUIVEL	ARCOS	SOFÍA ELENA ANDREA	\N	2007-12-21	1	1	F
1648	22536862	7	VALDÉS	BARAHONA	AGUSTÍN IGNACIO	\N	2007-10-24	1	1	M
1649	22465282	8	ANDAUR	CONCHA	FRANCISCO AGUSTÍN	\N	2007-07-31	1	1	M
1650	26780985	2	AGUILAR	ABANTO	NAOMI BRIGITTE	\N	2006-08-12	1	1	F
1651	22407881	1	ALEGRÍA	RETAMAL	TOMÁS ALEJANDRO	\N	2007-05-28	1	1	M
1652	22554394	1	BARROS	MÉNDEZ	TANIA ANDREA	\N	2007-11-16	1	1	F
1653	22290941	4	CARRASCO	CANALES	JOHAN BENJAMÍN IGNACIO	\N	2006-12-23	1	1	M
1654	22378429	1	CASTILLO	SEPÚLVEDA	RAÚL ANTONIO	\N	2007-04-15	1	1	M
1655	22519711	3	CAYUQUEO	LUENGO	BENJAMÍN ALBERTO	\N	2007-10-05	1	1	M
1656	22713021	0	CIFUENTES	FLORES	DANIEL ALEJANDRO	\N	2008-05-04	1	1	M
1657	22468784	2	FREIRE	SOTO	JUAN MANUEL	\N	2007-08-05	1	1	M
1658	22406773	9	HERRERA	ZEPEDA	MARTINA MONSERRAT	\N	2007-05-21	1	1	F
1659	22511297	5	MEDEL	MORAGA	EMILY DANAE	\N	2007-09-27	1	1	F
1660	22575220	6	GONZÁLEZ	MUÑOZ	ISIDORA ORNELLA	\N	2007-12-11	1	1	F
1661	22695207	1	MEZA	CASTILLO	NICOLÁS ESTEBAN	\N	2008-04-04	1	1	M
1662	22505126	7	MORA	VILLEGAS	TEODORO	\N	2007-09-22	1	1	M
1663	22708525	8	MORALES	BARROS	FRANCO ELÍAS	\N	2008-05-01	1	1	M
1664	22683676	4	ORREGO	VALENZUELA	CRISTINA VANESSA	\N	2008-03-29	1	1	F
1665	22426892	0	VALDÉS	GANA	VICENTE ANTONIO	\N	2007-06-07	1	1	M
1666	22404891	2	VIDAL	ESPINOZA	DAVID ALONSO	\N	2007-05-23	1	1	M
1667	22656496	9	ARMIJO	ALARCÓN	ISIDORA PAZ	\N	2008-02-29	1	1	F
1668	22663978	0	AVENDAÑO	TAPIA	BASTHIAN ANDRÉS	\N	2008-03-09	1	1	M
1669	22725808	K	MOLINA	MUÑOZ	IVANIA JULIETTE	\N	2008-05-20	1	1	F
1670	22739887	6	MUÑOZ	REYES	BENJAMÍN TOMÁS	\N	2008-06-08	1	1	M
1671	22614843	4	OLIVOS	MUÑOZ	MARGARITA CLARETT	\N	2007-12-08	1	1	F
1672	22447916	6	URIBE	GONZÁLEZ	BELÉN IGNACIA	\N	2007-07-11	1	1	F
1673	22654845	9	SALGADO	LARA	BENJAMÍN ANDRÉS	\N	2008-02-23	1	1	M
1674	22640192	K	LAGOS	GRANDÓN	GUSTAVO ANDRÉS	\N	2008-02-11	1	1	M
1675	22560929	2	HERNÁNDEZ	CASTILLO	MAIKEL JORDÁN	\N	2007-11-17	1	1	M
1676	22718382	9	RETAMAL	ASCENCIO	VICENTE ANDRÉS	\N	2008-05-09	1	1	M
1677	22740718	2	RIQUELME	CASTILLO	NICOLE ANDREA	\N	2008-06-08	1	1	F
1678	22357103	4	BELDA	HERRERA	EDUARDO FÉLIX	\N	2007-03-14	1	1	M
1679	22726484	5	ARAVENA	VÁSQUEZ	TOMÁS ANDRÉS	\N	2008-05-19	1	1	M
1680	22352720	5	VIVANCO	MOLINA	AGUSTINA JESÚS	\N	2007-03-16	1	1	F
1681	22477578	4	CAMPOS	OLAVE	JAVIERA FRANCISCA	\N	2007-08-15	1	1	F
1682	22201923	0	MONSALVE	VÁSQUEZ	BENJAMIN ANTONIO	\N	2006-08-30	1	1	M
1683	22478837	1	AGURTO	NORAMBUENA	MAIKOL JAVIER	\N	2007-08-14	1	1	M
1684	22490125	9	BUSTAMANTE	BUSTAMANTE	FELIPE ALONZO	\N	2007-09-02	1	1	M
1685	22600810	1	CAMPOS	MORAGA	JAVIERA ANDREA	\N	2008-01-11	1	1	F
1686	22583269	2	BARRERA	SAAVEDRA	ALEX CRISTÓBAL	\N	2007-12-21	1	1	M
1687	22568202	K	DÍAZ	GUTIÉRREZ	TANIA ANAHI	\N	2007-11-30	1	1	F
1688	22546776	5	FIGUEROA	LEIVA	KARINA BELÉN	\N	2007-11-11	1	1	F
1689	22654379	1	FUENTES	RÍOS	ANGEL DE JESÚS GABRIEL	\N	2008-02-25	1	1	M
1690	22492653	7	MÉNDEZ	BAEZA	MARÍA IGNACIA	\N	2007-09-05	1	1	F
1691	25407538	8	MONTOYA	BETANCUR	JUAN DIEGO	\N	2007-11-20	1	1	M
1692	22492624	3	MUÑOZ	FUENTES	RICARDO ANTONIO	\N	2007-09-02	1	1	M
1693	22545662	3	MUÑOZ	MUÑOZ	ROCÍO LEONOR	\N	2007-11-05	1	1	F
1694	22518024	5	ORELLANA	YÁÑEZ	FELIPE ALONSO	\N	2007-10-03	1	1	M
1695	22692420	5	RÍOS	CONTRERAS	RUTH ANTONIA	\N	2008-04-08	1	1	F
1696	22381851	K	ROA	GONZÁLEZ	OLIVER EDUARDO	\N	2007-04-20	1	1	M
1697	22708317	4	VENEGAS	HIDALGO	BASTIÁN IGNACIO	\N	2008-04-27	1	1	M
1698	22152379	2	SALDÍAS	JARA	JAVIER ALONSO	\N	2006-06-29	1	1	M
1699	22352684	5	VIVANCO	MOLINA	MAITE DE LOS ANGELES	\N	2007-03-16	1	1	F
1700	22726078	5	BARROS	ZAGAL	CATALINA ALEXIA	\N	2008-05-15	1	1	F
1701	22643697	9	ARAYA	OLIVEROS	DENIS FERNANDA	\N	2008-02-11	1	1	F
1702	22510149	3	HORMAZÁBAL	ESPINOZA	ESCARLET ANDREA	\N	2007-09-27	1	1	F
1703	22485202	9	URRA	PARRA	TOMÁS JAVIER	\N	2007-08-27	1	1	M
1704	22516321	9	ALFARO	CASTILLO	HANNIBAL ALONSO	\N	2007-10-04	1	1	M
1705	22422156	8	CATRICURA	VILLALOBOS	CRISTIAN ANDRÉS	\N	2007-06-18	1	1	M
1706	22536056	1	CHÁVEZ	TAPIA	JOSÉ TOMÁS	\N	2007-10-26	1	1	M
1707	22373611	4	HERNÁNDEZ	VALDÉS	IGNACIO ALFREDO	\N	2007-04-11	1	1	M
1708	22738140	K	ÓRDENES	ROJAS	VALESKA ALEJANDRA	\N	2008-05-26	1	1	F
1709	22397757	K	LOYOLA	PÉREZ	ALONSO FABIÁN	\N	2007-05-14	1	1	M
1710	22598162	0	SAGREDO	ARCAYA	ALMENDRA JESÚS	\N	2008-01-06	1	1	F
1711	22715176	5	SERÓN	ARANCIBIA	MAYRA IGNACIA	\N	2008-05-08	1	1	F
1712	22475128	1	FONSECA	ALBORNOZ	ANTONIETA ELIZABETH	\N	2007-08-14	1	1	F
1713	22588973	2	GUZMÁN	VALLEJOS	BASTIÁN ALEXANDER	\N	2007-12-27	1	1	M
1714	21945614	K	TRONCOSO	BARROS	JEREMY ALEXANDER	\N	2005-09-25	1	1	M
1715	22669200	2	ORO	REYES	BENJAMÍN CRISTÓBAL	\N	2008-03-13	1	1	M
1716	22488296	3	BARROS	CASANOVA	MÁXIMO ANTONIO	\N	2007-09-01	1	1	M
1717	22646800	5	CARRASCO	CUEVAS	CATALINA FERNANDA	\N	2008-01-31	1	1	F
1718	22615475	2	CARVAJAL	REYES	YOVANNY YULY	\N	2008-01-17	1	1	M
1719	22636898	1	FARIÑA	PARRA	DIEGO ALEJANDRO	\N	2008-02-06	1	1	M
1720	22358314	8	FUENTES	ALARCÓN	COLOMBA ANAÍS DANIELA	\N	2007-03-13	1	1	F
1721	21910984	9	GARRIDO	GALDAMES	GERALD HERNÁN	\N	2005-07-11	1	1	M
1722	22600679	6	HIDALGO	CISTERNA	DANIEL MATEO ELEAZAR	\N	2008-01-04	1	1	M
1723	22511337	8	MUÑOZ	LABRA	MATÍAS FELIPE	\N	2007-09-30	1	1	M
1724	22528010	K	ORREGO	FLORES	DIEGO ALEJANDRO	\N	2007-10-15	1	1	M
1725	22634373	3	RECABAL	ULLOA	ALONSO ANDRÉS	\N	2008-02-07	1	1	M
1726	22636606	7	RIVAS	VERGARA	BENJAMÍN ESTEBAN	\N	2008-02-06	1	1	M
1727	22581846	0	SILVA	VASQUEZ	CATALINA ALMENDRA	\N	2007-12-06	1	1	F
1728	22581821	5	SILVA	VASQUEZ	HECTOR ALFONSO	\N	2007-12-06	1	1	M
1729	22555558	3	VERGARA	FUENTES	ALONSO JONAS	\N	2007-11-19	1	1	M
1730	22678730	5	VISTOSO	SANHUEZA	VALENTINA CELESTE	\N	2008-03-24	1	1	F
1731	22401154	7	CONCHA	AGUILAR	BENJAMÍN JESÚS CÉSAR	\N	2007-05-17	1	1	M
1732	21586532	0	VALDÉS	MUÑOZ	PATRICIO IGNACIO	\N	2004-05-20	1	1	M
1733	100582265	K	PEREZ	MORENO	JUAN MIGUEL	\N	2008-02-04	1	1	M
1734	22556969	K	ESPARZA	HERNÁNDEZ	MARTÍN VICENTE	\N	2007-11-24	1	1	M
1735	22566553	2	ALIAGA	SILVA	AIDAN EMILIO ANTONIO	\N	2007-11-26	1	1	M
1736	22479583	1	RÍOS	TORO	ELIZABETH NOEMÍ	\N	2007-08-18	1	1	F
1737	22519886	1	JOFRÉ	URIBE	VALENTINA FARA	\N	2007-10-06	1	1	F
1738	22684638	7	ÁLVAREZ	ESPINOSA	FABIANNE ALEXANDRA	\N	2008-03-29	1	1	F
1739	22659961	4	CASTILLO	SALDAÑA	VICTORIA PAZ	\N	2008-02-27	1	1	F
1740	22563585	4	SEPÚLVEDA	FRIZ	CATALINA PAZ	\N	2007-11-28	1	1	F
1741	22368505	6	QUINTANA	REYES	VICTORIA IGNACIA	\N	2007-03-02	1	1	F
1742	22510818	8	ORTEGA	FLORES	EIILYN ANTONELLA	\N	2007-09-25	1	1	F
1743	22742952	6	MEZA	MÉNDEZ	TANIA LORENA	\N	2008-06-04	1	1	F
1744	22495395	K	ORTIZ	BARROS	MADELEYNE HELENA	\N	2007-09-07	1	1	F
1745	22672205	K	QUIJADA	RUIZ	TYARE PAOLA	\N	2008-03-19	1	1	F
1746	22719237	2	VENEGAS	CANALES	ALONSO EDUARDO	\N	2008-05-13	1	1	M
1747	22540017	2	CANCINO	SOTO	JAIRO JUAQUIN	\N	2007-10-30	1	1	M
1748	22566815	9	CERÓN	REBOLLEDO	KATERIN JOSEFINA LOURDES	\N	2007-12-02	1	1	F
1749	22538426	6	CONCHA	BARRÍA	RENATO ANDRÉS	\N	2007-10-30	1	1	M
1750	22524020	5	FUENTES	LÓPEZ	CONSTANZA BEATRIZ	\N	2007-10-10	1	1	F
1751	22288539	6	GARCIA	MUÑOZ	DIEGO ALEJANDRO	\N	2006-12-24	1	1	M
1752	22615215	6	JORQUERA	MUÑOZ	LETICIA ANTONIA	\N	2008-01-15	1	1	F
1753	22699666	4	LABRAÑA	ACEITÓN	MAYTTE ANTONIA	\N	2008-04-19	1	1	F
1754	22091108	K	ARRIAGADA	VALDÉS	MARTIN ALONSO	\N	2006-04-07	1	1	M
1755	22500449	8	ASTUDILLO	ASTUDILLO	BELÉN DEL ROSARIO	\N	2007-09-13	1	1	F
1756	22446190	9	BUSTAMANTE	MATTAMALA	BASTIÁN VICENTE	\N	2007-07-12	1	1	M
1757	26422439	K	CALDERON	CHAVES	SARA NICOLH	\N	2007-11-08	1	1	F
1758	22516280	8	MARTÍNEZ	ARAYA	MATEO FRANCISCO	\N	2007-09-30	1	1	M
1759	22446021	K	MARTÍNEZ	CHÁVEZ	CLAUDIO NICOLÁS	\N	2007-07-13	1	1	M
1760	22468049	K	MUÑOZ	FLORES	CONSTANZA ROSENDA	\N	2007-07-26	1	1	F
1761	22552647	8	OSSES	ZÁRATE	MARTÍN ALEXANDER	\N	2007-11-15	1	1	M
1762	22472212	5	PALMA	LÓPEZ	MÁXIMO ALONSO	\N	2007-08-07	1	1	M
1763	22162655	9	RAMIREZ	DROGUETT	VICENTE ARIEL	\N	2006-07-13	1	1	M
1764	22501244	K	ROSALES	CONTRERAS	BENJAMÍN EDUARDO	\N	2007-09-14	1	1	M
1765	21876236	0	SAGAL	CERDA	PEDRO ALI	\N	2005-06-30	1	1	M
1766	22705125	6	SARAVIA	BUSTAMANTE	FERNANDA ISABELLA	\N	2008-04-24	1	1	F
1767	22212169	8	MÉNDEZ	ROJAS	BRANDON SCOTT	\N	2006-09-21	1	1	M
1768	22709152	5	VELOZO	VALDES	CHRISTOBAL FREDERICH	\N	2008-04-23	1	1	M
1769	22551964	1	OLIVOS	VENEGAS	NAYEL ARATZI	\N	2007-11-08	1	1	F
1770	22564980	4	IBÁÑEZ	FUENTES	JAIME ANTONIO	\N	2007-11-29	1	1	M
1771	22675592	6	MONTECINO	BARROS	NAYARED VIERNEI	\N	2008-03-19	1	1	F
1772	22777245	K	VENEGAS	CORTÉS	HANS ALBERT	\N	2008-06-22	1	1	M
1773	22618689	1	ANTÚNEZ	ARAVENA	ISIDORA CONSTANZA	\N	2008-01-22	1	1	F
1774	22379999	K	CASTRO	MUÑOZ	VICENTE IGNACIO SEBASTIÁN	\N	2007-04-21	1	1	M
1775	22747900	0	TORRES	JARA	DIEGO HERNÁN	\N	2008-06-13	1	1	M
1776	22578219	9	TAPIA	CERDA	VICENTE IGNACIO	\N	2007-12-18	1	1	M
1777	22539254	4	VEGA	MUÑOZ	GENESIS VALENTINA	\N	2007-10-29	1	1	F
1778	22211952	9	CAMPOS	BUENO	JULIAN ALBERTO	\N	2006-09-11	1	1	M
1779	22690868	4	POVEDA	FUENTES	SAMUEL ELEAZAR	\N	2008-03-18	1	1	M
1780	22546126	0	AGUILAR	BRAVO	ALONSO ANDRÉS	\N	2007-11-09	1	1	M
1781	22299522	1	ALEGRÍA	YAÑEZ	POLET IGNACIA	\N	2006-12-31	1	1	F
1782	21917509	4	CASTRO	VÁSQUEZ	TOMÁS AMARO	\N	2005-08-27	1	1	M
1783	22351122	8	CORDERO	BECERRA	LUCAS ALEJANDRO	\N	2007-03-09	1	1	M
1784	22648217	2	GARCES	CAMPOS	KATHERINE ANAHI	\N	2008-02-16	1	1	F
1785	22638951	2	IBÁÑEZ	LINEROS	BENJAMÍN ALONSO	\N	2008-02-08	1	1	M
1786	22609240	4	LAGOS	ASENJO	VICENTE ESTEBAN	\N	2008-01-11	1	1	M
1787	22596695	8	LÓPEZ	BUSTAMANTE	JAVIERA ANTONIA	\N	2007-12-26	1	1	F
1788	22445945	9	MORALES	BRAVO	FERNANDA MASSIEL	\N	2007-07-12	1	1	F
1789	22301704	5	ORTEGA	MARTÍNEZ	FELIPE IGNACIO	\N	2007-01-09	1	1	M
1790	22687026	1	PINOCHET	INOSTROZA	ALEXANDRA JASMÍN	\N	2008-04-01	1	1	F
1791	23038755	9	PINTO	CONTRERAS	JOAQUÍN IGNACIO	\N	2007-09-10	1	1	M
1792	22746619	7	RETAMAL	MOYA	CAMILA ANTONIA	\N	2008-06-18	1	1	F
1793	22106425	9	RODRÍGUEZ	REYES	BASTIAN RICARDO	\N	2006-04-29	1	1	M
1794	22698207	8	SEGURA	VILCHES	MARTÍN ALONSO	\N	2008-04-17	1	1	M
1795	22664728	7	SEPÚLVEDA	RUBIO	MARTÍN MARCELO	\N	2008-03-07	1	1	M
1796	22670404	3	SEPÚLVEDA	SIERRA	GABRIEL ALEJANDRO	\N	2008-03-13	1	1	M
1797	22561551	9	VEGA	CAMPOS	DIEGO THOMÁS	\N	2007-11-28	1	1	M
1798	22643061	K	ALARCÓN	JORQUERA	FRANCISCA GABRIELA	\N	2008-02-15	1	1	F
1799	22517317	6	CARO	PALMA	MELIZA MAGDALENA	\N	2007-10-05	1	1	F
1800	22644981	7	CIFUENTES	SANDOVAL	ANAHIS IGNACIA	\N	2008-02-11	1	1	F
1801	22248429	4	ZAMORANO	PINO	BIANKA ANAHÍ	\N	2006-10-28	1	1	F
1802	22406078	5	GAJARDO	SALAZAR	MAXIMILIANO NIKOLAS	\N	2007-05-27	1	1	M
1803	22680982	1	LEIVA	URIBE	JAVIERA IGNACIA	\N	2008-03-26	1	1	F
1804	22624307	0	MARTÍNEZ	SALGADO	CRISTOFER DAVID	\N	2008-01-08	1	1	M
1805	22474568	0	MUÑOZ	MARTÍNEZ	GUILLERMO JOAQUÍN	\N	2007-08-13	1	1	M
1806	22489839	8	PARADA	RETAMAL	YANELA ANTONIA	\N	2007-09-02	1	1	F
1807	22675444	K	VÁSQUEZ	REBOLLEDO	YANELLA ANTONIA	\N	2008-03-22	1	1	F
1808	22252953	0	DURAN	DÍAZ	CAMILO ESTEBAN	\N	2006-10-28	1	1	M
1809	22663066	K	SANHUEZA	OSSES	ANTONELA VALENTINA	\N	2008-02-28	1	1	F
1810	22562188	8	VALDEBENITO	TRONCOSO	IVAN ANTONIO	\N	2007-11-28	1	1	M
1811	22631653	1	ABARZÚA	CONTRERAS	VICENTE SEBASTIÁN	\N	2008-02-01	1	1	M
1812	22492621	9	PEÑALOZA	SEPÚLVEDA	JOHANS MATÍAS	\N	2007-08-10	1	1	M
1813	22412104	0	REYES	ARREDONDO	JOAQUÍN IGNACIO	\N	2007-06-02	1	1	M
1814	22526610	7	RIVAS	VERGARA	JAVIERA IGNACIA	\N	2007-10-10	1	1	F
1815	22704028	9	RIVERO	CASTILLO	RENATO AGUSTÍN	\N	2008-04-23	1	1	M
1816	22672689	6	RUMINOT	ARAYA	ANGELL DEL CARMEN	\N	2008-03-17	1	1	F
1817	22618481	3	VALDÉS	CORVALÁN	RAQUEL SILVANA	\N	2008-01-21	1	1	F
1818	22585549	8	VÁSQUEZ	LAGOS	MATHIAS FRANCISCO ANTONIO	\N	2007-12-21	1	1	M
1819	22528484	9	VERGARA	GONZÁLEZ	ESTEBAN CAMILO	\N	2007-10-11	1	1	M
1820	22590342	5	ARAVENA	ASTUDILLO	YANEL DENIS	\N	2007-12-30	1	1	F
1821	22619198	4	BELTRAN	CERDA	SOFÍA ANTONIA	\N	2008-01-21	1	1	F
1822	27185532	K	CARRASCO	YACOUB	LEONARDO ENRIQUE	\N	2007-01-19	1	1	M
1823	22561574	8	CARRIÓN	GONZÁLEZ	VALENTINA PAZ	\N	2007-11-19	1	1	F
1824	22417999	5	CASTILLO	REBOLLEDO	JOSÉ PABLO	\N	2007-06-11	1	1	M
1825	22596595	1	JARA	URRA	ABDIAS BARUC	\N	2008-01-06	1	1	M
1826	22629325	6	LASTRA	MORENO	PÍA PASCUALA	\N	2008-01-30	1	1	F
1827	22477642	K	LÓPEZ	MONSALVE	PAZ CAROLINA	\N	2007-08-16	1	1	F
1828	22140560	9	MAUREIRA	NORAMBUENA	ANTONIA BELEN	\N	2006-06-16	1	1	F
1829	22250680	8	MEDEL	VERGARA	JOSEFA GIULLIANA	\N	2006-10-21	1	1	F
1830	22324891	8	MELLA	CARRIÓN	MATÍAS IGNACIO	\N	2007-02-07	1	1	M
1831	22578155	9	MORALES	MEYNARD	MATÍAS FRANCISCO	\N	2007-12-03	1	1	M
1832	22147389	2	PARRA	RODRÍGUEZ	SEBASTIAN DANIEL	\N	2006-06-24	1	1	M
1833	22666882	9	TRONCOSO	TRONCOSO	MATEO IGNACIO	\N	2008-03-10	1	1	M
1834	22552609	5	SEPÚLVEDA	BARROS	MARTÍN ANDRÉS	\N	2007-11-15	1	1	M
1835	22670435	3	AGUILERA	SEPÚLVEDA	ALEX BENJAMÍN	\N	2008-03-17	1	1	M
1836	22436826	7	GÓMEZ	GÓMEZ	JOSÉ MANUEL	\N	2007-07-06	1	1	M
1837	22525676	4	MUÑOZ	MOREIRA	CONSTANZA ANTONIA	\N	2007-10-08	1	1	F
1838	22151399	1	RECABAL	HERNÁNDEZ	FERNANDO CRISTOBAL	\N	2006-06-27	1	1	M
1839	22565000	4	CHÁVEZ	MOLINA	MATEO MANUEL	\N	2007-12-01	1	1	M
1840	22163817	4	PEDERNERA	GANGA	TATIANA MILLARAY	\N	2006-06-29	1	1	F
1841	22625124	3	GONZÁLEZ	SALGADO	ROMINA VALESCA	\N	2008-01-25	1	1	F
1842	22384802	8	NOVOA	GONZÁLEZ	RAFAEL IGNACIO	\N	2007-04-27	1	1	M
1843	22656724	0	VALLEJOS	CASTRO	COLOMBA ANTONIA	\N	2008-02-27	1	1	F
1844	22655808	K	ARAYA	BRAVO	BENJAMÍN IGNACIO	\N	2008-02-27	1	1	M
1845	22543285	6	BADILLA	ZÁRATE	EMILIA ANASTASIA	\N	2007-11-03	1	1	F
1846	22475855	3	BEAUTROFF	TRONCOSO	ANAÍS ALEJANDRA	\N	2007-08-13	1	1	F
1847	22600422	K	CISTERNA	PARRA	CONSTANZA EMILIA	\N	2008-01-07	1	1	F
1848	22728204	5	PARDO	CABRERA	ÁLVARO BENJAMÍN DE JESÚS	\N	2008-05-20	1	1	M
1849	22488901	1	VIVANCO	ASTUDILLO	ANNIBAL NICKOLAS ALEJANDRO	\N	2007-08-30	1	1	M
1850	22624638	K	ZAMBRANO	FUENTES	SOFÍA DOMINIC	\N	2008-01-28	1	1	F
1851	22541736	9	CONTRERAS	URRUTIA	DIEGO ENRIQUE	\N	2007-10-31	1	1	M
1852	22608079	1	DURÁN	CÁCERES	CRISTÓBAL VICENTE	\N	2008-01-09	1	1	M
1853	22099127	K	ESCÁRATE	SCHEEL	JOAQUÍN EDUARDO	\N	2006-04-19	1	1	M
1854	22535993	8	SANDOVAL	CISTERNAS	MATÍAS ANDRÉS	\N	2007-10-11	1	1	M
1855	22686375	3	TAPIA	CEA	MATÍAS ALONSO	\N	2008-04-02	1	1	M
1856	22725709	1	VARAS	RUIZ	FERNANDA CAROLINA	\N	2008-05-22	1	1	F
1857	22583185	8	VÁSQUEZ	IBÁÑEZ	CRISTIAN ANDRÉS	\N	2007-12-18	1	1	M
1858	22435549	1	MUÑOZ	VALENZUELA	CONSTANZA STEFANIA	\N	2007-07-01	1	1	F
1859	22458580	2	NUPALLANTE	VÁSQUEZ	TERESA CATALINA	\N	2007-07-22	1	1	F
1860	22426258	2	OLIVARES	VARGAS	BENJAMÍN RICARDO	\N	2007-06-16	1	1	M
1861	22478764	2	GRANDÓN	VIVANCO	SAYEN CONSTANSA	\N	2007-08-20	1	1	F
1862	22386457	0	HENRIQUEZ	QUEZADA	RICARDO ANDRÉS	\N	2007-04-23	1	1	M
1863	22618033	8	JORQUERA	MACAYA	FELIPE ALONZO	\N	2008-01-20	1	1	M
1864	22432171	6	LOBOS	SILVA	ALISON BELÉN	\N	2007-06-28	1	1	F
1865	22725114	K	MENDOZA	SANHUEZA	NICOLÁS	\N	2008-05-20	1	1	M
1866	22543537	5	MUÑOZ	MORALES	CAMILO LEÓN	\N	2007-10-12	1	1	M
1867	22695634	4	BURGOS	NORAMBUENA	ROBERTO ALONSO	\N	2008-04-15	1	1	M
1868	22053669	6	RIVERA	ACUÑA	MATIAS NICOLAS	\N	2006-02-13	1	1	M
1869	22272846	0	MILLA	PRADENAS	DANIELA MILLARAI	\N	2006-12-02	1	1	F
1870	22636587	7	MONTANARI	SKINNER	ANTONELLA LUCÍA	\N	2008-02-08	1	1	F
1871	22198126	K	RETAMAL	BUSTAMANTE	CATALINA LUCIA	\N	2006-08-30	1	1	F
1872	22698405	4	SÁNCHEZ	RIQUELME	BENJAMÍN JAVIER	\N	2008-04-15	1	1	M
1873	22470179	9	VALDÉS	DÍAZ	VANESSA SCARLETH	\N	2007-08-01	1	1	F
1874	22275296	5	GONZÁLEZ	LÓPEZ	REYNALDO ANTONIO	\N	2006-12-04	1	1	M
1875	22571929	2	CASTRO	CARRASCO	PABLO BRUNO	\N	2007-12-06	1	1	M
1876	22750915	5	ROJAS	CABEZAS	JENIFFER ANTONIA	\N	2008-06-16	1	1	F
1877	22496765	9	LETELIER	ANTÚNEZ	MATÍAS ALEJANDRO	\N	2007-09-03	1	1	M
1878	22399389	3	LUENGO	MAUREIRA	AMAYA FRANCISCA	\N	2007-05-17	1	1	F
1879	22492712	6	MERINO	HEVIA	GABRIEL EDUARDO	\N	2007-08-29	1	1	M
1880	22641231	K	MUÑOZ	FUENTEALBA	SARAI BELÉN	\N	2008-02-11	1	1	F
1881	22647490	0	MUÑOZ	GUZMÁN	EMILLY ANAHIS	\N	2008-02-20	1	1	F
1882	22583030	4	MUÑOZ	MUÑOZ	CRISTIAN GABRIEL ALBERTO	\N	2007-12-21	1	1	M
1883	22609595	0	PEREIRA	LUENGO	ALEX MATHEW	\N	2008-01-07	1	1	M
1884	22675465	2	PINO	MUÑOZ	CATALINA AGUSTINA	\N	2008-03-22	1	1	F
1885	22718329	2	ROSALES	MUÑOZ	JOSÉ EZEQUIEL	\N	2008-05-11	1	1	M
1886	22634913	8	SÁNCHEZ	MOSQUEIRA	MARTÍN ALONSO	\N	2008-02-06	1	1	M
1887	22273942	K	CABEZAS	GODOY	JAVIERA ANAÍS	\N	2006-12-03	1	1	F
1888	22351651	3	CALDERON	GONZÁLEZ	LUCAS MARTÍN	\N	2007-03-11	1	1	M
1889	22143899	K	DOMÍNGUEZ	YAÑEZ	JULIETA ANTONIA	\N	2006-06-22	1	1	F
1890	22414288	9	ENCINA	CORTÉS	MATÍAS ALONSO	\N	2007-05-29	1	1	M
1891	22612788	7	GONZÁLEZ	RAMÍREZ	MAXIMILIANO ESTEBAN	\N	2008-01-05	1	1	M
1892	22683634	9	GUTIÉRREZ	CERVA	TRINIDAD ALEJANDRA	\N	2008-03-28	1	1	F
1893	22276654	0	GUTIÉRREZ	CERVA	SEBASTIÁN ALBERTO	\N	2006-12-07	1	1	M
1894	22551242	6	VALDEBENITO	DIÉGUEZ	MONTSERRAT IGNACIA	\N	2007-11-14	1	1	F
1895	22554472	7	VALDIVIESO	ARAYA	BASTIÁN ANDRÉS	\N	2007-11-19	1	1	M
1896	22507193	4	VILLEGAS	CHANDÍA	CLAUDIO ANDRÉS	\N	2007-09-24	1	1	M
1897	22666805	5	VIVALLO	ESPINOZA	RENATO BENJAMÍN	\N	2008-03-07	1	1	M
1898	22612950	2	YÁÑEZ	CASTILLO	MATÍAS LEONARDO	\N	2008-01-16	1	1	M
1899	22644562	5	YAVAR	CABRERA	MADELYNE FERNANDA	\N	2008-02-14	1	1	F
1900	22554529	4	ZURITA	ALARCÓN	JUSTHYNG ALEXANDER	\N	2007-11-18	1	1	M
1901	22487794	3	RETAMAL	GUTIÉRREZ	MARTÍN CAMILO ANDRÉS	\N	2007-08-27	1	1	M
1902	22480591	8	PIZARRO	PALMA	ANTONNELLA PAZ AYHELEN	\N	2007-08-10	1	1	F
1903	22674453	3	RIQUELME	GÓMEZ	CATALINA GABRIELA	\N	2008-03-19	1	1	F
1904	22596313	4	VILLEGAS	FUENTEALBA	CATALINA VALENTINA	\N	2008-01-03	1	1	F
1905	22131660	6	TAPIA	VILLAGRA	DEYANNIRA BELEN	\N	2006-05-31	1	1	F
1906	22589210	5	CÁCERES	ALMUNA	MARTÍN ENRIQUE	\N	2007-12-30	1	1	M
1907	22737062	9	JORQUERA	URRUTIA	BENJAMÍN VICENTE	\N	2008-06-03	1	1	M
1908	22547571	7	AMARO	TORRES	WILLIANS JOSÉ	\N	2007-11-10	1	1	M
1909	22612365	2	PLAZA	MOLINA	JOSÉ TOMÁS	\N	2008-01-11	1	1	M
1910	23255912	8	CORTÉS	BENUSSI	RAFAELA AMANDA	\N	2006-11-13	1	1	F
1911	22293088	K	ACUÑA	ULLOA	JOSÉ ISAIAS	\N	2006-12-29	1	1	M
1912	22426193	4	BARRÍA	FUENTEALBA	TAMARA CATALINA	\N	2007-06-23	1	1	F
1913	21965810	9	CEA	CASTRO	IGNACIA ALEJANDRA	\N	2005-10-30	1	1	F
1914	22237173	2	GATICA	MARÍN	YUSTHYNG AGUSTÍN ALFREDO	\N	2006-10-16	1	1	M
1915	22234812	9	HIDALGO	MORALES	SEBASTIÁN LEONARDO ISAIAS	\N	2006-10-14	1	1	M
1916	22072998	2	LOBOS	VILLALOBOS	MARÍA DE LOS ANGELES	\N	2006-03-13	1	1	F
1917	22214753	0	YÁÑEZ	ÁLVAREZ	ISIDORA FRANCISCA ANDREA	\N	2006-09-23	1	1	F
1918	22317547	3	MORALES	AVENDAÑO	AGUSTÍN IGNACIO	\N	2007-01-15	1	1	M
1919	21830169	K	RETAMAL	GONZÁLEZ	CRISTÓBAL RICARDO	\N	2005-05-02	1	1	M
1920	22216511	3	RIVERA	RÍOS	PABLO VICENTE ANTONIO	\N	2006-09-24	1	1	M
1921	22328093	5	RUY-PÉREZ	CARVAJAL	VALENTINA ISIDORA	\N	2007-02-14	1	1	F
1922	22293099	5	VILLAGRA	IBÁÑEZ	CELESTE ANTONIA	\N	2006-12-29	1	1	F
1923	100582413	K	SALINA	MORENO	CHRISTIAN JESUS	\N	2006-05-24	1	1	M
1924	22121723	3	ABARCA	LEAL	ANÍBAL EMILIO	\N	2006-05-21	1	1	M
1925	22141429	2	BAIGORRI	SÁNCHEZ	RODRIGO ALONSO	\N	2006-06-12	1	1	M
1926	22246139	1	CHAMORRO	VENEGAS	JOSÉ IGNACIO	\N	2006-10-28	1	1	M
1927	22350682	8	UTRERAS	MIRALLES	EMILIA LEONORA	\N	2007-03-14	1	1	F
1928	22388903	4	NAVARRETE	MEDINA	JOAQUÍN ALONSO	\N	2007-05-05	1	1	M
1929	22360952	K	ROCA	ZAGAL	SEBASTIÁN ANDRÉS	\N	2007-03-10	1	1	M
1930	22198703	9	ÁLVAREZ	CONSTELA	ESPERANZA BELÉN	\N	2006-09-03	1	1	F
1931	22223332	1	ALVIAL	TRONCOSO	JUAN BAUTISTA	\N	2006-09-25	1	1	M
1932	22380362	8	HUERTA	ESPINOZA	EMILIA ISIDORA	\N	2007-04-20	1	1	F
1933	22430883	3	LÓPEZ	CASTILLO	NICOLÁS OSVALDO	\N	2007-06-30	1	1	M
1934	22203064	1	YÁÑEZ	CASTILLO	KEVIN ANDRES	\N	2006-09-04	1	1	M
1935	22378782	7	NORAMBUENA	AVENDAÑO	VICTORIA MARÍA	\N	2007-04-21	1	1	F
1936	22335759	8	NORAMBUENA	CONTRERAS	MAIRA	\N	2007-02-26	1	1	F
1937	22283232	2	SEPÚLVEDA	BRAVO	BRITANY EMILIA	\N	2006-12-14	1	1	F
1938	22243052	6	CASTILLO	SALGADO	MARÍA FERNANDA	\N	2006-10-20	1	1	F
1939	21568730	9	ESPINOZA	PONCE	FRANCISCO ANDRÉS	\N	2004-04-23	1	1	M
1940	22390093	3	VALENZUELA	MARTÍNEZ	SOFÍA MACARENA	\N	2007-05-03	1	1	F
1941	22241332	K	CASTRO	JORQUERA	MARTÍN ALEXANDER	\N	2006-10-12	1	1	M
1942	22061554	5	RODRÍGUEZ	COUCHOT	SEBASTIAN ALONSO	\N	2006-02-27	1	1	M
1943	22242640	5	CASTILLO	CAROCA	CARLA AGUSTINA	\N	2006-10-04	1	1	F
1944	22380028	9	ALMONACID	VÉLIZ	PÍA FERNANDA	\N	2007-04-23	1	1	F
1945	22350274	1	AVENDAÑO	FUENTES	MARTÍN IGNACIO	\N	2007-03-09	1	1	M
1946	22329316	6	BRUNA	BASOALTO	CONSUELO ELIZABETH	\N	2007-02-13	1	1	F
1947	22406957	K	CÁCERES	RAMOS	ANTONELLA ALEJANDRA	\N	2007-05-28	1	1	F
1948	22312639	1	CAMPOS	SOTO	EMILIA ANTONIA	\N	2007-01-23	1	1	F
1949	22110744	6	CASTILLO	GUZMÁN	ERIC ROBERTO	\N	2006-04-29	1	1	M
1950	22169422	8	CHÁVEZ	ULLOA	SCARLETH DEL CARMEN	\N	2006-07-22	1	1	F
1951	22211581	7	CUEVAS	SOTO	BELÉN CATALINA	\N	2006-09-19	1	1	F
1952	22217254	3	DÍAZ	CAMPOS	ABDIEL ISAAC	\N	2006-09-19	1	1	M
1953	22328612	7	FLORES	MUÑOZ	VALENTINA YAMILET	\N	2007-02-14	1	1	F
1954	22191902	5	GONZÁLEZ	VARGAS	JUAN JOSÈ IGNACIO	\N	2006-08-25	1	1	M
1955	22302516	1	GUZMÁN	SÁNCHEZ	JUAN PABLO	\N	2006-12-27	1	1	M
1956	22011817	7	MONDACA	MOLINA	GEANCARLO JOALITH	\N	2005-12-30	1	1	M
1957	22268639	3	MOURAD	AZMY	KAMAL	\N	2006-11-09	1	1	M
1958	22336444	6	MUÑOZ	VÁSQUEZ	PABLO CRISTÓBAL ANGEL	\N	2007-02-21	1	1	M
1959	22336464	0	MUÑOZ	VÁSQUEZ	VÍCTOR JOSÉ CRISTÓBAL	\N	2007-02-21	1	1	M
1960	22325927	8	ORELLANA	BRAVO	PAZ CONSUELO	\N	2007-02-07	1	1	F
1961	22353789	8	PALMA	VEGA	JOSEFA ANTONIA	\N	2007-03-05	1	1	F
1962	22242467	4	POBLETE	GUTIÉRREZ	VALENTINA IGNACIA	\N	2006-10-24	1	1	F
1963	22188900	2	RAMOS	PALMA	CLAUDIA FRANCISCA	\N	2006-08-16	1	1	F
1964	22361233	4	SAN MARTÍN	RAMOS	REBECA ELIZABETH	\N	2007-03-27	1	1	F
1965	22152445	4	SEPÚLVEDA	LAGOS	CONSTANZA PAOLA	\N	2006-07-05	1	1	F
1966	22156789	7	SOTOMAYOR	VERA	VICTOR SEBASTIAN	\N	2006-07-06	1	1	M
1967	22363203	3	TAPIA	VÁSQUEZ	AMALIA FERNANDA	\N	2007-04-02	1	1	F
1968	22327037	9	VÁSQUEZ	CARTER	BÁRBARA ANTONIA	\N	2007-02-12	1	1	F
1969	22379946	9	VERGARA	VÁSQUEZ	PABLO ANTONIO	\N	2007-04-18	1	1	M
1970	22276063	1	ESPINOZA	ÁVILA	SOFÍA ABIGAIL	\N	2006-12-09	1	1	F
1971	22414047	9	ÁVILA	CERNA	RENATA DANIELA	\N	2007-06-05	1	1	F
1972	22295843	1	GONZÁLEZ	BASOALTO	CAMILA ANDREA	\N	2007-01-02	1	1	F
1973	22430715	2	RETAMAL	VALDIVIA	TRINIDAD ISIDORA	\N	2007-06-27	1	1	F
1974	22214389	6	CRISOSTO	AGURTO	TOMAS MAURICIO	\N	2006-08-08	1	1	M
1975	22304728	9	ALFARO	CALBULAO	ISIDORA DE LOS ÁNGELES	\N	2007-01-10	1	1	F
1976	22181305	7	OLIVARES	LEAL	BENJAMIN ALFONSO	\N	2006-08-09	1	1	M
1977	22325104	8	HUENUL	TAPIA	GABRIELA ANTONIA	\N	2007-02-01	1	1	F
1978	22220807	6	LAGOS	ASTUDILLO	ELÍAS	\N	2006-09-12	1	1	M
1979	22077340	K	LÓPEZ	BICHET	BENJAMÍN IGNACIO	\N	2006-03-15	1	1	M
1980	22278889	7	LÓPEZ	TAPIA	MATÍAS ANTONIO	\N	2006-12-04	1	1	M
1981	22292118	K	MARTÍNEZ	FUENTES	DIEGO JESÚS	\N	2006-12-26	1	1	M
1982	21939106	4	OBREQUE	VILLARROEL	OCTAVIO ALONSO	\N	2005-09-22	1	1	M
1983	22297470	4	ROSALES	PALMA	VICENTE CAMILO IGNACIO	\N	2007-01-03	1	1	M
1984	22381344	5	SALGADO	VILCHES	JENNIFER CONSTANZA	\N	2007-04-22	1	1	F
1985	21977939	9	SEPÚLVEDA	GONZÁLEZ	ROLANDO BENJAMÍN	\N	2005-11-14	1	1	M
1986	21914722	8	SOTO	CANALES	MARTINA ANTONIA	\N	2005-08-22	1	1	F
1987	22214308	K	TAPIA	DÍAZ	DAVID MOISÉS	\N	2006-09-20	1	1	M
1988	22155998	3	VEGA	YÁÑEZ	ALEXANDRA ABIGAIL	\N	2006-07-07	1	1	F
1989	22123622	K	VERGARA	POVEDA	MAITÈ ISIDORA	\N	2006-05-19	1	1	F
1990	22397641	7	ALEGRÍA	CÁRDENAS	ALEXANDER RICHARD	\N	2007-05-17	1	1	M
1991	22177373	K	BRAVO	BASOALTO	CÉSAR ANTONIO	\N	2006-08-04	1	1	M
1992	22352710	8	CARTER	GUTIÉRREZ	DANIEL SEBASTIÁN	\N	2007-03-16	1	1	M
1993	22350297	0	CASTILLO	BRAVO	ANTONIA NOEMÍ	\N	2007-03-11	1	1	F
1994	22414790	2	CASTILLO	ESPINOZA	NICOLE ANTONIA	\N	2007-06-06	1	1	F
1995	22211345	8	FREIRE	PÉREZ	MARÍA BELÉN	\N	2006-09-19	1	1	F
1996	22347923	5	JIMÉNEZ	YÁÑEZ	FRANCISCA CATALINA	\N	2007-03-09	1	1	F
1997	22298026	7	LINCOCHEO	CONTRERAS	VICENTE MATEO	\N	2007-01-04	1	1	M
1998	22355621	3	CASTRO	CASTRO	KATERIN ISABEL	\N	2007-03-20	1	1	F
1999	22263907	7	CONTRERAS	CASTRO	CAROLINA MAGDALENA	\N	2006-11-20	1	1	F
2000	22291045	5	JORQUERA	GUZMÁN	VALENTINA JAVIERA	\N	2006-12-26	1	1	F
2001	22366905	0	MOLINA	NÚÑEZ	FRANCISCA IGNACIA	\N	2007-04-04	1	1	F
2002	22162752	0	RODRÍGUEZ	SOTO	FELIPE DAVID	\N	2006-07-08	1	1	M
2003	22371393	9	ROJAS	PEÑALILLO	VICENTE IGNACIO	\N	2007-04-08	1	1	M
2004	22386987	4	ROJAS	VENEGAS	VICENTE ALONSO	\N	2007-05-02	1	1	M
2005	22394353	5	MAUREIRA	ABURTO	MARTÍN NICOLÁS	\N	2007-05-09	1	1	M
2006	22308799	K	MENDEZ	HENRÍQUEZ	AGUSTÍN IGNACIO	\N	2007-01-19	1	1	M
2007	22303070	K	RETAMAL	CONCHA	CAMILA SOLANGE	\N	2007-01-08	1	1	F
2008	22273243	3	VALDÉS	OSES	CAMILA FRANCISCA	\N	2006-11-28	1	1	F
2009	22341903	8	ACUÑA	ALARCÓN	BELÉN ISIDORA	\N	2007-03-01	1	1	F
2010	22354951	9	AGUAYO	QUIJADA	GUILLERMO ENRIQUE	\N	2007-03-09	1	1	M
2011	22269196	6	ALARCÓN	VERGARA	VICENTE ALEJANDRO	\N	2006-11-27	1	1	M
2012	22133867	7	ALBORNOZ	ROJAS	IGNACIO ALEJANDRO	\N	2006-06-06	1	1	M
2013	22208351	6	ARROYUELO	ROTELLA	VALENTINA ANTONIA	\N	2006-09-14	1	1	F
2014	27012081	4	BARRIOS	MENDEZ	FEDERICO LUIS	\N	2006-12-23	1	1	M
2015	21768367	K	CONTRERAS	RIVAS	DIEGO ALONSO	\N	2005-01-29	1	1	M
2016	22403553	5	DUEÑAS	ZURITA	MARÍA IGNACIA SOLEDAD	\N	2007-05-24	1	1	F
2017	22304147	7	GONZÁLEZ	CARRIMÁN	ABSALÓN IGNACIO	\N	2007-01-11	1	1	M
2018	22327728	4	GUERRA	SEPÚLVEDA	RENATO ALONSO	\N	2007-01-08	1	1	M
2019	22032417	6	IBÁÑEZ	ESPINOZA	BENJAMÍN ALEJANDRO	\N	2006-01-28	1	1	M
2020	22135794	9	MANRÍQUEZ	DÍAZ	FELIPE ALONSO	\N	2006-06-07	1	1	M
2021	22245882	K	MAUREIRA	NORAMBUENA	GLORIA GETCEMANI	\N	2006-10-24	1	1	F
2022	22184545	5	OLIVOS	CORVALÁN	GABRIEL IGNACIO DE JESUS	\N	2006-08-13	1	1	M
2023	21969536	5	PACHECO	TAPIA	EDUARDO IGNACIO	\N	2005-11-03	1	1	M
2024	22100808	1	RETAMAL	LEIVA	ROMINA ALEXANDRA	\N	2006-04-20	1	1	F
2025	22191249	7	TORRES	TAPIA	GERARDO IGNACIO	\N	2006-08-21	1	1	M
2026	21950843	3	TRONCOSO	CARRILLO	ALFREDO ALEJANDRO	\N	2005-10-03	1	1	M
2027	22423894	0	VALVERDE	MORALES	JOSÉ IGNACIO	\N	2007-06-18	1	1	M
2028	21915921	8	VARAS	PONCE	MARÍA PAZ	\N	2005-08-18	1	1	F
2029	22420064	1	VASQUEZ	REYES	ANAÍS ANTONIA	\N	2007-06-13	1	1	F
2030	22189135	K	VERGARA	AYALA	MARIA BELEN	\N	2006-08-20	1	1	F
2031	22245981	8	RUMILLANCA	ORTIZ	MOIRA ANAÍS	\N	2006-08-28	1	1	F
2032	22349876	0	ARRIAGADA	CERDA	PÍA DARLEN	\N	2007-03-13	1	1	F
2033	22260774	4	REGLA	CABRERA	ROSÍO ANAHY LUCERO	\N	2006-11-14	1	1	F
2034	22211743	7	ALARCÓN	YÁÑEZ	MANUEL ANTONIO	\N	2006-09-11	1	1	M
2035	22270871	0	MÉNDEZ	PARADA	KEVIN DANIEL	\N	2006-11-27	1	1	M
2036	22354175	5	VILLALOBOS	CANALES	ANAHISS ALONDRA	\N	2007-03-17	1	1	F
2037	22404409	7	CERDA	TOLOZA	SEBASTIÁN CARLOS	\N	2007-05-26	1	1	M
2038	22191635	2	ARRIAGADA	VERA	ANA DE LA ROSA	\N	2006-08-04	1	1	F
2039	22323927	7	FUENTES	NORAMBUENA	TOMÁS ALEJANDRO	\N	2007-02-05	1	1	M
2040	22255746	1	SEPULVEDA	GONZÁLEZ	PÍA YIREX MARTINA	\N	2006-10-18	1	1	F
2041	22163335	0	VENEGAS	CANALES	ROCÍO ISIDORA	\N	2006-07-17	1	1	F
2042	22192012	0	ORELLANA	BUSTOS	VALENTINA ALMENDRA	\N	2006-08-22	1	1	F
2043	21639285	K	MÉNDEZ	ROJAS	KARLA ESTEFANÍA	\N	2004-08-17	1	1	F
2044	22182044	4	ALARCÓN	IBARRA	ANTONELA IGNACIA	\N	2006-08-13	1	1	F
2045	22218190	9	ALFARO	GONZÁLEZ	JOAQUÍN ALONSO	\N	2006-09-28	1	1	M
2046	22181274	3	CASTILLO	DÍAZ	MANUEL ANDRÉS	\N	2006-07-25	1	1	M
2047	21992307	4	CAUCAMÁN	CABELLO	CRISTIAN TOMAS	\N	2005-11-29	1	1	M
2048	22128352	K	FUENTEALBA	GONZÁLEZ	JOAQUÍN SEBASTIÁN MARCO	\N	2006-05-01	1	1	M
2049	21859473	5	FUENTES	GUZMÁN	FERNANDA JESÚS	\N	2005-06-02	1	1	F
2050	22291328	4	FUENTES	MANFREDI	MATÍAS IGNACIO	\N	2006-11-27	1	1	M
2051	22203052	8	GONZÁLEZ	FREZ	MARCELO IGNACIO	\N	2006-09-07	1	1	M
2052	22186394	1	HENRÍQUEZ	COFRÉ	MONSERRAT IGNACIA	\N	2006-08-16	1	1	F
2053	22238063	4	HERNÁNDEZ	SOTO	DIEGO MATIA IGNACIO	\N	2006-10-17	1	1	M
2054	22404457	7	IBÁÑEZ	MUÑOZ	RENATO ANTONIO	\N	2007-05-26	1	1	M
2055	22150710	K	LÓPEZ	BUSTAMANTE	VALENTINA ALEJANDRA	\N	2006-06-22	1	1	F
2056	22063644	5	LÓPEZ	HERNÁNDEZ	PABLO IGNACIO	\N	2006-03-03	1	1	M
2057	22332742	7	MÉNDEZ	BUSTOS	VICENTE DANIEL ANTONIO	\N	2007-02-19	1	1	M
2058	22158386	8	MORALES	PALMA	FRANCISCA LUCIANA BELÉN	\N	2006-07-05	1	1	F
2059	22281966	0	ORTEGA	URRA	JOSUE BENJAMÍN	\N	2006-12-13	1	1	M
2060	22183076	8	ROJAS	TAPIA	PIA CATALINA	\N	2006-08-10	1	1	F
2061	22325471	3	ROMERO	REYES	DAYLINE PASCALE	\N	2007-02-10	1	1	F
2062	22187204	5	TORO	OLIVARES	SEBASTIAN ANTONIO	\N	2006-08-07	1	1	M
2063	22266840	9	VALENZUELA	REVECO	TOMÁS SEBASTIÁN	\N	2006-11-24	1	1	M
2064	22322347	8	SEPÚLVEDA	BRAVO	YAHEL CONSTANZA JOAN	\N	2007-02-03	1	1	F
2065	22288605	8	AILLÓN	CERDA	JULIETA ANTONIA	\N	2006-12-06	1	1	F
2066	22124393	5	DÍAZ	ALMUNA	SEBASTIÁN FELIPE ANTONIO	\N	2006-05-21	1	1	M
2067	22294415	5	GRANDÓN	GONZÁLEZ	FELIPE ALBERTO	\N	2006-12-21	1	1	M
2068	22376994	2	MOROSO	CARRASCO	VALENTINA IGNACIA	\N	2007-04-16	1	1	F
2069	22220344	9	VILLAGRA	LILLO	THOMAS JOAQUÍN	\N	2006-09-29	1	1	M
2070	22383489	2	VILLAR	CASTRO	DANIEL IGNACIO	\N	2007-04-27	1	1	M
2071	22207211	5	MÁRQUEZ	ARAYA	FABIAN IGNACIO	\N	2006-09-03	1	1	M
2072	22414707	4	MORALES	YÁÑEZ	DAMARY NAIROVY	\N	2007-06-06	1	1	F
2073	22379878	0	REBOLLEDO	SALAS	ALISON PASCAL	\N	2007-04-21	1	1	F
2074	22306585	6	RIFFO	ARAYA	MICHELL ANYELYN	\N	2007-01-12	1	1	F
2075	22184200	6	ABURTO	JIMÉNEZ	SERGIO ANTONIO	\N	2006-08-09	1	1	M
2076	22324024	0	BARRERA	MIRANDA	MARTÍN IGNACIO	\N	2007-01-29	1	1	M
2077	22247534	1	SAAVEDRA	SÁNCHEZ	VALENTINA NICOL	\N	2006-10-30	1	1	F
2078	22367369	4	GUTIÉRREZ	PACHECO	VICTORIA CAROLINA	\N	2007-03-29	1	1	F
2079	22191983	1	TRUJILLO	LATORRE	BRUNO MAURICIO	\N	2006-08-25	1	1	M
2080	22315231	7	ARAYA	VÁSQUEZ	DIEGO ENRIQUE	\N	2007-01-26	1	1	M
2081	22172983	8	BALVOA	LUENGO	ORLANDO IGNACIO	\N	2006-07-22	1	1	M
2082	22404393	7	CASANOVA	GONZÁLEZ	JAVIER IGNACIO	\N	2007-05-26	1	1	M
2083	21812120	9	DOMÍNGUEZ	GONZÁLEZ	JAIRO ISAIAS CARLOS	\N	2005-04-07	1	1	M
2084	22199840	5	FUICA	AGUILERA	KEVIN ANDRÉS	\N	2006-08-29	1	1	M
2085	22334557	3	GONZÁLEZ	REBOLLEDO	ALEXANDER FELIPE	\N	2007-02-20	1	1	M
2086	22307787	0	LAGOS	TORO	CATALINA ANTONIA	\N	2007-01-08	1	1	F
2087	21989192	K	LEÓN	BUSTAMANTE	NELSON TOMÁS	\N	2005-12-01	1	1	M
2088	22131470	0	LIZAMA	LEMUS	FLORENCIA NATHALIE	\N	2006-05-26	1	1	F
2089	22152816	6	LÓPEZ	JARA	FLORENCIA IGNACIA	\N	2006-06-25	1	1	F
2090	21655385	3	LÓPEZ	LAGOS	JUAN JOSÉ	\N	2004-09-10	1	1	M
2091	22186473	5	MEDEL	CRISÓSTOMO	EDDRA CAMILA	\N	2006-08-17	1	1	F
2092	22188188	5	MOYA	ESPINOZA	EMILIA ANDREA	\N	2006-08-18	1	1	F
2093	22193967	0	MUÑOZ	ARAYA	CRISTOBAL ANDRES DE JESUS	\N	2006-08-20	1	1	M
2094	22178703	K	PEÑAILILLO	NOVOA	CATALINA BELEN	\N	2006-08-04	1	1	F
2095	22015200	6	PEREIRA	LUENGO	AXEL DIVOR	\N	2006-01-06	1	1	M
2096	21777258	3	PINCHEIRA	ZAPATA	ANGELA WALESCA	\N	2005-02-07	1	1	F
2097	22327969	4	REYES	RIQUELME	GERMÁN EDGARDO	\N	2007-02-11	1	1	M
2098	22389156	K	SALAS	CASTILLO	DANIELA FLORENCIA	\N	2007-05-02	1	1	F
2099	22193000	2	TAPIA	CATALÁN	JOSÉ IGNACIO	\N	2006-08-23	1	1	M
2100	22261673	5	TORO	VALENZUELA	BENJAMÍN NICOLÁS	\N	2006-11-18	1	1	M
2101	22344965	4	VALENZUELA	MANRÍQUEZ	CRISTÓBAL AMARO	\N	2007-03-09	1	1	M
2102	22162101	8	VENEGA	IBÁÑEZ	CRISTOBAL FRANCISCO	\N	2006-07-15	1	1	M
2103	22208615	9	VILLEGAS	RODRÍGUEZ	THOMAS IGNACIO	\N	2006-09-13	1	1	M
2104	22412617	4	ZÚÑIGA	ACUÑA	JAVIER IGNACIO	\N	2007-05-18	1	1	M
2105	22202451	K	SALAZAR	BUCAREY	FRANCO MATIAS	\N	2006-09-05	1	1	M
2106	22427290	1	SEPÚLVEDA	MUÑOZ	ANTONELA ESTRELLA	\N	2007-06-22	1	1	F
2107	22344610	8	NORAMBUENA	FUENTEALBA	ANAHI HAZIEL	\N	2007-02-24	1	1	F
2108	22418043	8	PÉREZ	QUEZADA	CHRISNA ALEJANDRA	\N	2007-06-11	1	1	F
2109	22274844	5	GONZÁLEZ	ZARRICUETA	CAMILO ANDRÉS	\N	2006-12-06	1	1	M
2110	22318444	8	SANZANA	MORALES	CARENT KAMILA DEL CARMEN	\N	2007-01-30	1	1	F
2111	22344420	2	SALAZAR	RODRÍGUEZ	JULIET ARELLYS	\N	2007-03-05	1	1	F
2112	22183119	5	BASCUÑÁN	ARAVENA	ROCIO CATALINA	\N	2006-08-11	1	1	F
2113	22361888	K	BASOALTO	LUPALLANTE	MACARENA ALEJANDRA	\N	2007-03-24	1	1	F
2114	22291458	2	CARTER	RETAMAL	JOAQUÍN ALONSO	\N	2006-12-26	1	1	M
2115	22148836	9	PALMA	ORELLANA	BENJAMÍN IGNACIO	\N	2006-06-27	1	1	M
2116	21945768	5	RAMÍREZ	ARCOS	MARTINA CONSTANZA	\N	2005-09-28	1	1	F
2117	22112838	9	RAMOS	GONZÁLEZ	EMILIA FRANCISCA	\N	2006-05-02	1	1	F
2118	22308338	2	RODRÍGUEZ	LÓPEZ	MARCELA IGNACIA	\N	2007-01-18	1	1	F
2119	22262778	8	SEPÚLVEDA	WILSON	FABIÁN ENRIQUE	\N	2006-11-18	1	1	M
2120	21954740	4	SOTO	LABRAÑA	DIEGO IGNACIO	\N	2005-10-15	1	1	M
2121	22327508	7	VALENZUELA	LEAL	JAVIER ANTONIO	\N	2007-02-13	1	1	M
2122	21900859	7	VILLAR	VÁSQUEZ	ALLIZ LIZALETT ALEJANDRA	\N	2005-08-05	1	1	F
2123	21910901	6	FICA	CARRERA	JAVIERA CATALINA	\N	2005-08-15	1	1	F
2124	22295068	6	GAMBOA	CARVAJAL	MATÍAS ANTONIO	\N	2007-01-03	1	1	M
2125	22138039	8	IBÁÑEZ	VALENZUELA	TOMÁS ALEJANDRO	\N	2006-06-15	1	1	M
2126	21627967	0	MARTÍNEZ	MONTOYA	MARTÍN ENRIQUE	\N	2004-07-21	1	1	M
2127	22198321	1	MATUS	ZURITA	NATALIA BEATRIZ	\N	2006-08-31	1	1	F
2128	22096852	9	MÉNDEZ	PINO	MONSERRATT CATHALINA	\N	2006-04-11	1	1	F
2129	22174114	5	MÉNDEZ	TORRES	YERAL NEFTALI	\N	2006-07-31	1	1	M
2130	21593816	6	MUÑOZ	CAMPOS	BENJAMÍN IGNACIO	\N	2004-06-10	1	1	M
2131	22198042	5	REVECO	RONDÓN	CARLOS ALBERTO	\N	2006-09-02	1	1	M
2132	22379872	1	ALBORNOZ	ROCHA	MARÍA FRANCISCA	\N	2007-03-29	1	1	F
2133	22259302	6	RAMOS	MÁRQUEZ	MARLEN FRANCISCA	\N	2006-10-16	1	1	F
2134	22161329	5	SEPÚLVEDA	GÓMEZ	CARLA IGNACIA	\N	2006-07-13	1	1	F
2135	22316701	2	VILLASECA	VÁSQUEZ	ANDREA MARISOL	\N	2007-01-27	1	1	F
2136	22274622	1	ESCALONA	LABRAÑA	BENJAMÍN IGNACIO	\N	2006-12-05	1	1	M
2137	22308173	8	FLORES	ALBORNOZ	BRAYAN ALEXANDER	\N	2007-01-17	1	1	M
2138	22320885	1	RUIZ	BASOALTO	YARET FELIPE IGNACIO	\N	2007-02-04	1	1	M
2139	22382591	5	VÁSQUEZ	GUTIÉRREZ	DAMIÁN NICOLÁS	\N	2007-04-09	1	1	M
2140	21930569	9	VERGARA	RAMÍREZ	LUIS EDUARDO	\N	2005-09-13	1	1	M
2141	22247486	8	ZAMORANO	ÁVILA	MISAEL ORLANDO	\N	2006-10-28	1	1	M
2142	22404793	2	MARTÍNEZ	VALDÉS	ANTONIA PASCALE	\N	2007-05-26	1	1	F
2143	22265311	8	GARCÍA	JAQUE	SERGIO IGNACIO	\N	2006-11-13	1	1	M
2144	22302698	2	ESPINOSA	ARCE	KEZLEY ANTONELA	\N	2007-01-07	1	1	F
2145	22295138	0	BUSTOS	GONZÁLEZ	CONSUELO TRINIDAD	\N	2006-12-31	1	1	F
2146	22154281	9	GATICA	PINOCHET	FRANCIA ANTONIA	\N	2006-07-03	1	1	F
2147	22134777	3	VILLARREAL	ZAMORA	FELIPE ANDRES	\N	2006-06-10	1	1	M
2148	22330922	4	ESPINOZA	PARRA	EXEQUIEL ALEJANDRO	\N	2007-02-12	1	1	M
2149	22304137	K	FUENTES	FIGUEROA	ISIDORA ANTONIA	\N	2007-01-13	1	1	F
2150	22414469	5	FUENTES	ROSALES	MARISHCA ANYELLINA	\N	2007-06-07	1	1	F
2151	22273044	9	FUENTES	SEPÚLVEDA	VICENTE JESÚS	\N	2006-12-05	1	1	M
2152	22217483	K	FUENTES	TRONCOSO	ISIDORA ANTONELLA	\N	2006-09-26	1	1	F
2153	22254850	0	GAJARDO	ALARCÓN	MARTINA ISIDORA	\N	2006-11-08	1	1	F
2154	22357119	0	GARRIDO	ORELLANA	ARLET CATALINA	\N	2007-03-20	1	1	F
2155	22370860	9	GONZÁLEZ	TORRES	CAMILA ALEJANDRA	\N	2007-04-07	1	1	F
2156	22132470	6	GUTIÉRREZ	GODOY	LUZ ELENA	\N	2006-06-04	1	1	F
2157	22364023	0	MARTÍNEZ	TAPIA	PABLO ALBERTO	\N	2007-03-29	1	1	M
2158	21666140	0	TAPIA	BARROS	YENIFFER VALESKA	\N	2004-09-16	1	1	F
2159	21973493	K	TAPIA	VELASCO	BARBARA ELIZABETH	\N	2005-11-07	1	1	F
2160	22414693	0	VALENZUELA	ARAVENA	CRISTÓBAL ANTONIO	\N	2007-06-08	1	1	M
2161	22383369	1	VÁSQUEZ	SOTO	BAYRON SCOTT	\N	2007-04-26	1	1	M
2162	22210617	6	YÁÑEZ	RIQUELME	IAN ALONSO	\N	2006-09-15	1	1	M
2163	22200365	2	ZUÑIGA	ZÚÑIGA	ANTONIA PATRICIA	\N	2006-09-04	1	1	F
2164	22335125	5	MÉNDEZ	PONCE	JOAQUÍN ALONSO	\N	2007-02-23	1	1	M
2165	22384015	9	PRIETO	SEPÚLVEDA	CRISTÓBAL LUIS	\N	2007-04-25	1	1	M
2166	22313987	6	RETAMAL	YELICH	BENJAMÍN EDUARDO	\N	2007-01-23	1	1	M
2167	22304176	0	REYES	GAJARDO	MARTINA PAOLA	\N	2007-01-04	1	1	F
2168	22393768	3	RIVAS	REVECO	GABRIEL GUILLERMO	\N	2007-05-11	1	1	M
2169	22219988	3	SARABIA	RÍOS	RENATA MARTINA	\N	2006-09-21	1	1	F
2170	22394719	0	SOTO	MAUREIRA	CAMILO ANTONIO	\N	2007-05-09	1	1	M
2171	22391143	9	FREIRE	ROCA	ISABEL ALICIA	\N	2007-05-06	1	1	F
2172	22116642	6	PARRA	ARCE	JOAQUIN DARIO	\N	2006-05-10	1	1	M
2173	22205382	K	RIVERA	VILLALOBOS	LILEN	\N	2006-09-08	1	1	F
2174	22254255	3	SOLORZA	ALFARO	BÁRBARA MONSERRATT	\N	2006-10-31	1	1	F
2175	22289826	9	BENAVIDES	VALDÉS	CARLOS FABIÁN	\N	2006-12-27	1	1	M
2176	22333216	1	GONZÁLEZ	CARO	ANAÍS SOFÍA	\N	2007-02-21	1	1	F
2177	22090119	K	ZÚÑIGA	GONZÁLEZ	CATALINA EMILIA	\N	2006-04-08	1	1	F
2178	22183002	4	MORALES	SALGADO	HARDY MAXIMILIANO	\N	2006-07-09	1	1	M
2179	22416720	2	VERA	RIQUELME	MARTÍN MANUEL	\N	2007-06-07	1	1	M
2180	22410470	7	APABLAZA	CONTRERAS	ISIDORA IGNACIA	\N	2007-06-01	1	1	F
2181	22417940	5	IBACACHE	HERNÁNDEZ	MARÍA JOSÉ	\N	2007-06-10	1	1	F
2182	22270599	1	MUÑOZ	REYES	VICENTE IGNACIO	\N	2006-11-18	1	1	M
2183	22127651	5	AGUILAR	VÁSQUEZ	VÍCTOR IGNACIO	\N	2006-05-29	1	1	M
2184	25963566	7	ADELL	RODRIGUEZ	CAMILA DANIELA	\N	2006-12-22	1	1	F
2185	22109967	2	BASOALTO	ROCHA	ANGEL ANTONIO	\N	2006-05-05	1	1	M
2186	22321185	2	CALDERÓN	BRAVO	JUAN PABLO	\N	2007-02-01	1	1	M
2187	22358108	0	CASTILLO	MARTÍNEZ	SEBASTIÁN IGNACIO	\N	2007-03-22	1	1	M
2188	22089403	7	CASTRO	OSSES	CAMILA IGNACIA	\N	2006-03-21	1	1	F
2189	22152617	1	CERDA	POLANCO	MARIA JOSEFINA ANTONIA	\N	2006-06-30	1	1	F
2190	22270520	7	CIFUENTES	BRAVO	JUSTIN ANDRÉS	\N	2006-11-26	1	1	M
2191	26671367	3	CINEUS		SAYDAINA	\N	2007-01-10	1	1	F
2192	22371278	9	COFRÉ	MEJÍAS	MARTINA ALEJANDRA	\N	2007-04-10	1	1	F
2193	22330261	0	CONCHA	OJEDA	MARCOS JOSÉ ENRIQUE	\N	2007-02-16	1	1	M
2194	22290271	1	CONTRERAS	COFRÉ	PAOLO STEFHAN	\N	2006-12-18	1	1	M
2195	21858104	8	GARRIDO	ROMERO	CAMILA ANTONIA	\N	2005-06-09	1	1	F
2196	22346832	2	GASCON	TAPIA	BRUNO ALONSO	\N	2007-03-08	1	1	M
2197	22301931	5	GUÍÑEZ	ESCALONA	MATÍAS ANTONIO	\N	2007-01-09	1	1	M
2198	22164792	0	LETELIER	FLORES	ALEXIS MAURICIO	\N	2006-07-15	1	1	M
2199	22219036	3	LUENGO	CARRIÓN	JAVIER EMMANUEL	\N	2006-09-27	1	1	M
2200	22432499	5	MÉNDEZ	PARRAGUEZ	JOAQUÍN IGNACIO	\N	2007-06-29	1	1	M
2201	22294517	8	QUIROZ	VILLALOBOS	BENJAMÍN IGNACIO	\N	2006-12-28	1	1	M
2202	22200776	3	SAGAL	TAPIA	JOSEFA DOMINGA	\N	2006-09-06	1	1	F
2203	22407256	2	SALAS	MUÑOZ	SEBASTIÁN ARMANDO	\N	2007-05-31	1	1	M
2204	22211384	9	TRONCOSO	MIRANDA	MAXIMILIANO ALEJANDRO	\N	2006-09-20	1	1	M
2205	22125716	2	VALDÉS	ARAYA	VALERIA ANGELICA	\N	2006-05-25	1	1	F
2206	22211466	7	VÁSQUEZ	ELGUETA	LISETTE CATALINA	\N	2006-09-08	1	1	F
2207	22309503	8	VÁSQUEZ	JARA	EMILIA CAROLINA	\N	2007-01-20	1	1	F
2208	22361991	6	RUIZ	OÑATE	PRICILA LISET	\N	2007-03-28	1	1	F
2209	22180512	7	SÁNCHEZ	REVECO	YERALL BASTIAN	\N	2006-08-10	1	1	M
2210	22245483	2	CÁCERES	CHÁVEZ	CRISTÓBAL AGUSTÍN	\N	2006-10-20	1	1	M
2211	22266574	4	CARRIÓN	URRUTIA	CATALINA TRINIDAD	\N	2006-11-23	1	1	F
2212	22290192	8	CARRIÓN	VÁSQUEZ	PALOMA CONSUELO	\N	2006-12-23	1	1	F
2213	22270131	7	VALLEJOS	REBOLLEDO	VALENTINA ANDREA	\N	2006-11-22	1	1	F
2214	22285460	1	VÁSQUEZ	ALARCÓN	SEBASTIÁN ANTONIO	\N	2006-12-16	1	1	M
2215	22365637	4	BUENO	ERICES	ALISON NATACHA	\N	2007-03-28	1	1	F
2216	22365581	5	BUSTAMANTE	ARAYA	MARTINA	\N	2007-03-25	1	1	F
2217	22135921	6	CARRASCO	CONCHA	SOFÍA BELÉN	\N	2006-06-02	1	1	F
2218	22245888	9	CARRASCO	JARA	FRANCISCA IGNACIO	\N	2006-10-22	1	1	F
2219	22349697	0	ESPINOZA	URRUTIA	CRISTÓBAL FACUNDO	\N	2007-03-02	1	1	M
2220	22357419	K	GUTIÉRREZ	YÁÑEZ	WILLIAMS IGNACIO	\N	2007-03-22	1	1	M
2221	21985926	0	GUZMÁN	CAMPOS	AMARO ELIESER	\N	2005-11-23	1	1	M
2222	22191181	4	HERNÁNDEZ	DURÁN	LAURA EMILIA	\N	2006-08-22	1	1	F
2223	22326491	3	MERA	MARTÍNEZ	EDUARDO ENRIQUE	\N	2007-02-08	1	1	M
2224	22326517	0	MERA	MARTÍNEZ	SOFÍA ELIZABETH	\N	2007-02-08	1	1	F
2225	22135478	8	MILLAR	HIDALGO	JOSELYN BENITA ANTONIA	\N	2006-06-09	1	1	F
2226	22347438	1	MIRANDA	ORELLANA	GABRIELA ISABEL	\N	2007-03-05	1	1	F
2227	22208308	7	MIRANDA	RAMOS	CAREN MONSERRAT	\N	2006-09-17	1	1	F
2228	22202565	6	MONTES	VARGAS	VICENTE MIGUEL	\N	2006-09-08	1	1	M
2229	22380328	8	MORA	ALVEAR	DIEGO IGNACIO	\N	2007-04-11	1	1	M
2230	22287602	8	MORENO	MONSALVE	DONOVAN DIMICKELE	\N	2006-12-20	1	1	M
2231	22308995	K	MUÑOZ	MUÑOZ	SERGIO PABLO	\N	2007-01-18	1	1	M
2232	22253223	K	TORRES	HERRERA	FERNANDA CRISTINA ANDREA	\N	2006-11-07	1	1	F
2233	22036558	1	HERNÁNDEZ	SEPÚLVEDA	ANGELA ANTONIA	\N	2006-01-27	1	1	F
2234	22177565	1	CAAMAÑO	CAMPOS	KATHERINE BELEN IGNACIA	\N	2006-08-04	1	1	F
2235	22308818	K	HERMOSILLA	ARAYA	PATRICIO ANDRÉS	\N	2007-01-14	1	1	M
2236	22400867	8	HORMAZÁBAL	VALENZUELA	CRISTEL ELIZABETH	\N	2007-05-21	1	1	F
2237	22165775	6	MOLINA	SÁNCHEZ	CRISTOPHER ANDRES	\N	2006-06-28	1	1	M
2238	22216766	3	SILVA	BREVIS	ALINE PAOLA	\N	2006-09-20	1	1	F
2239	21738353	6	CASTRO	RÍOS	MONSERRAT ANTONIA	\N	2004-12-22	1	1	F
2240	21881605	3	MERA	MARTÍNEZ	ANDREA PATRICIA	\N	2005-07-09	1	1	F
2241	22027549	3	LARA	OSES	ANDRES IGNACIO	\N	2006-01-23	1	1	M
2242	21926985	4	PRIETO	HERNÁNDEZ	JUAN PABLO	\N	2005-09-08	1	1	M
2243	21614384	1	ZÚÑIGA	VALENZUELA	DANIEL ALBERTO	\N	2004-07-09	1	1	M
2244	21881366	6	SEPÚLVEDA	MUÑOZ	JOSÉ TOMÁS	\N	2005-07-04	1	1	M
2245	21881393	3	SEPÚLVEDA	MUÑOZ	JUAN ALONSO	\N	2005-07-04	1	1	M
2246	21707388	K	ARAYA	CEPEDA	RICHARD ANDRÉS	\N	2004-11-13	1	1	M
2247	21965498	7	GARRIDO	HERNÁNDEZ	VALENTINA PATRICIA	\N	2005-10-29	1	1	F
2248	21982479	3	SALGADO	CERDA	MARTÍN ANDRÉS	\N	2005-11-11	1	1	M
2249	22045739	7	CHANDÍA	MOSQUERA	NAOMI DE LOS ANGELES	\N	2006-02-10	1	1	F
2250	22119476	4	LÓPEZ	HERNÁNDEZ	BASTIÁN ELÍAS	\N	2006-05-16	1	1	M
2251	21969330	3	PÉREZ	GARCÍA	TOMAS IGNACIO	\N	2005-11-05	1	1	M
2252	22145327	1	SEPÚLVEDA	BICHET	MAXIMILIANO LUCAS	\N	2006-06-21	1	1	M
2253	21962098	5	VERGARA	ESCOBAR	IVONNE EMILIA	\N	2005-10-25	1	1	F
2254	21994700	3	SOTO	RIVERA	CATALINA ANDREA	\N	2005-12-07	1	1	F
2255	21841310	2	VÁSQUEZ	ELGUETA	DARYO ALONSO	\N	2005-05-13	1	1	M
2256	21925437	7	ARÉVALO	BASUALTO	JOSÉ LUIS	\N	2005-09-04	1	1	M
2257	21941697	0	MORALES	GAETE	ANGEL GABRIEL	\N	2005-09-27	1	1	M
2258	21639581	6	SANTI	ZENTENO	FRANCISCO ANDRÉS	\N	2004-08-18	1	1	M
2259	21955903	8	ESPINOZA	FAJARDO	MARTIN IGNACIO	\N	2005-10-18	1	1	M
2260	21974681	4	BELTRÁN	TOBAR	MARTÍN IGNACIO	\N	2005-11-10	1	1	M
2261	22043415	K	CÁCERES	GUERRERO	JOAQUIN IGNACIO	\N	2006-02-04	1	1	M
2262	21831241	1	ROSALES	CARRASCO	KATHERINE POLETH	\N	2005-04-30	1	1	F
2263	21149197	3	CASTRO	CASTILLO	FRANCO ANTONIO	\N	2002-10-11	1	1	M
2264	21782340	4	JAQUE	ACEVEDO	FRANCISCO JAVIER	\N	2005-02-22	1	1	M
2265	21678739	0	ROJAS	SEPÚLVEDA	BENJAMÍN FRANCISCO	\N	2004-10-06	1	1	M
2266	22055143	1	HERNÁNDEZ	GATICA	BENJAMIN ALONSO	\N	2006-02-16	1	1	M
2267	22099217	9	ALARCÓN	GUTIÉRREZ	LISETTE ANTONELLA	\N	2006-04-18	1	1	F
2268	22070593	5	BARRERA	GONZÁLEZ	MATIAS IGNACIO	\N	2006-03-02	1	1	M
2269	21906321	0	VALDÉS	ROSALES	BENJAMÍN ANTONIO	\N	2005-08-09	1	1	M
2270	21831334	5	FUENZALIDA	SALDAÑA	AMARO NICOLÁS	\N	2005-04-26	1	1	M
2271	22029525	7	ROCO	MOYA	CARLOS ALBERTO	\N	2005-12-30	1	1	M
2272	21837788	2	ÁVALOS	BUSTAMANTE	DANAE BELÉN	\N	2005-05-13	1	1	F
2273	21726535	5	COFRÉ	MUÑOZ	SAMUEL ANDRÉS	\N	2004-11-18	1	1	M
2274	21434647	8	BENAVENTE	GAETE	ROCIO ARACELI	\N	2003-11-05	1	1	F
2275	22118115	8	SÁNCHEZ	RAMÍREZ	CONSTANZA BELEN	\N	2006-05-17	1	1	F
2276	21931111	7	ÁLAMOS	MÉNDEZ	CATALINA SOFIA	\N	2005-09-13	1	1	F
2277	21925606	K	MUÑOZ	CONTRERAS	BELÉN ANTONIA	\N	2005-09-02	1	1	F
2278	22018607	5	VALENZUELA	VÁSQUEZ	MAURICIO ESTEBAN	\N	2006-01-09	1	1	M
2279	21928705	4	JULIET	REYES	CARMEN FRANCISCA	\N	2005-09-11	1	1	F
2280	21477417	8	URRUTIA	TORRES	MONSERRAT XIMENA	\N	2003-12-26	1	1	F
2281	22033798	7	LARENAS	MEJÍAS	MARTINA TRINIDAD	\N	2006-01-27	1	1	F
2282	21672248	5	VELOZO	ACUÑA	SEBASTIÁN ADRIÁN IGNACIO	\N	2004-10-02	1	1	M
2283	21860060	3	CARRASCO	BRAVO	JOAQUÍN JAVIER	\N	2005-05-20	1	1	M
2284	22080981	1	SÁEZ	SALAZAR	JAVIERA VALENTINA	\N	2006-03-24	1	1	F
2285	21886714	6	SEGURA	MATUS	CONSTANZA JESÚS	\N	2005-07-17	1	1	F
2286	22066245	4	MOYA	ULLOA	CATALINA FLORENCIA	\N	2006-02-28	1	1	F
2287	21659839	3	NORAMBUENA	POVEDA	CRISTÓBAL ANTONIO	\N	2004-09-17	1	1	M
2288	21690672	1	ROJAS	MARTÍNEZ	MARTÍN ALEJANDRO	\N	2004-10-21	1	1	M
2289	100567295	K	RODRIGUEZ	VARGAZ	JURI YINITVA	\N	2005-06-01	1	1	F
2290	21943726	9	PARADA	HIDALGO	GONZALO ESTEBAN	\N	2005-09-30	1	1	M
2291	22153401	8	PARADA	ROCA	EMILIA JAEL	\N	2006-06-30	1	1	F
2292	21727409	5	MANCILLA	RIQUELME	CIARA CONSTANZA	\N	2004-11-25	1	1	F
2293	21940681	9	SALGADO	GATICA	ANGELA ANTONIA	\N	2005-09-20	1	1	F
2294	22105532	2	LUCUMILLA	PARADA	ANTONELLA ELIZABETH	\N	2006-04-21	1	1	F
2295	21893503	6	GAETE	DURÁN	SALVADOR ANDRÉS ERNESTO	\N	2005-07-25	1	1	M
2296	21873972	5	GONZÁLEZ	JELDES	SOFÍA BELÉN	\N	2005-06-28	1	1	F
2297	22127212	9	BAHAMONDES	LEAL	VICTORIA VALENTINA	\N	2006-05-26	1	1	F
2298	21884430	8	GONZÁLEZ	ROSALES	FRANCO ANDRÉS	\N	2005-07-15	1	1	M
2299	22096538	4	BAEZ	YUPANQUI	MARTINA ISIDORA	\N	2006-04-07	1	1	F
2300	22075418	9	RUIZ	PINOCHET	YARELLA BELÈN	\N	2006-03-02	1	1	F
2301	21970812	2	RODRÍGUEZ	BOBADILLA	CAMILO IGNACIO	\N	2005-11-07	1	1	M
2302	22063582	1	CAMPOS	ESCOBAR	SEBASTIÁN IGNACIO	\N	2006-02-28	1	1	M
2303	22137580	7	GUTIÉRREZ	MOLINA	JOSEFA ANASTASIA	\N	2006-05-19	1	1	F
2304	21938019	4	JIMÉNEZ	MONROY	SARA ANTONIA	\N	2005-09-23	1	1	F
2305	21918686	K	CAMPOS	GONZÁLEZ	NICOLÁS ANDRÉS	\N	2005-08-29	1	1	M
2306	22054806	6	FUENTES	MAUREIRA	VICTORIA IGNACIA	\N	2006-02-19	1	1	F
2307	21969217	K	NORAMBUENA	CONTRERAS	VALENTINA ANDREA	\N	2005-11-05	1	1	F
2308	21889619	7	ULLOA	FUENTES	JOAQUÍN ALI	\N	2005-07-12	1	1	M
2309	22042329	8	CARRASCO	HERNÁNDEZ	JOSUE THOMAS	\N	2006-02-01	1	1	M
2310	21918520	0	SÁEZ	TONIONI	JOAQUÍN IGNACIO	\N	2005-08-17	1	1	M
2311	22141652	K	ROJAS	GONZÁLEZ	LENYEER VIVIAN	\N	2006-06-20	1	1	F
2312	21921190	2	TRONCOSO	MOLINA	FRANCISCA IGNACIA	\N	2005-09-03	1	1	F
2313	21841732	9	LINEROS	VILLAR	CATALINA ANDREA	\N	2005-05-21	1	1	F
2314	21903664	7	LARENAS	VERGARA	MAX ANDRÉS	\N	2005-08-07	1	1	M
2315	21993325	8	CASTILLO	MORALES	FRANCISCA ANTONIA	\N	2005-11-24	1	1	F
2316	22020953	9	CASTILLO	PINO	LISETTE SAMIRA PASCAL	\N	2006-01-13	1	1	F
2317	21886754	5	FUENTES	GONZÁLEZ	BRENDA SCKARLET ANNABEL	\N	2005-07-17	1	1	F
2318	22099760	K	MORA	VÁSQUEZ	JAVIERA ANTONIA	\N	2006-04-22	1	1	F
2319	22027582	5	PASTENE	ZENTENO	ROSARIO DEL CARMEN	\N	2006-01-23	1	1	F
2320	21883550	3	RENCORET	DUARTE	MARTÍN ALONSO	\N	2005-07-13	1	1	M
2321	22101683	1	YÁÑEZ	SEPÚLVEDA	CESAR ALONSO	\N	2006-04-12	1	1	M
2322	21906573	6	OSES	ASTUDILLO	BENJAMÍN IGNACIO	\N	2005-08-12	1	1	M
2323	22028213	9	ILABACA	COFRÉ	JAVIERA ISABEL	\N	2006-01-23	1	1	F
2324	22108596	5	MOLINA	ALARCÓN	EMILIA ANA ISIDORA	\N	2006-04-24	1	1	F
2325	22018545	1	ALARCÓN	CATALDO	GAMALIEL DAVID	\N	2006-01-11	1	1	M
2326	22083954	0	MUÑOZ	GATICA	SCARLETH ROCIO	\N	2006-02-07	1	1	F
2327	21980993	K	OSSES	ASCENCIO	YAEL IGNACIA	\N	2005-11-18	1	1	F
2328	21958183	1	ROMERO	PARADA	IGNACIA ISABEL	\N	2005-10-19	1	1	F
2329	22143918	K	BRAVO	ARAYA	VALENTINA PAZ	\N	2006-06-17	1	1	F
2330	21958548	9	BUSTOS	VELÁSQUEZ	MARCELO BENJAMIN	\N	2005-10-17	1	1	M
2331	22006724	6	VALDÉS	ALARCÓN	DANIELA MARGARITA	\N	2005-12-11	1	1	F
2332	21799353	9	NUÑEZ	LLANO	ÁLVARO IVAN	\N	2005-03-13	1	1	M
2333	22108179	K	RETAMAL	DÍAZ	BENJAMIN HUMBERTO	\N	2006-04-23	1	1	M
2334	21973462	K	PINOCHET	MOLINA	ELISA MARIAN KALI	\N	2005-11-08	1	1	F
2335	21842958	0	PÉREZ	NORAMBUENA	ALEXIS ANTONIO	\N	2005-05-19	1	1	M
2336	21930770	5	GARRIDO	VILCHES	CAMILO IGNACIO	\N	2005-09-13	1	1	M
2337	21922417	6	CARRASCO	PARRA	CATALINA CONSTANZA	\N	2005-08-15	1	1	F
2338	26235474	1	MICOLTA	SANCHEZ	DANIEL ALFONSO	\N	2004-02-11	1	1	M
2339	21628204	3	RIVAS	MÉNDEZ	MARTINA ALEJANDRA	\N	2004-07-28	1	1	F
2340	21958436	9	TRONCOSO	TRONCOSO	MÁXIMO CAMILO	\N	2005-10-19	1	1	M
2341	22027669	4	BRAVO	CAUTIVO	PATRICIO ANTONIO	\N	2006-01-19	1	1	M
2342	21930609	1	ALBORNOZ	VILLAR	BENJAMIN IGNACIO	\N	2005-09-12	1	1	M
2343	21992746	0	ESPINOZA	PARRA	JOCHEBED SARAI	\N	2005-12-02	1	1	F
2344	21932510	K	MÉNDEZ	ROJAS	ANA LAURA KATALINA	\N	2005-09-17	1	1	F
2345	22014602	2	MORALES	CASTRO	CONSTANZA MARIAM	\N	2005-12-31	1	1	F
2346	21858428	4	VILLA	SÁNCHEZ	SEBASTIÁN ADOLFO	\N	2005-06-07	1	1	M
2347	25507011	8	ALVAREZ	DAVID	DILAN DANIEL	\N	2005-02-10	1	1	M
2348	21959677	4	PUENTE	ALBORNOZ	CONSTANZA STEPHANIE ALEXANDRA	\N	2005-10-20	1	1	F
2349	21816110	3	SAGAL	MORÁN	IGNACIO BHENJAMIN	\N	2005-04-12	1	1	M
2350	21911036	7	TOLEDO	ARREDONDO	JOAQUÍN MAXIMILIANO	\N	2005-08-15	1	1	M
2351	22138904	2	YÁÑEZ	COLOMA	JOSEFA CATALINA	\N	2006-06-15	1	1	F
2352	21392555	5	GUZMÁN	SÁNCHEZ	MATÍAS IGNACIO	\N	2003-09-20	1	1	M
2353	21697601	0	VÁSQUEZ	VÁSQUEZ	JOAQUÍN IGNACIO	\N	2004-11-03	1	1	M
2354	21894692	5	BERASAIN	SÁNCHEZ	MAIRA BELÉN	\N	2005-07-24	1	1	F
2355	22115027	9	TORRES	COFRÉ	DAMARI DASIA	\N	2006-05-09	1	1	F
2356	21963016	6	MONTANARI	SKINNER	LUCCA ANGELO	\N	2005-10-23	1	1	M
2357	22028823	4	SEMPER	SOTO	BET-EL NAOMI	\N	2006-01-25	1	1	F
2358	21936739	2	AVILA	LUARTE	CARLA IGNACIA	\N	2005-09-13	1	1	F
2359	21921694	7	CASTILLO	LILLO	MARTINA PASCUALA	\N	2005-09-02	1	1	F
2360	22064380	8	MOLINA	TRONCOSO	CRISTOBAL IGNACIO	\N	2006-03-02	1	1	M
2361	21992794	0	MEDEL	IBÁÑEZ	CAROLAIN TERESA CATALINA	\N	2005-11-28	1	1	F
2362	22018993	7	MORALES	MEZA	CATALINA ANTONIA	\N	2005-12-26	1	1	F
2363	22002846	1	MUÑOZ	NAVARRETE	PATRICIA MACARENA	\N	2005-12-18	1	1	F
2364	21979351	0	VILLALOBOS	CIFUENTES	KEVIN BENJAMIN	\N	2005-11-20	1	1	M
2365	22121658	K	PARRAGUEZ	GONZÁLEZ	MILLARAY SOFÍA	\N	2006-05-17	1	1	F
2366	21836299	0	CABRERA	LARA	NICOLÁS ENRIQUE	\N	2005-05-11	1	1	M
2367	22055223	3	VÁSQUEZ	CAROCA	FRANCISCO ESTEBAN	\N	2006-02-17	1	1	M
2368	22102677	2	VÁSQUEZ	RETAMAL	FERNANDA BEATRIZ	\N	2006-04-17	1	1	F
2369	21999342	0	CASTILLO	ORMAZÁBAL	MONSERRAT CATALINA	\N	2005-12-17	1	1	F
2370	21895011	6	MIRANDA	MOLINA	DIEGO ALBERTO	\N	2005-07-26	1	1	M
2371	21914484	9	CANALES	CERDA	GALIANO ANDRÉS	\N	2005-08-21	1	1	M
2372	21863071	5	MATEO	VALENZUELA	BENJAMÍN MATÍAS	\N	2005-06-19	1	1	M
2373	21883962	2	FUENTEALBA	DÍAZ	ANTONIA IGNACIA	\N	2005-07-08	1	1	F
2374	21973734	3	FUENTES	MANQUEPI	MILLARAY MAGDALENA	\N	2005-11-08	1	1	F
2375	22052551	1	GODOY	FLORES	ANTONELLA JIMENA	\N	2006-02-16	1	1	F
2376	22017317	8	LEIVA	MEZA	JOAQUÍN DAGOBERTO	\N	2005-12-31	1	1	M
2377	21646914	3	MARTÍNEZ	LETELIER	CATALINA MARGARITA	\N	2004-08-28	1	1	F
2378	22104946	2	AGUILERA	RIQUELME	ELOI ISAIAS	\N	2006-04-28	1	1	M
2379	21935463	0	PINCHEIRA	BAHAMÓNDEZ	MAYER SEBASTIAN JESUS	\N	2005-09-17	1	1	M
2380	21637291	3	MEDINA	MARTÍNEZ	RENATO VALENTÍN	\N	2004-08-15	1	1	M
2381	21990291	3	VALENZUELA	VERGARA	DANIEL MARTIN	\N	2005-11-22	1	1	M
2382	22077983	1	BALBOA	CARRASCO	STEFANNYA MONSERRAT	\N	2006-03-18	1	1	F
2383	22035862	3	COFRÉ	GONZÁLEZ	FABIAN EDUARDO	\N	2006-02-02	1	1	M
2384	21632281	9	GAJARDO	AGUAYO	CONSTANZA IVONE	\N	2004-08-05	1	1	F
2385	22139565	4	GAJARDO	ANDRADES	CONSTANZA DE JESUS	\N	2006-06-15	1	1	F
2386	22065746	9	HENRÍQUEZ	GUTIÉRREZ	SEBASTIAN ALBERTO	\N	2006-03-04	1	1	M
2387	21998621	1	NORAMBUENA	VÁSQUEZ	DAYRIS KEIRA	\N	2005-12-14	1	1	F
2388	21948149	7	MOLINA	MUÑOZ	ANAÍS MARGARITA	\N	2005-10-06	1	1	F
2389	21951723	8	CARTER	BENAVIDES	MARCOS ENRIQUE	\N	2005-10-11	1	1	M
2390	21964339	K	FIGUEROA	BAHAMONDES	PATRICIA DENISSE	\N	2005-10-26	1	1	F
2391	21861426	4	MOLINA	NÚÑEZ	ALONSO ANDRÉS	\N	2005-06-17	1	1	M
2392	21876534	3	SALLES	ZÚÑIGA	RODRIGO ANDRÉS	\N	2005-07-04	1	1	M
2393	22004629	K	CASTILLO	ALARCÓN	NATALI ALMENDRA	\N	2005-12-22	1	1	F
2394	21962731	9	VENEGAS	CORTÉS	JAVIER ALEJANDRO	\N	2005-08-13	1	1	M
2395	21887367	7	QUEZADA	FLORES	DAIRIS SIMONEI	\N	2005-07-08	1	1	F
2396	22138941	7	BRAVO	YÁÑEZ	MAX JORDHAN ANTONIO	\N	2006-06-13	1	1	M
2397	22025805	K	ROMERO	QUEUPIL	DALILA MARINA MARGARITA	\N	2006-01-05	1	1	F
2398	22080273	6	NARANJO	MORALES	JOAQUIN SEBASTIAN	\N	2006-03-22	1	1	M
2399	22088509	7	TAMAYO	GONZÁLEZ	FERNANDA VALENTINA	\N	2006-04-04	1	1	F
2400	21998935	0	VALENZUELA	FUENTES	YOVANI ANDRES	\N	2005-12-05	1	1	M
2401	22025064	4	PÉREZ	VALLEJOS	BASTIAN ALEXANDER	\N	2006-01-19	1	1	M
2402	21991025	8	FUENTES	CAMPOS	ARIANA ANTONIA	\N	2005-12-01	1	1	F
2403	21891845	K	GARRIDO	ORELLANA	ALEJANDRO ANTONIO	\N	2005-07-23	1	1	M
2404	22100634	8	GUZMÁN	ARANCIBIA	LUCAS JESUS	\N	2006-04-20	1	1	M
2405	22100621	6	GUZMÁN	ARANCIBIA	MONTSERRAT AGUSTINA	\N	2006-04-20	1	1	F
2406	22059859	4	BARRERA	BAEZA	YONATHAN ANDRES	\N	2006-02-26	1	1	M
2407	21850759	K	ESCOBAR	NAVARRETE	FRANCO ANTONIO	\N	2005-06-02	1	1	M
2408	22093929	4	LILLO	ORELLANA	TOMÁS IGNACIO	\N	2006-04-10	1	1	M
2409	21970511	5	RAMÍREZ	SANTI	SEBASTIÁN IGNACIO	\N	2005-11-07	1	1	M
2410	21908305	K	SALGADO	HIDALGO	JOAQUÍN IGNACIO	\N	2005-08-12	1	1	M
2411	22054728	0	VALENZUELA	HUIRCALAF	GABRIELA SAYEN	\N	2006-02-18	1	1	F
2412	21961700	3	VILLALOBOS	TRONCOSO	FERNANDA SOFIA PAZ	\N	2005-10-25	1	1	F
2413	22065301	3	ZENTENO	BASOALTO	ANA BELEN	\N	2006-02-28	1	1	F
2414	21920034	K	GARRIDO	RODRÍGUEZ	MONSERRAT ANDREA	\N	2005-08-23	1	1	F
2415	22132448	K	GUTIÉRREZ	GODOY	ELIOT JESÚS	\N	2006-06-04	1	1	M
2416	22083838	2	GUTIÉRREZ	NORAMBUENA	EMILIO AMARU	\N	2006-03-25	1	1	M
2417	21959553	0	VÁSQUEZ	BAEZ	SEBASTIAN ALBERTO	\N	2005-10-22	1	1	M
2418	21893374	2	JARA	ESCANILLA	SERGIO ANTONIO	\N	2005-07-19	1	1	M
2419	21951891	9	ASTUDILLO	BARRERA	SEBASTIAN ANDRES	\N	2005-10-10	1	1	M
2420	22025873	4	GONZÁLEZ	BALVOA	FERNANDA DE LA PAZ	\N	2006-01-17	1	1	F
2421	21946641	2	VARGAS	ALIAGA	JAMILET DE LOS ANGELES	\N	2005-10-02	1	1	F
2422	21973291	0	TAPIA	CIFUENTES	JAIRO IGNACIO	\N	2005-11-07	1	1	M
2423	21919837	K	BASTIAS	VILLALOBOS	CARRY MURIEL	\N	2005-08-16	1	1	F
2424	21876960	8	ZAVALA	ORTIZ	MIGUEL EDUARDO	\N	2005-07-02	1	1	M
2425	21830215	7	ORELLANA	ORELLANA	JOSÉ TOMÁS	\N	2005-04-08	1	1	M
2426	21934320	5	VALDÉS	MOLINA	MARTÍN EDUARDO	\N	2005-09-16	1	1	M
2427	22084952	K	CHÁVEZ	BALLADARES	MARTIN EXEQUIEL	\N	2006-03-27	1	1	M
2428	22134551	7	ROSALES	INOSTROZA	TOMAS ARMANDO	\N	2006-05-29	1	1	M
2429	22091535	2	TAPIA	BELMAR	CRISTÓBAL GABRIEL	\N	2006-04-07	1	1	M
2430	22071933	2	VÁSQUEZ	BARRIENTOS	BENJAMIN ALONSO	\N	2006-03-13	1	1	M
2431	22068727	9	NAVARRETE	ARAVENA	JOAQUÍN ELÍAS	\N	2006-03-08	1	1	M
2432	21771503	2	LIZANA	PÉREZ	MATÍAS JESÚS	\N	2005-02-07	1	1	M
2433	21864686	7	RODRÍGUEZ	RAMÍREZ	FELIPE ANDRES	\N	2005-06-20	1	1	M
2434	22104466	5	ALVIAL	CANDIA	VICTOR ALONSO	\N	2006-04-26	1	1	M
2435	22031726	9	ALARCÓN	CASTILLO	MARTIN IGNACIO	\N	2006-01-26	1	1	M
2436	21878446	1	GARRIDO	SARABIA	ITZIEL DANIELA	\N	2005-07-06	1	1	F
2437	21994426	8	REYES	GONZÁLEZ	GABRIEL EDUARDO	\N	2005-12-09	1	1	M
2438	21940482	4	ZURITA	GONZÁLEZ	GUILLERMO DANILO	\N	2005-09-09	1	1	M
2439	22083559	6	GUTIÉRREZ	MOYA	SUSAN XIMENA	\N	2006-03-12	1	1	F
2440	21645742	0	RIVERA	PALOMERA	DANIEL IGNACIO	\N	2004-08-25	1	1	M
2441	22083751	3	ACEVEDO	LINEROS	BENJAMIN ANTONIO	\N	2006-03-30	1	1	M
2442	22008280	6	SALAZAR	PEÑA	EMMANUEL ALEXIS	\N	2005-12-27	1	1	M
2443	21954705	6	TAPIA	MUÑOZ	JAVIER ANTONIO	\N	2005-10-14	1	1	M
2444	21955812	0	ESCOBAR	PARADA	BENJAMÍN ALFREDO	\N	2005-10-11	1	1	M
2445	21679949	6	JUICA	SERRANO	ISIDORA ANDREA	\N	2004-09-28	1	1	F
2446	21650098	9	LAVADO	SOTO	FABIANA POLETTE	\N	2004-08-19	1	1	F
2447	22032423	0	SALGADO	GUTIÉRREZ	IGNACIO ALEJANDRO	\N	2006-01-30	1	1	M
2448	21976257	7	DOMÍNGUEZ	ARENAS	FLORENCIA ISIDORA	\N	2005-10-31	1	1	F
2449	21920273	3	GONZÁLEZ	DÍAZ	FRANCO JAVIER	\N	2005-08-17	1	1	M
2450	21851507	K	MAULÉN	ANGULO	AMARO ANDRÉS	\N	2005-06-02	1	1	M
2451	21904670	7	LOBOS	VÁSQUEZ	FERNANDO ESTEBAN	\N	2005-08-05	1	1	M
2452	22124687	K	ZÚÑIGA	LAGOS	ANTONIA SOFÍA	\N	2006-05-22	1	1	F
2453	22101667	K	CONTRERAS	MARTÍNEZ	OCTAVIO ANDRÉS	\N	2006-04-19	1	1	M
2454	22007699	7	GUTIÉRREZ	JEREZ	DÁMARIS BELÉN	\N	2005-12-26	1	1	F
2455	21874204	1	SALDAÑO	MONTERO	FELIPE AMADOR	\N	2005-06-29	1	1	M
2456	21957196	8	BARROS	ARAVENA	ANTONIA LORENA	\N	2005-10-11	1	1	F
2457	21874785	K	GONZÁLEZ	GARRIDO	OSCAR EDUARDO	\N	2005-06-30	1	1	M
2458	22132845	0	SEPÚLVEDA	RÍOS	MATIAS ALFONSO	\N	2006-06-01	1	1	M
2459	21803857	3	SILVA	MORALES	CONSTANZA MAKARENA	\N	2005-03-25	1	1	F
2460	22134141	4	NORAMBUENA	NORAMBUENA	VANESSA ANTONIA	\N	2006-06-09	1	1	F
2461	22006694	0	QUIROZ	VÁSQUEZ	MONTSERRAT GABRIELA	\N	2005-12-12	1	1	F
2462	21993383	5	ALFARO	GONZÁLEZ	JULIA CONSTANZA KATTALINA	\N	2005-11-18	1	1	F
2463	22004940	K	CASTRO	CARRASCO	FELIPE SEBASTIAN	\N	2005-11-28	1	1	M
2464	21905637	0	REYES	PERALTA	MARTÍN EMILIO	\N	2005-08-04	1	1	M
2465	22005649	K	BICHET	HERNÁNDEZ	BENJAMIN EDUARDO	\N	2005-12-24	1	1	M
2466	21920449	3	GONZÁLEZ	HUAIQUICHE	ASHLY VASNA	\N	2005-08-24	1	1	F
2467	22068830	5	IBÁÑEZ	VILCHES	AGUSTINA ELENA	\N	2006-03-09	1	1	F
2468	22100956	8	PAREJA	AVENDAÑO	JAVIERA CATALINA	\N	2006-04-19	1	1	F
2469	21952374	2	LÓPEZ	ARAYA	VALENTINA EMILIA	\N	2005-10-08	1	1	F
2470	22071159	5	ROJAS	RETAMAL	RENATO EMILIO	\N	2006-03-13	1	1	M
2471	21829209	7	VALENZUELA	SÁNCHEZ	ISIDORA BELÉN	\N	2005-04-30	1	1	F
2472	21753762	2	CARRASCO	RIQUELME	FERNANDA ANAISS	\N	2005-01-12	1	1	F
2473	21704490	1	VASQUEZ	VILLAR	CLAUDIO ESTEBAN	\N	2004-11-11	1	1	M
2474	22080272	8	MELO	CÁCERES	JULIAN VICENTE	\N	2006-03-24	1	1	M
2475	21839779	4	SANHUEZA	MEZA	FRANCISCA JAVIERA	\N	2005-05-12	1	1	F
2476	21502762	7	BENAVIDES	MÉNDEZ	STEFANY CONSTANZA	\N	2004-02-04	1	1	F
2477	22012005	8	SOTO	VILLALOBOS	CRISTIAN ANGEL	\N	2005-12-30	1	1	M
2478	21899729	5	LLANOS	CASTRO	CRISTÓBAL IGNACIO	\N	2005-07-31	1	1	M
2479	21985087	5	MEZA	MAUREIRA	BENJAMIN IGNACIO	\N	2005-11-24	1	1	M
2480	22013187	4	OVIEDO	MAUREIRA	SOFIA ALEJANDRA	\N	2005-12-20	1	1	F
2481	21721324	K	SEPÚLVEDA	CARRIÓN	KARIME ANTONIA	\N	2004-12-02	1	1	F
2482	21879168	9	IBÁÑEZ	MUÑOZ	CARLA ANDREA	\N	2005-07-04	1	1	F
2483	21847698	8	TORO	MÉNDEZ	VALENTINA IGNACIA	\N	2005-05-21	1	1	F
2484	22008182	6	VALDEBENITO	YÁÑEZ	JAVIERA CONSTANZA	\N	2005-12-24	1	1	F
2485	21949141	7	PONCE	FUENTES	BENJAMIN FELIPE	\N	2005-10-06	1	1	M
2486	21950549	3	FUENTES	IBAÑEZ	CAMILA FRANCISCA	\N	2005-10-04	1	1	F
2487	22013384	2	RUIZ	FLORES	JORDÁN IGNACIO	\N	2005-12-29	1	1	M
2488	21902409	6	GAETE	BARRIENTOS	BENJAMÍN MAXIMILIANO ADRIÁN	\N	2005-08-06	1	1	M
2489	22029836	1	SALINAS	CARTER	ANTONIA BELÉN	\N	2006-01-20	1	1	F
2490	21947580	2	BUSTAMANTE	SOLORZA	ANYEL ANTONELLA JOSÉ	\N	2005-10-06	1	1	F
2491	22076421	4	SEPÚLVEDA	AGURTO	MAGDALENA ANTONIA	\N	2006-02-07	1	1	F
2492	22058619	7	NORAMBUENA	ABARZA	IVAN ARNALDO	\N	2006-02-23	1	1	M
2493	21987776	5	VALLEJOS	CASTRO	FRANCO ANTONIO	\N	2005-10-21	1	1	M
2494	21998010	8	BRITO	MURGA	FRANCISCA ANTONIA	\N	2005-12-12	1	1	F
2495	21693039	8	YELICH	SUÁREZ	JULÍAN ALBERTO	\N	2004-10-25	1	1	M
2496	22130855	7	OPAZO	PIZARRO	MELISSA ESTELA	\N	2006-06-03	1	1	F
2497	21989798	7	SOTO	ALVIAL	KATHALINA FERNANDA IGNACIA	\N	2005-12-01	1	1	F
2498	22066868	1	MENA	VINEZ	ALEJANDRO DE PABLO	\N	2006-03-06	1	1	M
2499	21851321	2	ULLOA	LUENGO	ORNELLA ANTONIA	\N	2005-06-01	1	1	F
2500	21951339	9	ROSALES	GONZÁLEZ	MAXIMILIANO ANTONIO	\N	2005-10-10	1	1	M
2501	21905341	K	VERGARA	PRIETO	ALONSO IGNACIO	\N	2005-08-04	1	1	M
2502	21938069	0	ÁVILA	HERNÁNDEZ	BENJAMIN VICENTE	\N	2005-09-20	1	1	M
2503	21984840	4	JAQUE	RAMÍREZ	MAURICIO ANTONIO	\N	2005-11-23	1	1	M
2504	21990233	6	MUÑOZ	GUTIÉRREZ	ROMINA ESPERANZA	\N	2005-12-02	1	1	F
2505	22116057	6	QUINTANA	BASOALTO	MATÍAS NATANAEL	\N	2006-05-09	1	1	M
2506	21955015	4	ARÉVALO	GAETE	CAMILA SOFIA	\N	2005-10-16	1	1	F
2507	21944296	3	CARREÑO	CASTILLO	TANIA	\N	2005-09-28	1	1	F
2508	21951184	1	CARRILLO	BRAVO	FLORENCIA IGNACIA	\N	2005-09-14	1	1	F
2509	21758997	5	FUENTES	MORALES	MÁXIMO ALEJANDRO	\N	2005-01-18	1	1	M
2510	22020928	8	ALVIAL	SARAVIA	ANTONIO ALBERTO ANDRÉS	\N	2006-01-13	1	1	M
2511	21976318	2	MORALES	LEFIO	JOAQUIN ANDRES	\N	2005-11-05	1	1	M
2512	21875261	6	SEPÚLVEDA	BRAVO	DONNOVAN MIGUEL ANGEL	\N	2005-07-02	1	1	M
2513	22022807	K	CARTER	HERRERA	FERNANDA ANDREA	\N	2006-01-13	1	1	F
2514	21984328	3	BRAVO	ESPINOSA	JAVIERA IGNACIA	\N	2005-11-22	1	1	F
2515	21959051	2	CAMPOS	SEGURA	KIARA POLETH	\N	2005-10-18	1	1	F
2516	21955258	0	RIVEROS	CASTILLO	VICENTE IGNACIO	\N	2005-10-14	1	1	M
2517	21624975	5	CRISOSTOMO	CIFUENTES	FELIPE ANDRÉS	\N	2004-07-25	1	1	M
2518	22123728	5	FLORES	RAMOS	JOAQUIN ESTEBAN	\N	2006-05-22	1	1	M
2519	22098782	5	CALVENTUS	PRIETO	ELOI	\N	2006-04-17	1	1	M
2520	21929865	K	RIVERA	SEPÚLVEDA	VICENTE JAVIER	\N	2005-09-08	1	1	M
2521	22410892	3	REBOLLEDO	DÍAZ	CAMILA ANTONIA DEL PILAR	\N	2004-10-22	1	1	F
2522	22140448	3	SALDAÑA	SOLÍS	JAVIERA ANTONIA	\N	2006-06-16	1	1	F
2523	22109787	4	SOLORZA	VÁSQUEZ	MARK ANTONI GABRIEL ALFONSO	\N	2006-05-05	1	1	M
2524	22041622	4	HORMAZÁBAL	VALENZUELA	ANGELO JOSÉ	\N	2006-02-05	1	1	M
2525	22029915	5	ACEITÓN	ULLOA	MATIAS NICOLAS	\N	2006-01-25	1	1	M
2526	22132803	5	RIQUELME	SOLÍS	VICTORIA STEPHANIA	\N	2006-06-06	1	1	F
2527	21696476	4	GUZMÁN	GONZÁLEZ	LUIS EDUARDO	\N	2004-10-26	1	1	M
2528	22091876	9	SANTANDER	GONZÁLEZ	CAMILO IGNACIO	\N	2006-04-07	1	1	M
2529	21901653	0	ORTIZ	CARRASCO	DAVID GABRIEL	\N	2005-08-05	1	1	M
2530	21790043	3	ECHAGÜE	IBÁÑEZ	IGNACIO THOKIAN	\N	2005-03-08	1	1	M
2531	21565869	4	SOTO	CARRERA	SEBASTIÁN AIRTHON	\N	2004-05-03	1	1	M
2532	21688563	5	BUSTAMANTE	PARRA	WLADIMIR ALEXANDER	\N	2004-10-22	1	1	M
2533	21756272	4	LEIVA	SÁEZ	EVELYN SOLEDAD	\N	2005-01-19	1	1	F
2534	21082260	7	MÉNDEZ	OYARZÚN	CAMILA ANAÍS	\N	2003-03-27	1	1	F
2535	21644900	2	ORTEGA	GUTIÉRREZ	PABLO ANDRÉS	\N	2004-08-24	1	1	M
2536	21551822	1	MAUREIRA	RODRÍGUEZ	RENATA JESÚS	\N	2004-04-12	1	1	F
2537	21862745	5	FUENTES	VÁSQUEZ	BENJAMÍN IGNACIO	\N	2005-05-31	1	1	M
2538	21758115	K	LIENCURA	OLAVE	PAULA YASMIN MARINA	\N	2005-01-21	1	1	F
2539	21841527	K	DÍAZ	PEÑA	AMANDA PALOMA	\N	2005-05-19	1	1	F
2540	21651089	5	VALENZUELA	BUSTAMANTE	AGUSTÍN RAFAEL	\N	2004-08-31	1	1	M
2541	21724889	2	TORRES	DELGADO	YUDIT ABIGAIL	\N	2004-12-11	1	1	F
2542	21709429	1	BARROS	BUSTOS	AGUSTÍN JOSÉ	\N	2004-11-16	1	1	M
2543	21645885	0	VILLALOBOS	ARAVENA	GIAN FRANCO	\N	2004-08-24	1	1	M
2544	21588459	7	BAHAMONDES	GONZÁLEZ	JORGE ARTURO	\N	2004-05-28	1	1	M
2545	21655899	5	VALENZUELA	RIQUELME	MARTÍN SEBASTIÁN	\N	2004-09-03	1	1	M
2546	21638857	7	ALVIAL	TRONCOSO	MARIO ALFREDO	\N	2004-07-15	1	1	M
2547	21783912	2	TAPIA	VERGARA	RENATO SEBASTIÁN	\N	2005-03-01	1	1	M
2548	21719967	0	DURAN	MILESI	YULIANNA ANTONELLA	\N	2004-11-27	1	1	F
2549	21773161	5	MUÑOZ	PINOCHET	KARLA EMILIA	\N	2005-02-10	1	1	F
2550	21770667	K	ANTUNEZ	ANTÚNEZ	MARTÍN ALONSO	\N	2004-12-15	1	1	M
2551	21720032	6	GARCÍA	VARGAS	CRISTÓBAL JAVIER ALEXANDER	\N	2004-12-03	1	1	M
2552	21710574	9	SEPÚLVEDA	COFRÉ	SOFÍA PAZ	\N	2004-11-21	1	1	F
2553	21686955	9	PASTÉN	MAUREIRA	ARIANA PAZ	\N	2004-10-18	1	1	F
2554	21370571	7	GUZMÁN	ESPINOZA	VÍCTOR LEANDRO	\N	2003-08-17	1	1	M
2555	21686595	2	MILLAR	HIDALGO	SYDNI CATALINA	\N	2004-10-10	1	1	F
2556	21678949	0	MORAN	VÁSQUEZ	JOAQUIN AMARO	\N	2004-10-04	1	1	M
2557	21800862	3	PADILLA	LUENGO	RAYEN ANTONELLA	\N	2005-03-21	1	1	F
2558	21879345	2	SEPÚLVEDA	ALARCÓN	MARTINA MARIANA	\N	2005-05-17	1	1	F
2559	21703267	9	ACEVEDO	LINEROS	TATIANA VALENTINA	\N	2004-11-10	1	1	F
2560	21489206	5	CARRASCO	AGUSTO	NINIBETH CATALINA	\N	2004-01-15	1	1	F
2561	21705861	9	CORTES	MELO	FLORENCIA ANTONIA	\N	2004-11-03	1	1	F
2562	21761550	K	MONSALVE	CARTER	DANIEL ANGEL	\N	2005-01-26	1	1	M
2563	21626032	5	MUÑOZ	MUÑOZ	BENJAMÍN IGNACIO	\N	2004-08-01	1	1	M
2564	21764607	3	SILVA	PAVEZ	BAYRON ARIEL	\N	2005-02-01	1	1	M
2565	21643891	4	FUENTES	LÓPEZ	JOEL IGNACIO	\N	2004-08-21	1	1	M
2566	21742446	1	GUTIÉRREZ	SEPÚLVEDA	EMILY SOFÍA	\N	2004-12-29	1	1	F
2567	21502286	2	ARZOLA	MUÑOZ	BENJAMÍN FELIPE	\N	2004-02-06	1	1	M
2568	21807199	6	NÚÑEZ	GUTIÉRREZ	MARCELO ALFREDO	\N	2005-03-30	1	1	M
2569	21731655	3	TOLOZA	ESCOBAR	MARÍA IGNACIA	\N	2004-12-15	1	1	F
2570	21245032	4	PLAZA	REYES	DAYANA CRISTEL	\N	2004-07-19	1	1	F
2571	21680746	4	FUENTES	ROSALES	FRANCHESCA ANTONNELLA	\N	2004-10-06	1	1	F
2572	21645409	K	SAZO	VALDIVIA	MARTINA ANTONIA	\N	2004-08-25	1	1	F
2573	21635542	3	RONDÓN	GONZÁLEZ	DANIXZA ANDREA	\N	2004-08-03	1	1	F
2574	21372873	3	FIGUEROA	ARAYA	NICOLÁS ARMANDO	\N	2003-08-20	1	1	M
2575	21605989	1	JAQUE	BARROS	GONZALO ANTONIO	\N	2004-07-01	1	1	M
2576	21831668	9	SALAZAR	BUCAREY	FRANCISCO IGNACIO	\N	2005-05-06	1	1	M
2577	21802318	5	FIGUEROA	VARGAS	RENATO ANDRÉS	\N	2005-03-21	1	1	M
2578	21685687	2	ÁVILA	RETAMAL	DIEGO FERNANDO	\N	2004-10-18	1	1	M
2579	21592267	7	CIFUENTES	REBOLLEDO	MARTÍN IGNACIO	\N	2004-05-17	1	1	M
2580	21767491	3	SALINAS	MEJÍAS	SEBASTIÁN ELÍAS	\N	2004-12-10	1	1	M
2581	21795241	7	ARAYA	MONTENEGRO	PATRICIA ALEJANDRA	\N	2005-03-13	1	1	F
2582	21705859	7	VÁSQUEZ	MIQUEIRO	CAROLINA	\N	2004-11-15	1	1	F
2583	21789833	1	YÁÑEZ	COFRÉ	YUBITZA IGNACIA	\N	2005-02-20	1	1	F
2584	21732091	7	SALDÍAS	TAPIA	VICENTE ANTONIO	\N	2004-12-06	1	1	M
2585	21715525	8	CARRASCO	CASTILLO	FERNANDO ANDRÉS	\N	2004-11-29	1	1	M
2586	21645184	8	BRAVO	ÁVILA	ANGÉLICA VALENTINA	\N	2004-08-26	1	1	F
2587	21794693	K	ALBORNOZ	CORVALÁN	JOAQUÍN ALEXANDER	\N	2005-03-13	1	1	M
2588	21649232	3	CATALÁN	ORTEGA	LUIS ALFREDO	\N	2004-08-25	1	1	M
2589	21767076	4	NAVARRO	PEREIRA	ANTONIA VALENTINA	\N	2005-01-15	1	1	F
2590	21754296	0	LARENAS	FLORES	FERNANDA BEATRIZ	\N	2005-01-12	1	1	F
2591	21130414	6	SALGADO	MORA	MARTÍN ANTONIO	\N	2002-09-09	1	1	M
2592	21636702	2	ESPINOZA	FAJARDO	FERNANDA CATALINA	\N	2004-08-16	1	1	F
2593	21632244	4	OLIVO	CERDA	BELÉN ANTONIA	\N	2004-08-04	1	1	F
2594	21666673	9	OVIEDO	SEVERINO	JESÚS LEANDRO	\N	2004-09-24	1	1	M
2595	21466069	5	RECABAL	ALEGRÍA	EDISON ALEXANDER	\N	2003-12-12	1	1	M
2596	21807716	1	ROSALES	ÁLVAREZ	JULIÁN DARÍO	\N	2005-03-28	1	1	M
2597	21605880	1	FARIÑA	MORALES	VALENTINA IGNACIA	\N	2004-06-30	1	1	F
2598	21766272	9	GÓMEZ	MORALES	EVALUNA	\N	2005-02-02	1	1	F
2599	21627791	0	MORALES	TORRES	FERNANDA ANDREA	\N	2004-07-26	1	1	F
2600	21587988	7	SEPÚLVEDA	GONZÁLEZ	GABRIELA CONSTANZA	\N	2004-05-18	1	1	F
2601	21650714	2	VALDEBENITO	YÁÑEZ	DAHIANA ANDREA	\N	2004-08-28	1	1	F
2602	21658891	6	ARCE	RAMÍREZ	JOCABETH CATALINA	\N	2004-09-12	1	1	F
2603	21741534	9	CASTILLO	YÁÑEZ	BELÉN SCARLETT	\N	2004-12-27	1	1	F
2604	21630334	2	CÁCERES	REYES	HANS JESÚS BRANDON	\N	2004-07-26	1	1	M
2605	21731038	5	GARRIDO	CÁCERES	KAREN SOLANGE	\N	2004-12-16	1	1	F
2606	21824575	7	JAQUE	NORAMBUENA	CAMILA FERNANDA	\N	2005-04-26	1	1	F
2607	21813130	1	VALENZUELA	FLORES	SEBASTIÁN ALEJANDRO	\N	2005-04-06	1	1	M
2608	21654401	3	ÁLVAREZ	YÁÑEZ	CRISTOFER ALEJANDRO	\N	2004-09-02	1	1	M
2609	21120556	3	GONZÁLEZ	LAGOS	NANCY ALEJANDRA	\N	2003-07-10	1	1	F
2610	21405199	0	BUSTOS	MERCADO	SEBASTIÁN ANDRÉS	\N	2003-09-25	1	1	M
2611	21727259	9	CORDERO	CRUZ	BENJAMÍN ESTEBAN	\N	2004-12-12	1	1	M
2612	21668976	3	CARVAJAL	FREIRE	TRINIDAD YARITZA	\N	2004-09-23	1	1	F
2613	21803899	9	LARA	DÍAZ	BENJAMÍN RODRIGO	\N	2005-02-24	1	1	M
2614	21705497	4	SAAVEDRA	FERNÁNDEZ	JOSÉ IGNACIO	\N	2004-11-10	1	1	M
2615	21551322	K	YÁÑEZ	JIMÉNEZ	ROCIO MONSERRAT	\N	2004-10-28	1	1	F
2616	21774543	8	CARTAGENA	ROJAS	LUCAS MARTÍN	\N	2005-02-14	1	1	M
2617	21746039	5	BERRÍOS	SEPÚLVEDA	FABIÁN MATÍAS	\N	2005-01-07	1	1	M
2618	21679033	2	VILLENA	VILLENA	JAVIERA CAROLINA	\N	2004-08-26	1	1	F
2619	21858278	8	MILLA	SANHUEZA	PAULINA FERNANDA	\N	2005-05-24	1	1	F
2620	21765431	9	CATRIAN	GAJARDO	CATALINA IGNACIA	\N	2005-01-23	1	1	F
2621	21656291	7	ESPINOZA	PARRA	JAHAZIEL MELCHISEDEC	\N	2004-09-07	1	1	M
2622	21705568	7	REBOLLEDO	DÍAZ	JOSEFA ANTONIA	\N	2004-11-13	1	1	F
2623	21529312	2	ROJAS	RETAMAL	ESTEBAN ALONSO	\N	2004-03-11	1	1	M
2624	21611701	8	BOUSSAC	ANDAUR	MAXIMILIANO ANDRÉS	\N	2004-07-05	1	1	M
2625	21848284	8	CANALES	POBLETE	JORGE ARMANDO	\N	2005-05-18	1	1	M
2626	21655931	2	GUZMÁN	CASTILLO	CAMILO YABRÁN	\N	2004-09-04	1	1	M
2627	21622198	2	TORRES	PÉREZ	ANTONIA LORETO	\N	2004-07-19	1	1	F
2628	21794340	K	ORTIZ	RAMÍREZ	CATALINA ALEJANDRA	\N	2005-03-09	1	1	F
2629	21556093	7	MOYA	GUZMÁN	FERNANDA CONSTANZA	\N	2004-04-19	1	1	F
2630	21606369	4	FLORES	FLORES	KIARA DEL CARMEN	\N	2004-06-20	1	1	F
2631	21844585	3	IBACACHE	HERNÁNDEZ	GABRIEL	\N	2005-05-16	1	1	M
2632	21715219	4	MORALES	ROBLES	NICOLÁS ALEJANDRO	\N	2004-11-28	1	1	M
2633	21594281	3	OPAZO	VILLALOBOS	BASTIÁN ANDRÉS	\N	2004-06-06	1	1	M
2634	21664444	1	PALMA	QUINTERO	FABIOLA ISIDORA	\N	2004-09-22	1	1	F
2635	21820099	0	PONCE	ALEGRÍA	NAHUEL AYUN	\N	2005-04-18	1	1	M
2636	21693489	K	REYES	OPAZO	JOSÉ MOISÉS	\N	2004-10-25	1	1	M
2637	21766721	6	VALENZUELA	ZENTENO	ESTEBAN IGNACIO	\N	2005-02-03	1	1	M
2638	21641829	8	VARGAS	ALARCÓN	JAVIERA PAZ	\N	2004-08-19	1	1	F
2639	21795633	1	VÁSQUEZ	ARCE	MARTÍN VICENTE	\N	2005-03-03	1	1	M
2640	21847143	9	YÁÑEZ	VÁSQUEZ	MARTÍN IGNACIO	\N	2005-05-27	1	1	M
2641	21853954	8	CARREÑO	RETAMAL	BENJAMÍN IGNACIO	\N	2005-06-01	1	1	M
2642	21763840	2	CASTILLO	CARREÑO	BENJAMÍN ISAAC	\N	2005-01-30	1	1	M
2643	21715589	4	VILLAR	CASTRO	FERNANDO ANTONIO	\N	2004-11-26	1	1	M
2644	21605980	8	UTRERAS	MIRALLES	MARTINA JOSULIS	\N	2004-07-01	1	1	F
2645	21767144	2	ARRIAGADA	RUZ	MATÍAS SAMUEL	\N	2005-02-01	1	1	M
2646	21737100	7	REBOLLEDO	VINET	PATRICIO AARON	\N	2004-12-23	1	1	M
2647	21831461	9	VERGARA	JAQUE	PABLO ANDRÉS	\N	2005-05-03	1	1	M
2648	21836620	1	RETAMAL	VALDIVIA	MARÍA IGNACIA	\N	2005-05-14	1	1	F
2649	21699731	K	ÁLVAREZ	CONSTELA	MARTÍN ANDRE	\N	2004-10-25	1	1	M
2650	21806375	6	VENEGAS	MONTOYA	ISAAC CRISTÓBAL	\N	2005-03-30	1	1	M
2651	21719570	5	CIFUENTES	FUENTEALBA	ROCÍO ESTEFANY	\N	2004-12-01	1	1	F
2652	21722187	0	ROJAS	PEÑALILLO	MAXIMILIANO ELÍAS	\N	2004-11-29	1	1	M
2653	21598001	4	BARRAZA	MÉNDEZ	CATALINA ANTONIA	\N	2004-06-17	1	1	F
2654	21157085	7	ECHEVERRÍA	SALAZAR	ALEJANDRO JAVIER	\N	2002-10-30	1	1	M
2655	21611904	5	GUTIÉRREZ	JEREZ	SEFORA CAROLINA	\N	2004-07-06	1	1	F
2656	25101287	3	HERNÁNDEZ	DELGADO	MELISSA VALENTINA	\N	2004-04-05	1	1	F
2657	21569050	4	ULLOA	BUCKER	JAVIERA IGNACIA	\N	2004-05-05	1	1	F
2658	21795170	4	ROSALES	JORQUERA	DENIS NATALI DE LOS ANGELES	\N	2005-03-04	1	1	F
2659	21776741	5	ARAVENA	CÁRDENAS	ISIDORA AYELEN	\N	2005-02-16	1	1	F
2660	21642230	9	BARROS	FERNÁNDEZ	AHYLINE ALMENDRA	\N	2004-08-20	1	1	F
2661	21621943	0	GUTIÉRREZ	IBARRA	JAVIER IGNACIO	\N	2004-07-25	1	1	M
2662	21710095	K	MONTESINO	VÁSQUEZ	BENJAMÍN RENATO	\N	2004-11-15	1	1	M
2663	21727342	0	PARRA	RAMÍREZ	CALEB	\N	2004-12-04	1	1	M
2664	21655087	0	SEPULVEDA	VERGARA	RENATA ANTONIA	\N	2004-09-06	1	1	F
2665	21564422	7	VIVANCO	CASTILLO	RENATA ESTEFANÍA	\N	2004-04-27	1	1	F
2666	21656937	7	MUÑOZ	BUENO	EMILIA BELÉN	\N	2004-09-04	1	1	F
2667	21762553	K	ROJAS	GONZÁLEZ	CRISTÓBAL FRANCISCO	\N	2005-01-31	1	1	M
2668	21786403	8	MUÑOZ	BUSTOS	PRISCILA ANTONIA	\N	2005-02-28	1	1	F
2669	21806178	8	URRUTIA	ANDRADES	LUCAS BENJAMÍN	\N	2005-03-22	1	1	M
2670	21675677	0	BRUNA	BASOALTO	ALONSO ELISEO	\N	2004-10-04	1	1	M
2671	21758580	5	ESPINOZA	SOTO	TABITA ANDREA	\N	2005-01-23	1	1	F
2672	21845391	0	PINO	BECERRA	CARLOS ANDRÉS	\N	2005-05-26	1	1	M
2673	21325001	9	TRONCOSO	VÁSQUEZ	FABIOLA ANAÍS ALEJANDRA	\N	2003-05-08	1	1	F
2674	21709400	3	VILLABLANCA	NÚÑEZ	KIARA ALEXANDRA	\N	2004-11-15	1	1	F
2675	21611129	K	VILLAR	GUTIÉRREZ	NATALIA FRANCISCA	\N	2004-07-04	1	1	F
2676	21638888	7	GUZMÁN	REYES	SEBASTIÁN IGNACIO	\N	2004-08-06	1	1	M
2677	21394302	2	SUÁREZ	ROCHA	BENJAMÍN ESTEBAN	\N	2003-09-23	1	1	M
2678	21774820	8	CAMPOS	ÁLVAREZ	PATSY VALENTINA	\N	2005-02-14	1	1	F
2679	21562332	7	MALDONADO	RIFFO	MARCO ANTONIO	\N	2004-04-26	1	1	M
2680	100374550	K	PUYOZA	FERNANDEZ	VALERIA CRISTINA	\N	2004-09-14	1	1	M
2681	21806057	9	TORRES	CIFUENTES	FRANCISCA BELÉN	\N	2005-03-16	1	1	F
2682	21752530	6	AVENDAÑO	SALAS	MANUEL JESÚS	\N	2005-01-15	1	1	M
2683	21643231	2	MAUREIRA	FERNÁNDEZ	NICOLÁS ALBERTO	\N	2004-08-23	1	1	M
2684	21524501	2	JARA	SOTO	DYLAN ALEXANDER	\N	2004-03-03	1	1	M
2685	21542289	5	VÁSQUEZ	PÉREZ	YANINA DEBORA ESTER	\N	2004-03-13	1	1	F
2686	21641782	8	BELDA	HERRERA	MILLARAY RAYEN ANAÍS	\N	2004-08-18	1	1	F
2687	21239072	0	RODRÍGUEZ	MOLINA	JOSÉ MIGUEL	\N	2003-02-17	1	1	M
2688	21708689	2	VALLEJOS	VILLARROEL	LAURA ISABEL ANDREA	\N	2004-11-10	1	1	F
2689	21466326	0	OSORIO	GONZÁLEZ	BENJAMÍN LUCIANO OCTAVIO	\N	2003-12-19	1	1	M
2690	21839430	2	BARROS	GONZÁLEZ	FRANCISCO ENRIQUE	\N	2005-05-16	1	1	M
2691	21736593	7	FUENTES	ZARRICUETA	FRANCISCO RICARDO ESTEBAN	\N	2004-12-22	1	1	M
2692	21783287	K	MUÑOZ	SOTO	MARCELO ALONSO	\N	2005-02-28	1	1	M
2693	21629851	9	BAHAMÓNDEZ	TRONCOSO	FRANCISCO JAVIER	\N	2004-08-03	1	1	M
2694	21804648	7	CONTRERAS	RAMOS	CONSTANSA CAROLAIN	\N	2005-03-25	1	1	F
2695	21712511	1	RODRÍGUEZ	CARRERA	BÁRBARA DEL CARMEN	\N	2004-11-19	1	1	F
2696	21617858	0	VALENZUELA	PALMA	ANGELO GIOVANNI	\N	2004-07-18	1	1	M
2697	21699710	7	MORALES	VARGAS	JOSÉ ALFONSO	\N	2004-07-27	1	1	M
2698	21707344	8	AVENDAÑO	HIDALGO	ISIDORA IGNACIA	\N	2004-11-15	1	1	F
2699	21797640	5	FUENTES	FIGUEROA	ISABELLA ANTONIA	\N	2005-02-22	1	1	F
2700	21557445	8	LOBOS	MONDACA	DANIEL ALEJANDRO	\N	2004-04-21	1	1	M
2701	21272043	7	MANZANO	ZENTENO	SOFÍA	\N	2003-04-06	1	1	F
2702	21797655	3	SÁNCHEZ	MARDONES	CLAUDIO ALEXANDER	\N	2005-03-15	1	1	M
2703	21540504	4	VILLAR	NOVOA	ELÍAS MANASES	\N	2004-03-28	1	1	M
2704	21358554	1	PINCHEIRA	ZAPATA	KAREN SCARLETH	\N	2003-08-06	1	1	F
2705	21656352	2	ORELLANA	ESCOBAR	DIEGO ALEJANDRO	\N	2004-09-10	1	1	M
2706	21633176	1	URETA	CRISÓSTOMO	ANTONIA CATALINA	\N	2004-07-15	1	1	F
2707	21713258	4	FUENTES	ROJAS	MANUEL SALVADOR	\N	2004-11-23	1	1	M
2708	21766941	3	GARCÍA	REYES	FERNANDA ANTONIA	\N	2005-01-23	1	1	F
2709	21808195	9	HERNÁNDEZ	BUSTAMANTE	MARTINA CONTANZA	\N	2005-03-30	1	1	F
2710	21810383	9	MONTECINO	JARA	SCARLETH ALEXANDRA	\N	2005-04-04	1	1	F
2711	21746077	8	ORÓSTICA	PARADA	ELIZABETH ALEJANDRA	\N	2005-01-04	1	1	F
2712	21511004	4	ABARCA	LEAL	JOSEANTONIO HUGO	\N	2004-02-18	1	1	M
2713	21612535	5	IBÁÑEZ	ORTEGA	NOELIA MASSIEL	\N	2004-07-08	1	1	F
2714	21692425	8	BURGOS	FERNÁNDEZ	MATÍAS ANTONIO	\N	2004-10-18	1	1	M
2715	21748549	5	VALENZUELA	PEREIRA	VICENTE IGNACIO	\N	2005-01-11	1	1	M
2716	21856568	9	BRAVO	VILLAR	JAIME ANTONIO	\N	2005-06-09	1	1	M
2717	21772608	5	SEPÚLVEDA	LUCUMILLA	CRISTÍAN JAVIER	\N	2005-01-17	1	1	M
2718	21499336	8	ESCALONA	ORELLANA	BRIAN BASTIÁN	\N	2003-12-04	1	1	M
2719	21845809	2	LEAL	ALMUNA	CARLA ANTONIA	\N	2005-05-24	1	1	F
2720	21780651	8	ESPINOZA	SAN MARTÍN	CONSTANZA ANTONIA	\N	2005-02-21	1	1	F
2721	21717537	2	VILLAR	TORRES	ANTONIO ANDRÉS	\N	2004-11-30	1	1	M
2722	21826322	4	SEGOVIA	YÁÑEZ	CATALINA ANDREA	\N	2005-04-28	1	1	F
2723	21821346	4	ACUÑA	ACUÑA	FERNANDO ALBERTO	\N	2005-04-21	1	1	M
2724	21593838	7	BRAVO	CHANDÍA	MARÍA FRANCISCA	\N	2004-05-31	1	1	F
2725	21598542	3	GUTIÉRREZ	GAJARDO	FRANSCESCA ANTONELLA	\N	2004-06-08	1	1	F
2726	21697718	1	PROVOSTE	RIQUELME	BELÉN ESPERANZA	\N	2004-11-05	1	1	F
2727	21672540	9	SAGREDO	BARROS	FERNANDA SOFÍA	\N	2004-10-02	1	1	F
2728	21736602	K	ACHU	ARAYA	CATALINA BELÉN	\N	2004-12-23	1	1	F
2729	21725307	1	GONZÁLEZ	CASTRO	BRAIAN PATRICIO	\N	2004-12-08	1	1	M
2730	21816238	K	LÓPEZ	ALARCÓN	MAXIMILIANO ALEJANDRO	\N	2005-04-12	1	1	M
2731	21851106	6	LÓPEZ	OLIVARES	ANTONIA CAROLINA DEL CARMEN	\N	2005-06-01	1	1	F
2732	21245608	K	MARDONES	ARANCIBIA	CARLOS ANTONIO	\N	2004-12-27	1	1	M
2733	21481535	4	VILLAR	LLANO	EMILY RUTH	\N	2004-01-06	1	1	F
2734	21874344	7	JÁUREGUI	SALAZAR	BENJAMÍN TOMÁS	\N	2005-06-30	1	1	M
2735	21736765	4	PINCHEIRA	PINCHEIRA	CHRISTTEL BELÉN	\N	2004-12-22	1	1	F
2736	21670064	3	RETAMAL	PÉREZ	TAMAR JUDIT	\N	2004-09-07	1	1	F
2737	21665035	2	ROJAS	DÍAZ	JAVIERA IGNACIA	\N	2004-09-18	1	1	F
2738	21721916	7	TORO	ESCOBAR	TOMÁS AGUSTÍN	\N	2004-11-30	1	1	M
2739	21753056	3	LIENCURA	VIVANCO	ALEXIA ANDREA	\N	2005-01-13	1	1	F
2740	21733793	3	VERA	ÁVILA	RICHARD CRISTÓBAL	\N	2004-12-20	1	1	M
2741	21798290	1	GONZÁLEZ	COFRÉ	ARON NICOLÁS	\N	2005-03-07	1	1	M
2742	21456721	0	MUÑOZ	VERGARA	FELIPE ANTONIO	\N	2003-11-10	1	1	M
2743	21623379	4	TAMAYO	FUENTES	SEBASTIÁN IGNACIO	\N	2004-07-26	1	1	M
2744	21506999	0	VÁSQUEZ	PÉREZ	NICOLÁS MAXIMILIANO	\N	2004-02-12	1	1	M
2745	21815144	2	COFRÉ	TRONCOSO	NICOLÁS IGNACIO	\N	2005-04-11	1	1	M
2746	21659758	3	CONTRERAS	MORALES	CONSTANZA ALEJANDRA	\N	2004-09-13	1	1	F
2747	21683111	K	CONTRERAS	TAPIA	JAVIERA IGNACIA	\N	2004-10-12	1	1	F
2748	21844291	9	HUEQUELEF	CATALÁN	FERNANDA ANTONIA	\N	2005-05-25	1	1	F
2749	21645000	0	VALDÉS	TAPIA	BENJAMÍN EDUARDO	\N	2004-08-24	1	1	M
2750	24245583	5	PEÑA	PUCHETA	ALDANA	\N	2004-05-17	1	1	F
2751	21631751	3	OLAVE	FUENTES	PATRICIO ANTONIO	\N	2004-07-28	1	1	M
2752	21720150	0	ALFARO	CHANDÍA	GISELL ANDREA	\N	2004-11-30	1	1	F
2753	21720125	K	ALFARO	CHANDÍA	GISELLA DOMINIQUE	\N	2004-11-30	1	1	F
2754	21710779	2	CARRIÓN	ALMUNA	BENJAMÍN MATÍAS	\N	2004-11-15	1	1	M
2755	21649609	4	IBÁÑEZ	SEPÚLVEDA	BENJAMÍN IGNACIO	\N	2004-09-01	1	1	M
2756	21790953	8	CARRASCO	LOBOS	YANCARLO ANDRÉS	\N	2005-03-07	1	1	M
2757	21703439	6	TERAN	ARAYA	CLAUDIO TOMÁS	\N	2004-11-11	1	1	M
2758	21584868	K	FUENZALIDA	CIFUENTES	SAMIRA TAHIA	\N	2004-05-19	1	1	F
2759	21692045	7	ARIAS	TRONCOSO	MARÍA JESÚS	\N	2004-10-25	1	1	F
2760	21794441	4	ARIAS	MONSALVE	TOMÁS ALONSO	\N	2005-03-08	1	1	M
2761	21617386	4	MARTÍNEZ	AMPAI	NICOLÁS DIXON	\N	2004-07-16	1	1	M
2762	21614425	2	REYES	JORQUERA	FERNANDA ANTONIA	\N	2004-07-10	1	1	F
2763	21547878	5	VILLAR	ZAMBRANO	VÍCTOR IGNACIO	\N	2004-04-09	1	1	M
2764	21653229	5	NORAMBUENA	MUÑOZ	VALENTINA DEL PILAR	\N	2004-09-05	1	1	F
2765	21874151	7	OLATE	LETELIER	MARTYN IGNACIO	\N	2005-06-26	1	1	M
2766	21549336	9	OLGUÍN	CABRERA	CAMILA EDUARDA ANTONIA	\N	2004-04-14	1	1	F
2767	21681660	9	QUEZADA	FAÚNDEZ	CRISTÓBAL ARIEL	\N	2004-10-12	1	1	M
2768	21762335	9	ARIAS	CARTER	EMILIA BELÉN	\N	2005-01-29	1	1	F
2769	21762340	5	ARIAS	CARTER	JULIETA BELÉN	\N	2005-01-29	1	1	F
2770	21615298	0	ESPINOZA	SALGADO	ARIEL JOSÉ	\N	2004-07-12	1	1	M
2771	21651298	7	GAMBOA	CARVAJAL	CRISTÓBAL FELIPE ALONSO	\N	2004-09-05	1	1	M
2772	21727209	2	CÁCERES	CHÁVEZ	LUIS ARTURO	\N	2004-11-23	1	1	M
2773	25625099	3	MESTRE	GONZALEZ	GABRIEL ALEJANDRO	\N	2004-02-22	1	1	M
2774	21653993	1	MOYA	MUÑOZ	CAMILA CHRISTIANNE	\N	2004-08-29	1	1	F
2775	21821241	7	CID	AEDO	NICOL ALMENDRA ALIDA	\N	2005-04-22	1	1	F
2776	21760753	1	ITURRA	VÁSQUEZ	KEVIN DANILO	\N	2005-01-18	1	1	M
2777	21701467	0	FUENTEALBA	RODRÍGUEZ	MAXIMILIANO JESÚS	\N	2004-11-01	1	1	M
2778	21803974	K	HERNÁNDEZ	LUENGO	RENATO EDUARDO	\N	2005-03-11	1	1	M
2779	21856174	8	MORALES	URIBE	DIEGO ANDRÉS	\N	2005-06-10	1	1	M
2780	21500869	K	SALINAS	SOTO	SEBASTIÁN IGNACIO	\N	2004-02-05	1	1	M
2781	21874790	6	ROJAS	AGUILAR	ANGELA BELÉN	\N	2005-06-28	1	1	F
2782	21664596	0	NORAMBUENA	KUSANOVIC	MATÍAS ALEJANDRO	\N	2004-09-17	1	1	M
2783	21878257	4	SEPÚLVEDA	CARTER	ROSÍO IGNACIA	\N	2005-05-28	1	1	F
2784	21619751	8	ORTUBIA	TRONCOSO	BENJAMÍN HERNÁN	\N	2004-07-19	1	1	M
2785	21774530	6	CARTAGENA	ROJAS	VICENTE MATEO	\N	2005-02-14	1	1	M
2786	21662964	7	ALARCÓN	INOSTROZA	CARLA ANDREA	\N	2004-08-30	1	1	F
2787	21815939	7	DOMÍNGUEZ	ALVIAL	JOSÉ NOLASKO	\N	2005-04-10	1	1	M
2788	21691171	7	MOLL	SEPÚLVEDA	LISEPT ELIANA	\N	2004-10-24	1	1	F
2789	21646835	K	AGUILAR	CERNA	SOFÍA ANDREA	\N	2004-08-20	1	1	F
2790	21798717	2	ROMERO	PARRA	MARTÍN NICOLÁS ALEJANDRO	\N	2005-03-08	1	1	M
2791	21725126	5	GATICA	GATICA	VALENTINA IGNACIA	\N	2004-12-08	1	1	F
1408	23302772	3	BARRIOS	YÁÑEZ	MATEO FRANCISCO	\N	2010-04-18	1	1	M
\.


--
-- Data for Name: funcionario; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.funcionario (id_funcionario, rut_funcionario, dv_rut_funcionario, ap_funcionario, am_funcionario, nombres_funcionario, sexo, fecha_nacimiento, id_estado, id_tipo_funcionario) FROM stdin;
3	10215387	1	GATICA	JORQUERA	JAIME ADRIÁN	M	1965-07-08	1	\N
4	10318074	0	RODRÍGUEZ	PINCHEIRA	ISABEL IRENE	F	1965-07-12	1	\N
5	10431851	7	SÁEZ	VILLALOBOS	ELÍAS SEGUNDO	M	1966-05-08	1	\N
6	10548925	0	VENEGAS	GAJARDO	MIRIAM LETICIA	F	1966-01-01	1	\N
7	10663252	9	URRUTIA	PINTO	PAOLA MARITZA	F	1971-03-21	1	\N
8	10740289	6	ORIBE	GONZÁLEZ	LEONARDO FANNELY	M	1978-11-15	1	\N
9	12089624	5	OLIVA	FUENTES	GIOVANNA PAOLA	F	1967-12-11	1	\N
10	12372179	9	VÁSQUEZ	CARRASCO	OLAYA DE LAS MERCEDES	F	1973-08-20	1	\N
11	12373614	1	CASTILLO	CASTILLO	NOELIA BEATRIZ	F	1973-07-19	1	\N
12	12789568	6	PALMA	HENRÍQUEZ	BENJAMÍN OSVALDO	M	1971-03-28	1	\N
13	12790827	3	ARAVENA	MORALES	KARINA DE LAS MERCEDES	F	1975-09-17	1	\N
14	12791178	9	NÚÑEZ	CASTILLO	LEONARDO FELIPE	M	1975-11-16	1	\N
15	13600664	9	VILLAGRÁN	ARIAS	MACCARENA DEL CARMEN	F	1979-10-24	1	\N
16	13615910	0	SUAZO	ACUÑA	JUAN ESTEBAN	M	1979-06-09	1	\N
17	13616152	0	SAGAL	JEREZ	GLORIA ESTELA	F	1979-09-10	1	\N
18	13616356	6	ABARZÚA	GODOY	FELIPE ANDRÉS	M	1979-11-07	1	\N
19	13864318	2	QUELOPANA	CASTRO	ISRAEL ANDRÉS	M	1980-10-05	1	\N
20	13895997	K	BERNAL	DE LA FUENTE	RENÉ ANDRÉS	M	1980-01-28	1	\N
21	14497720	3	MARTÍNEZ	SANHUEZA	JUAN CARLOS NELSON	M	1976-03-07	1	\N
22	14574914	K	PORRA		ALEJANDRO SEBASTIÁN	M	1988-01-23	1	\N
23	14597276	0	LEÓN	MORALES	MITZI MARCELA	F	1980-02-15	1	\N
24	15153035	4	BELTRÁN	CAMPOS	ANDREA DE LOS ANGELES	F	1982-07-08	1	\N
25	15153653	0	ALDERETE	BARRIENTOS	JOSÉ MIGUEL	M	1982-10-07	1	\N
26	15156367	8	RAMÍREZ	URRA	NATANAEL MARCELO	M	1985-09-20	1	\N
27	15327699	4	RÍOS	SALAS	RODRIGO ESTEBAN	M	1977-06-05	1	\N
28	15474390	1	LAZO	GALDAMES	KAELI PAZ ELIZABETH	F	1982-09-06	1	\N
29	15569973	6	RETAMAL	RAMOS	RUPERTO ANTONIO	M	1983-08-23	1	\N
30	15675826	4	CANDIA	SOTO	PAOLA ALEJANDRA	F	1984-08-14	1	\N
31	15746862	6	SAN MARTÍN	MORA	CYNTHIA DINELLY	F	1984-03-01	1	\N
32	15746864	2	FERNÁNDEZ	NEGRETE	JUAN PABLO	M	1984-03-01	1	\N
33	15920055	8	TAPIA	ZÚÑIGA	MARJORI BERNARDITA	F	1984-07-20	1	\N
34	15920977	6	JAQUE	GONZÁLEZ	LEONARDO ANDRÉS	M	1984-10-21	1	\N
35	15973463	3	MARCHANT	GUERRERO	KARINA ANDREA	F	1985-01-07	1	\N
36	16119445	K	ANDAUR	ORTIZ	PATRICIO AMBROSIO	M	1985-04-27	1	\N
37	16270058	8	FERNÁNDEZ	ABURTO	CARLA SOFÍA DAYANA	F	1985-11-26	1	\N
38	16273466	0	COLL	MARTÍNEZ	PABLO ANDRÉS	M	1985-11-22	1	\N
39	16273701	5	MÉNDEZ	RAMOS	KARLA ANDREA	F	1985-11-16	1	\N
40	16275469	6	MORENO	GONZÁLEZ	JOSÉ MIGUEL	M	1986-09-05	1	\N
41	16279202	4	CORVALÁN	CORVALÁN	MAURICIO GONZALO	M	1986-01-28	1	\N
42	16298906	5	ROJAS	MENDOZA	JORGE ROBERTO	M	1986-04-09	1	\N
43	16480129	2	CÓRDOVA	CRUZ	ELISEO ANTONIO	M	1987-06-19	1	\N
44	16536649	2	ELO	GONZALEZ	FRANCISCA LORENA	F	1986-10-11	1	\N
45	16538704	K	MÉNDEZ	ARAVENA	LEANDRO ANDRÉS	M	1987-09-24	1	\N
46	16836372	9	VÁSQUEZ	VÁSQUEZ	DANIEL ALEXIS	M	1987-12-28	1	\N
47	17100869	7	COLVIN	VALDÉS	CAROLINA ANDREA	F	1989-01-18	1	\N
48	17122656	2	URIBE	MONTECINOS	KATHERINE DE LOURDES	F	1989-01-21	1	\N
49	17146810	8	TAPIA	VILLARROEL	LUZ MARGARITA	F	1988-10-15	1	\N
50	17156677	0	ARANCIBIA	CASTILLO	JIMMY ANDRÉS	M	1989-05-27	1	\N
51	17157380	7	ARRIAGADA	VALENZUELA	EDUARDO CARLOS	M	1989-08-31	1	\N
52	17172087	7	LARA	CAMPOS	LILIANA GEMITA	F	1989-07-27	1	\N
53	17214091	2	GUTIÉRREZ	ZÚÑIGA	DENISSE ALEJANDRA	F	1990-10-17	1	\N
54	17329902	8	YÁÑEZ	MUÑOZ	MIRIAM FABIOLA	F	1990-02-09	1	\N
55	17447241	6	GUERRERO	MARTÍNEZ	LUIS VICENTE	M	1989-03-08	1	\N
56	17447926	7	HACHIM	MARTÍNEZ	TAMARA NICOLE	F	1990-01-04	1	\N
57	17448647	6	GUTIÉRREZ	GONZÁLEZ	CARMEN ALICIA	F	1990-04-01	1	\N
58	17448761	8	DÍAZ	NORAMBUENA	MARÍA PAZ	F	1990-03-30	1	\N
59	17449596	3	CISTERNA	LUPALLANTE	ANGELA FABIOLA	F	1990-08-06	1	\N
60	17469890	2	ALBORNOZ	SALAZAR	DAISY MARINA	F	1990-03-01	1	\N
61	17494215	3	REYES	SOLORZA	DANIELA SOLEDAD	F	1989-11-26	1	\N
62	17651750	6	TAPIA	CASTRO	JUAN ANTONIO	M	1989-08-19	1	\N
63	17744270	4	ARRIAGADA	QUEZADA	PAOLA MARISOL	F	1991-04-26	1	\N
64	17758308	1	GÓMEZ	CERDA	DIEGO ANTONIO	M	1990-10-29	1	\N
65	17758735	4	VILLAR	PEDROL	DANIELA ALEJANDRA	F	1991-02-01	1	\N
66	17759597	7	CERDA	OPAZO	PAULINA ROSA	F	1991-05-23	1	\N
67	17883991	8	RETAMAL	LÓPEZ	SEBASTIÁN EDUARDO	M	1992-04-02	1	\N
68	18029436	8	LOYOLA	FUENZALIDA	NICOLE ALEJANDRA	F	1993-05-11	1	\N
69	18148602	3	MUÑOZ	CARRASCO	GONZALO MAURICIO	M	1992-05-25	1	\N
70	18342110	7	MOREIRA	SEPÚLVEDA	VÍCTOR MANUEL	M	1992-11-06	1	\N
71	18342377	0	ESPINOZA	PEÑA	BORIS ALEXANDER	M	1992-12-13	1	\N
72	18343175	7	LETELIER	ARAVENA	HÉCTOR DIEGO	M	1993-03-17	1	\N
73	18982277	4	GONZÁLEZ	MONTESINO	MARÍA DEL CARMEN	F	1995-04-04	1	\N
74	19043088	K	VARGAS	ROJAS	BASTIÁN LUIS	M	1995-09-14	1	\N
75	19345850	5	PINTO	OLIVA	DENNIS ISAÍAS	M	1996-01-03	1	\N
76	19895287	7	PACHECO	SEPÚLVEDA	RODOLFO ALEXIS	M	1998-02-02	1	\N
77	19896448	4	SEPÚLVEDA	PACHECO	ALEJANDRA ANDREA	F	1998-09-14	1	\N
78	19936902	4	SOTO	HERNÁNDEZ	CYNTHIA NOELIA	F	1989-07-15	1	\N
79	20070701	K	NORAMBUENA	ECHEVERRÍA	VALENTINA ALEJANDRA	F	1999-04-27	1	\N
80	6609857	5	AYALA	QUEZADA	PATRICIO EDMUNDO	M	1952-11-16	1	\N
81	6650113	2	CARRASCO	CAMPOS	JORGE ENRIQUE	M	1952-02-04	1	\N
82	6667910	1	SALINAS	CASTRO	CARLOS ENRIQUE	M	1955-02-11	1	\N
83	6950824	3	MERINO	SEPÚLVEDA	EDINSON ARMANDO	M	1952-02-10	1	\N
84	7127457	8	ROMERO	SILVA	MARCO ALCIBIADES	M	1957-02-25	1	\N
85	7164809	5	FLORES	VALENZUELA	JOSÉ ENRIQUE	M	1954-03-28	1	\N
86	7485156	8	LARA	STOLZE	LUIS ERNESTO	M	1955-09-25	1	\N
87	7542881	2	ÁLVAREZ	MARIÁNGEL	DANIEL ROBERTO	M	1956-09-07	1	\N
1	18342560	9	SANDOVAL	LUENGO	MARIO DOMINGO	M	1993-01-07	1	\N
88	7731192	0	LASTRA	VICENTE	MARÍA CECILIA DEL PILAR	F	1963-05-18	1	\N
89	7801508	K	CARVAJAL	AYALA	MARÍA ELENA	F	1957-11-30	1	\N
90	7910609	7	BARROS	VERGARA	MARÍA ELENA	F	1960-11-01	1	\N
91	7980612	9	ECHEVERRÍA	ELGUETA	ELISEO ARNOLDO	M	1962-11-26	1	\N
92	8023380	9	MORA	GARRIDO	MARÍA NATALIA	F	1958-03-27	1	\N
93	8068440	1	CISTERNA	ROCHA	MARITZA DEL CARMEN	F	1958-11-21	1	\N
94	8084888	9	ORTIZ	GARRIDO	CLOTILDE TAMARA	F	1957-06-14	1	\N
95	8272670	5	CASTILLO	FLORES	ANA MARIANELA	F	1957-12-08	1	\N
96	8601842	K	CANDIA	LABRA	GABRIEL ANGEL	M	1960-09-30	1	\N
97	8758634	0	YIMA	ROBLES	JIMENA SELMA DEL CARMEN	F	1960-08-13	1	\N
98	8767561	0	CAMPOS	ALBORNOZ	ERIKA BETZABÉ	F	1960-06-13	1	\N
99	9195563	6	CONTRERAS	AEDO	MAX ANTONIO	M	1962-01-04	1	\N
100	9310933	3	ARIAS	CERDA	JUAN ANDRÉS	M	1961-11-30	1	\N
101	9391115	6	MUÑOZ	MUÑOZ	JUANA ELIANA	F	1961-07-15	1	\N
102	9687683	1	BENAVIDES	PARRA	GLORIA ELENA	F	1963-10-29	1	\N
103	9854257	4	VALERIO	GUTIÉRREZ	JAVIER ALEJANDRO	M	1967-05-11	1	\N
\.


--
-- Data for Name: horario; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.horario (id_clase, id_curso, id_asignatura, id_dia, id_bloque, id_docente, estado_clase, anio_lectivo) FROM stdin;
\.


--
-- Data for Name: inasistencia_estudiante; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.inasistencia_estudiante (id_inasistencia, id_estudiante, id_tipo_inasistencia, estado_justificacion, id_apoderado_justifica, fecha_inicio, fecha_termino, motivo_inasistencia, documento_presentado, prueba_pendiente, id_asignatura) FROM stdin;
\.


--
-- Data for Name: inasistencia_funcionario; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.inasistencia_funcionario (id_inasistencia, id_funcionario, fecha_inicio, fecha_termino, dias_inasistencia, id_tipo_inasistencia, id_reemplazante, ordinario) FROM stdin;
10	61	2022-09-28	2022-10-12	15	1	62	17
12	1	2022-10-12	2022-10-12	1	1	\N	\N
\.


--
-- Data for Name: matricula; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.matricula (id_matricula, matricula, id_estudiante, id_ap_titular, id_ap_suplente, id_curso, anio_lectivo, fecha_ingreso, fecha_retiro) FROM stdin;
9	95	1400	\N	\N	137	2022	2021-12-25	\N
10	97	1401	\N	\N	137	2022	2021-12-25	\N
11	16	1402	\N	\N	137	2022	2021-12-25	\N
12	93	1403	\N	\N	137	2022	2022-03-04	\N
13	21	1404	\N	\N	137	2022	2021-12-29	\N
14	136	1405	\N	\N	137	2022	2021-12-30	\N
15	110	1406	\N	\N	137	2022	2022-03-01	\N
16	101	1407	\N	\N	137	2022	2022-01-17	\N
17	22	1408	\N	\N	137	2022	2022-01-17	\N
18	105	1409	\N	\N	137	2022	2022-01-17	\N
19	125	1410	\N	\N	137	2022	2022-01-17	\N
20	18	1411	\N	\N	137	2022	2022-01-17	\N
21	100	1412	\N	\N	137	2022	2022-01-17	\N
22	15	1413	\N	\N	137	2022	2022-01-17	\N
23	103	1414	\N	\N	137	2022	2022-01-17	\N
24	102	1415	\N	\N	137	2022	2022-01-17	\N
25	124	1416	\N	\N	137	2022	2022-01-17	\N
26	12	1417	\N	\N	137	2022	2022-01-17	\N
27	24	1418	\N	\N	137	2022	2022-01-17	\N
28	151	1419	\N	\N	137	2022	2022-04-21	\N
29	99	1420	\N	\N	137	2022	2021-12-25	\N
30	112	1421	\N	\N	137	2022	2022-01-17	\N
31	118	1422	\N	\N	137	2022	2022-03-03	\N
32	132	1423	\N	\N	137	2022	2021-12-25	\N
33	119	1424	\N	\N	137	2022	2022-01-17	\N
34	147	1425	\N	\N	138	2022	2022-04-06	\N
35	104	1426	\N	\N	138	2022	2021-12-25	\N
36	106	1427	\N	\N	138	2022	2021-12-25	\N
37	107	1428	\N	\N	138	2022	2021-12-25	\N
38	122	1429	\N	\N	138	2022	2021-12-25	\N
39	9	1430	\N	\N	138	2022	2021-12-27	\N
40	121	1431	\N	\N	138	2022	2022-03-03	\N
41	10	1432	\N	\N	138	2022	2022-01-17	\N
42	111	1433	\N	\N	138	2022	2022-01-17	\N
43	138	1434	\N	\N	138	2022	2022-01-17	\N
44	94	1435	\N	\N	138	2022	2022-01-17	\N
45	114	1436	\N	\N	138	2022	2022-01-17	\N
46	92	1437	\N	\N	138	2022	2022-01-17	\N
47	135	1438	\N	\N	138	2022	2022-01-17	\N
48	116	1439	\N	\N	138	2022	2022-01-17	\N
49	13	1440	\N	\N	138	2022	2022-01-17	\N
50	17	1441	\N	\N	138	2022	2022-01-17	\N
51	96	1442	\N	\N	138	2022	2022-01-17	\N
52	149	1443	\N	\N	138	2022	2022-04-14	\N
53	152	1444	\N	\N	138	2022	2022-04-22	\N
54	123	1445	\N	\N	138	2022	2022-03-07	\N
55	5	1446	\N	\N	138	2022	2022-01-17	\N
56	98	1447	\N	\N	138	2022	2022-01-17	\N
57	109	1448	\N	\N	138	2022	2022-01-17	\N
58	131	1449	\N	\N	138	2022	2022-01-17	\N
59	4	1450	\N	\N	139	2022	2021-12-25	\N
60	2	1451	\N	\N	138	2022	2021-12-25	\N
61	143	1452	\N	\N	139	2022	2021-12-25	\N
62	142	1453	\N	\N	139	2022	2022-03-04	\N
63	11	1454	\N	\N	139	2022	2022-01-17	\N
64	129	1455	\N	\N	139	2022	2022-01-17	\N
65	130	1456	\N	\N	139	2022	2022-01-17	\N
66	6	1457	\N	\N	139	2022	2022-01-17	\N
67	134	1458	\N	\N	139	2022	2022-01-17	\N
68	25	1459	\N	\N	139	2022	2022-01-17	\N
69	137	1460	\N	\N	139	2022	2022-01-17	\N
70	139	1461	\N	\N	139	2022	2022-01-17	\N
71	19	1462	\N	\N	139	2022	2022-01-17	\N
72	141	1463	\N	\N	139	2022	2022-01-17	\N
73	1	1464	\N	\N	139	2022	2022-01-17	\N
74	8	1465	\N	\N	139	2022	2022-01-17	\N
75	140	1466	\N	\N	139	2022	2022-03-08	\N
76	148	1467	\N	\N	139	2022	2022-04-08	\N
77	150	1468	\N	\N	139	2022	2022-04-18	\N
78	128	1469	\N	\N	139	2022	2022-01-17	\N
79	7	1470	\N	\N	139	2022	2022-01-17	\N
80	14	1471	\N	\N	139	2022	2022-01-17	\N
81	144	1472	\N	\N	139	2022	2022-01-17	\N
82	3	1473	\N	\N	139	2022	2022-01-17	\N
83	117	1474	\N	\N	140	2022	2021-12-29	\N
84	67	1475	\N	\N	140	2022	2022-01-17	\N
85	53	1476	\N	\N	140	2022	2022-01-17	\N
86	33	1477	\N	\N	140	2022	2022-01-17	\N
87	41	1478	\N	\N	140	2022	2022-01-17	\N
88	61	1479	\N	\N	140	2022	2022-01-17	\N
89	50	1480	\N	\N	140	2022	2022-01-17	\N
90	44	1481	\N	\N	140	2022	2022-01-17	\N
91	27	1482	\N	\N	140	2022	2022-01-17	\N
92	32	1483	\N	\N	140	2022	2022-01-17	\N
93	49	1484	\N	\N	140	2022	2022-01-17	\N
94	48	1485	\N	\N	140	2022	2022-01-17	\N
95	37	1486	\N	\N	140	2022	2022-01-17	\N
96	36	1487	\N	\N	140	2022	2022-01-17	\N
97	35	1488	\N	\N	140	2022	2022-01-17	\N
98	40	1489	\N	\N	140	2022	2022-01-17	\N
99	46	1490	\N	\N	140	2022	2022-01-17	\N
100	34	1491	\N	\N	140	2022	2022-01-17	\N
101	31	1492	\N	\N	140	2022	2022-01-17	\N
102	38	1493	\N	\N	140	2022	2022-01-17	\N
103	51	1494	\N	\N	140	2022	2022-01-17	\N
104	52	1495	\N	\N	140	2022	2022-01-17	\N
105	42	1496	\N	\N	140	2022	2022-01-17	\N
106	133	1497	\N	\N	140	2022	2021-12-29	\N
107	71	1498	\N	\N	140	2022	2022-01-17	\N
108	115	1499	\N	\N	141	2022	2022-01-17	\N
109	126	1500	\N	\N	141	2022	2022-01-17	\N
110	20	1501	\N	\N	141	2022	2022-01-17	\N
111	58	1502	\N	\N	141	2022	2021-12-16	\N
112	29	1503	\N	\N	141	2022	2021-12-16	\N
113	43	1504	\N	\N	141	2022	2021-12-16	\N
114	45	1505	\N	\N	141	2022	2021-12-16	\N
115	63	1506	\N	\N	141	2022	2021-12-16	\N
116	56	1507	\N	\N	141	2022	2021-12-16	\N
117	64	1508	\N	\N	141	2022	2021-12-16	\N
118	47	1509	\N	\N	141	2022	2021-12-16	\N
119	30	1510	\N	\N	141	2022	2021-12-16	\N
120	72	1511	\N	\N	141	2022	2021-12-16	\N
121	54	1512	\N	\N	141	2022	2021-12-16	\N
122	73	1513	\N	\N	141	2022	2021-12-16	\N
123	59	1514	\N	\N	141	2022	2021-12-16	\N
124	70	1515	\N	\N	141	2022	2021-12-16	\N
125	28	1516	\N	\N	141	2022	2021-12-16	\N
126	88	1517	\N	\N	141	2022	2021-12-16	\N
127	23	1518	\N	\N	141	2022	2021-12-16	\N
128	84	1519	\N	\N	141	2022	2021-12-16	\N
129	39	1520	\N	\N	141	2022	2021-12-16	\N
130	82	1521	\N	\N	141	2022	2021-12-16	\N
131	68	1522	\N	\N	141	2022	2021-12-16	\N
132	60	1523	\N	\N	141	2022	2021-12-16	\N
133	113	1524	\N	\N	142	2022	2022-01-17	\N
134	120	1525	\N	\N	142	2022	2022-01-17	\N
135	127	1526	\N	\N	142	2022	2022-01-17	\N
136	90	1527	\N	\N	142	2022	2021-12-16	\N
137	69	1528	\N	\N	142	2022	2021-12-16	\N
138	89	1529	\N	\N	142	2022	2021-12-16	\N
139	78	1530	\N	\N	142	2022	2021-12-16	\N
140	83	1531	\N	\N	142	2022	2021-12-16	\N
141	86	1532	\N	\N	142	2022	2021-12-16	\N
142	76	1533	\N	\N	142	2022	2021-12-16	\N
143	87	1534	\N	\N	142	2022	2021-12-16	\N
144	74	1535	\N	\N	142	2022	2021-12-16	\N
145	66	1536	\N	\N	142	2022	2021-12-16	\N
146	75	1537	\N	\N	142	2022	2021-12-16	\N
147	65	1538	\N	\N	142	2022	2021-12-16	\N
148	85	1539	\N	\N	142	2022	2021-12-16	\N
149	55	1540	\N	\N	142	2022	2021-12-16	\N
150	57	1541	\N	\N	142	2022	2021-12-16	\N
151	80	1542	\N	\N	142	2022	2021-12-16	\N
152	77	1543	\N	\N	142	2022	2021-12-16	\N
153	26	1544	\N	\N	142	2022	2021-12-16	\N
154	79	1545	\N	\N	142	2022	2021-12-16	\N
155	62	1546	\N	\N	142	2022	2021-12-16	\N
156	81	1547	\N	\N	142	2022	2021-12-16	\N
157	91	1548	\N	\N	142	2022	2021-12-16	\N
158	10	1549	\N	\N	143	2022	2022-03-03	\N
159	794	1550	\N	\N	143	2022	2022-01-17	\N
160	620	1551	\N	\N	143	2022	2022-01-17	\N
161	558	1552	\N	\N	143	2022	2022-01-17	\N
162	1033	1553	\N	\N	143	2022	2022-01-17	\N
163	564	1554	\N	\N	143	2022	2022-01-17	\N
164	515	1555	\N	\N	143	2022	2022-01-17	\N
165	730	1556	\N	\N	143	2022	2022-01-17	\N
166	746	1557	\N	\N	143	2022	2022-01-17	\N
167	701	1558	\N	\N	143	2022	2022-01-17	\N
168	168	1559	\N	\N	143	2022	2022-01-17	\N
169	797	1560	\N	\N	143	2022	2022-01-17	\N
170	850	1561	\N	\N	143	2022	2022-01-17	\N
171	1010	1562	\N	\N	143	2022	2022-01-17	\N
172	881	1563	\N	\N	143	2022	2022-01-17	\N
173	861	1564	\N	\N	143	2022	2022-01-17	\N
174	838	1565	\N	\N	143	2022	2022-01-17	\N
175	843	1566	\N	\N	143	2022	2022-01-17	\N
176	832	1567	\N	\N	143	2022	2022-01-17	\N
177	478	1568	\N	\N	143	2022	2022-01-17	\N
178	89	1569	\N	\N	143	2022	2022-03-03	\N
179	118	1570	\N	\N	143	2022	2022-03-16	\N
180	1266	1571	\N	\N	143	2022	2022-04-20	\N
181	664	1572	\N	\N	143	2022	2022-01-17	\N
182	556	1573	\N	\N	143	2022	2022-01-17	\N
183	846	1574	\N	\N	143	2022	2022-01-17	\N
184	537	1575	\N	\N	143	2022	2022-01-17	\N
185	877	1576	\N	\N	143	2022	2022-01-17	\N
186	700	1577	\N	\N	143	2022	2022-01-17	\N
187	1027	1578	\N	\N	143	2022	2022-01-17	\N
188	803	1579	\N	\N	143	2022	2022-01-17	\N
189	22	1580	\N	\N	143	2022	2022-03-01	\N
190	472	1581	\N	\N	143	2022	2022-01-17	\N
191	137	1582	\N	\N	144	2022	2022-03-04	\N
192	785	1583	\N	\N	144	2022	2021-12-17	\N
193	665	1584	\N	\N	144	2022	2021-12-17	\N
194	200	1585	\N	\N	144	2022	2021-12-17	\N
195	428	1586	\N	\N	144	2022	2021-12-17	\N
196	376	1587	\N	\N	144	2022	2021-12-17	\N
197	880	1588	\N	\N	144	2022	2021-12-17	\N
198	429	1589	\N	\N	144	2022	2021-12-17	\N
199	526	1590	\N	\N	144	2022	2021-12-17	\N
200	223	1591	\N	\N	144	2022	2021-12-17	\N
201	401	1592	\N	\N	144	2022	2021-12-17	\N
202	871	1593	\N	\N	144	2022	2021-12-17	\N
203	897	1594	\N	\N	144	2022	2021-12-17	\N
204	120	1595	\N	\N	144	2022	2021-12-17	\N
205	131	1596	\N	\N	144	2022	2021-12-17	\N
206	303	1597	\N	\N	144	2022	2021-12-17	\N
207	1068	1598	\N	\N	144	2022	2021-12-17	\N
208	856	1599	\N	\N	144	2022	2021-12-17	\N
209	941	1600	\N	\N	144	2022	2021-12-17	\N
210	742	1601	\N	\N	144	2022	2021-12-17	\N
211	289	1602	\N	\N	144	2022	2021-12-17	\N
212	1000	1603	\N	\N	144	2022	2021-12-17	\N
213	190	1604	\N	\N	144	2022	2021-12-17	\N
214	834	1605	\N	\N	144	2022	2021-12-17	\N
215	724	1606	\N	\N	144	2022	2021-12-17	\N
216	619	1607	\N	\N	144	2022	2021-12-17	\N
217	907	1608	\N	\N	144	2022	2021-12-17	\N
218	622	1609	\N	\N	144	2022	2021-12-17	\N
219	1185	1610	\N	\N	144	2022	2022-03-02	\N
220	514	1611	\N	\N	144	2022	2021-12-17	\N
221	780	1612	\N	\N	144	2022	2021-12-17	\N
222	420	1613	\N	\N	144	2022	2021-12-17	\N
223	267	1614	\N	\N	145	2022	2022-01-11	\N
224	516	1615	\N	\N	145	2022	2022-01-11	\N
225	266	1616	\N	\N	145	2022	2022-01-11	\N
226	348	1617	\N	\N	145	2022	2022-01-11	\N
227	123	1618	\N	\N	145	2022	2022-01-11	\N
228	327	1619	\N	\N	145	2022	2022-01-11	\N
229	291	1620	\N	\N	145	2022	2022-01-11	\N
230	273	1621	\N	\N	145	2022	2022-01-11	\N
231	295	1622	\N	\N	145	2022	2022-01-11	\N
232	312	1623	\N	\N	145	2022	2022-01-11	\N
233	643	1624	\N	\N	145	2022	2022-01-11	\N
234	640	1625	\N	\N	145	2022	2022-01-11	\N
235	812	1626	\N	\N	145	2022	2022-01-11	\N
236	828	1627	\N	\N	145	2022	2022-01-11	\N
237	486	1628	\N	\N	145	2022	2022-01-11	\N
238	315	1629	\N	\N	145	2022	2022-01-11	\N
239	719	1630	\N	\N	145	2022	2022-01-11	\N
240	530	1631	\N	\N	145	2022	2022-01-11	\N
241	342	1632	\N	\N	145	2022	2022-01-11	\N
242	329	1633	\N	\N	145	2022	2022-01-11	\N
243	532	1634	\N	\N	145	2022	2022-01-11	\N
244	258	1635	\N	\N	145	2022	2022-01-11	\N
245	146	1636	\N	\N	145	2022	2022-03-16	\N
246	1259	1637	\N	\N	145	2022	2022-04-01	\N
247	1264	1638	\N	\N	145	2022	2022-04-19	\N
248	334	1639	\N	\N	145	2022	2022-01-11	\N
249	433	1640	\N	\N	145	2022	2022-01-11	\N
250	119	1641	\N	\N	145	2022	2022-01-11	\N
251	269	1642	\N	\N	145	2022	2022-01-11	\N
252	286	1643	\N	\N	145	2022	2022-01-11	\N
253	160	1644	\N	\N	145	2022	2022-01-11	\N
254	361	1645	\N	\N	145	2022	2022-01-11	\N
255	1218	1646	\N	\N	146	2022	2022-01-17	\N
256	1091	1647	\N	\N	146	2022	2021-12-25	\N
257	1104	1648	\N	\N	146	2022	2021-12-25	\N
258	24	1649	\N	\N	146	2022	2021-12-25	\N
259	1227	1650	\N	\N	146	2022	2022-01-17	\N
260	166	1651	\N	\N	146	2022	2022-01-17	\N
261	38	1652	\N	\N	146	2022	2022-01-17	\N
262	1179	1653	\N	\N	146	2022	2022-01-17	\N
263	85	1654	\N	\N	146	2022	2022-01-17	\N
264	63	1655	\N	\N	146	2022	2022-01-17	\N
265	43	1656	\N	\N	146	2022	2022-01-17	\N
266	1159	1657	\N	\N	146	2022	2022-01-17	\N
267	1184	1658	\N	\N	146	2022	2022-01-17	\N
268	29	1659	\N	\N	146	2022	2022-01-17	\N
269	101	1660	\N	\N	146	2022	2022-01-17	\N
270	45	1661	\N	\N	146	2022	2022-01-17	\N
271	1242	1662	\N	\N	146	2022	2022-01-17	\N
272	1207	1663	\N	\N	146	2022	2022-01-17	\N
273	1199	1664	\N	\N	146	2022	2022-01-17	\N
274	106	1665	\N	\N	146	2022	2022-01-17	\N
275	1110	1666	\N	\N	146	2022	2021-12-25	\N
276	1126	1667	\N	\N	146	2022	2021-12-25	\N
277	88	1668	\N	\N	146	2022	2022-01-17	\N
278	103	1669	\N	\N	146	2022	2022-01-17	\N
279	1089	1670	\N	\N	146	2022	2022-01-17	\N
280	1191	1671	\N	\N	146	2022	2022-01-17	\N
281	1086	1672	\N	\N	146	2022	2021-12-25	\N
282	20	1673	\N	\N	146	2022	2021-12-25	\N
283	1181	1674	\N	\N	146	2022	2022-01-17	\N
284	1157	1675	\N	\N	146	2022	2022-01-17	\N
285	39	1676	\N	\N	146	2022	2022-01-17	\N
286	1183	1677	\N	\N	146	2022	2022-01-17	\N
287	1224	1678	\N	\N	146	2022	2022-01-17	\N
288	1194	1679	\N	\N	147	2022	2021-12-26	\N
289	1144	1680	\N	\N	147	2022	2022-01-21	\N
290	105	1681	\N	\N	147	2022	2021-12-26	\N
291	102	1682	\N	\N	147	2022	2021-12-26	\N
292	1115	1683	\N	\N	147	2022	2022-01-17	\N
293	1237	1684	\N	\N	147	2022	2022-01-17	\N
294	33	1685	\N	\N	147	2022	2022-01-17	\N
295	31	1686	\N	\N	147	2022	2022-01-17	\N
296	1195	1687	\N	\N	147	2022	2022-01-17	\N
297	157	1688	\N	\N	147	2022	2022-01-17	\N
298	8	1689	\N	\N	147	2022	2022-01-17	\N
299	74	1690	\N	\N	147	2022	2022-01-17	\N
300	1131	1691	\N	\N	147	2022	2022-01-17	\N
301	151	1692	\N	\N	147	2022	2022-01-17	\N
302	81	1693	\N	\N	147	2022	2022-01-17	\N
303	23	1694	\N	\N	147	2022	2022-01-17	\N
304	1082	1695	\N	\N	147	2022	2022-01-17	\N
305	1090	1696	\N	\N	147	2022	2022-01-17	\N
306	1137	1697	\N	\N	147	2022	2022-01-17	\N
307	1148	1698	\N	\N	147	2022	2022-01-17	\N
308	1151	1699	\N	\N	147	2022	2022-01-17	\N
309	1217	1700	\N	\N	147	2022	2022-01-17	\N
310	1102	1701	\N	\N	147	2022	2022-01-17	\N
311	1106	1702	\N	\N	147	2022	2022-01-17	\N
312	1095	1703	\N	\N	147	2022	2022-01-17	\N
313	112	1704	\N	\N	147	2022	2022-01-17	\N
314	1122	1705	\N	\N	147	2022	2022-01-17	\N
315	1139	1706	\N	\N	147	2022	2022-01-17	\N
316	1107	1707	\N	\N	147	2022	2022-01-17	\N
317	47	1708	\N	\N	147	2022	2022-01-17	\N
318	1	1709	\N	\N	147	2022	2022-01-17	\N
319	1234	1710	\N	\N	147	2022	2022-01-17	\N
320	1129	1711	\N	\N	147	2022	2022-01-17	\N
321	1138	1712	\N	\N	148	2022	2022-01-17	\N
322	77	1713	\N	\N	148	2022	2021-12-26	\N
323	1175	1714	\N	\N	148	2022	2021-12-26	\N
324	1168	1715	\N	\N	148	2022	2021-12-26	\N
325	1088	1716	\N	\N	148	2022	2022-01-17	\N
326	1123	1717	\N	\N	148	2022	2022-01-17	\N
327	54	1718	\N	\N	148	2022	2022-01-17	\N
328	60	1719	\N	\N	148	2022	2022-01-17	\N
329	107	1720	\N	\N	148	2022	2022-01-17	\N
330	1226	1721	\N	\N	148	2022	2022-01-17	\N
331	1114	1722	\N	\N	148	2022	2022-01-17	\N
332	1132	1723	\N	\N	148	2022	2022-01-17	\N
333	1296	1724	\N	\N	145	2022	2022-08-11	\N
334	67	1725	\N	\N	148	2022	2022-01-17	\N
335	1209	1726	\N	\N	148	2022	2022-01-17	\N
336	115	1727	\N	\N	148	2022	2022-01-17	\N
337	116	1728	\N	\N	148	2022	2022-01-17	\N
338	3	1729	\N	\N	148	2022	2022-01-17	\N
339	1141	1730	\N	\N	148	2022	2022-01-17	\N
340	66	1731	\N	\N	148	2022	2022-01-17	\N
341	919	1732	\N	\N	148	2022	2022-01-17	\N
342	1261	1733	\N	\N	148	2022	2022-04-01	\N
343	1267	1734	\N	\N	148	2022	2022-04-20	\N
344	1193	1735	\N	\N	148	2022	2022-01-17	\N
345	1178	1736	\N	\N	148	2022	2021-12-26	\N
346	1166	1737	\N	\N	148	2022	2021-12-26	\N
347	1093	1738	\N	\N	148	2022	2022-01-17	\N
348	1203	1739	\N	\N	148	2022	2022-01-17	\N
349	1103	1740	\N	\N	148	2022	2022-01-17	\N
350	1143	1741	\N	\N	148	2022	2021-12-26	\N
351	1094	1742	\N	\N	148	2022	2022-01-17	\N
352	7	1743	\N	\N	148	2022	2022-01-17	\N
353	41	1744	\N	\N	149	2022	2021-12-26	\N
354	1109	1745	\N	\N	149	2022	2021-12-26	\N
355	19	1746	\N	\N	149	2022	2021-12-26	\N
356	1176	1747	\N	\N	149	2022	2022-01-17	\N
357	1165	1748	\N	\N	149	2022	2022-01-17	\N
358	1119	1749	\N	\N	149	2022	2022-01-17	\N
359	1169	1750	\N	\N	149	2022	2022-01-17	\N
360	51	1751	\N	\N	149	2022	2022-01-17	\N
361	1202	1752	\N	\N	149	2022	2022-01-17	\N
362	1177	1753	\N	\N	149	2022	2022-01-17	\N
363	1149	1754	\N	\N	149	2022	2022-01-17	\N
364	152	1755	\N	\N	149	2022	2022-01-17	\N
365	1087	1756	\N	\N	149	2022	2022-01-17	\N
366	104	1757	\N	\N	149	2022	2022-01-17	\N
367	1098	1758	\N	\N	149	2022	2022-01-17	\N
368	50	1759	\N	\N	149	2022	2022-01-17	\N
369	1213	1760	\N	\N	149	2022	2022-01-17	\N
370	40	1761	\N	\N	149	2022	2022-01-17	\N
371	1192	1762	\N	\N	149	2022	2022-01-17	\N
372	62	1763	\N	\N	149	2022	2022-01-17	\N
373	149	1764	\N	\N	149	2022	2022-01-17	\N
374	1155	1765	\N	\N	149	2022	2022-01-17	\N
375	1170	1766	\N	\N	149	2022	2022-01-17	\N
376	618	1767	\N	\N	149	2022	2022-01-17	\N
377	1268	1768	\N	\N	149	2022	2022-04-20	\N
378	1198	1769	\N	\N	149	2022	2022-01-17	\N
379	53	1770	\N	\N	149	2022	2021-12-26	\N
380	37	1771	\N	\N	149	2022	2022-01-17	\N
381	1236	1772	\N	\N	149	2022	2022-01-17	\N
382	1085	1773	\N	\N	149	2022	2022-01-17	\N
383	79	1774	\N	\N	149	2022	2022-01-17	\N
384	75	1775	\N	\N	149	2022	2022-01-17	\N
385	161	1776	\N	\N	150	2022	2022-03-02	\N
386	5	1777	\N	\N	150	2022	2022-02-25	\N
387	1105	1778	\N	\N	150	2022	2022-02-25	\N
388	1187	1779	\N	\N	147	2022	2022-05-27	\N
389	1136	1780	\N	\N	150	2022	2022-01-19	\N
390	167	1781	\N	\N	150	2022	2022-01-19	\N
391	108	1782	\N	\N	150	2022	2022-01-19	\N
392	91	1783	\N	\N	150	2022	2022-01-19	\N
393	1112	1784	\N	\N	150	2022	2022-01-19	\N
394	1113	1785	\N	\N	150	2022	2022-01-19	\N
395	1241	1786	\N	\N	150	2022	2022-01-19	\N
396	1200	1787	\N	\N	150	2022	2022-01-19	\N
397	64	1788	\N	\N	150	2022	2022-01-19	\N
398	46	1789	\N	\N	150	2022	2022-01-19	\N
399	1130	1790	\N	\N	150	2022	2022-01-19	\N
400	1150	1791	\N	\N	150	2022	2022-01-19	\N
401	76	1792	\N	\N	150	2022	2022-01-19	\N
402	36	1793	\N	\N	150	2022	2022-01-19	\N
403	163	1794	\N	\N	150	2022	2022-01-19	\N
404	1223	1795	\N	\N	150	2022	2022-01-19	\N
405	1084	1796	\N	\N	150	2022	2022-01-19	\N
406	6	1797	\N	\N	150	2022	2022-01-19	\N
407	1097	1798	\N	\N	150	2022	2022-01-19	\N
408	111	1799	\N	\N	150	2022	2022-01-19	\N
409	87	1800	\N	\N	150	2022	2022-01-19	\N
410	1225	1801	\N	\N	150	2022	2022-02-25	\N
411	59	1802	\N	\N	150	2022	2022-01-19	\N
412	1081	1803	\N	\N	150	2022	2022-01-19	\N
413	1164	1804	\N	\N	150	2022	2022-01-19	\N
414	42	1805	\N	\N	150	2022	2022-01-19	\N
415	35	1806	\N	\N	150	2022	2022-01-19	\N
416	1135	1807	\N	\N	150	2022	2022-01-19	\N
417	1065	1808	\N	\N	150	2022	2022-01-19	\N
418	97	1809	\N	\N	150	2022	2022-01-19	\N
419	1197	1810	\N	\N	150	2022	2022-01-19	\N
420	55	1811	\N	\N	151	2022	2022-01-19	\N
421	1167	1812	\N	\N	151	2022	2022-01-19	\N
422	1243	1813	\N	\N	151	2022	2022-01-19	\N
423	11	1814	\N	\N	151	2022	2022-01-19	\N
424	1154	1815	\N	\N	151	2022	2022-01-19	\N
425	70	1816	\N	\N	151	2022	2022-01-19	\N
426	1214	1817	\N	\N	151	2022	2022-01-19	\N
427	1156	1818	\N	\N	151	2022	2022-01-19	\N
428	94	1819	\N	\N	151	2022	2022-01-19	\N
429	80	1820	\N	\N	151	2022	2022-01-19	\N
430	1125	1821	\N	\N	151	2022	2022-01-19	\N
431	69	1822	\N	\N	151	2022	2022-01-19	\N
432	4	1823	\N	\N	151	2022	2022-01-19	\N
433	58	1824	\N	\N	151	2022	2022-01-19	\N
434	1120	1825	\N	\N	151	2022	2022-01-19	\N
435	1140	1826	\N	\N	151	2022	2022-01-19	\N
436	1229	1827	\N	\N	151	2022	2022-01-19	\N
437	1239	1828	\N	\N	151	2022	2022-01-19	\N
438	72	1829	\N	\N	151	2022	2022-01-19	\N
439	32	1830	\N	\N	151	2022	2022-01-19	\N
440	98	1831	\N	\N	151	2022	2022-01-19	\N
441	82	1832	\N	\N	151	2022	2022-01-19	\N
442	426	1833	\N	\N	151	2022	2022-02-25	\N
443	1083	1834	\N	\N	151	2022	2022-01-19	\N
444	49	1835	\N	\N	151	2022	2022-01-19	\N
445	1101	1836	\N	\N	151	2022	2022-01-19	\N
446	1158	1837	\N	\N	151	2022	2022-01-19	\N
447	1215	1838	\N	\N	151	2022	2022-01-19	\N
448	86	1839	\N	\N	151	2022	2022-01-19	\N
449	17	1840	\N	\N	151	2022	2022-01-19	\N
450	30	1841	\N	\N	151	2022	2022-01-19	\N
451	1231	1842	\N	\N	151	2022	2022-01-19	\N
452	12	1843	\N	\N	151	2022	2022-01-19	\N
453	1133	1844	\N	\N	152	2022	2022-01-19	\N
454	95	1845	\N	\N	152	2022	2022-01-19	\N
455	27	1846	\N	\N	152	2022	2022-01-19	\N
456	1163	1847	\N	\N	152	2022	2022-01-19	\N
457	1153	1848	\N	\N	152	2022	2022-01-21	\N
458	1124	1849	\N	\N	152	2022	2022-01-21	\N
459	1121	1850	\N	\N	152	2022	2022-01-21	\N
460	100	1851	\N	\N	152	2022	2022-01-21	\N
461	14	1852	\N	\N	152	2022	2022-01-21	\N
462	1108	1853	\N	\N	152	2022	2022-01-21	\N
463	1222	1854	\N	\N	152	2022	2022-01-21	\N
464	1240	1855	\N	\N	152	2022	2022-01-21	\N
465	1219	1856	\N	\N	152	2022	2022-01-21	\N
466	1117	1857	\N	\N	152	2022	2022-01-21	\N
467	9	1858	\N	\N	152	2022	2022-01-21	\N
468	109	1859	\N	\N	152	2022	2022-01-21	\N
469	1233	1860	\N	\N	152	2022	2022-01-21	\N
470	1245	1861	\N	\N	152	2022	2022-01-21	\N
471	99	1862	\N	\N	152	2022	2022-01-21	\N
472	1172	1863	\N	\N	152	2022	2022-01-21	\N
473	57	1864	\N	\N	152	2022	2022-01-21	\N
474	13	1865	\N	\N	152	2022	2022-01-21	\N
475	1118	1866	\N	\N	152	2022	2022-01-21	\N
476	1220	1867	\N	\N	152	2022	2022-03-08	\N
477	1128	1868	\N	\N	152	2022	2022-01-21	\N
478	1188	1869	\N	\N	152	2022	2022-01-21	\N
479	1244	1870	\N	\N	152	2022	2022-01-21	\N
480	1189	1871	\N	\N	152	2022	2022-01-21	\N
481	34	1872	\N	\N	152	2022	2022-01-21	\N
482	83	1873	\N	\N	152	2022	2022-01-21	\N
483	84	1874	\N	\N	152	2022	2022-01-21	\N
484	1152	1875	\N	\N	152	2022	2022-01-19	\N
485	1146	1876	\N	\N	152	2022	2022-01-21	\N
486	156	1877	\N	\N	152	2022	2022-01-21	\N
487	1182	1878	\N	\N	153	2022	2022-01-21	\N
488	15	1879	\N	\N	153	2022	2022-01-21	\N
489	73	1880	\N	\N	153	2022	2022-01-21	\N
490	1080	1881	\N	\N	153	2022	2022-01-21	\N
491	16	1882	\N	\N	153	2022	2022-01-21	\N
492	65	1883	\N	\N	153	2022	2022-01-21	\N
493	165	1884	\N	\N	153	2022	2022-01-21	\N
494	1230	1885	\N	\N	153	2022	2022-01-21	\N
495	1134	1886	\N	\N	153	2022	2022-01-21	\N
496	96	1887	\N	\N	153	2022	2022-01-21	\N
497	56	1888	\N	\N	153	2022	2022-01-21	\N
498	61	1889	\N	\N	153	2022	2022-01-21	\N
499	1147	1890	\N	\N	153	2022	2022-01-21	\N
500	1221	1891	\N	\N	153	2022	2022-01-21	\N
501	1173	1892	\N	\N	153	2022	2022-01-21	\N
502	1174	1893	\N	\N	153	2022	2022-01-21	\N
503	1116	1894	\N	\N	153	2022	2022-01-21	\N
504	1145	1895	\N	\N	153	2022	2022-01-21	\N
505	162	1896	\N	\N	153	2022	2022-01-21	\N
506	26	1897	\N	\N	153	2022	2022-01-21	\N
507	90	1898	\N	\N	153	2022	2022-01-21	\N
508	1096	1899	\N	\N	153	2022	2022-01-21	\N
509	1190	1900	\N	\N	153	2022	2022-01-21	\N
510	52	1901	\N	\N	153	2022	2022-01-21	\N
511	110	1902	\N	\N	153	2022	2022-01-21	\N
512	1142	1903	\N	\N	153	2022	2022-01-21	\N
513	113	1904	\N	\N	153	2022	2022-01-21	\N
514	1228	1905	\N	\N	153	2022	2022-01-21	\N
515	48	1906	\N	\N	153	2022	2022-01-21	\N
516	1127	1907	\N	\N	153	2022	2022-01-21	\N
517	44	1908	\N	\N	153	2022	2022-01-21	\N
518	71	1909	\N	\N	153	2022	2022-01-21	\N
519	521	1910	\N	\N	154	2022	2022-02-25	\N
520	934	1911	\N	\N	154	2022	2021-12-17	\N
521	176	1912	\N	\N	154	2022	2021-12-17	\N
522	180	1913	\N	\N	154	2022	2021-12-17	\N
523	177	1914	\N	\N	154	2022	2021-12-17	\N
524	169	1915	\N	\N	154	2022	2021-12-17	\N
525	886	1916	\N	\N	154	2022	2021-12-17	\N
526	181	1917	\N	\N	154	2022	2021-12-17	\N
527	914	1918	\N	\N	154	2022	2021-12-17	\N
528	172	1919	\N	\N	154	2022	2021-12-17	\N
529	421	1920	\N	\N	154	2022	2021-12-17	\N
530	634	1921	\N	\N	154	2022	2021-12-17	\N
531	1263	1922	\N	\N	154	2022	2022-04-19	\N
532	1269	1923	\N	\N	154	2022	2022-04-20	\N
533	183	1924	\N	\N	154	2022	2021-12-17	\N
534	345	1925	\N	\N	154	2022	2021-12-17	\N
535	175	1926	\N	\N	154	2022	2021-12-17	\N
536	173	1927	\N	\N	154	2022	2021-12-17	\N
537	182	1928	\N	\N	154	2022	2021-12-17	\N
538	124	1929	\N	\N	154	2022	2021-12-17	\N
539	263	1930	\N	\N	154	2022	2021-12-17	\N
540	808	1931	\N	\N	154	2022	2021-12-17	\N
541	170	1932	\N	\N	154	2022	2021-12-17	\N
542	268	1933	\N	\N	154	2022	2021-12-17	\N
543	364	1934	\N	\N	154	2022	2021-12-17	\N
544	178	1935	\N	\N	154	2022	2021-12-17	\N
545	179	1936	\N	\N	154	2022	2021-12-17	\N
546	338	1937	\N	\N	154	2022	2021-12-17	\N
547	246	1938	\N	\N	154	2022	2021-12-17	\N
548	275	1939	\N	\N	154	2022	2021-12-17	\N
549	193	1940	\N	\N	154	2022	2021-12-17	\N
550	264	1941	\N	\N	154	2022	2021-12-17	\N
551	174	1942	\N	\N	154	2022	2021-12-17	\N
552	581	1943	\N	\N	155	2022	2022-03-03	\N
553	459	1944	\N	\N	155	2022	2021-12-17	\N
554	410	1945	\N	\N	155	2022	2021-12-17	\N
555	529	1946	\N	\N	155	2022	2021-12-17	\N
556	496	1947	\N	\N	155	2022	2021-12-17	\N
557	536	1948	\N	\N	155	2022	2021-12-17	\N
558	455	1949	\N	\N	155	2022	2021-12-17	\N
559	468	1950	\N	\N	155	2022	2021-12-17	\N
560	411	1951	\N	\N	155	2022	2021-12-17	\N
561	374	1952	\N	\N	155	2022	2021-12-17	\N
562	444	1953	\N	\N	155	2022	2021-12-17	\N
563	362	1954	\N	\N	155	2022	2021-12-17	\N
564	645	1955	\N	\N	155	2022	2021-12-17	\N
565	380	1956	\N	\N	155	2022	2021-12-17	\N
566	491	1957	\N	\N	155	2022	2021-12-17	\N
567	448	1958	\N	\N	155	2022	2021-12-17	\N
568	449	1959	\N	\N	155	2022	2021-12-17	\N
569	563	1960	\N	\N	155	2022	2021-12-17	\N
570	400	1961	\N	\N	155	2022	2021-12-17	\N
571	396	1962	\N	\N	155	2022	2021-12-17	\N
572	407	1963	\N	\N	155	2022	2021-12-17	\N
573	404	1964	\N	\N	155	2022	2021-12-17	\N
574	479	1965	\N	\N	155	2022	2021-12-17	\N
575	372	1966	\N	\N	155	2022	2021-12-17	\N
576	435	1967	\N	\N	155	2022	2021-12-17	\N
577	395	1968	\N	\N	155	2022	2021-12-17	\N
578	424	1969	\N	\N	155	2022	2021-12-17	\N
579	603	1970	\N	\N	155	2022	2022-03-16	\N
580	370	1971	\N	\N	155	2022	2021-12-17	\N
581	390	1972	\N	\N	155	2022	2021-12-17	\N
582	713	1973	\N	\N	155	2022	2021-12-17	\N
583	689	1974	\N	\N	155	2022	2021-12-17	\N
584	528	1975	\N	\N	155	2022	2021-12-17	\N
585	912	1976	\N	\N	156	2022	2022-02-28	\N
586	624	1977	\N	\N	156	2022	2022-03-04	\N
587	747	1978	\N	\N	156	2022	2021-12-17	\N
588	855	1979	\N	\N	156	2022	2021-12-17	\N
589	748	1980	\N	\N	156	2022	2021-12-17	\N
590	738	1981	\N	\N	156	2022	2021-12-17	\N
591	740	1982	\N	\N	156	2022	2021-12-17	\N
592	781	1983	\N	\N	156	2022	2021-12-17	\N
593	760	1984	\N	\N	156	2022	2021-12-17	\N
594	809	1985	\N	\N	156	2022	2021-12-17	\N
595	749	1986	\N	\N	156	2022	2021-12-17	\N
596	824	1987	\N	\N	156	2022	2021-12-17	\N
597	770	1988	\N	\N	156	2022	2021-12-17	\N
598	741	1989	\N	\N	156	2022	2021-12-17	\N
599	121	1990	\N	\N	156	2022	2021-12-17	\N
600	909	1991	\N	\N	156	2022	2021-12-17	\N
601	756	1992	\N	\N	156	2022	2021-12-17	\N
602	755	1993	\N	\N	156	2022	2021-12-17	\N
603	737	1994	\N	\N	156	2022	2021-12-17	\N
604	823	1995	\N	\N	156	2022	2021-12-17	\N
605	744	1996	\N	\N	156	2022	2021-12-17	\N
606	753	1997	\N	\N	156	2022	2021-12-17	\N
607	759	1998	\N	\N	156	2022	2021-12-17	\N
608	739	1999	\N	\N	156	2022	2021-12-17	\N
609	769	2000	\N	\N	156	2022	2021-12-17	\N
610	767	2001	\N	\N	156	2022	2021-12-17	\N
611	284	2002	\N	\N	156	2022	2021-12-17	\N
612	795	2003	\N	\N	156	2022	2021-12-17	\N
613	762	2004	\N	\N	156	2022	2021-12-17	\N
614	761	2005	\N	\N	156	2022	2021-12-17	\N
615	768	2006	\N	\N	156	2022	2021-12-17	\N
616	754	2007	\N	\N	156	2022	2021-12-17	\N
617	879	2008	\N	\N	156	2022	2021-12-17	\N
618	279	2009	\N	\N	157	2022	2021-12-17	\N
619	964	2010	\N	\N	157	2022	2021-12-17	\N
620	901	2011	\N	\N	157	2022	2021-12-17	\N
621	944	2012	\N	\N	157	2022	2021-12-17	\N
622	649	2013	\N	\N	157	2022	2021-12-17	\N
623	296	2014	\N	\N	157	2022	2021-12-17	\N
624	1019	2015	\N	\N	157	2022	2021-12-17	\N
625	894	2016	\N	\N	157	2022	2021-12-17	\N
626	899	2017	\N	\N	157	2022	2021-12-17	\N
627	943	2018	\N	\N	157	2022	2021-12-17	\N
628	683	2019	\N	\N	157	2022	2021-12-17	\N
629	1044	2020	\N	\N	157	2022	2021-12-17	\N
630	454	2021	\N	\N	157	2022	2021-12-17	\N
631	644	2022	\N	\N	157	2022	2021-12-17	\N
632	462	2023	\N	\N	157	2022	2021-12-17	\N
633	397	2024	\N	\N	157	2022	2021-12-17	\N
634	773	2025	\N	\N	157	2022	2021-12-17	\N
635	668	2026	\N	\N	157	2022	2021-12-17	\N
636	1042	2027	\N	\N	157	2022	2021-12-17	\N
637	531	2028	\N	\N	157	2022	2021-12-17	\N
638	1002	2029	\N	\N	157	2022	2021-12-17	\N
639	837	2030	\N	\N	157	2022	2021-12-17	\N
640	1262	2031	\N	\N	157	2022	2021-04-12	\N
641	405	2032	\N	\N	157	2022	2021-12-17	\N
642	654	2033	\N	\N	157	2022	2021-12-17	\N
643	829	2034	\N	\N	157	2022	2021-12-17	\N
644	680	2035	\N	\N	157	2022	2021-12-17	\N
645	639	2036	\N	\N	157	2022	2021-12-17	\N
646	1003	2037	\N	\N	157	2022	2021-12-17	\N
647	133	2038	\N	\N	157	2022	2021-12-17	\N
648	915	2039	\N	\N	157	2022	2021-12-17	\N
649	978	2040	\N	\N	157	2022	2021-12-17	\N
650	675	2041	\N	\N	157	2022	2021-12-17	\N
651	801	2042	\N	\N	158	2022	2022-01-17	\N
652	1078	2043	\N	\N	158	2022	2022-01-21	\N
653	819	2044	\N	\N	158	2022	2021-12-17	\N
654	240	2045	\N	\N	158	2022	2021-12-17	\N
655	1043	2046	\N	\N	158	2022	2021-12-17	\N
656	651	2047	\N	\N	158	2022	2021-12-17	\N
657	503	2048	\N	\N	158	2022	2021-12-17	\N
658	199	2049	\N	\N	158	2022	2021-12-17	\N
659	630	2050	\N	\N	158	2022	2021-12-17	\N
660	233	2051	\N	\N	158	2022	2021-12-17	\N
661	845	2052	\N	\N	158	2022	2021-12-17	\N
662	427	2053	\N	\N	158	2022	2021-12-17	\N
663	219	2054	\N	\N	158	2022	2021-12-17	\N
664	208	2055	\N	\N	158	2022	2021-12-17	\N
665	508	2056	\N	\N	158	2022	2021-12-17	\N
666	213	2057	\N	\N	158	2022	2021-12-17	\N
667	1056	2058	\N	\N	158	2022	2021-12-17	\N
668	625	2059	\N	\N	158	2022	2021-12-17	\N
669	617	2060	\N	\N	158	2022	2021-12-17	\N
670	623	2061	\N	\N	158	2022	2021-12-17	\N
671	453	2062	\N	\N	158	2022	2021-12-17	\N
672	629	2063	\N	\N	158	2022	2021-12-17	\N
673	858	2064	\N	\N	154	2022	2021-12-17	\N
674	239	2065	\N	\N	158	2022	2021-12-17	\N
675	228	2066	\N	\N	158	2022	2021-12-17	\N
676	987	2067	\N	\N	158	2022	2021-12-17	\N
677	918	2068	\N	\N	158	2022	2021-12-17	\N
678	534	2069	\N	\N	158	2022	2021-12-17	\N
679	217	2070	\N	\N	158	2022	2021-12-17	\N
680	367	2071	\N	\N	158	2022	2021-12-17	\N
681	252	2072	\N	\N	158	2022	2021-12-17	\N
682	205	2073	\N	\N	158	2022	2021-12-17	\N
683	1072	2074	\N	\N	158	2022	2021-12-17	\N
684	399	2075	\N	\N	158	2022	2021-12-17	\N
685	989	2076	\N	\N	158	2022	2021-12-17	\N
686	950	2077	\N	\N	158	2022	2021-12-17	\N
687	1210	2078	\N	\N	159	2022	2022-01-21	\N
688	1238	2079	\N	\N	159	2022	2022-01-21	\N
689	540	2080	\N	\N	159	2022	2022-01-17	\N
690	577	2081	\N	\N	159	2022	2022-01-17	\N
691	566	2082	\N	\N	159	2022	2022-01-17	\N
692	589	2083	\N	\N	159	2022	2022-01-17	\N
693	786	2084	\N	\N	159	2022	2022-01-17	\N
694	778	2085	\N	\N	159	2022	2022-01-17	\N
695	222	2086	\N	\N	159	2022	2022-01-17	\N
696	314	2087	\N	\N	159	2022	2022-01-17	\N
697	513	2088	\N	\N	159	2022	2022-01-17	\N
698	578	2089	\N	\N	159	2022	2022-01-17	\N
699	299	2090	\N	\N	159	2022	2022-01-17	\N
700	612	2091	\N	\N	159	2022	2022-01-17	\N
701	681	2092	\N	\N	159	2022	2022-01-17	\N
702	262	2093	\N	\N	159	2022	2022-01-17	\N
703	597	2094	\N	\N	159	2022	2022-01-17	\N
704	621	2095	\N	\N	159	2022	2022-01-17	\N
705	939	2096	\N	\N	159	2022	2022-01-17	\N
706	590	2097	\N	\N	159	2022	2022-01-17	\N
707	637	2098	\N	\N	159	2022	2022-01-17	\N
708	682	2099	\N	\N	159	2022	2022-01-17	\N
709	586	2100	\N	\N	159	2022	2022-01-17	\N
710	346	2101	\N	\N	159	2022	2022-01-17	\N
711	971	2102	\N	\N	159	2022	2022-01-17	\N
712	231	2103	\N	\N	159	2022	2022-01-17	\N
713	164	2104	\N	\N	159	2022	2022-01-17	\N
714	648	2105	\N	\N	159	2022	2022-01-17	\N
715	956	2106	\N	\N	159	2022	2022-01-17	\N
716	656	2107	\N	\N	159	2022	2022-01-17	\N
717	627	2108	\N	\N	159	2022	2022-01-17	\N
718	602	2109	\N	\N	159	2022	2022-01-17	\N
719	559	2110	\N	\N	159	2022	2022-01-17	\N
720	1212	2111	\N	\N	160	2022	2022-01-21	\N
721	259	2112	\N	\N	160	2022	2022-01-17	\N
722	925	2113	\N	\N	160	2022	2022-01-17	\N
723	218	2114	\N	\N	160	2022	2022-01-17	\N
724	281	2115	\N	\N	160	2022	2022-01-17	\N
725	440	2116	\N	\N	160	2022	2022-01-17	\N
726	1077	2117	\N	\N	160	2022	2022-01-17	\N
727	353	2118	\N	\N	160	2022	2022-01-17	\N
728	212	2119	\N	\N	160	2022	2022-01-17	\N
729	375	2120	\N	\N	160	2022	2022-01-17	\N
730	288	2121	\N	\N	160	2022	2022-01-17	\N
731	991	2122	\N	\N	160	2022	2022-01-17	\N
732	369	2123	\N	\N	160	2022	2022-01-17	\N
733	381	2124	\N	\N	160	2022	2022-01-17	\N
734	373	2125	\N	\N	160	2022	2022-01-17	\N
735	331	2126	\N	\N	160	2022	2022-01-17	\N
736	141	2127	\N	\N	160	2022	2022-01-17	\N
737	357	2128	\N	\N	160	2022	2022-01-17	\N
738	389	2129	\N	\N	160	2022	2022-01-17	\N
739	702	2130	\N	\N	160	2022	2022-01-17	\N
740	147	2131	\N	\N	149	2022	2022-03-02	\N
741	921	2132	\N	\N	160	2022	2022-01-17	\N
742	270	2133	\N	\N	160	2022	2022-01-17	\N
743	946	2134	\N	\N	160	2022	2022-01-17	\N
744	614	2135	\N	\N	160	2022	2022-01-17	\N
745	238	2136	\N	\N	160	2022	2022-01-17	\N
746	307	2137	\N	\N	160	2022	2022-01-17	\N
747	506	2138	\N	\N	160	2022	2022-01-17	\N
748	253	2139	\N	\N	160	2022	2022-01-17	\N
749	465	2140	\N	\N	160	2022	2022-01-17	\N
750	260	2141	\N	\N	160	2022	2022-01-17	\N
751	366	2142	\N	\N	160	2022	2022-01-17	\N
752	78	2143	\N	\N	160	2022	2022-01-21	\N
753	1076	2144	\N	\N	160	2022	2022-01-17	\N
754	1100	2145	\N	\N	160	2022	2022-01-21	\N
755	1208	2146	\N	\N	161	2022	2022-01-21	\N
756	1099	2147	\N	\N	161	2022	2022-01-21	\N
757	135	2148	\N	\N	161	2022	2022-01-19	\N
758	842	2149	\N	\N	161	2022	2022-01-19	\N
759	391	2150	\N	\N	161	2022	2022-01-19	\N
760	488	2151	\N	\N	161	2022	2022-01-19	\N
761	869	2152	\N	\N	161	2022	2022-01-19	\N
762	138	2153	\N	\N	161	2022	2022-01-19	\N
763	1001	2154	\N	\N	161	2022	2022-01-19	\N
764	926	2155	\N	\N	161	2022	2022-01-19	\N
765	835	2156	\N	\N	161	2022	2022-01-19	\N
766	431	2157	\N	\N	161	2022	2022-01-19	\N
767	997	2158	\N	\N	161	2022	2022-01-19	\N
768	1034	2159	\N	\N	161	2022	2022-01-19	\N
769	999	2160	\N	\N	161	2022	2022-01-19	\N
770	772	2161	\N	\N	161	2022	2022-01-19	\N
771	557	2162	\N	\N	161	2022	2022-01-19	\N
772	402	2163	\N	\N	161	2022	2022-01-19	\N
773	1021	2164	\N	\N	161	2022	2022-01-19	\N
774	1013	2165	\N	\N	161	2022	2022-01-19	\N
775	143	2166	\N	\N	161	2022	2022-01-19	\N
776	1004	2167	\N	\N	161	2022	2022-01-19	\N
777	406	2168	\N	\N	161	2022	2022-01-19	\N
778	1024	2169	\N	\N	161	2022	2022-01-19	\N
779	787	2170	\N	\N	161	2022	2022-01-19	\N
780	653	2171	\N	\N	161	2022	2022-01-19	\N
781	1006	2172	\N	\N	161	2022	2022-01-19	\N
782	607	2173	\N	\N	161	2022	2022-01-19	\N
783	413	2174	\N	\N	161	2022	2022-01-19	\N
784	996	2175	\N	\N	161	2022	2022-01-19	\N
785	953	2176	\N	\N	161	2022	2022-01-19	\N
786	1007	2177	\N	\N	161	2022	2022-01-19	\N
787	952	2178	\N	\N	161	2022	2022-01-19	\N
788	826	2179	\N	\N	161	2022	2022-01-19	\N
789	588	2180	\N	\N	161	2022	2022-01-19	\N
790	1204	2181	\N	\N	162	2022	2022-01-21	\N
791	1211	2182	\N	\N	162	2022	2022-01-21	\N
792	1111	2183	\N	\N	162	2022	2022-03-02	\N
793	792	2184	\N	\N	162	2022	2022-01-19	\N
794	820	2185	\N	\N	162	2022	2022-01-19	\N
795	751	2186	\N	\N	162	2022	2022-01-19	\N
796	938	2187	\N	\N	162	2022	2022-01-19	\N
797	954	2188	\N	\N	162	2022	2022-01-19	\N
798	913	2189	\N	\N	162	2022	2022-01-19	\N
799	862	2190	\N	\N	162	2022	2022-01-19	\N
800	18	2191	\N	\N	162	2022	2022-01-19	\N
801	804	2192	\N	\N	162	2022	2022-01-19	\N
802	806	2193	\N	\N	162	2022	2022-01-19	\N
803	764	2194	\N	\N	162	2022	2022-01-19	\N
804	924	2195	\N	\N	162	2022	2022-01-19	\N
805	765	2196	\N	\N	162	2022	2022-01-19	\N
806	763	2197	\N	\N	162	2022	2022-01-19	\N
807	777	2198	\N	\N	162	2022	2022-01-19	\N
808	816	2199	\N	\N	162	2022	2022-01-19	\N
809	910	2200	\N	\N	162	2022	2022-01-19	\N
810	766	2201	\N	\N	162	2022	2022-01-19	\N
811	947	2202	\N	\N	162	2022	2022-01-19	\N
812	775	2203	\N	\N	162	2022	2022-01-19	\N
813	948	2204	\N	\N	162	2022	2022-01-19	\N
814	779	2205	\N	\N	162	2022	2022-01-19	\N
815	891	2206	\N	\N	162	2022	2022-01-19	\N
816	813	2207	\N	\N	162	2022	2022-01-19	\N
817	796	2208	\N	\N	162	2022	2022-01-19	\N
818	863	2209	\N	\N	162	2022	2022-01-19	\N
819	752	2210	\N	\N	162	2022	2022-01-19	\N
820	851	2211	\N	\N	162	2022	2022-01-19	\N
821	776	2212	\N	\N	162	2022	2022-01-19	\N
822	841	2213	\N	\N	162	2022	2022-01-19	\N
823	972	2214	\N	\N	162	2022	2022-01-19	\N
824	549	2215	\N	\N	163	2022	2021-12-20	\N
825	685	2216	\N	\N	163	2022	2021-12-20	\N
826	501	2217	\N	\N	163	2022	2021-12-20	\N
827	360	2218	\N	\N	163	2022	2021-12-20	\N
828	363	2219	\N	\N	163	2022	2021-12-20	\N
829	965	2220	\N	\N	163	2022	2021-12-20	\N
830	725	2221	\N	\N	163	2022	2021-12-20	\N
831	510	2222	\N	\N	163	2022	2021-12-20	\N
832	297	2223	\N	\N	163	2022	2021-12-20	\N
833	203	2224	\N	\N	163	2022	2021-12-20	\N
834	442	2225	\N	\N	163	2022	2021-12-20	\N
835	994	2226	\N	\N	163	2022	2021-12-20	\N
836	609	2227	\N	\N	163	2022	2021-12-20	\N
837	416	2228	\N	\N	163	2022	2021-12-20	\N
838	601	2229	\N	\N	163	2022	2021-12-20	\N
839	728	2230	\N	\N	163	2022	2021-12-20	\N
840	936	2231	\N	\N	163	2022	2021-12-20	\N
841	392	2232	\N	\N	163	2022	2021-12-20	\N
842	1023	2233	\N	\N	156	2022	2022-07-26	\N
843	922	2234	\N	\N	163	2022	2021-12-20	\N
844	1009	2235	\N	\N	163	2022	2021-12-20	\N
845	927	2236	\N	\N	163	2022	2021-12-20	\N
846	554	2237	\N	\N	163	2022	2021-12-20	\N
847	368	2238	\N	\N	163	2022	2021-12-20	\N
848	1196	2239	\N	\N	164	2022	2021-12-29	\N
849	196	2240	\N	\N	164	2022	2022-01-21	\N
850	547	2241	\N	\N	164	2022	2022-01-21	\N
851	669	2242	\N	\N	164	2022	2022-01-21	\N
852	207	2243	\N	\N	164	2022	2022-01-21	\N
853	930	2244	\N	\N	164	2022	2022-01-21	\N
854	688	2245	\N	\N	164	2022	2022-01-21	\N
855	1039	2246	\N	\N	164	2022	2022-01-21	\N
856	185	2247	\N	\N	164	2022	2022-01-21	\N
857	720	2248	\N	\N	164	2022	2022-01-21	\N
858	322	2249	\N	\N	164	2022	2022-01-21	\N
859	276	2250	\N	\N	164	2022	2022-01-21	\N
860	148	2251	\N	\N	164	2022	2022-01-21	\N
861	290	2252	\N	\N	164	2022	2022-01-21	\N
862	409	2253	\N	\N	164	2022	2022-01-21	\N
863	543	2254	\N	\N	164	2022	2022-01-21	\N
864	807	2255	\N	\N	164	2022	2022-01-21	\N
865	1059	2256	\N	\N	164	2022	2022-01-21	\N
866	282	2257	\N	\N	164	2022	2022-01-21	\N
867	865	2258	\N	\N	164	2022	2022-01-21	\N
868	257	2259	\N	\N	164	2022	2022-01-21	\N
869	483	2260	\N	\N	164	2022	2022-01-21	\N
870	600	2261	\N	\N	164	2022	2022-01-21	\N
871	696	2262	\N	\N	164	2022	2022-01-21	\N
872	1067	2263	\N	\N	164	2022	2022-01-21	\N
873	237	2264	\N	\N	164	2022	2022-01-21	\N
874	711	2265	\N	\N	164	2022	2022-01-21	\N
875	352	2266	\N	\N	164	2022	2022-01-21	\N
876	227	2267	\N	\N	164	2022	2022-01-21	\N
877	1053	2268	\N	\N	164	2022	2022-01-21	\N
878	210	2269	\N	\N	164	2022	2022-01-21	\N
879	519	2270	\N	\N	164	2022	2022-01-24	\N
880	895	2271	\N	\N	164	2022	2022-01-21	\N
881	25	2272	\N	\N	165	2022	2022-01-21	\N
882	93	2273	\N	\N	165	2022	2022-01-21	\N
883	280	2274	\N	\N	165	2022	2022-01-21	\N
884	1038	2275	\N	\N	165	2022	2022-01-21	\N
885	144	2276	\N	\N	165	2022	2022-01-21	\N
886	484	2277	\N	\N	165	2022	2022-01-21	\N
887	184	2278	\N	\N	165	2022	2022-01-21	\N
888	129	2279	\N	\N	165	2022	2022-01-21	\N
889	667	2280	\N	\N	165	2022	2022-01-21	\N
890	1032	2281	\N	\N	165	2022	2022-01-21	\N
891	942	2282	\N	\N	165	2022	2022-01-21	\N
892	463	2283	\N	\N	165	2022	2022-01-21	\N
893	497	2284	\N	\N	165	2022	2022-01-21	\N
894	317	2285	\N	\N	165	2022	2022-01-21	\N
895	610	2286	\N	\N	165	2022	2022-01-21	\N
896	1216	2287	\N	\N	165	2022	2022-01-21	\N
897	698	2288	\N	\N	165	2022	2022-01-21	\N
898	1047	2289	\N	\N	165	2022	2022-03-04	\N
899	958	2290	\N	\N	165	2022	2022-01-21	\N
900	1030	2291	\N	\N	165	2022	2022-01-21	\N
901	917	2292	\N	\N	165	2022	2022-01-21	\N
902	604	2293	\N	\N	165	2022	2022-01-21	\N
903	311	2294	\N	\N	165	2022	2022-01-21	\N
904	271	2295	\N	\N	165	2022	2022-01-21	\N
905	356	2296	\N	\N	165	2022	2022-01-21	\N
906	733	2297	\N	\N	165	2022	2022-01-21	\N
907	498	2298	\N	\N	165	2022	2022-01-21	\N
908	234	2299	\N	\N	165	2022	2022-01-21	\N
909	202	2300	\N	\N	165	2022	2022-01-21	\N
910	970	2301	\N	\N	165	2022	2022-01-21	\N
911	194	2302	\N	\N	166	2022	2022-01-21	\N
912	975	2303	\N	\N	166	2022	2022-01-21	\N
913	339	2304	\N	\N	166	2022	2022-01-21	\N
914	1037	2305	\N	\N	166	2022	2022-01-21	\N
915	158	2306	\N	\N	166	2022	2022-01-21	\N
916	128	2307	\N	\N	166	2022	2022-01-21	\N
917	672	2308	\N	\N	166	2022	2022-01-21	\N
918	236	2309	\N	\N	166	2022	2022-01-21	\N
919	221	2310	\N	\N	166	2022	2022-01-21	\N
920	298	2311	\N	\N	166	2022	2022-01-21	\N
921	382	2312	\N	\N	166	2022	2022-01-21	\N
922	287	2313	\N	\N	166	2022	2022-01-21	\N
923	955	2314	\N	\N	166	2022	2022-01-21	\N
924	355	2315	\N	\N	166	2022	2022-01-21	\N
925	383	2316	\N	\N	166	2022	2022-01-21	\N
926	245	2317	\N	\N	166	2022	2022-01-21	\N
927	195	2318	\N	\N	166	2022	2022-01-21	\N
928	278	2319	\N	\N	166	2022	2022-01-21	\N
929	186	2320	\N	\N	166	2022	2022-01-21	\N
930	198	2321	\N	\N	166	2022	2022-01-21	\N
931	2	2322	\N	\N	166	2022	2022-01-21	\N
932	1005	2323	\N	\N	166	2022	2022-01-21	\N
933	235	2324	\N	\N	166	2022	2022-01-21	\N
934	1071	2325	\N	\N	166	2022	2022-03-03	\N
935	1040	2326	\N	\N	165	2022	2022-01-21	\N
936	393	2327	\N	\N	166	2022	2022-01-21	\N
937	197	2328	\N	\N	166	2022	2022-01-21	\N
938	142	2329	\N	\N	166	2022	2022-01-21	\N
939	1050	2330	\N	\N	166	2022	2022-01-21	\N
940	691	2331	\N	\N	166	2022	2022-01-21	\N
941	937	2332	\N	\N	166	2022	2022-01-21	\N
942	717	2333	\N	\N	166	2022	2022-01-21	\N
943	710	2334	\N	\N	166	2022	2022-01-21	\N
944	430	2335	\N	\N	167	2022	2022-01-21	\N
945	735	2336	\N	\N	167	2022	2022-01-21	\N
946	736	2337	\N	\N	167	2022	2022-01-21	\N
947	945	2338	\N	\N	167	2022	2022-01-21	\N
948	655	2339	\N	\N	167	2022	2022-01-21	\N
949	495	2340	\N	\N	167	2022	2022-01-21	\N
950	417	2341	\N	\N	167	2022	2022-01-21	\N
951	255	2342	\N	\N	167	2022	2022-01-21	\N
952	136	2343	\N	\N	167	2022	2022-01-21	\N
953	920	2344	\N	\N	167	2022	2022-01-21	\N
954	985	2345	\N	\N	167	2022	2022-01-21	\N
955	932	2346	\N	\N	167	2022	2022-01-21	\N
956	983	2347	\N	\N	167	2022	2022-01-21	\N
957	256	2348	\N	\N	167	2022	2022-01-21	\N
958	789	2349	\N	\N	167	2022	2022-01-21	\N
959	452	2350	\N	\N	167	2022	2022-01-21	\N
960	678	2351	\N	\N	167	2022	2022-01-21	\N
961	677	2352	\N	\N	167	2022	2022-01-21	\N
962	517	2353	\N	\N	167	2022	2022-01-21	\N
963	330	2354	\N	\N	167	2022	2022-01-21	\N
964	201	2355	\N	\N	167	2022	2022-01-21	\N
965	1079	2356	\N	\N	167	2022	2022-03-02	\N
966	385	2357	\N	\N	167	2022	2022-01-21	\N
967	657	2358	\N	\N	167	2022	2022-01-21	\N
968	192	2359	\N	\N	167	2022	2022-01-21	\N
969	658	2360	\N	\N	167	2022	2022-01-21	\N
970	1160	2361	\N	\N	167	2022	2022-03-17	\N
971	548	2362	\N	\N	167	2022	2022-01-21	\N
972	1186	2363	\N	\N	167	2022	2022-01-21	\N
973	474	2364	\N	\N	167	2022	2022-01-21	\N
974	709	2365	\N	\N	167	2022	2022-01-21	\N
975	783	2366	\N	\N	168	2022	2022-01-21	\N
976	844	2367	\N	\N	168	2022	2022-01-21	\N
977	122	2368	\N	\N	168	2022	2022-01-21	\N
978	750	2369	\N	\N	168	2022	2022-01-21	\N
979	831	2370	\N	\N	168	2022	2022-01-21	\N
980	171	2371	\N	\N	168	2022	2022-01-21	\N
981	817	2372	\N	\N	168	2022	2022-01-21	\N
982	690	2373	\N	\N	168	2022	2022-01-21	\N
983	318	2374	\N	\N	168	2022	2022-01-21	\N
984	493	2375	\N	\N	168	2022	2022-01-21	\N
985	347	2376	\N	\N	168	2022	2022-01-21	\N
986	398	2377	\N	\N	168	2022	2022-01-21	\N
987	716	2378	\N	\N	168	2022	2022-01-21	\N
988	940	2379	\N	\N	168	2022	2022-01-21	\N
989	873	2380	\N	\N	168	2022	2022-01-21	\N
990	545	2381	\N	\N	168	2022	2022-01-21	\N
991	571	2382	\N	\N	168	2022	2022-01-21	\N
992	732	2383	\N	\N	168	2022	2022-01-21	\N
993	191	2384	\N	\N	168	2022	2022-01-21	\N
994	673	2385	\N	\N	168	2022	2022-01-21	\N
995	805	2386	\N	\N	168	2022	2022-01-21	\N
996	225	2387	\N	\N	168	2022	2022-01-21	\N
997	671	2388	\N	\N	168	2022	2022-01-21	\N
998	188	2389	\N	\N	168	2022	2022-01-21	\N
999	830	2390	\N	\N	168	2022	2022-01-21	\N
1000	220	2391	\N	\N	168	2022	2022-01-21	\N
1001	1012	2392	\N	\N	168	2022	2022-01-21	\N
1002	460	2393	\N	\N	168	2022	2022-01-21	\N
1003	825	2394	\N	\N	168	2022	2022-01-21	\N
1004	821	2395	\N	\N	168	2022	2022-01-21	\N
1005	538	2396	\N	\N	168	2022	2022-01-21	\N
1006	878	2397	\N	\N	168	2022	2022-01-21	\N
1007	319	2398	\N	\N	168	2022	2022-01-21	\N
1008	326	2399	\N	\N	168	2022	2022-01-21	\N
1009	847	2400	\N	\N	168	2022	2022-01-21	\N
1010	652	2401	\N	\N	168	2022	2022-01-21	\N
1011	1063	2402	\N	\N	169	2022	2022-01-21	\N
1012	811	2403	\N	\N	169	2022	2022-01-21	\N
1013	906	2404	\N	\N	169	2022	2022-01-21	\N
1014	853	2405	\N	\N	169	2022	2022-01-21	\N
1015	1014	2406	\N	\N	169	2022	2022-01-21	\N
1016	836	2407	\N	\N	169	2022	2022-01-21	\N
1017	659	2408	\N	\N	169	2022	2022-01-21	\N
1018	561	2409	\N	\N	169	2022	2022-01-21	\N
1019	325	2410	\N	\N	169	2022	2022-01-21	\N
1020	145	2411	\N	\N	169	2022	2022-01-21	\N
1021	125	2412	\N	\N	169	2022	2022-01-21	\N
1022	215	2413	\N	\N	169	2022	2022-01-21	\N
1023	304	2414	\N	\N	169	2022	2022-01-21	\N
1024	560	2415	\N	\N	169	2022	2022-01-21	\N
1025	646	2416	\N	\N	169	2022	2022-01-21	\N
1026	967	2417	\N	\N	169	2022	2022-01-21	\N
1027	839	2418	\N	\N	169	2022	2022-01-21	\N
1028	492	2419	\N	\N	169	2022	2022-01-21	\N
1029	893	2420	\N	\N	169	2022	2022-01-21	\N
1030	1045	2421	\N	\N	169	2022	2022-01-21	\N
1031	232	2422	\N	\N	169	2022	2022-01-21	\N
1032	892	2423	\N	\N	169	2022	2022-01-21	\N
1033	1035	2424	\N	\N	169	2022	2022-01-21	\N
1034	888	2425	\N	\N	169	2022	2022-01-21	\N
1035	1162	2426	\N	\N	169	2022	2022-03-17	\N
1036	788	2427	\N	\N	169	2022	2022-01-21	\N
1037	916	2428	\N	\N	169	2022	2022-01-21	\N
1038	889	2429	\N	\N	169	2022	2022-01-21	\N
1039	320	2430	\N	\N	169	2022	2022-01-21	\N
1040	679	2431	\N	\N	169	2022	2022-01-21	\N
1041	695	2432	\N	\N	169	2022	2022-01-24	\N
1042	242	2433	\N	\N	169	2022	2022-01-21	\N
1043	982	2434	\N	\N	170	2022	2022-01-21	\N
1044	337	2435	\N	\N	170	2022	2022-01-21	\N
1045	1054	2436	\N	\N	170	2022	2022-01-21	\N
1046	206	2437	\N	\N	170	2022	2022-01-21	\N
1047	139	2438	\N	\N	170	2022	2022-01-21	\N
1048	705	2439	\N	\N	170	2022	2022-01-21	\N
1049	1057	2440	\N	\N	170	2022	2022-01-21	\N
1050	525	2441	\N	\N	170	2022	2022-01-21	\N
1051	568	2442	\N	\N	170	2022	2022-01-21	\N
1052	569	2443	\N	\N	170	2022	2022-01-21	\N
1053	616	2444	\N	\N	170	2022	2022-01-21	\N
1054	1008	2445	\N	\N	170	2022	2022-01-21	\N
1055	507	2446	\N	\N	170	2022	2022-01-21	\N
1056	379	2447	\N	\N	170	2022	2022-01-21	\N
1057	343	2448	\N	\N	170	2022	2022-01-21	\N
1058	642	2449	\N	\N	170	2022	2022-01-21	\N
1059	870	2450	\N	\N	170	2022	2022-01-21	\N
1060	544	2451	\N	\N	170	2022	2022-01-21	\N
1061	412	2452	\N	\N	170	2022	2022-01-21	\N
1062	187	2453	\N	\N	170	2022	2022-01-21	\N
1063	447	2454	\N	\N	170	2022	2022-01-21	\N
1064	814	2455	\N	\N	170	2022	2022-01-21	\N
1065	241	2456	\N	\N	170	2022	2022-01-21	\N
1066	708	2457	\N	\N	170	2022	2022-01-21	\N
1067	605	2458	\N	\N	170	2022	2022-01-21	\N
1068	903	2459	\N	\N	170	2022	2022-01-21	\N
1069	647	2460	\N	\N	170	2022	2022-01-21	\N
1070	1029	2461	\N	\N	170	2022	2022-01-21	\N
1071	248	2462	\N	\N	170	2022	2022-01-21	\N
1072	1046	2463	\N	\N	170	2022	2022-01-21	\N
1073	790	2464	\N	\N	170	2022	2022-01-21	\N
1074	782	2465	\N	\N	171	2022	2022-01-21	\N
1075	403	2466	\N	\N	171	2022	2022-01-21	\N
1076	204	2467	\N	\N	171	2022	2022-01-21	\N
1077	905	2468	\N	\N	171	2022	2022-01-21	\N
1078	608	2469	\N	\N	171	2022	2022-01-21	\N
1079	591	2470	\N	\N	171	2022	2022-01-21	\N
1080	580	2471	\N	\N	171	2022	2022-01-21	\N
1081	699	2472	\N	\N	171	2022	2022-01-21	\N
1082	867	2473	\N	\N	171	2022	2022-01-21	\N
1083	211	2474	\N	\N	171	2022	2022-01-21	\N
1084	371	2475	\N	\N	171	2022	2022-01-21	\N
1085	663	2476	\N	\N	171	2022	2022-01-21	\N
1086	349	2477	\N	\N	171	2022	2022-01-21	\N
1087	935	2478	\N	\N	171	2022	2022-01-21	\N
1088	285	2479	\N	\N	171	2022	2022-01-21	\N
1089	1180	2480	\N	\N	171	2022	2022-01-21	\N
1090	518	2481	\N	\N	171	2022	2022-01-21	\N
1091	336	2482	\N	\N	171	2022	2022-01-21	\N
1092	866	2483	\N	\N	171	2022	2022-01-21	\N
1093	596	2484	\N	\N	171	2022	2022-01-21	\N
1094	1206	2485	\N	\N	171	2022	2022-03-04	\N
1095	774	2486	\N	\N	171	2022	2022-01-21	\N
1096	822	2487	\N	\N	171	2022	2022-01-21	\N
1097	933	2488	\N	\N	171	2022	2022-01-21	\N
1098	214	2489	\N	\N	171	2022	2022-01-21	\N
1099	1058	2490	\N	\N	171	2022	2022-01-21	\N
1100	908	2491	\N	\N	171	2022	2022-01-21	\N
1101	758	2492	\N	\N	171	2022	2022-01-21	\N
1102	226	2493	\N	\N	171	2022	2022-01-21	\N
1103	633	2494	\N	\N	171	2022	2022-01-21	\N
1104	1069	2495	\N	\N	171	2022	2022-01-21	\N
1105	974	2496	\N	\N	171	2022	2022-01-21	\N
1106	743	2497	\N	\N	171	2022	2022-01-21	\N
1107	189	2498	\N	\N	172	2022	2022-01-21	\N
1108	249	2499	\N	\N	172	2022	2022-01-21	\N
1109	140	2500	\N	\N	172	2022	2022-01-21	\N
1110	1015	2501	\N	\N	172	2022	2022-01-21	\N
1111	1026	2502	\N	\N	172	2022	2022-01-21	\N
1112	885	2503	\N	\N	172	2022	2022-01-21	\N
1113	670	2504	\N	\N	172	2022	2022-01-21	\N
1114	684	2505	\N	\N	172	2022	2022-01-21	\N
1115	686	2506	\N	\N	172	2022	2022-01-21	\N
1116	294	2507	\N	\N	172	2022	2022-01-21	\N
1117	209	2508	\N	\N	172	2022	2022-01-21	\N
1118	261	2509	\N	\N	172	2022	2022-01-21	\N
1119	377	2510	\N	\N	172	2022	2022-01-21	\N
1120	606	2511	\N	\N	172	2022	2022-01-21	\N
1121	443	2512	\N	\N	172	2022	2022-01-21	\N
1122	818	2513	\N	\N	172	2022	2022-01-21	\N
1123	310	2514	\N	\N	172	2022	2022-01-21	\N
1124	126	2515	\N	\N	172	2022	2022-01-21	\N
1125	388	2516	\N	\N	172	2022	2022-01-21	\N
1126	470	2517	\N	\N	172	2022	2022-01-21	\N
1127	127	2518	\N	\N	172	2022	2022-01-21	\N
1128	1031	2519	\N	\N	172	2022	2022-03-01	\N
1129	117	2520	\N	\N	172	2022	2022-01-21	\N
1130	274	2521	\N	\N	172	2022	2022-01-21	\N
1131	499	2522	\N	\N	172	2022	2022-01-21	\N
1132	992	2523	\N	\N	172	2022	2022-01-21	\N
1133	949	2524	\N	\N	172	2022	2022-01-21	\N
1134	676	2525	\N	\N	172	2022	2022-01-21	\N
1135	802	2526	\N	\N	172	2022	2022-01-21	\N
1136	904	2527	\N	\N	172	2022	2022-01-21	\N
1137	418	2528	\N	\N	172	2022	2022-01-21	\N
1138	868	2529	\N	\N	172	2022	2022-01-21	\N
1139	446	2530	\N	\N	173	2022	2022-01-24	\N
1140	432	2531	\N	\N	173	2022	2022-01-24	\N
1141	567	2532	\N	\N	173	2022	2022-01-24	\N
1142	734	2533	\N	\N	173	2022	2022-01-24	\N
1143	1066	2534	\N	\N	173	2022	2022-01-24	\N
1144	900	2535	\N	\N	173	2022	2022-01-24	\N
1145	541	2536	\N	\N	173	2022	2022-01-24	\N
1146	354	2537	\N	\N	173	2022	2022-01-24	\N
1147	1018	2538	\N	\N	173	2022	2022-01-24	\N
1148	283	2539	\N	\N	173	2022	2022-01-24	\N
1149	931	2540	\N	\N	173	2022	2022-01-24	\N
1150	641	2541	\N	\N	173	2022	2022-01-24	\N
1151	511	2542	\N	\N	173	2022	2022-01-24	\N
1152	451	2543	\N	\N	173	2022	2022-01-24	\N
1153	458	2544	\N	\N	173	2022	2022-01-24	\N
1154	615	2545	\N	\N	173	2022	2022-01-24	\N
1155	854	2546	\N	\N	173	2022	2022-01-24	\N
1156	896	2547	\N	\N	173	2022	2022-01-24	\N
1157	473	2548	\N	\N	173	2022	2022-01-24	\N
1158	439	2549	\N	\N	173	2022	2022-01-24	\N
1159	745	2550	\N	\N	173	2022	2022-01-24	\N
1160	960	2551	\N	\N	173	2022	2022-01-24	\N
1161	539	2552	\N	\N	174	2022	2022-01-24	\N
1162	998	2553	\N	\N	174	2022	2022-01-24	\N
1163	414	2554	\N	\N	174	2022	2022-01-24	\N
1164	1017	2555	\N	\N	174	2022	2022-01-24	\N
1165	1022	2556	\N	\N	174	2022	2022-01-24	\N
1166	425	2557	\N	\N	174	2022	2022-01-24	\N
1167	1074	2558	\N	\N	174	2022	2022-01-24	\N
1168	520	2559	\N	\N	174	2022	2022-01-24	\N
1169	523	2560	\N	\N	174	2022	2022-01-24	\N
1170	562	2561	\N	\N	174	2022	2022-01-24	\N
1171	1073	2562	\N	\N	174	2022	2022-01-24	\N
1172	757	2563	\N	\N	174	2022	2022-01-24	\N
1173	988	2564	\N	\N	174	2022	2022-01-24	\N
1174	582	2565	\N	\N	174	2022	2022-01-24	\N
1175	542	2566	\N	\N	174	2022	2022-01-24	\N
1176	292	2567	\N	\N	174	2022	2022-01-24	\N
1177	848	2568	\N	\N	174	2022	2022-01-24	\N
1178	302	2569	\N	\N	174	2022	2022-01-24	\N
1179	328	2570	\N	\N	174	2022	2022-01-24	\N
1180	333	2571	\N	\N	174	2022	2022-03-08	\N
1181	574	2572	\N	\N	174	2022	2022-01-24	\N
1182	130	2573	\N	\N	174	2022	2022-01-24	\N
1183	1016	2574	\N	\N	174	2022	2022-01-24	\N
1184	981	2575	\N	\N	174	2022	2022-01-24	\N
1185	961	2576	\N	\N	174	2022	2022-01-24	\N
1186	859	2577	\N	\N	174	2022	2022-01-24	\N
1187	694	2578	\N	\N	174	2022	2022-01-24	\N
1188	798	2579	\N	\N	174	2022	2022-01-24	\N
1189	1246	2580	\N	\N	174	2022	2022-01-24	\N
1190	704	2581	\N	\N	174	2022	2022-01-24	\N
1191	959	2582	\N	\N	174	2022	2022-01-24	\N
1192	553	2583	\N	\N	174	2022	2022-01-24	\N
1193	898	2584	\N	\N	174	2022	2022-01-24	\N
1194	587	2585	\N	\N	174	2022	2022-01-24	\N
1195	324	2586	\N	\N	174	2022	2022-01-24	\N
1196	150	2587	\N	\N	174	2022	2022-01-24	\N
1197	1247	2588	\N	\N	175	2022	2022-03-04	\N
1198	1232	2589	\N	\N	175	2022	2022-01-24	\N
1199	990	2590	\N	\N	175	2022	2022-01-24	\N
1200	1070	2591	\N	\N	175	2022	2022-01-24	\N
1201	250	2592	\N	\N	175	2022	2022-01-24	\N
1202	512	2593	\N	\N	175	2022	2022-01-24	\N
1203	265	2594	\N	\N	175	2022	2022-01-24	\N
1204	480	2595	\N	\N	175	2022	2022-01-24	\N
1205	592	2596	\N	\N	175	2022	2022-01-24	\N
1206	995	2597	\N	\N	175	2022	2022-01-24	\N
1207	572	2598	\N	\N	175	2022	2022-01-24	\N
1208	551	2599	\N	\N	175	2022	2022-01-24	\N
1209	466	2600	\N	\N	175	2022	2022-01-24	\N
1210	579	2601	\N	\N	175	2022	2022-01-24	\N
1211	613	2602	\N	\N	175	2022	2022-01-24	\N
1212	419	2603	\N	\N	175	2022	2022-01-24	\N
1213	729	2604	\N	\N	175	2022	2022-01-24	\N
1214	662	2605	\N	\N	175	2022	2022-01-24	\N
1215	852	2606	\N	\N	175	2022	2022-01-24	\N
1216	415	2607	\N	\N	175	2022	2022-01-24	\N
1217	358	2608	\N	\N	175	2022	2022-01-24	\N
1218	323	2609	\N	\N	175	2022	2022-01-24	\N
1219	661	2610	\N	\N	175	2022	2022-01-24	\N
1220	1271	2611	\N	\N	175	2022	2022-04-26	\N
1221	715	2612	\N	\N	175	2022	2022-01-24	\N
1222	321	2613	\N	\N	175	2022	2022-01-24	\N
1223	726	2614	\N	\N	175	2022	2022-01-24	\N
1224	422	2615	\N	\N	175	2022	2022-01-24	\N
1225	437	2616	\N	\N	175	2022	2022-01-24	\N
1226	335	2617	\N	\N	175	2022	2022-01-24	\N
1227	703	2618	\N	\N	175	2022	2022-01-24	\N
1228	923	2619	\N	\N	175	2022	2022-01-24	\N
1229	963	2620	\N	\N	175	2022	2022-01-24	\N
1230	134	2621	\N	\N	176	2022	2022-01-24	\N
1231	505	2622	\N	\N	176	2022	2022-01-24	\N
1232	504	2623	\N	\N	176	2022	2022-01-24	\N
1233	887	2624	\N	\N	176	2022	2022-01-24	\N
1234	968	2625	\N	\N	176	2022	2022-01-24	\N
1235	593	2626	\N	\N	176	2022	2022-01-24	\N
1236	570	2627	\N	\N	176	2022	2022-01-24	\N
1237	509	2628	\N	\N	176	2022	2022-01-24	\N
1238	660	2629	\N	\N	176	2022	2022-01-24	\N
1239	697	2630	\N	\N	176	2022	2022-01-24	\N
1240	300	2631	\N	\N	176	2022	2022-01-24	\N
1241	309	2632	\N	\N	176	2022	2022-01-24	\N
1242	810	2633	\N	\N	176	2022	2022-01-24	\N
1243	476	2634	\N	\N	176	2022	2022-01-24	\N
1244	277	2635	\N	\N	176	2022	2022-01-24	\N
1245	727	2636	\N	\N	176	2022	2022-01-24	\N
1246	632	2637	\N	\N	176	2022	2022-01-24	\N
1247	341	2638	\N	\N	176	2022	2022-01-24	\N
1248	635	2639	\N	\N	176	2022	2022-01-24	\N
1249	350	2640	\N	\N	176	2022	2022-01-24	\N
1250	365	2641	\N	\N	176	2022	2022-01-24	\N
1251	378	2642	\N	\N	176	2022	2022-01-24	\N
1252	494	2643	\N	\N	176	2022	2022-01-24	\N
1253	864	2644	\N	\N	176	2022	2022-01-24	\N
1254	721	2645	\N	\N	176	2022	2022-01-24	\N
1255	394	2646	\N	\N	176	2022	2022-01-24	\N
1256	247	2647	\N	\N	176	2022	2022-01-24	\N
1257	550	2648	\N	\N	176	2022	2022-01-24	\N
1258	522	2649	\N	\N	176	2022	2022-01-24	\N
1259	722	2650	\N	\N	176	2022	2022-01-24	\N
1260	316	2651	\N	\N	176	2022	2022-01-24	\N
1261	911	2652	\N	\N	176	2022	2022-01-24	\N
1262	293	2653	\N	\N	176	2022	2022-01-24	\N
1263	243	2654	\N	\N	176	2022	2022-01-24	\N
1264	445	2655	\N	\N	177	2022	2022-01-24	\N
1265	471	2656	\N	\N	177	2022	2022-01-24	\N
1266	490	2657	\N	\N	177	2022	2022-01-24	\N
1267	1061	2658	\N	\N	177	2022	2022-01-24	\N
1268	224	2659	\N	\N	177	2022	2022-01-24	\N
1269	552	2660	\N	\N	177	2022	2022-01-24	\N
1270	707	2661	\N	\N	177	2022	2022-01-24	\N
1271	482	2662	\N	\N	177	2022	2022-01-24	\N
1272	628	2663	\N	\N	177	2022	2022-01-24	\N
1273	254	2664	\N	\N	177	2022	2022-01-24	\N
1274	229	2665	\N	\N	177	2022	2022-01-24	\N
1275	1052	2666	\N	\N	177	2022	2022-01-24	\N
1276	469	2667	\N	\N	177	2022	2022-01-24	\N
1277	631	2668	\N	\N	177	2022	2022-01-24	\N
1278	1041	2669	\N	\N	177	2022	2022-01-24	\N
1279	535	2670	\N	\N	177	2022	2022-01-24	\N
1280	387	2671	\N	\N	177	2022	2022-01-24	\N
1281	884	2672	\N	\N	177	2022	2022-01-24	\N
1282	986	2673	\N	\N	177	2022	2022-01-24	\N
1283	875	2674	\N	\N	177	2022	2022-01-24	\N
1284	799	2675	\N	\N	177	2022	2022-01-24	\N
1285	533	2676	\N	\N	177	2022	2022-01-24	\N
1286	984	2677	\N	\N	177	2022	2022-01-24	\N
1287	693	2678	\N	\N	177	2022	2022-01-24	\N
1288	1249	2679	\N	\N	177	2022	2022-03-11	\N
1289	1270	2680	\N	\N	177	2022	2022-04-25	\N
1290	840	2681	\N	\N	177	2022	2022-01-24	\N
1291	883	2682	\N	\N	177	2022	2022-01-24	\N
1292	674	2683	\N	\N	177	2022	2022-01-24	\N
1293	1048	2684	\N	\N	177	2022	2022-01-24	\N
1294	876	2685	\N	\N	177	2022	2022-01-24	\N
1295	305	2686	\N	\N	177	2022	2022-01-24	\N
1296	714	2687	\N	\N	177	2022	2022-01-24	\N
1297	857	2688	\N	\N	177	2022	2022-01-24	\N
1298	114	2689	\N	\N	178	2022	2022-01-24	\N
1299	1011	2690	\N	\N	178	2022	2022-01-24	\N
1300	791	2691	\N	\N	178	2022	2022-01-24	\N
1301	524	2692	\N	\N	178	2022	2022-01-24	\N
1302	475	2693	\N	\N	178	2022	2022-01-24	\N
1303	489	2694	\N	\N	178	2022	2022-01-24	\N
1304	230	2695	\N	\N	178	2022	2022-01-24	\N
1305	666	2696	\N	\N	178	2022	2022-01-24	\N
1306	800	2697	\N	\N	178	2022	2022-01-24	\N
1307	979	2698	\N	\N	178	2022	2022-01-24	\N
1308	500	2699	\N	\N	178	2022	2022-01-24	\N
1309	890	2700	\N	\N	178	2022	2022-01-24	\N
1310	957	2701	\N	\N	178	2022	2022-01-24	\N
1311	611	2702	\N	\N	178	2022	2022-01-24	\N
1312	1025	2703	\N	\N	178	2022	2022-01-24	\N
1313	969	2704	\N	\N	178	2022	2022-01-24	\N
1314	966	2705	\N	\N	178	2022	2022-01-24	\N
1315	977	2706	\N	\N	178	2022	2022-01-24	\N
1316	706	2707	\N	\N	178	2022	2022-01-24	\N
1317	976	2708	\N	\N	178	2022	2022-01-24	\N
1318	332	2709	\N	\N	178	2022	2022-01-24	\N
1319	301	2710	\N	\N	178	2022	2022-01-24	\N
1320	1248	2711	\N	\N	177	2022	2022-01-24	\N
1321	951	2712	\N	\N	178	2022	2022-01-24	\N
1322	793	2713	\N	\N	178	2022	2022-01-24	\N
1323	308	2714	\N	\N	178	2022	2022-01-24	\N
1324	408	2715	\N	\N	178	2022	2022-01-24	\N
1325	1250	2716	\N	\N	178	2022	2022-03-04	\N
1326	456	2717	\N	\N	178	2022	2022-01-24	\N
1327	849	2718	\N	\N	178	2022	2022-01-24	\N
1328	874	2719	\N	\N	178	2022	2022-01-24	\N
1329	973	2720	\N	\N	178	2022	2022-01-24	\N
1330	784	2721	\N	\N	178	2022	2022-01-24	\N
1331	1252	2722	\N	\N	178	2022	2022-03-11	\N
1332	546	2723	\N	\N	179	2022	2022-01-24	\N
1333	155	2724	\N	\N	179	2022	2022-01-24	\N
1334	434	2725	\N	\N	179	2022	2022-01-24	\N
1335	457	2726	\N	\N	179	2022	2022-01-24	\N
1336	718	2727	\N	\N	179	2022	2022-01-24	\N
1337	565	2728	\N	\N	179	2022	2022-01-24	\N
1338	815	2729	\N	\N	179	2022	2022-01-24	\N
1339	723	2730	\N	\N	179	2022	2022-01-24	\N
1340	487	2731	\N	\N	179	2022	2022-01-24	\N
1341	423	2732	\N	\N	179	2022	2022-01-24	\N
1342	599	2733	\N	\N	179	2022	2022-01-24	\N
1343	872	2734	\N	\N	179	2022	2022-01-24	\N
1344	576	2735	\N	\N	179	2022	2022-01-24	\N
1345	575	2736	\N	\N	179	2022	2022-01-24	\N
1346	502	2737	\N	\N	179	2022	2022-01-24	\N
1347	636	2738	\N	\N	179	2022	2022-01-24	\N
1348	1253	2739	\N	\N	179	2022	2022-01-24	\N
1349	351	2740	\N	\N	179	2022	2022-01-24	\N
1350	687	2741	\N	\N	179	2022	2022-01-24	\N
1351	1255	2742	\N	\N	179	2022	2022-01-24	\N
1352	771	2743	\N	\N	179	2022	2022-01-24	\N
1353	731	2744	\N	\N	179	2022	2022-01-24	\N
1354	527	2745	\N	\N	179	2022	2022-01-24	\N
1355	244	2746	\N	\N	179	2022	2022-01-24	\N
1356	344	2747	\N	\N	179	2022	2022-01-24	\N
1357	583	2748	\N	\N	179	2022	2022-01-24	\N
1358	584	2749	\N	\N	179	2022	2022-01-24	\N
1359	359	2750	\N	\N	179	2022	2022-01-24	\N
1360	477	2751	\N	\N	179	2022	2022-01-24	\N
1361	153	2752	\N	\N	179	2022	2022-01-24	\N
1362	154	2753	\N	\N	179	2022	2022-01-24	\N
1363	860	2754	\N	\N	179	2022	2022-01-24	\N
1364	594	2755	\N	\N	179	2022	2022-01-24	\N
1365	313	2756	\N	\N	179	2022	2022-01-24	\N
1366	1258	2757	\N	\N	180	2022	2022-03-08	\N
1367	1257	2758	\N	\N	180	2022	2022-03-08	\N
1368	1256	2759	\N	\N	180	2022	2022-03-04	\N
1369	28	2760	\N	\N	180	2022	2022-01-24	\N
1370	1205	2761	\N	\N	180	2022	2022-01-24	\N
1371	585	2762	\N	\N	173	2022	2022-08-16	\N
1372	573	2763	\N	\N	180	2022	2022-01-24	\N
1373	485	2764	\N	\N	180	2022	2022-01-24	\N
1374	595	2765	\N	\N	173	2022	2022-05-24	\N
1375	1064	2766	\N	\N	180	2022	2022-01-24	\N
1376	598	2767	\N	\N	180	2022	2022-01-24	\N
1377	464	2768	\N	\N	180	2022	2022-01-24	\N
1378	650	2769	\N	\N	180	2022	2022-01-24	\N
1379	1051	2770	\N	\N	180	2022	2022-01-24	\N
1380	384	2771	\N	\N	180	2022	2022-01-24	\N
1381	993	2772	\N	\N	180	2022	2022-01-24	\N
1382	638	2773	\N	\N	180	2022	2022-01-24	\N
1383	1028	2774	\N	\N	180	2022	2022-01-24	\N
1384	340	2775	\N	\N	180	2022	2022-01-24	\N
1385	1049	2776	\N	\N	180	2022	2022-01-24	\N
1386	306	2777	\N	\N	180	2022	2022-01-24	\N
1387	882	2778	\N	\N	180	2022	2022-01-24	\N
1388	928	2779	\N	\N	180	2022	2022-01-24	\N
1389	1020	2780	\N	\N	180	2022	2022-01-24	\N
1390	962	2781	\N	\N	180	2022	2022-01-24	\N
1391	1251	2782	\N	\N	178	2022	2022-01-24	\N
1392	626	2783	\N	\N	173	2022	2022-08-16	\N
1393	1092	2784	\N	\N	180	2022	2022-01-24	\N
1394	436	2785	\N	\N	180	2022	2022-01-24	\N
1395	386	2786	\N	\N	180	2022	2022-01-24	\N
1396	481	2787	\N	\N	180	2022	2022-01-24	\N
1397	450	2788	\N	\N	180	2022	2022-01-24	\N
1398	827	2789	\N	\N	180	2022	2022-01-24	\N
1399	980	2790	\N	\N	180	2022	2022-01-24	\N
1400	251	2791	\N	\N	180	2022	2022-01-24	\N
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
-- Data for Name: suspencion_estudiante; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.suspencion_estudiante (id_suspension, id_estudiante, fecha_inicio, fecha_termino) FROM stdin;
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
2	PERMISO ADMINISTRATIVO
3	AUSENCIA INJUSTIFICADA
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

SELECT pg_catalog.setval('public.atrasos_id_atraso_seq', 21, true);


--
-- Name: bloque_clase_id_bloque_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.bloque_clase_id_bloque_seq', 1, false);


--
-- Name: cursos_id_curso_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.cursos_id_curso_seq', 180, true);


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

SELECT pg_catalog.setval('public.estudiantes_id_estudiante_seq', 2791, true);


--
-- Name: estudiantes_suspendidos_id_suspension_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.estudiantes_suspendidos_id_suspension_seq', 1, false);


--
-- Name: funcionarios_id_funcionario_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.funcionarios_id_funcionario_seq', 103, true);


--
-- Name: horario_id_clase_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.horario_id_clase_seq', 1, false);


--
-- Name: inasistencia_funcionario_id_inasistencia_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.inasistencia_funcionario_id_inasistencia_seq', 12, true);


--
-- Name: inasistencias_id_inasistencia_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.inasistencias_id_inasistencia_seq', 1, false);


--
-- Name: matriculas_id_matricula_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.matriculas_id_matricula_seq', 1400, true);


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

SELECT pg_catalog.setval('public.tipo_inasistencia_id_tipo_inasistencia_seq', 3, true);


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
-- Name: suspencion_estudiante pk_id_suspension; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.suspencion_estudiante
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

CREATE INDEX fki_fk_id_apoderado_suplente ON public.matricula USING btree (id_ap_suplente);


--
-- Name: fki_fk_id_apoderado_titula; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_apoderado_titula ON public.matricula USING btree (id_ap_titular);


--
-- Name: fki_fk_id_asignatura; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_asignatura ON public.inasistencia_estudiante USING btree (id_asignatura);


--
-- Name: fki_fk_id_curso; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_curso ON public.matricula USING btree (id_curso);


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
-- Name: fki_fk_id_tipo_inasistencia; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_tipo_inasistencia ON public.inasistencia_estudiante USING btree (id_tipo_inasistencia);


--
-- Name: fki_fk_id_usuario_justifica; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fki_fk_id_usuario_justifica ON public.atraso USING btree (id_usuario_justifica);


--
-- Name: inasistencia_estudiante fk_id_apoderado_justifica; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.inasistencia_estudiante
    ADD CONSTRAINT fk_id_apoderado_justifica FOREIGN KEY (id_apoderado_justifica) REFERENCES public.apoderado(id_apoderado) ON UPDATE CASCADE NOT VALID;


--
-- Name: atraso fk_id_apoderado_justifica; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.atraso
    ADD CONSTRAINT fk_id_apoderado_justifica FOREIGN KEY (id_apoderado_justifica) REFERENCES public.apoderado(id_apoderado) NOT VALID;


--
-- Name: matricula fk_id_apoderado_suplente; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.matricula
    ADD CONSTRAINT fk_id_apoderado_suplente FOREIGN KEY (id_ap_suplente) REFERENCES public.apoderado(id_apoderado) ON UPDATE CASCADE NOT VALID;


--
-- Name: matricula fk_id_apoderado_titula; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.matricula
    ADD CONSTRAINT fk_id_apoderado_titula FOREIGN KEY (id_ap_titular) REFERENCES public.apoderado(id_apoderado) ON UPDATE CASCADE NOT VALID;


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
-- Name: suspencion_estudiante fk_id_estudiante; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.suspencion_estudiante
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
-- Name: funcionario fk_id_tipo_funcionario; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.funcionario
    ADD CONSTRAINT fk_id_tipo_funcionario FOREIGN KEY (id_tipo_funcionario) REFERENCES public.tipo_funcionario(id_tipo_funcionario) NOT VALID;


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

