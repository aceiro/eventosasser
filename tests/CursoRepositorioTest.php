<?php


require '..\repositorio\models\Curso.php';
require '..\repositorio\facade\EventosAsserFacade.php';

// Exemplo de uso do back-end
// 1. Para criar um Tipo de Atividade no banco
echo "<h1> ** CRUD** </h1>";
echo "<h3> ** CREATE - INSERT ** </h3>";
$dto = new Curso(15, "EXEMPLO");

$repository = EventosAsserFacade::createCursoRepository();
$repository->save($dto);
echo "<hr/>";

// 2. Para recuperar um Tipo de Atividade no banco
echo "<h1> ** RETRIEVE - SELECT ** </h1>";
$curso = $repository->findOne(1);
var_dump($curso);
echo "<hr/>";

// 2. Para recuperar um Tipo de Atividade no banco
echo "<h1> ** RETRIEVE - SELECT ALL ** </h1>";
$curso = $repository->findAll();
foreach ($curso as $key=>$value) {
    echo "$value[nome]";
    echo "<br/>";
}

echo "<hr/>";


