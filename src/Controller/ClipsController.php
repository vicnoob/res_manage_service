<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clips Controller
 *
 * @property \App\Model\Table\ClipsTable $Clips
 *
 * @method \App\Model\Entity\Clip[] paginate($object = null, array $settings = [])
 */
class ClipsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Subjects']
        ];
        $clips = $this->paginate($this->Clips);

        $this->set(compact('clips'));
        $this->set('_serialize', ['clips']);
    }

    /**
     * View method
     *
     * @param string|null $id Clip id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clip = $this->Clips->get($id, [
            'contain' => ['Subjects']
        ]);

        $this->set('clip', $clip);
        $this->set('_serialize', ['clip']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clip = $this->Clips->newEntity();
        if ($this->request->is('post')) {
            $clip = $this->Clips->patchEntity($clip, $this->request->getData());
            if ($this->Clips->save($clip)) {
                $this->Flash->success(__('The clip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clip could not be saved. Please, try again.'));
        }
        $subjects = $this->Clips->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('clip', 'subjects'));
        $this->set('_serialize', ['clip']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Clip id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clip = $this->Clips->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clip = $this->Clips->patchEntity($clip, $this->request->getData());
            if ($this->Clips->save($clip)) {
                $this->Flash->success(__('The clip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clip could not be saved. Please, try again.'));
        }
        $subjects = $this->Clips->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('clip', 'subjects'));
        $this->set('_serialize', ['clip']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Clip id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clip = $this->Clips->get($id);
        if ($this->Clips->delete($clip)) {
            $this->Flash->success(__('The clip has been deleted.'));
        } else {
            $this->Flash->error(__('The clip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
