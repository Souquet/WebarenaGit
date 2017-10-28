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
    
    public function fighter() {
        $this->loadModel('Fighters');
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $new_fighter_name = $data['name'];
            $this->Fighters->addFighter($new_fighter_name);
        }
    }
    
    public function sight(){
        if ($this->request->is('post')){
           // déclaration variables
           $data = $this->request->getData();
           $this->LoadModel('Fighters');
           
           if($data['calcposgrid'] == 'h'){
               
           }
           elseif($data['calcposgrid'] == 'g'){
               
           }
           elseif($data['calcposgrid'] == 'd'){
               
           }
           elseif($data['calcposgrid'] == 'b'){
               
           }
           elseif($data['actfight'] == '1'){
               
           }
           
       }
       
    }
    
    public function diary(){
       
    }
    
    public function login(){
        $this->set('mdp', "");
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
                    $this->set(pr('Connectez-vous!'));
                }
            }elseif($data['processing'] == 'login'){
                $player = $this->Auth->identify();
                    if ($player){
                        $this->Auth->setUser($player);
                        return $this->redirect($this->Auth->redirectUrl());
                    }
                $this->Flash->error(__('Invalid username or password, try again'));
                
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
    
