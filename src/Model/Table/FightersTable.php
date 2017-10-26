<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class FightersTable extends Table{
    public function test(){
        return 'ok';
    }
    
    public function getBestFighter(){
        return $this->find("all")->order(["level"=>"DESC"])->first();
    }
}