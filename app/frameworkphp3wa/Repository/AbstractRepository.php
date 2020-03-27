<?php
namespace Frameworkphp3wa\Repository;

use Frameworkphp3wa\Kernel;

abstract class AbstractRepository{
    protected $entityname;
    protected $pdo;

    public function __construct($entityname) {
        $this->entityname = $entityname;
        $this->pdo = (new Kernel)->getPDO();
    }

}