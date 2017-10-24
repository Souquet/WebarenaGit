<?php
namespace App\Controller;
use App\Controller\AppController;
/**
* Personal Controller
* User personal interface
*
*/
class ArenasController  extends AppController
{
public function index()
{
    $this->set('myname', "Julien Falconnet");
}
    
public function login()
{
    
}

public function fighter()
{
    
}
    
public function sight()
{
    
}
    
public function diary()
{
        //if ($this->request->session()->check('playerId')==NULL) //{$this->redirect(['events' => 'login']);}
        
        $this->loadModel('events');
        
        $this->set('events', $this->events->getevents());
}
}
