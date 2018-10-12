<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Winners Controller
 *
 * @property \App\Model\Table\WinnersTable $Winners
 *
 * @method \App\Model\Entity\Winner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WinnersController extends AppController
{


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $winners = $this->paginate($this->Winners);

        $this->set(compact('winners'));
    }

    /**
     * View method
     *
     * @param string|null $id Winner id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $winner = $this->Winners->get($id, [
            'contain' => []
        ]);

        $this->set('winner', $winner);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $winner = $this->Winners->newEntity();
        if ($this->request->is('post')) {
            $winner = $this->Winners->patchEntity($winner, $this->request->getData());
            if ($this->Winners->save($winner)) {
                $this->Flash->success(__('The winner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The winner could not be saved. Please, try again.'));
        }
        $this->set(compact('winner'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Winner id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $winner = $this->Winners->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $winner = $this->Winners->patchEntity($winner, $this->request->getData());
            if ($this->Winners->save($winner)) {
                $this->Flash->success(__('The winner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The winner could not be saved. Please, try again.'));
        }
        $this->set(compact('winner'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Winner id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $winner = $this->Winners->get($id);
        if ($this->Winners->delete($winner)) {
            $this->Flash->success(__('The winner has been deleted.'));
        } else {
            $this->Flash->error(__('The winner could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
