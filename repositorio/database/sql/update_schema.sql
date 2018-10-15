-- Evento 2017
-- 1. criacao do novo evento
INSERT INTO `eventosa_v1_Final_20170317`.`evento` (`id_semestre`, `titulo_evento`, `data_inicio`, `data_fim`) VALUES ('2', 'Mostra de iniciação científica e conhecimento', '2017-12-04', '2017-12-06');

-- 2. alteracao da senha dos usuarios ja existentes

UPDATE participante
SET senha = MD5('')
WHERE id <> 0;


-- 3. retornar todos os usuarios e curso
SELECT p.nome,
       p.email,
       c.nome AS curso
FROM participante p,
     curso c
WHERE p.id_curso = c.id
ORDER BY nome;


-- 4 alteracao de professor/secretaria
UPDATE `eventosa_v1_Final_20170317`.`usuario` SET `senha`='professor#asser2017' WHERE `id`='4';
UPDATE `eventosa_v1_Final_20170317`.`usuario` SET `senha`='secretaria#asser2017' WHERE `id`='5';

