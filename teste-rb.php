<?php
    require 'RedBeanPHP4_3_2/rb.php';
    R::setup( 'mysql:host=localhost;dbname=eventosasser_v2', 'root', '123456' );

    echo "<br/>";
    echo "tipo_atividade";
    echo "<br/>";
    $data_tipo_atividade = R::getAll("SELECT * FROM tipo_atividade");
    print_r($data_tipo_atividade);
    echo "<br/>";

    echo "<br/>";
    echo "curso";
    echo "<br/>";
    $data_curso = R::getAll("SELECT * FROM curso");
    print_r($data_curso);
    echo "<br/>";


    echo "<br/>";
    echo "semestre";
    echo "<br/>";

    /*

    $semestre = R::dispense('semestre');
    $semestre->descricao = 'Segundo semestre';
    $id = R::store( $semestre );
    R::commit();

    */

    $data = R::getAll("SELECT * FROM semestre");
    print_r($data);
    echo "<br/>";

    echo "<br/>";
    echo "participante";
    echo "<br/>";



    $participante = R::dispense('participante');
    $participante->nome  = "Erik A. Antonio";
    $participante->email = "teste@teste.com.br";
    $participante->senha = sha1("123mudar");
    $curso = R::findOne( 'curso', 'id=?', [ '2' ] );
    $participante->id_curso = $curso->id;
    $id = R::store( $participante );
    R::commit();



    $data = R::getAll("SELECT * FROM participante");
    print_r($data);
    echo "<br/>";


