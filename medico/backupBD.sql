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

CREATE TABLE public.medico (
    id_medico integer NOT NULL,
    nome character varying,
    crm character varying,
    especialidade character varying
);

ALTER TABLE public.medico OWNER TO postgres;

CREATE SEQUENCE public.medico_id_medico_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE public.medico_id_medico_seq OWNER TO postgres;

ALTER SEQUENCE public.medico_id_medico_seq
    OWNED BY public.medico.id_medico;

ALTER TABLE ONLY public.medico
    ALTER COLUMN id_medico SET DEFAULT nextval('public.medico_id_medico_seq'::regclass);

INSERT INTO public.medico (id_medico, nome, crm, especialidade)
VALUES
    (1, 'Ana Carolina Mendes', 'CRM-MS 12345', 'Cardiologia'),
    (2, 'Bruno Henrique Alves', 'CRM-MS 23456', 'Ortopedia'),
    (3, 'Camila Ferreira Souza', 'CRM-MS 34567', 'Pediatria'),
    (4, 'Daniel Rodrigues Lima', 'CRM-MS 45678', 'Dermatologia'),
    (5, 'Eduardo Martins Costa', 'CRM-MS 56789', 'Neurologia');

SELECT pg_catalog.setval('public.medico_id_medico_seq', 5, true);

ALTER TABLE ONLY public.medico
    ADD CONSTRAINT medico_pkey PRIMARY KEY (id_medico);

REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;