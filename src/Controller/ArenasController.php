<<<<<<< HEAD
<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\ORM\Table;
use Cake\Utility\Hash;
use \Cake\Network\Exception;
use Cake\Event\Event;
use Cake\Utility\Text;
/**
* Personal Controller
* User personal interface
*
*/
class ArenasController  extends AppController{
    public function index(){
        
    }
    
    public function creating(){
        $this->set('fail','');
        $this->loadModel('Fighters');
        $id = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $new_fighter_name = $data['name'];
            $new_avatar_img = $data['avatar'];
            if (!empty($data['avatar']['name']) && !empty($data['name'])){
                $this->loadModel('Surroundings');
                $query=$this->Surroundings->find("all",array( 'fields'=> array('coordinate_x','coordinate_y')))->toArray();
                $this->loadModel('Fighters');
                $this->Fighters->addFighter($new_fighter_name,$id,$query);
                $av=$data['avatar'];
                $extension = substr(strtolower(strrchr($av['name'], '.')), 1);
                $fichier = "comb_".$id;
                move_uploaded_file($av['tmp_name'], WWW_ROOT . '/img/' . $fichier.'.jpg');
                return $this->redirect('/Arenas/fighter');
            }else{
                $fail='nom incorrect ou avatar manquant';
                $this->set('fail',$fail);
            }
        }
    }
    
    public function fighter() {
        $this->loadModel('Fighters');
        $id = $this->Auth->user('id');
        $bool = $this->Fighters->find("all")
                    ->where(['player_id'=>$id])
                    ->count();
        $this->set('create',$bool);
        $fighter = $this->Fighters->find("all")
                    ->where(['player_id'=>$id])
                    ->order(["level" => "DESC"])
                    ->first();
        $this->set('player_fighter',$fighter);
        
        $fighter_array=$this->Fighters->getPlayerFighter($id);
        $this->set('player_fighter',$fighter_array);
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            if($data['lvl_up_type']=='hp'){
                $this->levelUp($fighter['id'],3);
            }
            if($data['lvl_up_type']=='force'){
                $this->Fighters->levelUp($fighter['id'],2);
            }
            if($data['lvl_up_type']=='sight'){
                $this->Fighters->levelUp($fighter['id'],1);
            }
            return $this->redirect('/Arenas/fighter');
        }
    }
    
    public function sight(){
        $playerId = $this->request->session()->read('player.id');
        //if (!$playerId) {
        //    $this->redirect(array('controller' => 'Arenas', 'action' => 'login'));
        //} else {
       if ($this->request->is('post')){
           // déclaration variables
           $data = $this->request->getData();
           $this->LoadModel('Fighters');
           $this->loadModel('Surroundings');


           //$FightersTable = TableRegistry::get('fighters');
           //$fighters = $FightersTable->get(2);

           $fighter = $this->request->session()->read('fighter.current');
           $this->set('fighter', $fighter);
           $idFighter = 2; // a globaliser avec la session en cours

           
           if($data['action'] == 'dh'){
            $this->Fighters->moveH($idFighter);
           }
           elseif($data['action'] == 'dg'){
            $this->Fighters->moveG($idFighter);   
           }
           elseif($data['action'] == 'dd'){
            $this->Fighters->moveD($idFighter);  
           }
           elseif($data['action'] == 'db'){
            $this->Fighters->moveB($idFighter);  
           }
           elseif($data['action'] == 'ah'){
            $this->Fighters->attH($idFighter);
           }
           elseif($data['action'] == 'ag'){
            $this->Fighters->attG($idFighter);
           }
           elseif($data['action'] == 'ad'){
            $this->Fighters->attD($idFighter);
           }
           elseif($data['action'] == 'ab'){
            $this->Fighters->attB($idFighter);
           }
       }
    }
    
    public function diary()
{
        //if ($this->request->session()->check('playerId')==NULL) //{$this->redirect(['events' => 'login']);}
        
        $this->loadModel('Events');
        
        $this->set('Events', $this->Events->getevents());
}
    
    public function login(){
        $this->set('mdp', '');
        $this->set('alert','');
        $this->set('invalid','');
        if($this->request->is('post')){
            
            $data = $this->request->getData();
            $this->loadModel('Players');
                
            if($data['processing'] == 'register'){
                $new_user_email = $data['email'];
                $new_user_password = $data['password'];
                $e=$this->Players->check_Players($data);
                if($e['email']!=$new_user_email){
                    $this->Players->add_Players($new_user_email,$new_user_password);
                }else{
                    $this->set('alert','Cette Email est déjà utilisé, connectez-vous !');
                }
            }elseif($data['processing'] == 'login'){
                $player = $this->Auth->identify();
                    if ($player){
                        $this->Auth->setUser($player);
                        return $this->redirect($this->Auth->redirectUrl());
                    }
                $this->set('invalid','Email ou mot de passe incorrect !');
                
            }elseif($data['processing'] == 'recover'){
                $email = $data['email'];
                $e=$this->Players->check_Players($data);
                if($e['email'] == $email){
                    $this->Players->change_Password($e['id'],$data['password']);
                    $this->set('mdp','Votre nouveau mot de passe est '.$data['password']);
                }
            }
        }
    }
    
    public function logout(){
        $this->Flash->success('Vous avez été déconnecté.');
        return $this->redirect($this->Auth->logout());
    }
}
    
