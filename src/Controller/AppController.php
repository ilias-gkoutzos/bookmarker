<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
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
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        
        $this->loadComponent('Math'); //Custom component
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash',['clear'=>'true']); //clear=>true does NOT allow stacked messages
        $this->loadComponent('Auth', [
                        'authorize' => 'Controller', //added this line
                        'authenticate' => [
                                'Form' => [
                                'fields' => [
                                        'username' => 'email',
                                        'password' => 'password'
                                        ]
                                ]
                        ],
                        'authError' => 'Did you really think you are allowed to see that?',
                        'loginAction' => [
                                'controller' => 'Users',
                                'action' => 'login'
                        ],
                        //'unauthorizedRedirect' => ['controller'=>'Pages','action'=>'forbiddenPage'] // If unauthorized,return them to page they were just on
                        'unauthorizedRedirect' => $this->referer()
            ]);
        // Allow the display action so our pages controller
        // continues to work.
        $this->Auth->allow(['display']);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        $this->loadComponent('Security');
        $this->loadComponent('Csrf');
    }
    //function that restricts all users. 
    //IF a user is allowed that is done in corresponding controller controller. 
    //EG: bookmarks controller -> Where each user can see his bookmarks. MUST HAVE SAME NAME AS THIS ONE!!!
    public function isAuthorized($user)
    {
        return false;
    }
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
         
    }
}
