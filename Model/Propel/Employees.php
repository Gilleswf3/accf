<?php

namespace Model\Propel;

use Model\Propel\Base\Employees as BaseEmployees;

class Employees extends BaseEmployees

{
    
private function dbConnect()
    {
    $db = new PDO('mysql:host=localhost;dbname=accf;charset=utf8', 'root', 'root');
        
}

public function getEmployee()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT firstname FROM employees WHERE id_employee = 1');
        return $req;
    }






}