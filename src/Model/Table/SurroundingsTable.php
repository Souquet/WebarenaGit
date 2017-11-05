<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class SurroundingsTable extends Table {

	public function attaque($fx, $fy, $id){
		$Surroundings = TableRegistry::get('surroundings');
		$FightersTable = TableRegistry::get('fighters');
        $fighters = $FightersTable->get($id);
		//if ($fx == $Surroundings->coordinate_x && $fy == $Surroundings->coordinate_y){
		//	$fighters->xp+=1;

		//}




	}



}
?>