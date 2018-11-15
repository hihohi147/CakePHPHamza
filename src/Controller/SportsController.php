<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sports Controller
 *
 * @property \App\Model\Table\SportsTable $Sports
 *
 * @method \App\Model\Entity\Sport[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SportsController extends AppController
{

 public function initialize() {
        parent::initialize();
		$this->loadComponent('RequestHandler');
        $this->Auth->allow(['autocomplete', 'findSports', 'add', 'edit', 'delete']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sports = $this->paginate($this->Sports);

        $this->set(compact('sports'));
    }
	
	 public function autocomplete() {
        
    }

    /**
     * View method
     *
     * @param string|null $id Sport id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sport = $this->Sports->get($id, [
            'contain' => ['Results']
        ]);

        $this->set('sport', $sport);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sport = $this->Sports->newEntity();
        if ($this->request->is('post')) {
            $sport = $this->Sports->patchEntity($sport, $this->request->getData());
            if ($this->Sports->save($sport)) {
                $this->Flash->success(__('The sport has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sport could not be saved. Please, try again.'));
        }
        $this->set(compact('sport'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sport id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sport = $this->Sports->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sport = $this->Sports->patchEntity($sport, $this->request->getData());
            if ($this->Sports->save($sport)) {
                $this->Flash->success(__('The sport has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sport could not be saved. Please, try again.'));
        }
        $this->set(compact('sport'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sport id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sport = $this->Sports->get($id);
        if ($this->Sports->delete($sport)) {
            $this->Flash->success(__('The sport has been deleted.'));
        } else {
            $this->Flash->error(__('The sport could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function findSports() {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->Sports->find('all', array(
                'conditions' => array('Sports.name LIKE ' => '%' . $name . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['name'], 'value' => $result['name']);
            }
            echo json_encode($resultArr);
        }
    }

}
