<?php
require_once("../constants/asser_eventos_constants.php");
require_once("../cfg/Session.php");
require_once '../repositorio/facade/EventosAsserFacade.php';


$session = new Session(SESSION_SERVER_ID);

$atividadesRepository   = EventosAsserFacade::createAtividadesRepository();
$participanteRepository = EventosAsserFacade::createParticipanteRepository();

$participante = $participanteRepository->findParticipanteByEmail($session->get(SESSION_KEY_EMAIL));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="cache-control" content="no-store"/>
    <link rel="shortcut icon" href="favicon.ico">

    <title>Asser Eventos</title>

    <link rel="stylesheet" href="../html/scripts/chosen_v1.8.2/docsupport/style.css">
    <link rel="stylesheet" href="../html/scripts/chosen_v1.8.2/docsupport/prism.css">
    <link rel="stylesheet" href="../html/scripts/chosen_v1.8.2/chosen.css">
    <link rel="stylesheet" href="../html/css/menu-styles.css" type="text/css">
    <link rel="stylesheet" href="../html/css/estilo.css" type="text/css">

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="../html/scripts/asser-main-menu.js"></script>
    <script src="../html/scripts/notify.min.js"></script>

    <script type="application/javascript">

        $(function() {
            $('#cad-btn').click(function() {
                alert("Lista de atividades atualizada com sucesso!")
                document.getElementById("multi-select-form").submit();
            });

        });


    </script>
</head>
<body>

<div id="corpo">

    <div id="cabecalho">
    </div>

    <br/>

    <div id='cssmenu'>
        <ul>
            <li class='active'><a href='#'>Inscrição no evento</a></li>
            <li><a target="_blank" href='Programacao-Geral-2017.pdf' >Programação 2017</a></li>
        </ul>
    </div>

    <div id="mmenu" style="height:3px;"> &nbsp;</div>
    <div id="mmenubar" style="height:3px;"> &nbsp;</div>
    <div id="mmenusubbar" style="height:2px;"> &nbsp;</div>
    <div id="mmenusubsubbar" style="height:2px;"> &nbsp;</div>

    <br/>

    <span id="small-button-class" class="small-button-back-class" onclick="javascript:location.href='../resumo/perfil.php'"> voltar </span>

    <form id="multi-select-form" method="post" action="confirma_atividades_controller.php">
        <div id="container">
            <div id="content">
                <div>



                    <h2>Atividades disponíveis na mostra</h2>
                    <select name="cursos[]" data-placeholder="Selecione as suas atividades" class="chosen-select" multiple tabindex="6">
                        <option value=""></option>
                        <optgroup label="Nutrição">
                            <option value="1" <?php echo ($atividadesRepository->checkSelectedOption(1, $participante->id)? "selected": "") ?>>04/12 - Exposição: Patologias e a Nutrição (4º período)</option>
                            <option value="2" <?php echo ($atividadesRepository->checkSelectedOption(2, $participante->id)? "selected": "") ?>>04/12 - Apresentação de Trabalhos de Estágios Supervisionados</option>
                            <option value="3" <?php echo ($atividadesRepository->checkSelectedOption(3, $participante->id)? "selected": "") ?>>04/12 - Apresentação de Trabalho da disciplina de UAN</option>
                            <option value="4" <?php echo ($atividadesRepository->checkSelectedOption(4, $participante->id)? "selected": "") ?>>04/12 - Palestra: Alimentação Equilibrada: uma visão pela MTC (Medicina Tradicional Chinesa)</option>
                            <option value="5" <?php echo ($atividadesRepository->checkSelectedOption(5, $participante->id)? "selected": "") ?>>05/12 - Exposição: Corpo Humano</option>
                            <option value="6" <?php echo ($atividadesRepository->checkSelectedOption(6, $participante->id)? "selected": "") ?>>05/12 - Comunicação Oral - Bancas de TCC</option>
                            <option value="7" <?php echo ($atividadesRepository->checkSelectedOption(7, $participante->id)? "selected": "") ?>>05/12 - Exposição: Grupos Alimentares</option>
                            <option value="8" <?php echo ($atividadesRepository->checkSelectedOption(8, $participante->id)? "selected": "") ?>>05/12 - Exposição: Adoçantes  (4º Período)</option>
                            <option value="9" <?php echo ($atividadesRepository->checkSelectedOption(9, $participante->id)? "selected": "") ?>>06/12 - Exposição: Corpo Humano</option>
                            <option value="10" <?php echo ($atividadesRepository->checkSelectedOption(10, $participante->id)? "selected": "") ?>>06/12 - Exposição: Gastronomia Regional (6º Período)</option>
                        </optgroup>
                        <optgroup label="Engenharia Civil">
                            <option value="11" <?php echo ($atividadesRepository->checkSelectedOption(11, $participante->id)? "selected": "") ?>>05/12 - Exposição de Painel. Disciplina de Metodologia (8º período)</option>
                            <option value="12" <?php echo ($atividadesRepository->checkSelectedOption(12, $participante->id)? "selected": "") ?>>06/12 - Apresentação e testes de resistência, Pontes com estrutura de macarrão</option>
                        </optgroup>
                        <optgroup label="Farmácia">
                            <option value="13" <?php echo ($atividadesRepository->checkSelectedOption(13, $participante->id)? "selected": "") ?>>04/12 - Exposição: Patologias e a Farmácia (4º período)</option>
                            <option value="14" <?php echo ($atividadesRepository->checkSelectedOption(14, $participante->id)? "selected": "") ?>>04/12 - Exposição de Painel</option>
                            <option value="16" <?php echo ($atividadesRepository->checkSelectedOption(16, $participante->id)? "selected": "") ?>>05/12 - Oficina: Protocolos diferenciados voltados à hidratação facial </option>
                            <option value="17" <?php echo ($atividadesRepository->checkSelectedOption(17, $participante->id)? "selected": "") ?>>05/12 - Exposiçâo: O funcionamento do Corpo Humano (Nutrição, Fisioterapia, Farmácia e Educação Fisica) </option>
                            <option value="18" <?php echo ($atividadesRepository->checkSelectedOption(18, $participante->id)? "selected": "") ?>>06/12 - Apresentação trabalhos Farmacologia: medicamentos  </option>
                            <option value="19" <?php echo ($atividadesRepository->checkSelectedOption(19, $participante->id)? "selected": "") ?>>06/12 - Exposiçâo: O funcionamento do Corpo Humano (Nutrição, Fisioterapia, Farmácia e Educação Fisica) </option>
                            <option value="15" <?php echo ($atividadesRepository->checkSelectedOption(15, $participante->id)? "selected": "") ?>>06/12 - Palestra: Introdução à Homeopatia</option>
                        </optgroup>
                        <optgroup label="Fisioterapia">
                            <option value="20" <?php echo ($atividadesRepository->checkSelectedOption(20, $participante->id)? "selected": "") ?>>04/12 - Exposição de Painel</option>
                            <option value="21" <?php echo ($atividadesRepository->checkSelectedOption(21, $participante->id)? "selected": "") ?>>04/12 - Apresentação de TCC – Comunicação Oral</option>
                            <option value="22" <?php echo ($atividadesRepository->checkSelectedOption(22, $participante->id)? "selected": "") ?>>04/12 - Workshop: Postura Corporal Adequada - Aprenda as posturas adequadas para as atividades do dia a dia</option>
                            <option value="24" <?php echo ($atividadesRepository->checkSelectedOption(24, $participante->id)? "selected": "") ?>>05/12 - Apresentação de TCC – Comunicação Oral</option>
                            <option value="25" <?php echo ($atividadesRepository->checkSelectedOption(25, $participante->id)? "selected": "") ?>>05/12 - Exposição: Patologias e a Fisioterapia </option>
                            <option value="26" <?php echo ($atividadesRepository->checkSelectedOption(26, $participante->id)? "selected": "") ?>>05/12 - Mesa Redonda: Intervenção Fisioterapêutica no pós operatório de cirurgias ortopédicas (6º período Fisioterapia)</option>
                            <option value="27" <?php echo ($atividadesRepository->checkSelectedOption(27, $participante->id)? "selected": "") ?>>06/12 - Workshop: Massagem Desportiva</option>
                            <option value="28" <?php echo ($atividadesRepository->checkSelectedOption(28, $participante->id)? "selected": "") ?>>06/12 - Apresentação de TCC – Comunicação Oral</option>
                        </optgroup>
                        <optgroup label="Pedagogia">
                            <option value="29" <?php echo ($atividadesRepository->checkSelectedOption(29, $participante->id)? "selected": "") ?>>04/12 - Apresentação de TCC – Comunicação Oral</option>
                            <option value="23" <?php echo ($atividadesRepository->checkSelectedOption(23, $participante->id)? "selected": "") ?>>04/12 - Oficina de Origami</option>
                            <option value="30" <?php echo ($atividadesRepository->checkSelectedOption(30, $participante->id)? "selected": "") ?>>05/12 - Exposição de Painel</option>
                            <option value="31" <?php echo ($atividadesRepository->checkSelectedOption(31, $participante->id)? "selected": "") ?>>05/12 - Apresentação de TCC – Comunicação Oral</option>
                            <option value="32" <?php echo ($atividadesRepository->checkSelectedOption(32, $participante->id)? "selected": "") ?>>06/12 - Oficina – Atividade de produção textual</option>
                            <option value="33" <?php echo ($atividadesRepository->checkSelectedOption(33, $participante->id)? "selected": "") ?>>06/12 - Apresentação de TCC – Comunicação Oral</option>
                            <option value="33" <?php echo ($atividadesRepository->checkSelectedOption(33, $participante->id)? "selected": "") ?>>06/12 - Apresentação de TCC – Comunicação Oral</option>
                            <option value="49" <?php echo ($atividadesRepository->checkSelectedOption(49, $participante->id)? "selected": "") ?>>06/12 - Exposição dos temas transversais do curso de pedagogia</option>


                        </optgroup>
                        <optgroup label="Engenharia de Produção">
                            <option value="34" <?php echo ($atividadesRepository->checkSelectedOption(34, $participante->id)? "selected": "") ?>>04/12 - Apresentação de TCC – Comunicação Oral (10º período)</option>
                            <option value="35" <?php echo ($atividadesRepository->checkSelectedOption(35, $participante->id)? "selected": "") ?>>05/12 - Apresentação dos trabalhos (poster) da disciplina Confiabilidade e Manuntenção Industrial - Prof Izael (4º período)</option>
                            <option value="36" <?php echo ($atividadesRepository->checkSelectedOption(36, $participante->id)? "selected": "") ?>>05/12 - Apresentação dos trabalhos (poster) da disciplina Processos Produtivos I (Prof. Izael) (6º período)</option>
                            <option value="37" <?php echo ($atividadesRepository->checkSelectedOption(37, $participante->id)? "selected": "") ?>>05/12 - Apresentação de TCC – Comunicação Oral (10º período)</option>
                            <option value="38" <?php echo ($atividadesRepository->checkSelectedOption(38, $participante->id)? "selected": "") ?>>06/12 - Exposição dos projetos da disciplina Projeto de Produtos (Prof. Luiz Nogueira) (8º período)</option>
                            <option value="39" <?php echo ($atividadesRepository->checkSelectedOption(39, $participante->id)? "selected": "") ?>>06/12 - Apresentação de TCC – Comunicação Oral (10º período)</option>
                        </optgroup>

                        <optgroup label="Administração">
                            <option value="40" <?php echo ($atividadesRepository->checkSelectedOption(40, $participante->id)? "selected": "") ?>>04/12 - Exposição de Painel – TCC (8º Período)</option>
                            <option value="41" <?php echo ($atividadesRepository->checkSelectedOption(41, $participante->id)? "selected": "") ?>>04/12 - Exposição de Painel – Disciplina Gestão de Pequenas Empresas (6º Período)</option>
                            <option value="42" <?php echo ($atividadesRepository->checkSelectedOption(42, $participante->id)? "selected": "") ?>>05/12 - Palestra: Plano para internacionalização de uma empresa</option>
                        </optgroup>


                        <optgroup label="Educação Física">
                            <option value="43" <?php echo ($atividadesRepository->checkSelectedOption(43, $participante->id)? "selected": "") ?>>04/12 - Apresentação de Painel</option>
                            <option value="44" <?php echo ($atividadesRepository->checkSelectedOption(44, $participante->id)? "selected": "") ?>>04/12 - Palestra sobre Síndrome Metabólica prof. Dr. Bruno Smirmaul</option>
                            <option value="45" <?php echo ($atividadesRepository->checkSelectedOption(45, $participante->id)? "selected": "") ?>>05/12 - Apresentação de Painel</option>
                            <option value="46" <?php echo ($atividadesRepository->checkSelectedOption(46, $participante->id)? "selected": "") ?>>05/12 - Palestra sobre Atividade Física para Idosos – Profa.  Ms. Pollyanna Micali</option>
                            <option value="47" <?php echo ($atividadesRepository->checkSelectedOption(47, $participante->id)? "selected": "") ?>>06/12 - Apresentação de Painel</option>
                            <option value="48" <?php echo ($atividadesRepository->checkSelectedOption(48, $participante->id)? "selected": "") ?>>06/12 - Palestra sobre Periodização do Treinamento – Profa.  Ms. Priscila Biase</option>
                        </optgroup>
                    </select>
                </div>


            </div>
        </div>
        <div class="text-align-center">
            <input class="button button-center" id="cad-btn" name="cadastrar" type="button" value="Confirmar"/>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.js" type="text/javascript"></script>
        <script src="../html/scripts/chosen_v1.8.2/chosen.jquery.js" type="text/javascript"></script>
        <script src="../html/scripts/chosen_v1.8.2/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
        <script src="../html/scripts/chosen_v1.8.2/docsupport/init.js" type="text/javascript" charset="utf-8"></script>



    </form>
</div>

</body>
</html>