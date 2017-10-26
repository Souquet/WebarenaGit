<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PlayersTable extends Table{
    
    public function add_Players($email,$password){
        $a=$this->newEntity();
        $a->email=$email;
        $a->password=$password;
        $this->save($a);
    }
    
    public function check_Players($data){
        $a=$this->newEntity();
        $data=$this->find('all')
            ->where(['email'=>$data['email']])
            ->first();
        if($data){
            $a=$data->toArray();
            return $a;
        }
    }
}