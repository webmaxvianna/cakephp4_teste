<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\Controller\Controller;

class AppController extends Controller
{

    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username', 
                        'password' => 'password'
                        ]
                    ]
                ],
                'loginRedirect' => [
                    'controller' => 'Users',
                    'action' => 'index'
                ],
                'logoutRedirect' => [
                    'controller' => 'Users',
                    'action' => 'login'
                ]
            ]);

        $this->Auth->allow('add');

        $this->set('userLogged', $this->Auth->user());
    }
}
