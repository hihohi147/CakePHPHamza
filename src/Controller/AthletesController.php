<?php


namespace App\Controller;

class AthletesController extends AppController
{
    
    public function initialize()
    {
        parent::initialize();
        
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); 
        $this->Auth->allow(['tags']);
    }
    
    public function index()
    {
        $this->loadComponent('Paginator');
        $athletes = $this->Paginator->paginate($this->Athletes->find());
        $this->set(compact('athletes'));
        
      
    }
    
    public function edit($slug = null )
    {
      /*  $athlete = $this->Athletes
        ->findBySlug($slug)
        ->contain('Tags') // load associated Tags
       ->firstOrFail();*/
		$athlete = $this->Athletes->findBySlug( $slug )->firstOrFail();
        
        if ($this->request->is(['post', 'put'])) {
            $this->Athletes->patchEntity($athlete, $this->request->getData(), [
                // Added: Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Athletes->save($athlete)) {
                $this->Flash->success(__('Athlete has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update the athlete.'));
        }
        // Get a list of tags.
        $tags = $this->Athletes->Tags->find('list');
        
        // Set tags to the view context
        $this->set('tags', $tags);
        
        $this->set('athlete', $athlete);
    }
    
    public function tags()
    {
        // The 'pass' key is provided by CakePHP and contains all
        // the passed URL path segments in the request.
        $tags = $this->request->getParam('pass');
        
        // Use the ArticlesTable to find tagged articles.
        $athletes = $this->Athletes->find('tagged', [
            'tags' => $tags
        ]);
        
        // Pass variables into the view template context.
        $this->set([
            'athletes' => $athletes,
            'tags' => $tags
        ]);
    }
    
    public function isAuthorized($user)
    {
		if ($user['admin']) {
			return true;
		} else {
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add', 'tags'])) {
            return true;
        }
        
        // All other actions require a slug.
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }
        
        $athlete = $this->Athletes->findBySlug($slug)->first();
        
        return $athlete->user_id === $user['id'];
		}
    }
	
    
    public function delete($slug = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        
        $athlete = $this->Athletes->findBySlug($slug)->firstOrFail();
        if ($this->Athletes->delete($athlete)) {
            
			$this->Flash->success(__('{0} {1} has been deleted.', $athlete->first_name, $athlete->last_name));
            } else {
				$this->Flash->error(__('The athlete was not deleted. Please, try again.'));
			}
			return $this->redirect(['action' => 'index']);
        
    }
    
    public function view($slug = null)
    {
        $athlete = $this->Athletes->findBySlug($slug)->firstOrFail();
        $this->set(compact('athlete'));
        
        
        
    }
    
    public function add()
    {
        $athlete = $this->Athletes->newEntity();
        if ($this->request->is('post')) {
            $athlete = $this->Athletes->patchEntity($athlete, $this->request->getData());
            
            
            $athlete->user_id = $this->Auth->user('id');
            
            if ($this->Athletes->save($athlete)) {
                $this->Flash->success(__('Athlete added'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Can\'t add the athlete'));
        }
        // Get a list of tags.
        $tags = $this->Athletes->Tags->find('list');
        
        // Set tags to the view context
        $this->set('tags', $tags);
        $this->set('athlete', $athlete);
    }
    
}