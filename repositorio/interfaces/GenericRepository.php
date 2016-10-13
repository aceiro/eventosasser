<?php


interface GenericRepository
{

    public function findOne($id);
    public function save(BaseDataTransferObject $dto);
    public function remove(BaseDataTransferObject $dto);
    public function update(BaseDataTransferObject $dto);

}