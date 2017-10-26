<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Personal Controller
 * User personal interface
 *
 */
class ArenasController extends AppController {

    public function index() {
        $this->set('myname', "Roberto Duarte");

        $this->loadModel('Fighters');

        $v = $this->Fighters->test();
        $this->set('test', $v);
        $figterlist = $this->Fighters->getBestFighter();
        pr($figterlist->toArray());
    }

    public function login() {
        
    }

    public function fighter() {
        $this->loadModel('Fighters');
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            pr($data);
            $new_fighter_name = $data['name'];
            pr($this->Fighters->addFighter($new_fighter_name));
        }
    }

    /*    public function new_fighter() {
      $this->loadModel('Fighters');
      pr($new_fighter_name = $this->request->getData());


      } */

    public function sight() {
        
    }

    public function diary() {
        
    }

}
