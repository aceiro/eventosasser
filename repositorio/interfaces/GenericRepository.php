<?php


interface GenericRepository
{

    public function findAllBySql($sql, $bindings = array());
    public function findAll();
    public function findOne($id);
    public function save(BaseDataTransferObject $dto);
    public function remove(BaseDataTransferObject $dto);
    public function update(BaseDataTransferObject $dto);
    public function updateStatusRemovidoById($id);


}