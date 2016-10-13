<?php


require '..\repositorio\models\TipoAtividade.php';
require '..\repositorio\facade\EventosAsserFacade.php';

// Exemplo de uso do back-end
// 1. Para criar um Tipo de Atividade no banco
echo "<h1> ** CRUD** </h1>";
echo "<h3> ** CREATE - INSERT ** </h3>";
$dto = new TipoAtividade(1, "Teste");

$repository = EventosAsserFacade::createTipoAtividadeRepository();
$repository->save($dto);
echo "<hr/>";

// 2. Para recuperar um Tipo de Atividade no banco
echo "<h1> ** RETRIEVE - SELECT ** </h1>";
$tipoAtividadeOne = $repository->findOne(1);
var_dump($tipoAtividadeOne);
echo "<hr/>";


// 3. Para atualizar um Tipo de Atividade no banco
echo "<h1> ** UPDATE  - OBJETO ANTES DA ALTERAÇÃO ** </h1>";
var_dump($tipoAtividadeOne);


$dto->descricao = "ENGENHARIA DE PRODUCAO";
$tipoAtividadeOne = $repository->update($dto);

echo "<h1> ** UPDATE  DEPOIS ** </h1>";
var_dump($tipoAtividadeOne);
echo "<hr/>";



// 4. Para remover um Tipo de Atividade no banco
echo "<h1> ** DELETE ** ";

$tipoAtividadeOne = $repository->remove($dto);

echo "<hr/>";