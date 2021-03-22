<?php

/**
 * класс item
 */
final class item
{

    private int $id;
    private string $name;
    private int $status;
    private bool $changed;

    private $res;
    
    /**
     * __construct
     *
     * @param  mixed $id
     * @return void
     */
    function __construct($id){
        $this->id=$id;
        $this->init();
    }

    
     
     /**
      * init забирает данные из бд
      *
      * @return void пусто
      */
     private  function init(){    
        $connection = new mysqli("link", "user", "password", "databasename");
        $res = $connection->query("select name, status  from objects where id={$this->id}");
        $array = $res->fetch_assoc();

        $this->res=$res;
        $this->name=$array['name'];
        $this->status=$array['status'];

        $connection->close();
        $res->free();
    }
    
    /**
     * magic
     *
     * @param  mixed $name имя обьекта
     * @param  mixed $status статус 
     * @param  mixed $changed изменения
     * @return void строка состоящая из переменных 
     */
    function magic($name,$status,$changed){
        if($name!=null || $status!=null || $changed!=null){
            if(gettype($name)==="string")
                $name==null?'не поменялось':$this->name=$name;
            if(gettype($status)==="integer")
                $status==null?'не поменялось':$this->status=$status;
            if(gettype($changed)==="boolean")
                $changed==null?'не поменялось':$this->changed=$changed;

        }

        return "{$this->id} "."{$this->name}" ."{$this->status} "."{$this->changed}";
    }
    
    /**
     * save
     *
     * @param  mixed $name имя обьекта
     * @param  mixed $status статус обьекта
     * @return void ничего не возвращает
     */
    

    public function save($name,$status)
    {
        $this->name=$name;
        $this->status=$status;
    }
}
