<?php
require 'Base.php';

class Atividades extends BaseDataTransferObject{
    public $id_participante;
    public $id_atividade_option;
    public $active;

    public function __construct($id, $id_participante, $id_atividade_option, $active){
        $this->id=$id;
        $this->id_participante = $id_participante;
        $this->id_atividade_option = $id_atividade_option;
        $this->active = $active;
    }


}