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
                                      AND t.id = pxt.id_trabalho



       
