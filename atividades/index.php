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
    <link rel="stylesheet" href="../html/css/menu-styles-v1.0.0.css" type="text/css">
    <link rel="stylesheet" href="../html/css/commun-style-v1.0.0.css" type="text/css">

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
            <li class='active'><a href='#'>Inscrição</a></li>
            <li><a target="_blank" href='Programacao-Geral-Final-2018.pdf' >Programação 2018</a></li>
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

                            <option value="1" <?php echo ($atividadesRepository->checkSelectedOption(1, $participante->id)? "selected": "") ?>>12/11 - 19:10 às 20:00 - Oficina Demonstrativa sobre os Grupos Alimentares associados a Doenças Crônicas Não Transmissíveis – Saúde e Sustentabilidade – Área de Convivência </option>
                            <option value="2" <?php echo ($atividadesRepository->checkSelectedOption(2, $participante->id)? "selected": "") ?>>12/11 - 19:10 às 20:00 - Exposição de Painel – Disciplina: Unidades de Alimentação e Nutrição – Área de Convivência </option>
                            <option value="3" <?php echo ($atividadesRepository->checkSelectedOption(3, $participante->id)? "selected": "") ?>>12/11 - 20:00 às 22:00 - Palestra: "Plásticos: da alta praticidade ao consumo excessivo, uma ameaça à sustentabilidade ambiental e a saúde humana". Doutorando Cleiton Pereira de Souza – UNESP/RC  - Cleiton Pereira de Souza - SALA/LOCAL B1S4</option>
                            <option value="73" <?php echo ($atividadesRepository->checkSelectedOption(73, $participante->id)? "selected": "") ?>>12/11 - 19:10 às 20:00 - Exposição de Painel – Antiinflamatórios Naturais – Área de Convivência Necessidade: 03 espaços para painéis.</option>
                            <option value="4" <?php echo ($atividadesRepository->checkSelectedOption(4, $participante->id)? "selected": "") ?>>13/11 - 19:10 às 20:00 - Exposição de Painel – TCC – Área de Convivência </option>
                            <option value="5" <?php echo ($atividadesRepository->checkSelectedOption(5, $participante->id)? "selected": "") ?>>13/11 - 19:10 às 22:00 - Exposição de Painel – Transtornos Alimentares  – Área de Convivência </option>
                            <option value="6" <?php echo ($atividadesRepository->checkSelectedOption(6, $participante->id)? "selected": "") ?>>13/11 - 19:10 às 22:00 - Exposição de Maquetes “Fisiologia do Corpo Humano”  – Área de Convivência</option>
                            <option value="7" <?php echo ($atividadesRepository->checkSelectedOption(7, $participante->id)? "selected": "") ?>>13/11 - 20:00 às 22:00 - Quiz da Nutrição - 6. período  – Área de Convivência - SALA/LOCAL B1S6</option>
                            <option value="8" <?php echo ($atividadesRepository->checkSelectedOption(8, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 22:00 - Oficina – Do reaproveitamento de óleo à Produção de Sabão Caseiro – Área de Convivência</option>
                            <option value="9" <?php echo ($atividadesRepository->checkSelectedOption(9, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 22:00 - Exposição de Painéis – Disciplina: Políticas Públicas de Saúde – Área de Convivência</option>
                            <option value="10" <?php echo ($atividadesRepository->checkSelectedOption(10, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 22:00 -  Exposição de Maquetes “DNA, Gene e Anomalias Cromossômicas”  – Área de Convivência</option>
                            <option value="11" <?php echo ($atividadesRepository->checkSelectedOption(11, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 22:00 -  Divulgação: Botulismo: Características e Prevenção  – Área de Convivência</option>
                            <option value="12" <?php echo ($atividadesRepository->checkSelectedOption(12, $participante->id)? "selected": "") ?>>14/11 - 20:00 às 22:00 -  Exposição de Painéis – Disciplina: Tecnologia de Alimentos  – Área de Convivência</option>
                            <option value="12" <?php echo ($atividadesRepository->checkSelectedOption(12, $participante->id)? "selected": "") ?>>14/11 - 20:00 às 22:00 -  Exposição de Painéis – Disciplina: Tecnologia de Alimentos  – Área de Convivência</option>

                            <option value="13" <?php echo ($atividadesRepository->checkSelectedOption(13, $participante->id)? "selected": "") ?>>13/11 - 19:10 às 22:00 - Aproveitamento de Resíduos Sólidos da Construção Civil  - Claudia Zago – SALA/LOCAL B1S2</option>
                            <option value="14" <?php echo ($atividadesRepository->checkSelectedOption(14, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 22:00 - Apresentação de Painéis - Metodologia - 8. período -  Área de Convivência</option>


                            <option value="16" <?php echo ($atividadesRepository->checkSelectedOption(16, $participante->id)? "selected": "") ?>>12/11 - 09:00 às 10:30 - Oficina: Homeopatia: A Ciência na Prática – Laboratório de Química</option>
                            <option value="17" <?php echo ($atividadesRepository->checkSelectedOption(17, $participante->id)? "selected": "") ?>>12/11 - 19:10 às 20:30 - Oficina: Homeopatia: A Ciência na Prática  – Laboratório de Química</option>
                            <option value="18" <?php echo ($atividadesRepository->checkSelectedOption(18, $participante->id)? "selected": "") ?>>13/11 - 19:10 às 22:00 - Exposição de Painéis: Farmacologia aplicada às patologias  – Área de Convivência</option>
                            <option value="19" <?php echo ($atividadesRepository->checkSelectedOption(19, $participante->id)? "selected": "") ?>>13/11 - 19:10 às 22:00 - Exposição de Maquetes “Fisiologia do Corpo Humano” -   Área de Convivência</option>
                            <option value="20" <?php echo ($atividadesRepository->checkSelectedOption(20, $participante->id)? "selected": "") ?>>13/11 - 19:10 às 22:00 - Exposição de Painéis: A Importância da Toxicologia para a Saúde -   Área de Convivência</option>
                            <option value="21" <?php echo ($atividadesRepository->checkSelectedOption(21, $participante->id)? "selected": "") ?>>13/11 – 08:00 às 10:30 - Exposição de Maquetes “Aspectos relevantes da Genética Humana”  -   Área de Convivência</option>
                            <option value="22" <?php echo ($atividadesRepository->checkSelectedOption(22, $participante->id)? "selected": "") ?>>13/11 – 08:00 às 10:30 - Exposição de painéis: Importância do Descarte Correto de Medicamentos  -   Área de Convivência</option>
                            <option value="23" <?php echo ($atividadesRepository->checkSelectedOption(23, $participante->id)? "selected": "") ?>>13/11 – 08:00 às 10:30 - Exposição de painéis: Fisiologia e mecânica cardiovascular -   Área de Convivência</option>
                            <option value="24" <?php echo ($atividadesRepository->checkSelectedOption(24, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 22:00 - Exposição de Maquetes “DNA, Gene e Anomalias Cromossômicas” -   Área de Convivência</option>
                            <option value="25" <?php echo ($atividadesRepository->checkSelectedOption(25, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 22:00 - Oficina - Cosmetologia: a arte de preparar produtos para o nosso cotidiano-   Laboratório de Química</option>
                            <option value="26" <?php echo ($atividadesRepository->checkSelectedOption(26, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 22:00 - Exposição de Painéis: Políticas Públicas definindo ações e serviços na saúde pública de Rio Claro- Área de Convivência</option>


                            <option value="27" <?php echo ($atividadesRepository->checkSelectedOption(27, $participante->id)? "selected": "") ?>>12/11 - 19:10 às 22:00 - Exposição – Desvendando as funções cognitivas (4º Período) – Área de convivência</option>
                            <option value="28" <?php echo ($atividadesRepository->checkSelectedOption(28, $participante->id)? "selected": "") ?>>12/11 - 19:10 às 22:00 - Exposição Painel - TCC - (10º Período) – Área de convivência</option>
                            <option value="29" <?php echo ($atividadesRepository->checkSelectedOption(29, $participante->id)? "selected": "") ?>>12/11 - 20:45 às 22:00 - Workshop – Bandagem rígida -  Clínica de Fisioterapia</option>
                            <option value="30" <?php echo ($atividadesRepository->checkSelectedOption(30, $participante->id)? "selected": "") ?>>13/11 - 19:10 às 22:00 - Exposição: Fisiologia do corpo humano - as funções dos sistemas  –  (2º Período) Área de convivência</option>
                            <option value="31" <?php echo ($atividadesRepository->checkSelectedOption(31, $participante->id)? "selected": "") ?>>13/11 - 19:10 às 22:00 - Exposição Painel Projeto de TCC - (8º Período) – Sala B1S5B</option>
                            <option value="32" <?php echo ($atividadesRepository->checkSelectedOption(32, $participante->id)? "selected": "") ?>>13/11 - 19:10 às 22:00 - Exposição Painel - TCC - (10º Período) – Área de convivência</option>
                            <option value="33" <?php echo ($atividadesRepository->checkSelectedOption(33, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 22:00 - Exposição – Maquetes do DNA, gene e anomalias (2º Período) -  Área de convivência</option>
                            <option value="34" <?php echo ($atividadesRepository->checkSelectedOption(34, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 22:00 - Exposição de Painéis - Políticas Públicas: definindo ações e serviços na Saúde Pública de Rio Claro (4º Período) -  Área de convivência</option>
                            <option value="35" <?php echo ($atividadesRepository->checkSelectedOption(35, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 22:00 - Exposição Painel - Fisioterapia Pediátrica (6º Período) -  Área de convivência</option>
                            <option value="36" <?php echo ($atividadesRepository->checkSelectedOption(36, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 22:00 - Exposição Painel Projeto de TCC - (8º Período) – Sala B1S5B</option>

                            <option value="37" <?php echo ($atividadesRepository->checkSelectedOption(37, $participante->id)? "selected": "") ?>>12/11 - 19:30 às 22:00 - Saúde Mental e a Vida Universitária - Evelyn Bortolin - Auditório</option>
                            <option value="38" <?php echo ($atividadesRepository->checkSelectedOption(38, $participante->id)? "selected": "") ?>>12/11 - 19:30 às 22:00 - Palestra/Oficina - Alfabetizar Letrando, caminhos possíveis - Maria Tereza Ribeiro Rios - Sala B1S3</option>
                            <option value="39" <?php echo ($atividadesRepository->checkSelectedOption(39, $participante->id)? "selected": "") ?>>13/11 - 19:30 às 22:00 - Metodologia Ativa - Valeria Algarve Penteado - Anfiteatro </option>
                            <option value="40" <?php echo ($atividadesRepository->checkSelectedOption(40, $participante->id)? "selected": "") ?>>14/11 - 19:30 às 22:00 - Exposição de Painel - TCC (7º Período) – Área de convivência</option>
                            <option value="41" <?php echo ($atividadesRepository->checkSelectedOption(41, $participante->id)? "selected": "") ?>>14/11 - 19:30 às 22:00 - Oficina - Jogos de Alfabetização – Sala B1S4</option>
                            <option value="73" <?php echo ($atividadesRepository->checkSelectedOption(73, $participante->id)? "selected": "") ?>>14/11 - 19:30 às 22:00 – Palestra - Sonhos, carreira e dificuldades da vida profissional–  Djair Claudio Francisco - Advogado, Secretario Municipal da Saúde</option>
                            <option value="74" <?php echo ($atividadesRepository->checkSelectedOption(74, $participante->id)? "selected": "") ?>>14/11 - 19:30 às 22:00 – Palestra - Economia Solidária – Prof. Dr. Auro Mendes</option>



                            <option value="42" <?php echo ($atividadesRepository->checkSelectedOption(42, $participante->id)? "selected": "") ?>>12/11 - 19:10 às 22:00 - Apresentação oral (Banca) do Trabalhos de Conclusão de Curso II - 10. período – B1S9</option>
                            <option value="43" <?php echo ($atividadesRepository->checkSelectedOption(43, $participante->id)? "selected": "") ?>>13/11 - 19:10 às 21:00 - Exposição de Painel - Processos Produtivos I - 6. período - Área de convivência</option>
                            <option value="44" <?php echo ($atividadesRepository->checkSelectedOption(44, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 21:00 - Exposição de Protótipos - Projeto de Produtos -  Área de convivência</option>
                            <option value="45" <?php echo ($atividadesRepository->checkSelectedOption(45, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 21:30 - Palestra: Lean Sigma - conceitos e casos práticos - 2. período - Manual Bacco -  B1S7</option>



                            <option value="46" <?php echo ($atividadesRepository->checkSelectedOption(46, $participante->id)? "selected": "") ?>>12/11 - 19:10 às 21:00 - Palestra:  Inovação: a dinâmica e suas características - Clóvis Delboni – SALA/LOCAL B1 S6</option>
                            <option value="47" <?php echo ($atividadesRepository->checkSelectedOption(47, $participante->id)? "selected": "") ?>>13/11 - 19:10 às 22:00 - Exposição de Painel – Trabalhos de Conclusão de Curso dos alunos do 8 sem Administração – Área de Convivência</option>
                            <option value="48" <?php echo ($atividadesRepository->checkSelectedOption(48, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 21:00 - Exposição de Painel – Gerenciamento de Novos Produtos dos alunos do 8 sem Administração – Área de Convivência</option>


                            <option value="49" <?php echo ($atividadesRepository->checkSelectedOption(49, $participante->id)? "selected": "") ?>>12/11 - 19:30 às 22:00 - Exposição: Fisiologia do Corpo Humano - As Funções dos Sistemas Fisiológicos - Área de convivência</option>
                            <option value="50" <?php echo ($atividadesRepository->checkSelectedOption(50, $participante->id)? "selected": "") ?>>12/11 - 20:00 às 22:00 - Exposição de Painel – Área de convivência</option>
                            <option value="51" <?php echo ($atividadesRepository->checkSelectedOption(51, $participante->id)? "selected": "") ?>>13/11 - 20:00 às 22:00 - Exposição de Painel – Área de convivência</option>
                            <option value="52" <?php echo ($atividadesRepository->checkSelectedOption(52, $participante->id)? "selected": "") ?>>14/11 - 20:00 às 22:00 - Exposição de Painel  -  Área de convivência</option>
                            <option value="53" <?php echo ($atividadesRepository->checkSelectedOption(53, $participante->id)? "selected": "") ?>>12/11 - 20:00 às 22:00 -Circuito de avaliação e de atividade física– Ginásio</option>
                            <option value="54" <?php echo ($atividadesRepository->checkSelectedOption(54, $participante->id)? "selected": "") ?>>13/11 - 20:00 às 22:00 -Circuito de avaliação e de atividade física– Ginásio</option>
                            <option value="55" <?php echo ($atividadesRepository->checkSelectedOption(55, $participante->id)? "selected": "") ?>>14/11 - 20:00 às 22:00 -Circuito de avaliação e de atividade física– Ginásio</option>
                            <option value="75" <?php echo ($atividadesRepository->checkSelectedOption(75, $participante->id)? "selected": "") ?>>13/11 - 19:10 às 21:00 Palestra: O trabalho do Atletismo na Força Aérea Professor Sérgio Moisés Jucosky - SALA/LOCAL Anfiteatro</option>


                            <option value="56" <?php echo ($atividadesRepository->checkSelectedOption(56, $participante->id)? "selected": "") ?>>12/11 - 19:10 às 21:00 Palestra: Liderança Mudando o Foco- desenvolvendo líderes e equipes de alta performance -  SALA/LOCAL Anfiteatro</option>
                            <option value="57" <?php echo ($atividadesRepository->checkSelectedOption(57, $participante->id)? "selected": "") ?>>12/11 - 19:10 às 21:00 - Exposição de Painel –Concurso de Urbanismo - URBAN – Área de Convivência</option>
                            <option value="58" <?php echo ($atividadesRepository->checkSelectedOption(58, $participante->id)? "selected": "") ?>>12/11 - 19:10 às 21:00 - Exposição de Painel –Concurso banheiros públicos Village Art Decor – Área de Convivência</option>
                            <option value="59" <?php echo ($atividadesRepository->checkSelectedOption(59, $participante->id)? "selected": "") ?>>12/11 - 19:10 às 21:00 - Exposição de Painel –Disciplina Projeto V – Área de Convivência</option>
                            <option value="60" <?php echo ($atividadesRepository->checkSelectedOption(60, $participante->id)? "selected": "") ?>>12/11 - 19:10 às 21:00 - Exposição de Painel –Projetos de Iniciação Científica – Área de Convivência</option>
                            <option value="61" <?php echo ($atividadesRepository->checkSelectedOption(61, $participante->id)? "selected": "") ?>>13/11 - 19:10 às 21:00 - Palestra e Oficina: Tendências e Novidades nos materiais de acabamento na construção civil: uso e aplicação -  E1S1</option>
                            <option value="62" <?php echo ($atividadesRepository->checkSelectedOption(62, $participante->id)? "selected": "") ?>>13/11 - 19:10 às 22:00 - Exposição de Painel – Disciplina Desenho do Objeto – Área de Convivência</option>
                            <option value="63" <?php echo ($atividadesRepository->checkSelectedOption(63, $participante->id)? "selected": "") ?>>13/11 - 19:10 às 22:00 - Exposição de Painel – Configuração visual do espaço e do objeto – SALA/LOCAL Sala de Conforto</option>
                            <option value="64" <?php echo ($atividadesRepository->checkSelectedOption(64, $participante->id)? "selected": "") ?>>13/11 - 19:10 às 21:00 - Exposição de Painel –Disciplina Cidade e Paisagem – Área de Convivência</option>
                            <option value="65" <?php echo ($atividadesRepository->checkSelectedOption(65, $participante->id)? "selected": "") ?>>13/11 - 19:10 às 21:00 - Exposição de Painel –Disciplina Teoria e História da Arquitetura e do Urbanismo VI – Área de Convivência</option>
                            <option value="66" <?php echo ($atividadesRepository->checkSelectedOption(66, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 22:00 - Palestra: Cores e tendências nas obras de construção civil e design de interiores -  LOCAL/SALA E1S1 </option>
                            <option value="67" <?php echo ($atividadesRepository->checkSelectedOption(67, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 22:00 - Exposição de Painel – Disciplina Teoria e História da Arquitetura e do urbanismo II - Planos Urbanísticos– Área de convivência</option>
                            <option value="68" <?php echo ($atividadesRepository->checkSelectedOption(68, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 22:00 - Exposição de Painel – Análise das condições acústicas de obras arquitetônicas – SALA/LOCAL Sala de Conforto</option>
                            <option value="69" <?php echo ($atividadesRepository->checkSelectedOption(69, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 22:00 Exposição de Painel – Disciplina Teoria e História da Arquitetura e do urbanismo IV - Edifícios relacionados ao Neoclassicismo e à arquitetura do século XVII e XVIII– Área de convivência</option>


                        <option value="70" <?php echo ($atividadesRepository->checkSelectedOption(70, $participante->id)? "selected": "") ?>>12/11 - 19:10 às 22:00 - Desafios na carreira do profissional em Tecnologia da Informação – Laboratório #3</option>
                        <option value="71" <?php echo ($atividadesRepository->checkSelectedOption(71, $participante->id)? "selected": "") ?>>13/11 - 19:10 às 22:00 - Modularização em php: Conceitos, Funções e Exemplos - Laboratório #3</option>
                        <option value="72" <?php echo ($atividadesRepository->checkSelectedOption(72, $participante->id)? "selected": "") ?>>14/11 - 19:10 às 22:00 - Exposição de Trabalhos - Disciplina de Programação de Computadores I - Área de convivência</option>


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