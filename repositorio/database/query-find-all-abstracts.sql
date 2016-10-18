SELECT * FROM eventosasser_v2.participante;

SELECT * FROM eventosasser_v2.trabalho;


SELECT * FROM eventosasser_v2.participantextrabalho;


SELECT p.nome, p.email, c.nome, t.titulo, t.status_r 
		FROM participante p, 
			 curso c, 
			 trabalho t, 
			 participantextrabalho pxt 
		WHERE 
			 p.email = 'aceiro@gmail.com' AND 
             p.id_curso = c.id AND
             t.id = pxt.id_trabalho AND
             p.id = pxt.id_participante
       
