--
-- PostgreSQL database dump
--

\restrict qZCub7spFP1v77BqttrhxwOdxHdYXtAxdSw574SA7jkDx5eqMtA9wUj2568AbVw

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

ALTER SCHEMA public OWNER TO postgres;

SET default_tablespace = '';
SET default_table_access_method = heap;

--
-- Tabela paciente
--

CREATE TABLE public.paciente (
    "ID_Paciente" integer NOT NULL,
    "Nome" character varying,
    "CPF" character varying,
    "Telefone" character varying,
    "Data_Nascimento" date,
    "Status" character varying DEFAULT 'moderado'
);

ALTER TABLE public.paciente OWNER TO postgres;

--
-- Sequence do ID
--

CREATE SEQUENCE public.paciente_id_paciente_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.paciente_id_paciente_seq OWNER TO postgres;

ALTER SEQUENCE public.paciente_id_paciente_seq
    OWNED BY public.paciente."ID_Paciente";

ALTER TABLE ONLY public.paciente
    ALTER COLUMN "ID_Paciente"
    SET DEFAULT nextval('public.paciente_id_paciente_seq'::regclass);

--
-- Dados iniciais
--

INSERT INTO public.paciente
("ID_Paciente", "Nome", "CPF", "Telefone", "Data_Nascimento", "Status")
VALUES
(1, 'Arthur', '111.111.111-11', '99999-1111', '2005-01-10', 'moderado');

INSERT INTO public.paciente
("ID_Paciente", "Nome", "CPF", "Telefone", "Data_Nascimento", "Status")
VALUES
(2, 'Julia', '222.222.222-22', '99999-2222', '2004-05-20', 'moderado');

INSERT INTO public.paciente
("ID_Paciente", "Nome", "CPF", "Telefone", "Data_Nascimento", "Status")
VALUES
(3, 'Emanuel', '333.333.333-33', '99999-3333', '2006-08-15', 'moderado');

--
-- Atualiza a sequence
--

SELECT pg_catalog.setval(
    'public.paciente_id_paciente_seq',
    3,
    true
);

--
-- Chave primária
--

ALTER TABLE ONLY public.paciente
    ADD CONSTRAINT paciente_pkey PRIMARY KEY ("ID_Paciente");

--
-- Permissões
--

REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;

\unrestrict qZCub7spFP1v77BqttrhxwOdxHdYXtAxdSw574SA7jkDx5eqMtA9wUj2568AbVw