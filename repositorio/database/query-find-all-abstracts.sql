SELECT id FROM eventosa_v1.participante;

SELECT * FROM eventosa_v1.trabalho;

--
-- RETORNA TODAS AS INFOS DOS RESUMOS
-- 
SELECT *
FROM participantextrabalho p,
     trabalho t,
     orientador o,
     curso c
WHERE p.id_participante IN
    (SELECT id
     FROM participante)
  AND t.id = p.id_trabalho
  AND o.id = t.id_orientador
  AND c.id = t.id_curso;



--
-- RESUMO INFO SEM ORIENTADOR
-- 

SELECT *
FROM participantextrabalho p,
     trabalho t,
     curso c
WHERE p.id_participante IN
    (SELECT id
     FROM participante)
  AND t.id = p.id_trabalho
  AND c.id = t.id_curso;
  


SELECT c.nome as nome_curso, p.nome as nome_participante, t.titulo
FROM participantextrabalho ppt,
     trabalho t,
     curso c,
     participante p
WHERE ppt.id_participante IN
    (SELECT id
     FROM participante)
  AND t.id = ppt.id_trabalho
  AND c.id = t.id_curso
  AND p.id = ppt.id_participante
  AND t.id_orientador is null;
  
--
-- RETORNA RESUMOS A PARTIR DE UM 
-- E-MAIL
-- 
SELECT t.id AS id,
       p.nome AS nome,
       p.email AS email,
       c.nome AS curso,
       t.titulo AS titulo,
       t.status_r AS status
FROM participante p,
     curso c,
     trabalho t,
     participantextrabalho pxt
WHERE p.email = 'aceiro@gmail.com'
  AND p.id_curso = c.id
  AND t.id = pxt.id_trabalho;



--
-- RETORNA PAGAMENTOS DE RESUMO
-- 
-- 	
SELECT p.nome,
       c.nome,
       i.data_pagamento,
       i.valor
FROM participante p,
     inscricao i,
     curso c
WHERE p.id = i.id_participante
  AND c.id = p.id_curso
  AND p.email = 'aceiro@gmail.com';
  


INSERT INTO inscricao (data_inscricao, pago, data_pagamento, valor, id_participante) VALUES 
(now(), true, now(), 20.00, 1);



SELECT   p.nome as nome,
                                               c.nome as curso_nome,
                                               i.data_pagamento,
                                               i.valor
                                        FROM participante p,
                                             inscricao i,
                                             curso c
                                        WHERE p.id = i.id_participante
                                          AND c.id = p.id_curso
                                          AND p.email = 'aceiro@gmail.com';
                                          
                                          
SELECT p.nome, cc.nome, i.data_pagamento, i.valor FROM participante p, inscricao i, curso cc WHERE p.id = i.id_participante AND cc.id = p.id_curso AND p.email = 'aceiro@gmail.com';                                         