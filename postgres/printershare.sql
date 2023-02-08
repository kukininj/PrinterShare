--
-- PostgreSQL database dump
--

-- Dumped from database version 15.1
-- Dumped by pg_dump version 15.1

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
-- Name: schema_name; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA schema_name;


ALTER SCHEMA schema_name OWNER TO postgres;

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
    "ID_offer" SERIAL NOT NULL,
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
-- Name: dedicated_areas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.dedicated_areas (
    "ID_dedicated_area" SERIAL NOT NULL,
    area_name character varying(255)
);


ALTER TABLE public.dedicated_areas OWNER TO postgres;

--
-- Name: merchant_details; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.merchant_details (
    "ID_merchant" SERIAL NOT NULL,
    "ID_dedicated_area" integer NOT NULL
);


ALTER TABLE public.merchant_details OWNER TO postgres;

--
-- Name: transactions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.transactions (
    "ID_transaction" SERIAL NOT NULL,
    "ID_user" integer NOT NULL,
    "ID_offer" integer NOT NULL,
    status public.transaction_status NOT NULL,
    notes character varying(1024)
);


ALTER TABLE public.transactions OWNER TO postgres;

--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    "ID_user" SERIAL PRIMARY KEY,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    "ID_merchant" integer,
    name character varying(100),
    surname character varying(100),
    profile_picture character varying(255)
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Data for Name: Offers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Offers" ("ID_offer", "ID_merchant", date_added, date_edit, hour_price, kg_price, printer_type, filament, diameter, file_formats) FROM stdin;
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
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users ("ID_user", email, password, "ID_merchant", name, surname, profile_picture) FROM stdin;
\.


--
-- Name: Offers Offers_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Offers"
    ADD CONSTRAINT "Offers_pk" PRIMARY KEY ("ID_offer");


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
-- Name: users users_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

-- ALTER TABLE ONLY public.users
--     ADD CONSTRAINT users_pk PRIMARY KEY ("ID_user");


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
-- Name: merchant_details merchant_details_dedicated_areas_ID_dedicated_area_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.merchant_details
    ADD CONSTRAINT "merchant_details_dedicated_areas_ID_dedicated_area_fk" FOREIGN KEY ("ID_dedicated_area") REFERENCES public.dedicated_areas("ID_dedicated_area");


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
-- PostgreSQL database dump complete
--

