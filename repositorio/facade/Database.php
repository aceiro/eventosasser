<?php

require '../RedBeanPHP4_3_2/rb.php';
// DEV Environment at Local laptop
R::setup( 'mysql:host=localhost;dbname=eventosa_v2_2018_bkp20181122', 'root', '' );





class Database{

    public function save($data){
        if($data==null || empty($data))
            throw new Exception("The $data param can't be null or empty");

        R::begin();
            $id = R::store( $data );
        R::commit();
        return $id;
    }

    public function findAll($table)
    {
        if($table==null || empty($table))
            throw new Exception("The $table param can't be null or empty");

        return R::findAll($table);
    }

    public function findById($table,$id)
    {
        if($table==null || empty($table))
            throw new Exception("The $table param can't be null or empty");

        return R::findOne( $table, 'id=?', [ $id ] );
    }

    public function load($table)
    {

        if($table==null || empty($table))
            throw new Exception("The $table param can't be null or empty");

        return R::dispense($table);
    }

    public function trash($table)
    {
        if($table==null || empty($table))
            throw new Exception("The $table param can't be null or empty");

        R::trash($table);
    }

    public function getAllBySql($sql, $bindings = array())
    {


        return R::getAll($sql, $bindings);
    }

}
