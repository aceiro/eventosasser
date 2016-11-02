<?php
//Uma tabela para registrar o pedido de nova senha
/*
CREATE TABLE `alterarsenha`(
	`id` int NOT NULL AUTO_INCREMENT,
    `nome` varchar(500) NOT NULL,
    `email` varchar(500) NOT NULL,
    `senha` varchar(500) NOT NULL,
    `dia` date not null,
    `hora` time,
    PRIMARY KEY (`id`)
)ENGINE=InnoDB;
*/

	$username = 'root';
	$password = '';

	try{
			$conn = new PDO("mysql:host=localhost;eventosa_v1", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$ps = $conn->prepare("SELECT * FROM participante WHERE email = :email");
			$ps->execute(array(
				'email'		=>	addslashes($_POST['email']),
			));

			if ( $ps->rowCount() == 1){
				foreach( $ps as $row){
					$nome = $row['nome'];
					$senha = $row['senha'];
				}

				$dia = date("m.d.y");
				$hora = date("h:i:s");
				$email = addslashes($_POST['email']);

				$ps = $conn->prepare("insert into alterarsenha (nome, email, senha, dia, hora)
												values (:nome, :email, :senha, :dia, :hora);");

				$ps->execute(array(
					'nome'				=>	$nome,
					'email'				=>	$email,
					'senha' 	=>	$senha,
					'dia'			=>	$dia,
					'hora'			=>	$hora
				));

				$link = "<a href='http://eventosasser.com.br/recuperasenha/recupera.php?utilizador=$email'>Recuperar Senha</a>";

				if( mail($email, 'Sistema de eventos: Recuperação de senha', 'Olá '.$nome.', visite este link '.$link) ){
					echo '<p>Foi enviado um e-mail para o seu endereço, onde poderá encontrar um link único para alterar a sua senha</p>';
				} else {
					echo '<p>Houve um erro ao enviar o email (o servidor suporta a função mail?)</p>';
				}

		}else{
			echo 'email não cadastrado no sistema';
		}
	}
	catch(PDOException $e){
		echo '<center>Erro ao conectar com o banco: ' . $e->getMessage();
	}
?>