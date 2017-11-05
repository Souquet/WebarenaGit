<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ToolsTable extends Table
{
    //get fighter's equipment in an array
    public function getFighterTools($fighter){
        if($this->exists(array('fighter_id' => $fighter, 'type' => 'weapon'))){
            $w = $this->find('all', array('conditions' => array('fighter_id' => $fighter, 'type' => 'weapon')))->first();
        }else{
            $w = 0;
        }
        if($this->exists(array('fighter_id' => $fighter, 'type' => 'armor'))){
            $a = $this->find('all', array('conditions' => array('fighter_id' => $fighter, 'type' => 'armor')))->first();
        }else{
            $a = 0;
        }
        if($this->exists(array('fighter_id' => $fighter, 'type' => 'ring'))){
            $r = $this->find('all', array('conditions' => array('fighter_id' => $fighter, 'type' => 'ring')))->first();
        }else{
            $r = 0;
        }
        $tools = array('weapon' => $w, 'armor' => $a, 'ring' => $r);
        return $tools;
    }
    
    //inserts the unequiped tools in the $map and returns the $map
    public function displayTools($map){
        $temp = $this->find('all');
        foreach($temp as $tool){
            if($tool['coordinate_x'] != -1 && $tool['coordinate_y'] != -1){
                $map[$tool['coordinate_x']][$tool['coordinate_y']] = $tool;
            }
        }
        return $map;
    }
    
    //checking if the fighter can loot an item
    public function checkLoot($fighter){
        $conditions = array('coordinate_x' => $fighter['coordinate_x'], 'coordinate_y' => $fighter['coordinate_y']);
        if($this->exists($conditions)){
            $temp = $this->find('all', array('conditions' => $conditions));
            return $temp->first();
        }else{
            return false;
        }
    }
    
    //processing the item loot and drop of the potential previous item equiped
    public function equip($fighter){
        $conditions = array('coordinate_x' => $fighter['coordinate_x'], 'coordinate_y' => $fighter['coordinate_y']);
        if($this->exists($conditions)){
            $temp = $this->find('all', array('conditions' => $conditions));
            $t = $temp->first();
            $cond = array('type' => $t['type'], 'fighter_id' => $fighter['id']);
            if($this->exists($cond)){
                $temp = $this->find('all', array('conditions' => $cond));
                $previous = $temp->first();
                $preBonus = $previous['bonus'];
                $previous['coordinate_x'] = $fighter['coordinate_x'];
                $previous['coordinate_y'] = $fighter['coordinate_y'];
                $previous['fighter_id'] = -1;
                $this->save($previous);
            }else{
                $preBonus = 0;
            }
            $t['fighter_id'] = $fighter['id'];
            $t['coordinate_x'] = -1;
            $t['coordinate_y'] = -1;
            $this->save($t);
            return array('type' => $t['type'], 'dif' => ($t['bonus'] - $preBonus));
        }
    }
}