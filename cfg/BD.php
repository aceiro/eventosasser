<?php 	
	require_once("Session.php");
	header("Content-Type: text/html; charset=UTF-8", true);
	
	class BD{
		//listar trabalhos do evento
		
		public function listar(){
			try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT DISTINCT r.titulo, p.nome, r.status FROM resumos r, participantes p WHERE r.titulo <> \"\" AND  r.titulo IS NOT NULL AND
                                                                 r.id_curso  <> \"\" AND  r.id_curso IS NOT NULL AND
                                                                 r.id = p.id_trabalho
                                                           ORDER BY curso";
				return $pdo->query($sql);
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
        //listar atividades para seleção do aluno
        public function listarAtividade($id_evento,$id_tipo,$id_curso){
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM tipo_atividade WHERE id_evento = {$id_evento} AND id_tipo={$id_tipo} AND id_curso={$id_curso}";
                return $pdo->query($sql);

            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }
		//listar palestras em que o aluno se cadastrou
		public function listaPalestrasRa(){
			$session = new Session("EventosAsser2016");
			try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				$sql = "SELECT * FROM palestrass WHERE ra like '%" . $session->get('ra') . "%' AND ano like '%2016%' AND semestre like '%1sem%'";
				return $pdo->query($sql);
			
			}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
			}			
		}
		//insere aluno em uma palestra, primeiro verifica se já cadastrado em uma palestra, caso não insere novo
		public function cadastrarAlunoPalestra(){
            $session = new Session("EventosAsser2016");
			try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				$sql = "INSERT INTO palestrass (ra,nome,palestra,pago,presenca,ano,semestre) VALUES ('{$session->get('ra')}','{$session->get('nome')}','{$session->get('palestra')}','0',0,'2016','1sem')";
				$pdo->query($sql);
				
				$sql = "SELECT * FROM palestrass WHERE ra like '%{$session->get('ra')}%'";
				return $pdo->query($sql);				
			
			}catch(PDOException $e){
					echo "ERROR" . $e->getMessage();
			}
		}
		//seleciona resumo para reenvio
		public function selecionaResumo(){
			$session = new Session("EventosAsser2016");
			try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$sql = "SELECT comentarios, titulo, curso, orientador, autores, resumo, keyword, password FROM eventos WHERE email like '%{$session->get('email')}%' AND ano like '2016' AND semestre like '1sem'";
				return $pdo->query($sql); 
				
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
				//seleciona resumo para reenvio
		public function selecionaUmResumo(){
			$session = new Session("EventosAsser2016");
			try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$sql = "SELECT nome, comentarios, titulo, curso, orientador, autores, resumo, keyword FROM eventos WHERE email like '%{$session->get('email')}%' AND ano like '2016' AND semestre like '1sem'";
				foreach($pdo->query($sql) as $row){
					$session->set('comentarios',$row['comentarios']);
					$session->set('nome',$row['nome']);
					$session->set('titulo',$row['titulo']);
					$session->set('curso',$row['curso']);
					$session->set('orientador',$row['orientador']);
					$session->set('autores',$row['autores']);
					$session->set('resumo',$row['resumo']);
					$session->set('keyword',$row['keyword']);
				}
				
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
		//reenvio do resumo
		public function reenviar(){
			$session = new Session("EventosAsser2016");
			try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
				$sql = "UPDATE eventos SET titulo = '{$session->get('titulo')}', nome='{$session->get('nome')}', 
							curso='{$session->get('curso')}', orientador='{$session->get('orientador')}', 
							autores='{$session->get('autores')}', resumo='{$session->get('resumo')}', 
							keyword = '{$session->get('keyword')}', status = 0,	comentarios = 'Professor avaliador, por favor 
							anote as alterações para o autor aqui.' WHERE email like '%{$session->get('email')}%' 
							AND semestre like '%1sem%' AND ano like '%2016%'";
				$pdo->query($sql);

				//header("Location:final.php");

			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}

        //seleciona cursos
		public function selecionarCursos(){
			$session = new Session("EventosAsser2016");
			try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
				$sql = "SELECT DISTINCT  * FROM eventos WHERE curso like '%{$session->get('curso')}%' AND
															 status like '%1%' AND
															 ano like '%2016%' AND
															 semestre like '%1sem%'
													   ORDER BY tipo";
				return $pdo->query($sql);
				
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}
		
		public function geraRa(){
			$session = new Session("EventosAsser2016");
			try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
				$sql = "SELECT COUNT(*) FROM palestrass WHERE ra like '%{$session->get('ra')}%'";
				return $pdo->query($sql);
				
			}catch(PDOException $e){
				echo "ERROR" . $e->getMessage();
			}
		}

        //grava resumo
        public function gravaResumo(){
            $session = new Session("EventosAsser2016");

            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->prepare('INSERT INTO eventos (nome,email,password,tipo,titulo,curso,orientador,autores,resumo,keyword,status,comentarios,ano,semestre)
										VALUES (:nome,:email,:password,:tipo,:titulo,:curso,:orientador,:autores,:resumo,:keyword,:status,:comentarios,"2016","1sem")');
                $stmt->execute(array(
                    ':nome' => $session->get("autor"),
                    ':email' => $session->get("login"),
                    ':password' => $session->get("password"),
                    ':tipo' => $session->get("tipo"),
                    ':titulo' => $session->get("titulo"),
                    ':curso' => $session->get("curso"),
                    ':orientador' => $session->get("orientador"),
                    ':autores' => $session->get("autores"),
                    ':resumo' => $session->get("resumo"),
                    ':keyword' => $session->get("keyword"),
                    ':status' => $session->get("status"),
                    ':comentarios' => $session->get("comentarios")
                ));
                //insere autor1 no pagamento
                $stmt = $pdo->prepare('INSERT INTO pagamentos (titulo,autor,tipo,pago,email,ano,semestre) VALUES (:titulo,:autor,:tipo,:pago,:email,"2016","1sem")');
                $stmt->execute(array(
                    'titulo' => $session->get("titulo"),
                    'autor' => $session->get("autor1"),
                    'tipo' => $session->get("tipo"),
                    'pago' => 0,
                    ':email' => $session->get("email1")
                ));
                //insere autor2 no pagamento
                if(strcmp($session->get("autor2"),"")!=0){
                    $stmt = $pdo->prepare('INSERT INTO pagamentos (titulo,autor,tipo,pago,email,ano,semestre) VALUES (:titulo,:autor,:tipo,:pago,:email,"2016","1sem")');
                    $stmt->execute(array(
                        'titulo' => $session->get("titulo"),
                        'autor' => $session->get("autor2"),
                        'tipo' => $session->get("tipo"),
                        'pago' => 0,
                        ':email' => $session->get("email2")
                    ));
                }
                //insere autor3 no pagamento
                if(strcmp($session->get("autor3"),"")!=0){
                    $stmt = $pdo->prepare('INSERT INTO pagamentos (titulo,autor,tipo,pago,email,ano,semestre) VALUES (:titulo,:autor,:tipo,:pago,:email,"2016","1sem")');
                    $stmt->execute(array(
                        'titulo' => $session->get("titulo"),
                        'autor' => $session->get("autor3"),
                        'tipo' => $session->get("tipo"),
                        'pago' => 0,
                        ':email' => $session->get("email3")
                    ));
                }
                //insere autor4 no pagamento
                if(strcmp($session->get("autor4"),"")!=0){
                    $stmt = $pdo->prepare('INSERT INTO pagamentos (titulo,autor,tipo,pago,email,ano,semestre) VALUES (:titulo,:autor,:tipo,:pago,:email,"2016","1sem")');
                    $stmt->execute(array(
                        'titulo' => $session->get("titulo"),
                        'autor' => $session->get("autor4"),
                        'tipo' => $session->get("tipo"),
                        'pago' => 0,
                        ':email' => $session->get("email4")
                    ));
                }
                //insere autor5 no pagamento
                if(strcmp($session->get("autor5"),"")!=0){
                    $stmt = $pdo->prepare('INSERT INTO pagamentos (titulo,autor,tipo,pago,email,ano,semestre) VALUES (:titulo,:autor,:tipo,:pago,:email,"2016","1sem")');
                    $stmt->execute(array(
                        'titulo' => $session->get("titulo"),
                        'autor' => $session->get("autor5"),
                        'tipo' => $session->get("tipo"),
                        'pago' => 0,
                        ':email' => $session->get("email5")
                    ));
                }
                //adicionar aqui inserção de vetor com mais autores??
                if(strcmp($session->get("autorplus"),"")!=0){
                    $cont = 0;
                    $autorplus = $session->get("autorplus");
                    $emailplus = $session->get("emailplus");
                    foreach($autorplus as $nome){
                        $stmt = $pdo->prepare('INSERT INTO pagamentos (titulo,autor,tipo,pago,email,ano,semestre) VALUES (:titulo,:autor,:tipo,:pago,:email,"2016","1sem")');
                        $stmt->execute(array(
                            'titulo' => $session->get("titulo"),
                            'autor' => $nome,
                            'tipo' => $session->get("tipo"),
                            'pago' => 0,
                            ':email' => $emailplus[$cont]
                        ));
                        $cont++;
                    }
                }
            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }

        //verificação de usuário
        public function check(){
            $session = new Session("EventosAsser2016");
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT COUNT(*) FROM adm where nome like '%{$session->get('login')}%'";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $num = $stmt->fetchColumn();

                if($num == 0){
                    header("Location: ./");
                }

                $sql = "SELECT nome, senha FROM adm where nome like '%{$session->get('login')}%'";

                foreach($pdo->query($sql) as $row){

                    if(strcmp($row['senha'],$session->get('password'))==0){
                        if(strcmp($session->get('login'),"secretaria")==0){
                            header("Location: secretariado");
                        }
                        if(strcmp($session->get('login'),"professor")==0){
                            header("Location: professor");
                        }
                        if(strcmp($session->get('login'),"administrador")==0){
                            header("Location: administrativo");
                        }
                    }else{
                        header("Location: ./");
                    }

                }
            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }

        //Resumos pagos
        public function resumosPagos(){
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM pagamentos WHERE ano like '%2016%' AND semestre like '%1sem%' AND pago like '%1%' ORDER BY autor";
                return $pdo->query($sql);

            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }

        //Retorna tipo
        public function retornaTipo(){
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM tipo";
                return $pdo->query($sql);

            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }

        //Retorna Curso
        public function retornaCurso(){
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventovr2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM curso;";
                return $pdo->query($sql);

            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }

        //Ouvintes pagantes
        public function ouvintesPagos(){
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT nome, id, ra FROM palestrass WHERE ano like '%2016%' AND semestre like '%1sem%' AND pago like '%1%' group BY  nome";
                return $pdo->query($sql);

            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }

        //insere palestra no banco de dados
        public function gravaAtividade($titulo,$autor,$dia,$dataev,$horario,$id_tipo,$id_evento,$id_curso){
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "INSERT INTO atividade (titulo,autor,dia,dataev,horario,id_tipo,id_evento,id_curso) values ('" . $titulo . "','" . $autor . "','" . $dia . "','" . $dataev . "','" . $horario . "','" . $id_tipo . "','" . $id_evento . "','" . $id_curso . "')";
                $pdo->query($sql);

                header("Location: listar.php");

            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }

        //listar todas as palestras do ano por semestre
        public function listarAtividadeCad(){
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM atividade WHERE id_evento = 1 ORDER BY dataev";
                return $pdo->query($sql);

            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }

        //seleciona todas as atividades
        public function selecionaAtividades(){
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM atividade WHERE id_evento = 1";
                return $pdo->query($sql);

            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }

        //seleciona alunos cadastrados nas palestras
        public function selecionaAlunos($id_atividade){
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT DISTINCT a.nome FROM aluno a, atividade ativ, inscricao i  WHERE i.id_atividade = ativ.id AND i.id_aluno = a.id order by nome";
                return $pdo->query($sql);

            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }

        //seleciona todos os resumos
        public function selecionaResumos(){
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = 'SELECT * FROM eventos order by curso';
                return $pdo->query($sql);

            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
		}

		//remoção de resumo conforme pedido do aluno
		public function removeResumo($id){
			try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "DELETE FROM eventos WHERE id='$id'";
                $pdo->query($sql);

            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
		}
        //devolve lista
        public function devolveLista(){
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = 'SELECT DISTINCT  * FROM eventos WHERE titulo <> \'\' AND  titulo IS NOT NULL AND
                                                                 nome   <> \'\' AND  nome IS NOT NULL AND
                                                                 curso  <> \'\' AND  curso IS NOT NULL AND
																 ano like "%2016%" AND
																 semestre like "%1sem%"
                                                           ORDER BY curso';
                return $pdo->query($sql);
            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }
        //devolve uma seleção
        public function devolveUm($id){
            $session = new Session('EventosAsser2016');
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM eventos WHERE id='{$session->get('id')}'";
                return $pdo->query($sql);
            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }
        //altera status
        public function gravaAlteracao($status,$comentarios,$id){
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = 'UPDATE eventos SET status="' . $status . '", comentarios="' . $comentarios . '" WHERE id = ' . $id . ';';
                $pdo->query($sql);

                header("Location: final.html");

            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }
        //valida usuário
        public function checkUsuario($login){
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT COUNT(*) FROM adm where nome like '%{$login}%'";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $num = $stmt->fetchColumn();

                if($num == 0){
                    header("Location: ../");
                }
            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }

        //seleciona todos os registros
        public function selecionaTudo(){
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = 'SELECT titulo, codigo, autor, tipo, pago FROM pagamentos WHERE ano like "%2016%" AND semestre like "%1sem%" order by autor';
                return $pdo->query($sql);

            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }
        //seleciona uma inscrição pelo código
        public function retornaUmaInsc($codigo){
            $session = new Session("EventosAsser2016");
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM pagamentos WHERE codigo='$codigo'";
                foreach($pdo->query($sql) as $row){
                    $session->set('autor',$row['autor']);
                    $session->set('titulo',$row['titulo']);
                    $session->set('tipo',$row['tipo']);
                }
            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }
        //atualiza dados da inscrição
        public function atualizaInsc(){
            $session = new Session("EventosAsser2016");
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $titulo = $session->get('titulo');

                $sql = "UPDATE pagamentos SET pago='1' WHERE titulo like '%{$titulo}%' AND ano like '%2016%' AND semestre like '%1sem%'";

                $pdo->query($sql);

            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }

        //seleciona todos
        public function listar2(){
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM palestrass WHERE semestre like '%1sem%' order by nome";
                return $pdo->query($sql);

            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }
        //seleciona pelo ra
        public function selecionaRa(){
            $session = new Session("EventosAsser2016");
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM palestrass WHERE semestre like '%1sem%' AND ra like '%{$session->get('ra')}%' AND ano like '%2016%'";
                foreach($pdo->query($sql) as $row){
                    $session->set('nome',$row['nome']);
                    $session->set('ra',$row['ra']);
                }
            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }
        //grava pagamento
        public function gravaPagamento($ra,$pago){
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "UPDATE palestrass SET pago='1' WHERE ra like '%{$ra}%'";
                $pdo->query($sql);

            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }
        //Cadastra Aluno
        public function cadastraAluno(){
            $session = new Session("EventosAsser2016");
            try{
                $pdo = new PDO('mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "INSERT INTO aluno (nome, email, senha, id_curso) values ('{$session->get('nome')}','{$session->get('email')}','{$session->get('senha')}',{$session->get('curso')})";
                $pdo->query($sql);

            }catch(PDOException $e){
                echo "ERROR" . $e->getMessage();
            }
        }
    }