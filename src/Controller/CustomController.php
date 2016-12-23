<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookmarks Controller
 *
 * @property \App\Model\Table\BookmarksTable $Bookmarks
 */
class CustomController extends AppController
{
   
    public function beforeRender(\Cake\Event\Event $event)
    {
        //$this->viewBuilder()->theme('Modern');
    }
    
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Articles');
        
    }
    
    public function isAuthorized($user)
    {
        /*$action = $this->request->params['action'];
        // The add and index actions are always allowed.
        if (in_array($action, ['index', 'add', 'customPage','calculate'])) {
                return true;
            }
        // All other actions require an id.
        if (empty($this->request->params['pass'][0])) {
                return false;
            }
        // Check that the bookmark belongs to the current user.
        $id = $this->request->params['pass'][0];
        $bookmark = $this->Bookmarks->get($id);
        if ($bookmark->user_id == $user['id']) {
                return true;
            }*/
        return true;
        return parent::isAuthorized($user);
    }
    
    public function customPage()
    {
        $data = [
            'color' => 'pink',
            'type' => 'sugar',
            'base_price' => 23.95
        ];
        $agent=$this->RequestHandler->isMobile();
        if(!$agent){
            $this->Flash->success('Yo! this is only a desktop request!');
        }
        
        $this->RequestHandler->respondAs('json', [
            // Force download
            'attachment' => true,
            'charset' => 'UTF-8'
        ]);
        
        // Make $color, $type, and $base_price
        // available to the view:
        $this->set('data',$data);
        $this->RequestHandler->renderAs($this, 'json');
        //$this->render('/element/flash/success'); //renders other .ctp file!
              
    }
    
    public function calculate(){
        
        $sqroot=$this->Math->doComplexOperation(25, 25);
        $this->set('sqroot',$sqroot);
        //$this->render('custom_page');
    }
    
    public function setView(){
        
    }
    
    public function contactForm(){
        
    }
    
    public function htmlHelper(){
        
    }
    public function connection(){
        
    }
    public function articles(){
        
    }
    public function hydration(){
        
    }
    
    public function entities(){
        
    }
    
     public function assoc(){
         $this->loadModel('Bookmarks');
        $cuser=$this->Auth->user('id');
        $query=$this->Bookmarks->find()
            ->select(['title','user_id'])
            //->contain('Tags','Users')
            ->matching('Tags',function ($q) use ($cuser){
                //$cuser=$this->Auth->user('id');
                return $q->where(['Tags.title LIKE'=>'%java%'])
                        ->andWhere(['Bookmarks.user_id'=>$cuser]);
            })
            ->distinct();
            $count=$query->count();
            if($count>0){
                $this->Flash->set('We found the following bookmarks for this USER',
                        ['key'=>'assoc','element'=>'success']);
            }else{
                $this->Flash->set('You have no bookmarks as this USER', ['key'=>'assoc','element'=>'error']);
            }
        $this->set('cuser',$cuser);
        $this->set('cquery',$query);
        $this->set('count',$count);
    }
    
    public function getArticle(){
        $article=$this->Articles->get(3);
        $this->set(compact('article'));
        //$this->RequestHandler->renderAs($this, 'json');
    }
}
