<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Departments Controller
 *
 * @property \App\Model\Table\DepartmentsTable $Departments
 *
 * @method \App\Model\Entity\Department[] paginate($object = null, array $settings = [])
 */
class DepartmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $departments = $this->paginate($this->Departments->find('all',array(
            'contain'=>array('Subjects'))));
        $a = json_encode($departments);
        // echo $a;
        // $this->add();
        $subjects = $this->Departments->Subjects->find('list', ['limit' => 200]);
        $id=$this->request->data('id');
        $this->set(compact('departments', 'subjects'));
        $this->set('_serialize', ['departments']);


    }

    /**
     * View method
     *
     * @param string|null $id Department id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $department = $this->Departments->get($id, [
            'contain' => ['Subjects']
        ]);
        $this->set('department', $department);
        $this->set('_serialize', ['department']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $department = $this->Departments->newEntity();
        if ($this->request->is('post')) {
            $department = $this->Departments->patchEntity($department, $this->request->getData());
            if ($this->Departments->save($department)) {
                $this->Flash->success(__('The department has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The department could not be saved. Please, try again.'));
        }
        $subjects = $this->Departments->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('department', 'subjects'));
        $this->set('_serialize', ['department']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Department id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $department = $this->Departments->get($id, [
            'contain' => ['Subjects']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $department = $this->Departments->patchEntity($department, $this->request->getData());
            if ($this->Departments->save($department)) {
                $this->Flash->success(__('The department has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The department could not be saved. Please, try again.'));
        }
        $subjects = $this->Departments->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('department', 'subjects'));
        $this->set('_serialize', ['department']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Department id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $department = $this->Departments->get($id);
        if ($this->Departments->delete($department)) {
            $this->Flash->success(__('The department has been deleted.'));
        } else {
            $this->Flash->error(__('The department could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

     public function deleteTag($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $department = $this->Departments->get($id);
        $department = $this->Departments->find()->where(['Department_id' => '4','Subject_id'=>'6']);
        echo json_encode($department);
        $options = array(
            'conditions' => array(
                'Bookmark_id = id',
                'Subject_id = id1',
            ),
        );
        
        $data = $this->Departments_Bookmarks->find('all', $options);
        echo $department;
        if ($this->Departments->Subjects->delete($department)) {
            $this->Flash->success(__('The department has been deleted.'));
        } else {
            $this->Flash->error(__('The department could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
