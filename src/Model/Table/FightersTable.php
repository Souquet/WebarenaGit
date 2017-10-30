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
    
    public function move($idFighter,$idDirection){
        //gerer ce qu'il y a autour 
        //jeton de jeu ?
    }
    
    //Change les valeurs en fonction de la caracteristique choi        
    public function levelUp($fighterId,$carac){
        $fighter=$this->get($fighterId);
        switch($carac){
                case 1: //sight
                    $fighter->skill_sight+=1;
                    $fighter->level+=1;
                    break;
                case 2: //strength
                    $fighter->skill_strength+=1;
                    $fighter->level+=1;
                    break;
                case 3: //hp's
                    $fighter->skill_health+=3;
                    $fighter->current_health=skill_health;
                    $fighter->level+=1;
                    break;
                default:
                    break;
        }
        $this->save($fighter);
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