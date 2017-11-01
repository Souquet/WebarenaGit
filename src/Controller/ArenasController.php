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
            $new_fighter_name = $data['new_name'];
            $new_avatar_img = $data['avatar'];
            if (($new_fighter_name != '')&&($new_avatar_img == 1 || $new_avatar_img == 2)){
                $this->Fighters->addFighter($new_fighter_name,$id);
                return $this->redirect('/Arenas/fighter');
            }else{
                $fail='nom incorrect';
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
        if ($this->request->is('post')){
           // déclaration variables
           $data = $this->request->getData();
           $this->LoadModel('Fighters');
           
           if($data['calcposgrid'] == 'h'){
            $this->Fighters->moveH();
           }
           elseif($data['calcposgrid'] == 'g'){
            $this->Fighters->moveG();   
           }
           elseif($data['calcposgrid'] == 'd'){
            $this->Fighters->moveD();  
           }
           elseif($data['calcposgrid'] == 'b'){
            $this->Fighters->moveB();  
           }
           elseif($data['actfight'] == '1'){
            $this->Fighters->att('1');
           }
           
       }
    }
    
    public function diary()
{
        //if ($this->request->session()->check('playerId')==NULL) //{$this->redirect(['events' => 'login']);}
        
        $this->loadModel('events');
        
        $this->set('events', $this->events->getevents());
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
    
