<?php
namespace App\Models;

use TAT_Core\lib\Model;

class demoModel extends Model
{
    public $dbtable = 'a';
    public function lists()
    {
        $ret = $this->select($this->dbtable, "*");
        return $ret;
    }
}