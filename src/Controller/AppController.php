<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    
   public function initialize()
    {
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Arenas',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'Arenas',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Arenas',
                'action' => 'login',
                'home'
            ],
            'authenticate' => [
                'Form' => [
                    'userModel' => 'Players',
                    'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ],
            'storage' => 'Session'
        ]);
    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['login', 'logout', 'newpassword']);
    }
    
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
