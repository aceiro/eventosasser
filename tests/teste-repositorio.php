<?php


require '..\repositorio\models\TipoAtividade.php';
require '..\repositorio\facade\EventosAsserFacade.php';

// Exemplo de uso do back-end
// 1. Para criar um Tipo de Atividade no banco
echo "<h1> ** CRUD** ";
echo "<h1> ** CREATE - INSERT ** ";
$dto = new TipoAtividade(1, "Teste");

$tipoAtividadeRepository = EventosAsserFacade::createTipoAtividadeRepository();
$tipoAtividadeRepository->save($dto);


// 2. Para recuperar um Tipo de Atividade no banco
echo "<h1> ** RETRIEVE - SELECT ** ";
$tipoAtividadeOne = $tipoAtividadeRepository->findOne(1);
var_dump($tipoAtividadeOne);



// 3. Para atualizar um Tipo de Atividade no banco
echo "<h1> ** UPDATE  - OBJETIVO ANTES ** ";
var_dump($tipoAtividadeOne);


$dto->descricao = "ENGENHARIA DE PRODUCAO";
$tipoAtividadeOne = $tipoAtividadeRepository->update($dto);

echo "<h1> ** UPDATE  DEPOIS ** ";
var_dump($tipoAtividadeOne);



// 4. Para remover um Tipo de Atividade no banco
echo "<h1> ** DELETE ** ";

$tipoAtividadeOne = $tipoAtividadeRepository->remove($dto);

