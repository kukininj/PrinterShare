--
-- PostgreSQL database dump
--

-- Dumped from database version 14.6
-- Dumped by pg_dump version 14.6

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

--
-- Name: printer_type; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.printer_type AS ENUM (
    'FFF',
    'CFF',
    'SLA',
    'DLP'
);


ALTER TYPE public.printer_type OWNER TO postgres;

--
-- Name: transaction_status; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.transaction_status AS ENUM (
    'Oczekuje odpowiedź sprzedawcy',
    'Oczekuje odpowiedź klienta',
    'W trakcie wydruku',
    'Zakończone pomyślnie',
    'Odrzucone'
);


ALTER TYPE public.transaction_status OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: Offers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Offers" (
    "ID_offer" integer NOT NULL,
    "ID_merchant" integer NOT NULL,
    date_added date NOT NULL,
    date_edit date,
    hour_price numeric(10,2),
    kg_price numeric(10,2),
    printer_type integer NOT NULL,
    filament integer,
    diameter integer,
    file_formats integer[] NOT NULL
);


ALTER TABLE public."Offers" OWNER TO postgres;

--
-- Name: Offers_ID_offer_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Offers_ID_offer_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Offers_ID_offer_seq" OWNER TO postgres;

--
-- Name: Offers_ID_offer_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Offers_ID_offer_seq" OWNED BY public."Offers"."ID_offer";


--
-- Name: areas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.areas (
    "ID_area" integer NOT NULL,
    name character varying(255) NOT NULL
);


ALTER TABLE public.areas OWNER TO postgres;

--
-- Name: areas_ID_area_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."areas_ID_area_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."areas_ID_area_seq" OWNER TO postgres;

--
-- Name: areas_ID_area_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."areas_ID_area_seq" OWNED BY public.areas."ID_area";


--
-- Name: dedicated_areas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.dedicated_areas (
    "ID_dedicated_area" integer NOT NULL,
    area_name character varying(255)
);


ALTER TABLE public.dedicated_areas OWNER TO postgres;

--
-- Name: dedicated_areas_ID_dedicated_area_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."dedicated_areas_ID_dedicated_area_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."dedicated_areas_ID_dedicated_area_seq" OWNER TO postgres;

--
-- Name: dedicated_areas_ID_dedicated_area_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."dedicated_areas_ID_dedicated_area_seq" OWNED BY public.dedicated_areas."ID_dedicated_area";


--
-- Name: merchant_details; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.merchant_details (
    "ID_merchant" integer NOT NULL,
    "ID_dedicated_area" integer NOT NULL
);


ALTER TABLE public.merchant_details OWNER TO postgres;

--
-- Name: merchant_details_ID_merchant_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."merchant_details_ID_merchant_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."merchant_details_ID_merchant_seq" OWNER TO postgres;

--
-- Name: merchant_details_ID_merchant_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."merchant_details_ID_merchant_seq" OWNED BY public.merchant_details."ID_merchant";


--
-- Name: transactions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.transactions (
    "ID_transaction" integer NOT NULL,
    "ID_user" integer NOT NULL,
    "ID_offer" integer NOT NULL,
    status public.transaction_status NOT NULL,
    notes character varying(1024)
);


ALTER TABLE public.transactions OWNER TO postgres;

--
-- Name: transactions_ID_transaction_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."transactions_ID_transaction_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."transactions_ID_transaction_seq" OWNER TO postgres;

--
-- Name: transactions_ID_transaction_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."transactions_ID_transaction_seq" OWNED BY public.transactions."ID_transaction";


--
-- Name: user_details; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.user_details (
    "ID_user_details" integer NOT NULL,
    name character varying(100),
    surname character varying(100),
    profile_picture character varying(255)
);


ALTER TABLE public.user_details OWNER TO postgres;

--
-- Name: user_details_ID_user_details_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."user_details_ID_user_details_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."user_details_ID_user_details_seq" OWNER TO postgres;

--
-- Name: user_details_ID_user_details_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."user_details_ID_user_details_seq" OWNED BY public.user_details."ID_user_details";


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    "ID_user" integer NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    "ID_user_details" integer NOT NULL,
    "ID_merchant" integer
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_ID_user_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."users_ID_user_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."users_ID_user_seq" OWNER TO postgres;

--
-- Name: users_ID_user_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."users_ID_user_seq" OWNED BY public.users."ID_user";


--
-- Name: Offers ID_offer; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Offers" ALTER COLUMN "ID_offer" SET DEFAULT nextval('public."Offers_ID_offer_seq"'::regclass);


--
-- Name: areas ID_area; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.areas ALTER COLUMN "ID_area" SET DEFAULT nextval('public."areas_ID_area_seq"'::regclass);


--
-- Name: dedicated_areas ID_dedicated_area; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dedicated_areas ALTER COLUMN "ID_dedicated_area" SET DEFAULT nextval('public."dedicated_areas_ID_dedicated_area_seq"'::regclass);


--
-- Name: merchant_details ID_merchant; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.merchant_details ALTER COLUMN "ID_merchant" SET DEFAULT nextval('public."merchant_details_ID_merchant_seq"'::regclass);


--
-- Name: transactions ID_transaction; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transactions ALTER COLUMN "ID_transaction" SET DEFAULT nextval('public."transactions_ID_transaction_seq"'::regclass);


--
-- Name: user_details ID_user_details; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_details ALTER COLUMN "ID_user_details" SET DEFAULT nextval('public."user_details_ID_user_details_seq"'::regclass);


--
-- Name: users ID_user; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN "ID_user" SET DEFAULT nextval('public."users_ID_user_seq"'::regclass);


--
-- Data for Name: Offers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Offers" ("ID_offer", "ID_merchant", date_added, date_edit, hour_price, kg_price, printer_type, filament, diameter, file_formats) FROM stdin;
\.


--
-- Data for Name: areas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.areas ("ID_area", name) FROM stdin;
\.


--
-- Data for Name: dedicated_areas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.dedicated_areas ("ID_dedicated_area", area_name) FROM stdin;
\.


--
-- Data for Name: merchant_details; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.merchant_details ("ID_merchant", "ID_dedicated_area") FROM stdin;
\.


--
-- Data for Name: transactions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.transactions ("ID_transaction", "ID_user", "ID_offer", status, notes) FROM stdin;
\.


--
-- Data for Name: user_details; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.user_details ("ID_user_details", name, surname, profile_picture) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users ("ID_user", email, password, "ID_user_details", "ID_merchant") FROM stdin;
\.


--
-- Name: Offers_ID_offer_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Offers_ID_offer_seq"', 1, false);


--
-- Name: areas_ID_area_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."areas_ID_area_seq"', 1, false);


--
-- Name: dedicated_areas_ID_dedicated_area_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."dedicated_areas_ID_dedicated_area_seq"', 1, false);


--
-- Name: merchant_details_ID_merchant_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."merchant_details_ID_merchant_seq"', 1, false);


--
-- Name: transactions_ID_transaction_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."transactions_ID_transaction_seq"', 1, false);


--
-- Name: user_details_ID_user_details_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."user_details_ID_user_details_seq"', 1, false);


--
-- Name: users_ID_user_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."users_ID_user_seq"', 1, false);


--
-- Name: Offers Offers_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Offers"
    ADD CONSTRAINT "Offers_pk" PRIMARY KEY ("ID_offer");


--
-- Name: areas areas_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.areas
    ADD CONSTRAINT areas_pk PRIMARY KEY ("ID_area");


--
-- Name: dedicated_areas dedicated_areas_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.dedicated_areas
    ADD CONSTRAINT dedicated_areas_pk PRIMARY KEY ("ID_dedicated_area");


--
-- Name: merchant_details merchant_details_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.merchant_details
    ADD CONSTRAINT merchant_details_pk PRIMARY KEY ("ID_merchant");


--
-- Name: transactions transactions_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transactions
    ADD CONSTRAINT transactions_pk PRIMARY KEY ("ID_transaction");


--
-- Name: user_details user_details_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_details
    ADD CONSTRAINT user_details_pk PRIMARY KEY ("ID_user_details");


--
-- Name: users users_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pk PRIMARY KEY ("ID_user");


--
-- Name: users users_pk2; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pk2 UNIQUE ("ID_merchant");


--
-- Name: Offers Offers_users_ID_merchant_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Offers"
    ADD CONSTRAINT "Offers_users_ID_merchant_fk" FOREIGN KEY ("ID_merchant") REFERENCES public.users("ID_merchant");


--
-- Name: transactions transactions_Offers_ID_offer_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transactions
    ADD CONSTRAINT "transactions_Offers_ID_offer_fk" FOREIGN KEY ("ID_offer") REFERENCES public."Offers"("ID_offer");


--
-- Name: transactions transactions_users_ID_user_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transactions
    ADD CONSTRAINT "transactions_users_ID_user_fk" FOREIGN KEY ("ID_user") REFERENCES public.users("ID_user");


--
-- Name: users users_merchant_details_ID_merchant_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT "users_merchant_details_ID_merchant_fk" FOREIGN KEY ("ID_merchant") REFERENCES public.merchant_details("ID_merchant");


--
-- Name: users users_user_details_ID_user_details_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT "users_user_details_ID_user_details_fk" FOREIGN KEY ("ID_user_details") REFERENCES public.user_details("ID_user_details");


--
-- PostgreSQL database dump complete
--

