--
-- PostgreSQL database dump
--

-- Dumped from database version 16.3
-- Dumped by pg_dump version 16.3

-- Started on 2025-03-04 16:38:06

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
-- TOC entry 221 (class 1259 OID 63134)
-- Name: cache; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 63141)
-- Name: cache_locks; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache_locks OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 63166)
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 63165)
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.failed_jobs_id_seq OWNER TO postgres;

--
-- TOC entry 4941 (class 0 OID 0)
-- Dependencies: 226
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- TOC entry 225 (class 1259 OID 63158)
-- Name: job_batches; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.job_batches (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    total_jobs integer NOT NULL,
    pending_jobs integer NOT NULL,
    failed_jobs integer NOT NULL,
    failed_job_ids text NOT NULL,
    options text,
    cancelled_at integer,
    created_at integer NOT NULL,
    finished_at integer
);


ALTER TABLE public.job_batches OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 63149)
-- Name: jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);


ALTER TABLE public.jobs OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 63148)
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.jobs_id_seq OWNER TO postgres;

--
-- TOC entry 4942 (class 0 OID 0)
-- Dependencies: 223
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;


--
-- TOC entry 216 (class 1259 OID 63101)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 63100)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO postgres;

--
-- TOC entry 4943 (class 0 OID 0)
-- Dependencies: 215
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 219 (class 1259 OID 63118)
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 63188)
-- Name: payments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.payments (
    id bigint NOT NULL,
    team_id bigint NOT NULL,
    amount numeric(10,2) NOT NULL,
    payment_method character varying(255),
    reference_number character varying(255),
    status character varying(255) NOT NULL,
    notes text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    stripe_session_id character varying(255),
    CONSTRAINT payments_status_check CHECK (((status)::text = ANY ((ARRAY['pending'::character varying, 'completed'::character varying, 'failed'::character varying])::text[])))
);


ALTER TABLE public.payments OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 63187)
-- Name: payments_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.payments_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.payments_id_seq OWNER TO postgres;

--
-- TOC entry 4944 (class 0 OID 0)
-- Dependencies: 230
-- Name: payments_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.payments_id_seq OWNED BY public.payments.id;


--
-- TOC entry 220 (class 1259 OID 63125)
-- Name: sessions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


ALTER TABLE public.sessions OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 63178)
-- Name: teams; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.teams (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    company_name character varying(255) NOT NULL,
    team_leader character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    phone character varying(255) NOT NULL,
    player_count integer NOT NULL,
    contact_address text NOT NULL,
    company_logo character varying(255),
    player_sizes json NOT NULL,
    amount numeric(8,2),
    payment_status character varying(255) DEFAULT 'pending'::character varying NOT NULL,
    stripe_session_id character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    accepts_terms boolean DEFAULT false NOT NULL,
    accepts_newsletter boolean DEFAULT false NOT NULL
);


ALTER TABLE public.teams OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 63177)
-- Name: teams_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.teams_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.teams_id_seq OWNER TO postgres;

--
-- TOC entry 4945 (class 0 OID 0)
-- Dependencies: 228
-- Name: teams_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.teams_id_seq OWNED BY public.teams.id;


--
-- TOC entry 218 (class 1259 OID 63108)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 63107)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 4946 (class 0 OID 0)
-- Dependencies: 217
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 4736 (class 2604 OID 63169)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- TOC entry 4735 (class 2604 OID 63152)
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);


--
-- TOC entry 4733 (class 2604 OID 63104)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 4742 (class 2604 OID 63191)
-- Name: payments id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payments ALTER COLUMN id SET DEFAULT nextval('public.payments_id_seq'::regclass);


--
-- TOC entry 4738 (class 2604 OID 63181)
-- Name: teams id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.teams ALTER COLUMN id SET DEFAULT nextval('public.teams_id_seq'::regclass);


--
-- TOC entry 4734 (class 2604 OID 63111)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 4925 (class 0 OID 63134)
-- Dependencies: 221
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache (key, value, expiration) FROM stdin;
\.


--
-- TOC entry 4926 (class 0 OID 63141)
-- Dependencies: 222
-- Data for Name: cache_locks; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache_locks (key, owner, expiration) FROM stdin;
\.


--
-- TOC entry 4931 (class 0 OID 63166)
-- Dependencies: 227
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- TOC entry 4929 (class 0 OID 63158)
-- Dependencies: 225
-- Data for Name: job_batches; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.job_batches (id, name, total_jobs, pending_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at) FROM stdin;
\.


--
-- TOC entry 4928 (class 0 OID 63149)
-- Dependencies: 224
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
\.


--
-- TOC entry 4920 (class 0 OID 63101)
-- Dependencies: 216
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	0001_01_01_000000_create_users_table	1
2	0001_01_01_000001_create_cache_table	1
3	0001_01_01_000002_create_jobs_table	1
4	2025_02_27_153854_create_teams_table	1
5	2025_02_27_173500_create_payments_table	1
6	2025_03_03_151045_add_stripe_session_id_to_payments_table	2
7	2025_03_03_151238_update_payments_table_columns	3
8	2025_03_03_163502_add_terms_and_newsletter_to_teams_table	4
\.


--
-- TOC entry 4923 (class 0 OID 63118)
-- Dependencies: 219
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- TOC entry 4935 (class 0 OID 63188)
-- Dependencies: 231
-- Data for Name: payments; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.payments (id, team_id, amount, payment_method, reference_number, status, notes, created_at, updated_at, stripe_session_id) FROM stdin;
3	15	450.00	card	\N	completed	\N	2025-03-03 15:14:18	2025-03-03 15:14:18	cs_test_a1s7UKwyfZyjCBzRQMlwE691qxiyeCz953pwzkl7NLTgB1f471lsPI0GyU
4	16	450.00	card	\N	completed	\N	2025-03-03 15:15:15	2025-03-03 15:15:15	cs_test_a1gwz4Ie5wfRrkX44OqVOhvzWkzkfi8QweAkNJhvdDegLjVIFUCumHmfkx
5	18	450.00	card	\N	completed	\N	2025-03-03 15:18:49	2025-03-03 15:18:49	cs_test_a1v0CvDUpO8fzYhGqV03XNCMPU1Je1umcGtiy7oWbBLlhGkYgW4ZGXWcco
6	19	450.00	card	\N	completed	\N	2025-03-03 15:19:56	2025-03-03 15:19:56	cs_test_a1WtyJoWdmmmvXdMwkr32bnvcL16mY2EZT8uUec3TuDOL7yT9qxauKBqji
7	19	450.00	card	\N	completed	\N	2025-03-03 15:22:29	2025-03-03 15:22:29	cs_test_a1WtyJoWdmmmvXdMwkr32bnvcL16mY2EZT8uUec3TuDOL7yT9qxauKBqji
8	19	450.00	card	\N	completed	\N	2025-03-03 15:23:10	2025-03-03 15:23:10	cs_test_a1WtyJoWdmmmvXdMwkr32bnvcL16mY2EZT8uUec3TuDOL7yT9qxauKBqji
9	19	450.00	card	\N	completed	\N	2025-03-03 15:25:52	2025-03-03 15:25:52	cs_test_a1WtyJoWdmmmvXdMwkr32bnvcL16mY2EZT8uUec3TuDOL7yT9qxauKBqji
10	19	450.00	card	\N	completed	\N	2025-03-03 15:27:54	2025-03-03 15:27:54	cs_test_a1WtyJoWdmmmvXdMwkr32bnvcL16mY2EZT8uUec3TuDOL7yT9qxauKBqji
11	19	450.00	card	\N	completed	\N	2025-03-03 15:28:58	2025-03-03 15:28:58	cs_test_a1WtyJoWdmmmvXdMwkr32bnvcL16mY2EZT8uUec3TuDOL7yT9qxauKBqji
12	19	450.00	card	\N	completed	\N	2025-03-03 15:30:19	2025-03-03 15:30:19	cs_test_a1WtyJoWdmmmvXdMwkr32bnvcL16mY2EZT8uUec3TuDOL7yT9qxauKBqji
13	19	450.00	card	\N	completed	\N	2025-03-03 15:32:44	2025-03-03 15:32:44	cs_test_a1WtyJoWdmmmvXdMwkr32bnvcL16mY2EZT8uUec3TuDOL7yT9qxauKBqji
14	19	450.00	card	\N	completed	\N	2025-03-03 15:34:36	2025-03-03 15:34:36	cs_test_a1WtyJoWdmmmvXdMwkr32bnvcL16mY2EZT8uUec3TuDOL7yT9qxauKBqji
15	19	450.00	card	\N	completed	\N	2025-03-03 15:36:58	2025-03-03 15:36:58	cs_test_a1WtyJoWdmmmvXdMwkr32bnvcL16mY2EZT8uUec3TuDOL7yT9qxauKBqji
16	19	450.00	card	\N	completed	\N	2025-03-03 15:46:49	2025-03-03 15:46:49	cs_test_a1WtyJoWdmmmvXdMwkr32bnvcL16mY2EZT8uUec3TuDOL7yT9qxauKBqji
17	20	450.00	card	\N	completed	\N	2025-03-03 15:50:47	2025-03-03 15:50:47	cs_test_a1kEz8IRVXlRxUZndUwRry8ISs5UNTgWtdaGQksoqCiAvA7gjTQNlJjifl
18	20	450.00	card	\N	completed	\N	2025-03-03 15:52:02	2025-03-03 15:52:02	cs_test_a1kEz8IRVXlRxUZndUwRry8ISs5UNTgWtdaGQksoqCiAvA7gjTQNlJjifl
19	20	450.00	card	\N	completed	\N	2025-03-03 16:05:00	2025-03-03 16:05:00	cs_test_a1kEz8IRVXlRxUZndUwRry8ISs5UNTgWtdaGQksoqCiAvA7gjTQNlJjifl
20	21	450.00	card	\N	completed	\N	2025-03-03 16:07:48	2025-03-03 16:07:48	cs_test_a1jLqotE3udmOKbj9AI1UIUtl1W4UrQAGGwUBzpINx923KEGFCilLygpD2
21	21	450.00	card	\N	completed	\N	2025-03-03 16:11:33	2025-03-03 16:11:33	cs_test_a1jLqotE3udmOKbj9AI1UIUtl1W4UrQAGGwUBzpINx923KEGFCilLygpD2
22	21	450.00	card	\N	completed	\N	2025-03-03 16:13:04	2025-03-03 16:13:04	cs_test_a1jLqotE3udmOKbj9AI1UIUtl1W4UrQAGGwUBzpINx923KEGFCilLygpD2
23	21	450.00	card	\N	completed	\N	2025-03-03 16:13:11	2025-03-03 16:13:11	cs_test_a1jLqotE3udmOKbj9AI1UIUtl1W4UrQAGGwUBzpINx923KEGFCilLygpD2
24	21	450.00	card	\N	completed	\N	2025-03-03 16:13:30	2025-03-03 16:13:30	cs_test_a1jLqotE3udmOKbj9AI1UIUtl1W4UrQAGGwUBzpINx923KEGFCilLygpD2
25	21	450.00	card	\N	completed	\N	2025-03-03 16:20:53	2025-03-03 16:20:53	cs_test_a1jLqotE3udmOKbj9AI1UIUtl1W4UrQAGGwUBzpINx923KEGFCilLygpD2
26	21	450.00	card	\N	completed	\N	2025-03-03 16:24:11	2025-03-03 16:24:11	cs_test_a1jLqotE3udmOKbj9AI1UIUtl1W4UrQAGGwUBzpINx923KEGFCilLygpD2
27	22	450.00	card	\N	completed	\N	2025-03-03 16:25:07	2025-03-03 16:25:07	cs_test_a11ewEJeSxMU4z9GQXGuRBkgTOwIs2D0bt1MMDTQMuwvpkAoWjBHLtFY3J
28	23	450.00	card	\N	completed	\N	2025-03-03 16:27:30	2025-03-03 16:27:30	cs_test_a10p86ALihRHtJsiIN6CN5NSobmN66dZ9fVJGvXUjlpoBHnW3nxfaGiVga
29	23	450.00	card	\N	completed	\N	2025-03-03 16:29:58	2025-03-03 16:29:58	cs_test_a10p86ALihRHtJsiIN6CN5NSobmN66dZ9fVJGvXUjlpoBHnW3nxfaGiVga
30	24	450.00	card	\N	completed	\N	2025-03-03 16:50:44	2025-03-03 16:50:44	cs_test_a1B4pzAT8XpjRQjBbx17pnyZxQyzITqtyc779wYYsx3ddmymPmmqZzEPIf
31	24	450.00	card	\N	completed	\N	2025-03-03 16:52:25	2025-03-03 16:52:25	cs_test_a1B4pzAT8XpjRQjBbx17pnyZxQyzITqtyc779wYYsx3ddmymPmmqZzEPIf
32	26	450.00	card	\N	completed	\N	2025-03-03 16:53:41	2025-03-03 16:53:41	cs_test_a1jjc6DJAjoWYVqCXxcdJ5h3yiMCvWWVibSTliKidYbv0N19HO0aLZLvd3
33	30	0.50	card	\N	completed	\N	2025-03-03 17:36:12	2025-03-03 17:36:12	cs_live_a18SyhOpnZEPFVeI1JUHTJVefIeavJb0J18Y13bhY51n8rgN9zCHFIO8sK
34	27	450.00	card	\N	completed	\N	2025-03-03 18:17:37	2025-03-03 18:17:37	cs_test_a1gVcd8ayay6lgjeEcUKzhLBD3PcYhHhhwb6lnQXJftjnGuX4mOuLQXFdC
\.


--
-- TOC entry 4924 (class 0 OID 63125)
-- Dependencies: 220
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
XO0CKrsDJcOGF45QJxsTL2lK1NbykAH6XOKrCLob	\N	127.0.0.1	Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36	YTozOntzOjY6Il90b2tlbiI7czo0MDoiSzhSWXhOZ3ZWSXBhTWlFMGdOTXZVbWYyYWprbU13M0NURloxYlBTeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTI0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcGF5bWVudHMvMjcvY29uZmlybWF0aW9uP3Nlc3Npb25faWQ9Y3NfdGVzdF9hMWdWY2Q4YXlheTZsZ2plRWNVS3poTEJEM1BjWWhIaGh3YjZsblFYSmZ0am5HdVg0bU91TFFYRmRDIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==	1741025860
\.


--
-- TOC entry 4933 (class 0 OID 63178)
-- Dependencies: 229
-- Data for Name: teams; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.teams (id, name, company_name, team_leader, email, phone, player_count, contact_address, company_logo, player_sizes, amount, payment_status, stripe_session_id, created_at, updated_at, accepts_terms, accepts_newsletter) FROM stdin;
1	Carver and Nolan Traders	Carver and Nolan Traders	Sed totam minima dol	dequmox@mailinator.com	+1 (322) 831-1459	5	Consequatur iusto u	company-logos/5XiJRct72GRV9JJb8g8V6Ijz7DmZtF7OWUOlVWzr.jpg	["S","M","S","L","M"]	\N	pending	\N	2025-03-03 14:19:00	2025-03-03 14:19:00	f	f
2	Carver and Nolan Traders	Carver and Nolan Traders	Sed totam minima dol	dequmox@mailinator.com	+1 (322) 831-1459	5	Consequatur iusto u	company-logos/lCMH1uJC3tYPTZ3hDTcE5WdCdEaPs7a9UZ7s9EnG.jpg	["L","S","S","M","M"]	\N	pending	\N	2025-03-03 14:21:13	2025-03-03 14:21:13	f	f
3	Beach and Lara Trading	Beach and Lara Trading	Molestias corrupti	pidenuvi@mailinator.com	+1 (159) 765-7319	5	Accusantium sint ve	company-logos/bSTlWfPTBDgxK67fGbWfcYivYI9sAeXuheYm6cc6.jpg	["M","L","L","M","S"]	\N	pending	\N	2025-03-03 14:24:39	2025-03-03 14:24:39	f	f
4	Velasquez Cobb LLC	Velasquez Cobb LLC	Anim illo est id la	tedil@mailinator.com	+1 (316) 685-8371	5	Ipsum temporibus qui	company-logos/01YcAgrlt7VQx2Ohrbz7K2CUbityfFIZ85lys5fZ.jpg	["S","M","M","M","M"]	\N	pending	\N	2025-03-03 14:29:40	2025-03-03 14:29:40	f	f
5	Velasquez Cobb LLC	Velasquez Cobb LLC	Anim illo est id la	tedil@mailinator.com	+1 (316) 685-8371	5	Ipsum temporibus qui	\N	["L","M","S","M","M"]	\N	pending	\N	2025-03-03 14:31:59	2025-03-03 14:31:59	f	f
6	Velasquez Cobb LLC	Velasquez Cobb LLC	Anim illo est id la	tedil@mailinator.com	+1 (316) 685-8371	5	Ipsum temporibus qui	company-logos/zZabzzb3V24mwCRk4kGDuILAdKC5QqynXWD80jUJ.jpg	["S","M","S","L","M"]	\N	pending	\N	2025-03-03 14:33:25	2025-03-03 14:33:25	f	f
7	Young Lawson Co	Young Lawson Co	Iure odit quia deser	suje@mailinator.com	+1 (773) 436-9765	5	Quos veniam quis of	company-logos/uiTejIlCHrQfUYSXYkr7J9xXgX7xgZ2jmOAux1tN.jpg	["M","L","M","S","S"]	\N	pending	\N	2025-03-03 14:36:51	2025-03-03 14:36:51	f	f
8	Young Lawson Co	Young Lawson Co	Iure odit quia deser	suje@mailinator.com	+1 (773) 436-9765	5	Quos veniam quis of	\N	["S","S","S","S","M"]	\N	pending	\N	2025-03-03 14:38:31	2025-03-03 14:38:31	f	f
9	Doyle and Jacobson Trading	Doyle and Jacobson Trading	Earum ipsam esse com	lowin@mailinator.com	+1 (777) 492-4371	5	Ut et sint velit al	company-logos/oeIk2iOHROSDysPWrWTjQryjDmef2RSfUtBaGlCy.jpg	["M","L","M","M","L"]	\N	pending	\N	2025-03-03 14:39:52	2025-03-03 14:39:52	f	f
10	Owens and Delgado Plc	Owens and Delgado Plc	Iusto dolore dolore	toxi@mailinator.com	+1 (323) 903-2399	5	Quibusdam pariatur	company-logos/B0Qcfe8P72pTTGegQIyQCDgACcLydrf6WcjDV5Oz.jpg	["M","S","L","M","M"]	\N	pending	\N	2025-03-03 14:41:49	2025-03-03 14:41:49	f	f
11	Mckenzie and Simon Plc	Mckenzie and Simon Plc	Sit ad inventore cu	vujudyke@mailinator.com	+1 (348) 359-7532	5	Nostrud sit consequ	company-logos/EpmgQtpKmvIKoq5gXPwBNXup0NcayUQLwyNdqeE1.jpg	["S","S","M","M","L"]	\N	pending	\N	2025-03-03 14:46:32	2025-03-03 14:46:32	f	f
12	Whitfield and Mccarthy Co	Whitfield and Mccarthy Co	Mollitia quia sit v	tyqihybu@mailinator.com	+1 (196) 424-3923	5	Velit ab eum magnam	company-logos/3tdTbwUJQLG6s9IDAf767qry5AJ74OuhpU64tYR0.png	["M","M","S","S","M"]	\N	pending	\N	2025-03-03 14:56:51	2025-03-03 14:56:51	f	f
13	Schneider Page Associates	Schneider Page Associates	Qui deserunt molliti	lyciqamiv@mailinator.com	+1 (477) 538-7274	5	Odit laudantium dol	company-logos/2C3Sg95wCaGCJYdqVB0Vj2eoI8BpNvVXmVMnatHc.jpg	["M","S","S","S","L"]	\N	pending	\N	2025-03-03 15:00:11	2025-03-03 15:00:11	f	f
14	Griffith Ingram Inc	Griffith Ingram Inc	Qui temporibus quia	hilifahyfe@mailinator.com	+1 (391) 728-4083	5	Quis qui consequuntu	company-logos/Ll4rHEOK0zb52p3R2UdKvyi4NBfMHJbS2BScwM6g.jpg	["S","L","S","L","M"]	\N	pending	\N	2025-03-03 15:09:21	2025-03-03 15:09:21	f	f
15	Ellis and Velez Co	Ellis and Velez Co	Rerum amet illo exe	fowafogiqo@mailinator.com	+1 (995) 746-1812	5	Proident debitis au	company-logos/VzJBZPTIzy8S1x37juU423Dd77MX0LG1AtoqC7ZG.jpg	["M","L","M","S","S"]	\N	paid	\N	2025-03-03 15:11:38	2025-03-03 15:14:18	f	f
16	Gentry Wheeler Plc	Gentry Wheeler Plc	Asperiores odit natu	bumutydabi@mailinator.com	+1 (736) 385-6296	5	Qui voluptatem fuga	company-logos/N58gYq3jhICsvO84i0BICbf0zY9uMWQRaDkWVeUA.jpg	["L","S","M","S","S"]	\N	paid	\N	2025-03-03 15:14:52	2025-03-03 15:15:15	f	f
17	Dominguez Santos Traders	Dominguez Santos Traders	Quia sit quasi quia	harolahep@mailinator.com	+1 (798) 903-2367	5	Pariatur Eaque eum	company-logos/qGgWdl0Z6UuyUdpw8V3IBD2XvP3gSs95iiu0dpKr.jpg	["M","L","S","S","S"]	\N	pending	\N	2025-03-03 15:15:55	2025-03-03 15:15:55	f	f
18	Hardin May Co	Hardin May Co	Non ex officia qui e	dizef@mailinator.com	+1 (883) 207-8791	5	Cum itaque deserunt	company-logos/9Yj1vwqsXZnfuUoDVah5urlxBviZm1NGIqYlZi53.jpg	["L","S","L","L","S"]	\N	paid	\N	2025-03-03 15:18:23	2025-03-03 15:18:49	f	f
19	Gill and Dixon LLC	Gill and Dixon LLC	Alix	alexalix58@gmail.com	+1 (915) 898-8376	5	25 Chemin du Renard	company-logos/6z0yqSxJr2CqCLKG3hcocsfgxHvWIi8sXDgGjlTx.png	["S","M","S","M","M"]	\N	paid	\N	2025-03-03 15:19:25	2025-03-03 15:19:56	f	f
20	Bennett and Mcguire LLC	Bennett and Mcguire LLC	Distinctio Praesent	pywe@mailinator.com	+1 (341) 795-4643	5	Cupidatat nostrud do	company-logos/SZnzXUpAL3KNPFmMhnT64ECqLCKDZJI39A4Xatmk.jpg	["M","M","S","S","M"]	\N	paid	\N	2025-03-03 15:50:20	2025-03-03 15:50:47	f	f
21	Huffman and Kidd Inc	Huffman and Kidd Inc	Aut eos mollitia ear	vojiqeqig@mailinator.com	+1 (892) 666-4131	5	Sed dolor et aperiam	company-logos/kztNHYyqSU7cCCYPiuaWj51xDCHDVYbwksuSmnbc.jpg	["M","M","L","M","S"]	\N	paid	\N	2025-03-03 16:07:17	2025-03-03 16:07:48	f	f
22	Knapp and Salazar Associates	Knapp and Salazar Associates	Alix	alexalix58@gmail.com	+1 (773) 728-4163	5	25 Chemin du Renard	company-logos/jRU9yT19uRtrUJqPZ4d5bihcIDBmRsmISSVd6nrM.jpg	["L","M","L","M","M"]	\N	paid	\N	2025-03-03 16:24:39	2025-03-03 16:25:07	f	f
23	Gonzalez and Ward Co	Gonzalez and Ward Co	Alix	alexalix58@gmail.com	+1 (634) 105-4735	5	25 Chemin du Renard	company-logos/Qs0c19fjS4N2Rj8aek05MgIH8xj8CIOnBqHvgJih.jpg	["S","M","L","M","L"]	\N	paid	\N	2025-03-03 16:26:59	2025-03-03 16:27:30	f	f
24	Shannon Mathews LLC	Shannon Mathews LLC	Debitis quis quaerat	laxehav@mailinator.com	+1 (166) 752-5873	5	Et corrupti volupta	company-logos/IjBOUFPVfHuLHeRIWvwJ7UHaSceWrbvtJQxdiWwX.jpg	["S","M","L","S","S"]	\N	paid	\N	2025-03-03 16:50:17	2025-03-03 16:50:44	f	f
25	Dunlap and Nichols Associates	Dunlap and Nichols Associates	Fuga Nam ea quas mi	zymil@mailinator.com	+1 (554) 209-6573	5	Consequat Sequi dol	company-logos/08YNJGsbx6ZJQ61crHw9ILdjyH7wlDyUEPajdKFP.jpg	["M","M","M","S","M"]	\N	pending	\N	2025-03-03 16:52:54	2025-03-03 16:52:54	f	f
26	Francis and Harrington Trading	Francis and Harrington Trading	Ut amet recusandae	alexalix58@gmail.com	+1 (825) 375-8411	5	Exercitation enim ne	company-logos/tIZBBj8WHosqAKV0X8VnLT6zNw6pyiMW1OjVlKXw.png	["M","M","S","L","S"]	\N	paid	\N	2025-03-03 16:53:15	2025-03-03 16:53:41	f	f
28	Wyatt and Wynn Trading	Wyatt and Wynn Trading	In voluptates incidi	rageloqi@mailinator.com	+1 (799) 989-7558	5	Enim aperiam soluta	company-logos/pDYHirpgX4SR6nNRpYxghhX5DwfeR5lqMA2r0L5h.jpg	["L","M","S","L","M"]	\N	pending	\N	2025-03-03 17:33:51	2025-03-03 17:33:51	f	f
29	Reed Velasquez Trading	Reed Velasquez Trading	Sunt qui incidunt	gopupobyno@mailinator.com	+1 (613) 921-9783	5	Aperiam commodi quia	company-logos/Bk0tWv88OSi0T284D2atOM2Cv4FqvFdmOkepAu6h.jpg	["S","L","S","L","L"]	\N	pending	\N	2025-03-03 17:34:29	2025-03-03 17:34:29	f	f
30	Bond Hahn LLC	Bond Hahn LLC	Ipsum a dolore deser	riqeni@mailinator.com	+1 (762) 214-4879	5	Blanditiis cumque an	company-logos/7gjPW62MHkxhAINLpqmaBNwFvlUZGD1E4Ve1N4U1.jpg	["S","L","S","M","M"]	\N	paid	\N	2025-03-03 17:34:59	2025-03-03 17:36:12	f	f
31	Contreras and Craft Associates	Contreras and Craft Associates	Non nisi dolorem sin	tizulicek@mailinator.com	+1 (624) 955-6127	5	Facere aliquip incid	company-logos/LAH8clTsGGRgtfYtHDOOAeH3YgYWrF63g6xlazDx.jpg	["M","L","L","L","S"]	\N	pending	\N	2025-03-03 18:13:01	2025-03-03 18:13:01	f	f
32	Garza and Pruitt Associates	Garza and Pruitt Associates	Minim iure ipsum no	hyfywyhu@mailinator.com	+1 (908) 939-9939	5	Voluptatem fuga Id	company-logos/CHqFzip1uEqQFTrzZ1tP84AH4FWUe6KSlccdRmXs.jpg	["M","M","L","S","S"]	\N	pending	\N	2025-03-03 18:15:50	2025-03-03 18:15:50	f	f
33	Murphy Long Inc	Murphy Long Inc	Consequatur est qui	gunedy@mailinator.com	+1 (794) 623-3269	5	Autem ut repudiandae	company-logos/G9u7VOn9J8ZKewcawFTTLYkSXZjB3SGgpXTQqBGG.jpg	["M","L","L","S","M"]	\N	pending	\N	2025-03-03 18:16:38	2025-03-03 18:16:38	f	f
27	Johns Sullivan Trading	Johns Sullivan Trading	Alix	alexalix58@gmail.com	+1 (802) 377-2593	5	25 Chemin du Renard	company-logos/1XDq0Q2QldsMdxvfvowce0Pu0BXK4Yb6RnTu5F4D.jpg	["M","L","L","M","M"]	\N	paid	\N	2025-03-03 17:31:28	2025-03-03 18:17:37	f	f
\.


--
-- TOC entry 4922 (class 0 OID 63108)
-- Dependencies: 218
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 4947 (class 0 OID 0)
-- Dependencies: 226
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 4948 (class 0 OID 0)
-- Dependencies: 223
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);


--
-- TOC entry 4949 (class 0 OID 0)
-- Dependencies: 215
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 8, true);


--
-- TOC entry 4950 (class 0 OID 0)
-- Dependencies: 230
-- Name: payments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.payments_id_seq', 34, true);


--
-- TOC entry 4951 (class 0 OID 0)
-- Dependencies: 228
-- Name: teams_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.teams_id_seq', 33, true);


--
-- TOC entry 4952 (class 0 OID 0)
-- Dependencies: 217
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 1, false);


--
-- TOC entry 4759 (class 2606 OID 63147)
-- Name: cache_locks cache_locks_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);


--
-- TOC entry 4757 (class 2606 OID 63140)
-- Name: cache cache_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);


--
-- TOC entry 4766 (class 2606 OID 63174)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 4768 (class 2606 OID 63176)
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- TOC entry 4764 (class 2606 OID 63164)
-- Name: job_batches job_batches_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);


--
-- TOC entry 4761 (class 2606 OID 63156)
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 4745 (class 2606 OID 63106)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 4751 (class 2606 OID 63124)
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- TOC entry 4772 (class 2606 OID 63196)
-- Name: payments payments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payments
    ADD CONSTRAINT payments_pkey PRIMARY KEY (id);


--
-- TOC entry 4774 (class 2606 OID 63206)
-- Name: payments payments_reference_number_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payments
    ADD CONSTRAINT payments_reference_number_unique UNIQUE (reference_number);


--
-- TOC entry 4754 (class 2606 OID 63131)
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- TOC entry 4770 (class 2606 OID 63186)
-- Name: teams teams_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.teams
    ADD CONSTRAINT teams_pkey PRIMARY KEY (id);


--
-- TOC entry 4747 (class 2606 OID 63117)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 4749 (class 2606 OID 63115)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 4762 (class 1259 OID 63157)
-- Name: jobs_queue_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);


--
-- TOC entry 4752 (class 1259 OID 63133)
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- TOC entry 4755 (class 1259 OID 63132)
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- TOC entry 4775 (class 2606 OID 63197)
-- Name: payments payments_team_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payments
    ADD CONSTRAINT payments_team_id_foreign FOREIGN KEY (team_id) REFERENCES public.teams(id) ON DELETE CASCADE;


-- Completed on 2025-03-04 16:38:06

--
-- PostgreSQL database dump complete
--

