<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class FightersTable extends Table {

    public function test() {
        return "ok";
    }
    
    public function getPlayerFighter($pid){
        $data=$this->find("all")
           ->where(["player_id"=>$pid]);  
        return $fighter_array=$data->toArray();    
    }

    //fonction pour faire joindre une guilde a un figther
    public function joinGuild($idFighter, $idGuild) {
        $a=$this->get($idFighter);
        $a-> guild_id = $idGuild;
        $this->save($a);
    }
    
   //public function move($idFighter,$idDirection){
        //gerer ce qu'il y a autour 
        //jeton de jeu ?
   // }

    // public function move($dir, $fighter){
    //     switch($dir){
    //         case "g": $this->moveG($fighter);
    //             break;
    //         case "d": $this->moveH($fighter);
    //             break;
    //         case "b": $this->moveB($fighter);
    //             break;
    //         case "h": $this->moveD($fighter);
    //             break;
    //         default: break;
    //     }
    // }
    
    //gauche
    // public function moveG($fighter){
    //     $conditions = array('id' => $fighter);
    //     if($this->exists($conditions)){
    //         $temp = $this->find('all', array('conditions' => $conditions));
    //         $f = $temp->first();
    //         $y = $f['coordinate_y'] - 1;
    //         $x = $f['coordinate_x'];
    //         $cond = array('coordinate_x' => $x, 'coordinate_y' => $y);
    //         if($this->exists($cond)){
    //             return;
    //         }
    //         if($f['coordinate_y'] != 0){
    //             $f['coordinate_y'] = $f['coordinate_y'] - 1;
    //             $this->save($f);
    //         }
    //     }
    // }
    
    // //droite
    // public function moveD($fighter){
    //     $conditions = array('id' => $fighter);
    //     if($this->exists($conditions)){
    //         $temp = $this->find('all', array('conditions' => $conditions));
    //         $f = $temp->first();
    //         $y = $f['coordinate_y'] + 1;
    //         $x = $f['coordinate_x'];
    //         $cond = array('coordinate_x' => $x, 'coordinate_y' => $y);
    //         if($this->exists($cond)){
    //             return;
    //         }
    //         if($f['coordinate_y'] != 14){
    //             $f['coordinate_y'] = $f['coordinate_y'] + 1;
    //             $this->save($f);
    //         }
    //     }
    // }
    
    // //haut
    // public function moveH($fighter){
    //     $conditions = array('id' => $fighter);
    //     if($this->exists($conditions)){
    //         $temp = $this->find('all', array('conditions' => $conditions));
    //         $f = $temp->first();
    //         $y = $f['coordinate_y'];
    //         $x = $f['coordinate_x'] - 1;
    //         $cond = array('coordinate_x' => $x, 'coordinate_y' => $y);
    //         if($this->exists($cond)){
    //             return;
    //         }
    //         if($f['coordinate_y'] != 0){
    //             $f['coordinate_x'] = $f['coordinate_x'] - 1;
    //             $this->save($f);
    //         }
    //     }
    // }
    
    // //bas
    // public function moveB($fighter){
    //     $conditions = array('id' => $fighter);
    //     if($this->exists($conditions)){
    //         $temp = $this->find('all', array('conditions' => $conditions));
    //         $f = $temp->first();
    //         $y = $f['coordinate_y'];
    //         $x = $f['coordinate_x'] + 1;
    //         $cond = array('coordinate_x' => $x, 'coordinate_y' => $y);
    //         if($this->exists($cond)){
    //             return;
    //         }
    //         if($f['coordinate_y'] != 0){
    //             $f['coordinate_x'] = $f['coordinate_x'] + 1;
    //             $this->save($f);
    //         }
    //     }
    // }

    public function moveB(){
        $FightersTable = TableRegistry::get('fighters');
        $fighters = $FightersTable->get(2);
        $fighters->coordinate_y+=1;
        $FightersTable->save($fighters);
    }
    public function moveH(){
        $FightersTable = TableRegistry::get('fighters');
        $fighters = $FightersTable->get(2);
        $fighters->coordinate_y-=1;
        $FightersTable->save($fighters);
    }
    public function moveG(){
        $FightersTable = TableRegistry::get('fighters');
        $fighters = $FightersTable->get(2);
        $fighters->coordinate_x-=1;
        $FightersTable->save($fighters);
    }
    public function moveD(){
        $FightersTable = TableRegistry::get('fighters');
        $fighters = $FightersTable->get(2);
        $fighters->coordinate_x+=1;
        $FightersTable->save($fighters);
    }

            
    
    //fonction qui créer un nouveau figther (avec placement aléatoire libre)
    //player id a ajouté en parametre et en dessous
    public function addFighter($new_fighter_name,$pid) { 
        $a = $this->newEntity();
        $a->name = $new_fighter_name;
        $a->player_id = $pid;
        
        // Configuration des coordonnées + verification que la case soit libre
        $coordinates=array($a->coordinate_x=rand(0,15),$a->coordinate_y=rand(0,10));
        $query=$this->find('all',array( 'fields'=> array('coordinate_x','coordinate_y'))); 
        $listcoord = $query->toArray();
        //boucle qui verrifie que l'emplacement est libre
        do{
            $loop=FALSE;
            foreach ($listcoord as $bob) {
                if ($bob == $coordinates) {
                    $a->coordinate_x = rand(0,14);
                    $a->coordinate_y = rand(0,9);
                    $loop=TRUE;
                }
            }
        }while ($loop);
       
        $a->level = 1;
        $a->xp=8;
        $a->skill_sight = 2;
        $a->skill_strength = 1;
        $a->skill_health = 5;
        $a->current_health = 5;
        $a->next_action_time = null;
        $a->guild_id= null;

        $this->save($a);
    }

}