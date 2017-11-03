<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\I18n\Time;

class EventsTable extends Table
{
    /*public function move($dir, $id){
        $new = $this->newEntity();
        $new['name'] = $id['name'] . ' moves ' . $dir;
        $new['coordinate_x'] = $id['coordinate_x'];
        $new['coordinate_y'] = $id['coordinate_y'];
        $new['date'] = time();
        $this->save($new);
    }
    
    public function attack($success, $id, $lvlUp, $dir){
        $new = $this->newEntity();
        if($success){
            $succ = 'hits!';
        }else{
            $succ = 'misses!';
        }
        if($lvlUp){
            $new['name'] = $id['name'] . ' attacks dir. ' . $dir . ' and ' . $succ . ' And ' . $id['name'] . ' get level ' . $id['level'];
        }else{
            $new['name'] = $id['name'] . ' attacks dir. ' . $dir . ' and ' . $succ;
        }
        
        $new['coordinate_x'] = $id['coordinate_x'];
        $new['coordinate_y'] = $id['coordinate_y'];
        $new['date'] = time();
        $this->save($new);
    }
    
    public function loot($id, $bonusDif){
        $new = $this->newEntity();
        $new['name'] = $id['name'] . ' loots and equips a new ' . $bonusDif['type'];
        $new['coordinate_x'] = $id['coordinate_x'];
        $new['coordinate_y'] = $id['coordinate_y'];
        $new['date'] = time();
        $this->save($new);
    }
    */
    
   public function getevents(){
        $now = Time::now();
        $all = $this->find('all', [
            'order'=> ['events.date' =>'ASC']], array(
        'conditions' => array('events.date' => '-24 hours')
        ));
        return $all;
        
    }   
}