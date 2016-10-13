<?php
class PassMeIn
{

}

class PassMeInSubClass extends PassMeIn
{

}

class ClassProcessor
{
    public function processClass (PassMeIn $class)
    {
        var_dump (get_class ($class));
    }
}

class ClassProcessorSubClass extends ClassProcessor
{
    public function processClass (PassMeIn $class)
    {
        if ($class instanceof PassMeInSubClass)
        {
            parent::processClass ($class);
        }
        else
        {
            throw new InvalidArgumentException;
        }
    }
}

$a  = new PassMeIn;
$b  = new PassMeInSubClass;
$c  = new ClassProcessor;
$d  = new ClassProcessorSubClass;

$c -> processClass ($a);
$c -> processClass ($b);
$d -> processClass ($b);
/*$d -> processClass ($a);*/



