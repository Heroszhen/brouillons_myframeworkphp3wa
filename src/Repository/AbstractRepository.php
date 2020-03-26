<?php
namespace App\Repository;

abstract class AbstractRepository{
    protected $entityname;

    public function __construct($entityname) {
        $this->entityname = $entityname;
    }

}