CREATE TABLE chat_whatsapp (
                               id serial not null primary key,
                               id_operador integer not null,
                               id_usuario integer not null,
                               data_hora_inicio timestamp not null,
                               data_hora_final timestamp,
                               status integer not null,
                               chat text not null);

CREATE TABLE chat_web (
                          id serial not null primary key,
                          id_operador integer not null,
                          id_usuario integer not null,
                          data_hora_inicio timestamp not null,
                          data_hora_final timestamp,
                          status integer not null,
                          chat text not null);

CREATE TABLE ligacao (
                         id serial not null primary key,
                         id_operador integer not null,
                         id_usuario integer not null,
                         data_hora_inicio timestamp not null,
                         data_hora_final timestamp,
                         status integer not null,
                         telefone text not null,
                         arquivo_gravacao text);

CREATE TABLE operador (
                          id serial not null primary key,
                          nome text not null,
                          cpf text not null,
                          senha text not null);

CREATE TABLE usuario (
                         id serial not null primary key,
                         nome text not null,
                         telefone text not null,
                         cpf text not null);

ALTER TABLE chat_whatsapp ADD FOREIGN KEY (id_operador) REFERENCES operador (id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE chat_whatsapp ADD FOREIGN KEY (id_usuario) REFERENCES usuario (id) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE chat_web ADD FOREIGN KEY (id_operador) REFERENCES operador (id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE chat_web ADD FOREIGN KEY (id_usuario) REFERENCES usuario (id) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE ligacao ADD FOREIGN KEY (id_operador) REFERENCES operador (id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE ligacao ADD FOREIGN KEY (id_usuario) REFERENCES usuario (id) ON UPDATE CASCADE ON DELETE RESTRICT;

INSERT INTO operador (nome, cpf, senha) VALUES ('MARIA JOSÉ', '111.111.111-11', '123mudar');
INSERT INTO operador (nome, cpf, senha) VALUES ('JOSÉ', '222.222.222-22', '123mudar');
INSERT INTO operador (nome, cpf, senha) VALUES ('JOÃO DOS SANTOS', '333.333.333-33', '123mudar');

INSERT INTO usuario (nome, cpf, telefone) VALUES ('ADRIANA', '444.444.444-44', '(32)98877-5636');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('FERNANDA', '444.445.478-44', '(32)98177-5636');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('ADRIANO', '445.478.124-24', '(32)98277-5636');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('TIAGO', '424.444.444-44', '(32)98377-5636');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('ROBSON', '444.424.444-44', '(32)98477-5636');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('JULIANA', '444.444.424-44', '(32)98577-5636');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('JUNIOR', '444.444.444-24', '(32)98477-9036');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('GABRIELA', '444.444.444-34', '(32)95877-5636');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('MARCUS', '444.444.443-44', '(32)98877-5636');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('RENATA', '444.443.444-44', '(34)98877-5636');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('JORGE', '443.444.444-44', '(32)98877-5836');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('MARINA', '445.444.444-44', '(32)98877-5686');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('GABRIEL', '444.445.444-44', '(32)98877-5436');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('SONIA', '444.444.445-44', '(32)98877-5356');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('HEITOR', '444.444.444-45', '(32)98877-9086');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('LUIZ', '444.444.444-46', '(32)98877-8000');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('LUIZA', '444.444.446-44', '(32)98877-9000');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('LUCAS', '444.446.444-44', '(32)98877-1000');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('DIEGO', '446.444.444-44', '(32)98877-2000');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('CAROLINA', '447.444.444-44', '(32)98877-3010');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('FABIANA', '444.447.444-44', '(32)98877-3001');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('LÍGIA', '444.444.447-44', '(32)99875-3001');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('RAFAEL', '444.444.444-47', '(32)98807-3698');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('CARLOS', '444.444.444-48', '(32)98897-4000');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('LUANA', '444.444.448-44', '(32)98887-4001');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('NUBIA', '444.448.444-44', '(32)98867-4002');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('ISABELA', '448.444.444-44', '(32)98845-4003');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('GUSTAVO', '449.444.444-44', '(32)98890-5012');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('DAVI', '444.449.444-44', '(32)98889-6000');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('MARIANA', '444.444.449-44', '(32)98890-6023');
INSERT INTO usuario (nome, cpf, telefone) VALUES ('PATRÍCIA', '444.444.444-49', '(32)98880-7000');

-- FUNÇÃO PARA GERAR TEXTO ALEATÓRIO
CREATE OR REPLACE FUNCTION p_gera_texto_aleatorio() RETURNS TEXT AS
$BODY$
DECLARE
_TEXTO_1_ TEXT;
  _TEXTO_2_ TEXT;
BEGIN
SELECT INTO _TEXTO_1_,_TEXTO_2_ g%1
    ,(left(string_agg(chr(65 + (random() * 25)::int), ''), 10 + (random() * 7)::int)
    || ' ' ||
    left(string_agg(chr(65 + (random() * 25)::int), ''), 10 + (random() * 7)::int))
FROM   generate_series(1, 1000) g
GROUP  BY 1
ORDER  BY 1;

RETURN _TEXTO_2_;

END;
$BODY$
LANGUAGE 'plpgsql';

-- STATUS 1 => FINALIZADO
-- STATUS 2 => ABANDONADO
INSERT INTO chat_web (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (1, 1, '2021-02-15', '2021-02-15', 1, p_gera_texto_aleatorio());
INSERT INTO chat_web (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (1, 2, '2021-02-16', '2021-02-16', 1, p_gera_texto_aleatorio());
INSERT INTO chat_web (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (1, 3, '2021-02-17', '2021-02-17', 1, p_gera_texto_aleatorio());
INSERT INTO chat_web (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (2, 4, '2021-02-18', '2021-02-18', 1, p_gera_texto_aleatorio());
INSERT INTO chat_web (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (2, 5, '2021-02-19', '2021-02-19', 1, p_gera_texto_aleatorio());
INSERT INTO chat_web (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (2, 6, '2021-02-20', '2021-02-20', 1, p_gera_texto_aleatorio());
INSERT INTO chat_web (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (3, 7, '2021-02-21', NULL, 2, p_gera_texto_aleatorio());
INSERT INTO chat_web (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (3, 8, '2021-02-22', NULL, 2, p_gera_texto_aleatorio());
INSERT INTO chat_web (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (3, 9, '2021-02-23', NULL, 2, p_gera_texto_aleatorio());
INSERT INTO chat_web (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (3, 10, '2021-02-24', NULL, 2, p_gera_texto_aleatorio());

-- STATUS 1 => FINALIZADO
-- STATUS 2 => ABANDONADO
INSERT INTO chat_whatsapp (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (1, 11, '2021-02-25', '2021-02-25', 1, p_gera_texto_aleatorio());
INSERT INTO chat_whatsapp (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (1, 12, '2021-02-26', '2021-02-26', 1, p_gera_texto_aleatorio());
INSERT INTO chat_whatsapp (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (1, 13, '2021-02-27', '2021-02-27', 1, p_gera_texto_aleatorio());
INSERT INTO chat_whatsapp (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (2, 14, '2021-02-28', '2021-02-28', 1, p_gera_texto_aleatorio());
INSERT INTO chat_whatsapp (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (2, 15, '2021-03-01', '2021-03-01', 1, p_gera_texto_aleatorio());
INSERT INTO chat_whatsapp (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (2, 16, '2021-03-02', '2021-03-02', 1, p_gera_texto_aleatorio());
INSERT INTO chat_whatsapp (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (3, 17, '2021-03-03', '2021-03-03', 1, p_gera_texto_aleatorio());
INSERT INTO chat_whatsapp (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (3, 18, '2021-03-04', '2021-03-04', 1, p_gera_texto_aleatorio());
INSERT INTO chat_whatsapp (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (3, 19, '2021-03-05', NULL, 2, p_gera_texto_aleatorio());
INSERT INTO chat_whatsapp (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, chat) VALUES (3, 20, '2021-03-06', NULL, 2, p_gera_texto_aleatorio());

-- STATUS 1 => FINALIZADA
-- STATUS 2 => RECUSADA
-- STATUS 3 => NÃO ATENDIDA
INSERT INTO ligacao (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, telefone, arquivo_gravacao) VALUES (1, 21, '2021-03-07', '2021-03-07', 1, '(32)98844-0001', 'arquivo1.wav');
INSERT INTO ligacao (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, telefone, arquivo_gravacao) VALUES (1, 22, '2021-03-08', '2021-03-08', 1, '(32)98844-0002', 'arquivo2.wav');
INSERT INTO ligacao (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, telefone, arquivo_gravacao) VALUES (1, 23, '2021-03-09', '2021-03-09', 1, '(32)98844-0003', 'arquivo3.wav');
INSERT INTO ligacao (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, telefone, arquivo_gravacao) VALUES (1, 24, '2021-03-10', '2021-03-10', 2, '(32)98844-0004', 'arquivo4.wav');
INSERT INTO ligacao (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, telefone, arquivo_gravacao) VALUES (1, 25, '2021-03-11', '2021-03-11', 2, '(32)98844-0005', 'arquivo5.wav');
INSERT INTO ligacao (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, telefone, arquivo_gravacao) VALUES (1, 26, '2021-03-12', '2021-03-12', 2, '(32)98844-0006', 'arquivo6.wav');
INSERT INTO ligacao (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, telefone, arquivo_gravacao) VALUES (1, 27, '2021-03-13', '2021-03-13', 3, '(32)98844-0007', 'arquivo7.wav');
INSERT INTO ligacao (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, telefone, arquivo_gravacao) VALUES (1, 28, '2021-03-14', '2021-03-14', 3, '(32)98844-0008', 'arquivo8.wav');
INSERT INTO ligacao (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, telefone, arquivo_gravacao) VALUES (1, 29, '2021-03-15', '2021-03-15', 3, '(32)98844-0009', 'arquivo9.wav');
INSERT INTO ligacao (id_operador, id_usuario, data_hora_inicio, data_hora_final, status, telefone, arquivo_gravacao) VALUES (1, 30, '2021-03-16', '2021-03-16', 3, '(32)98844-0010', 'arquivo10.wav');
