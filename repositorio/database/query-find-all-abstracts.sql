SELECT * FROM eventosasser_v2.participante;

SELECT * FROM eventosasser_v2.trabalho;


SELECT * FROM eventosasser_v2.participantextrabalho;


SELECT   t.id as id,
                                           p.nome as nome,
                                           p.email as email,
                                           c.nome as curso,
                                           t.titulo as titulo,
                                           t.status_r as status
                                    FROM participante p,
                                         curso c,
                                         trabalho t,
                                         participantextrabalho pxt
                                    WHERE p.email = 'aceiro@gmail.com'
                                      AND p.id_curso = c.id
                                      AND t.id = pxt.id_trabalho;



	
SELECT p.nome, c.nome, i.data_pagamento, i.valor 
FROM participante p, inscricao i, curso c
WHERE p.id = i.id_participante and c.id = p.id_curso AND p.email = 'aceiro@gmail.com';


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