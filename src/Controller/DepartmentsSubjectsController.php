<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DepartmentsSubjects Controller
 *
 * @property \App\Model\Table\DepartmentsSubjectsTable $DepartmentsSubjects
 *
 * @method \App\Model\Entity\DepartmentsSubject[] paginate($object = null, array $settings = [])
 */
class DepartmentsSubjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Departments', 'Subjects']
        ];
        $departmentsSubjects = $this->paginate($this->DepartmentsSubjects);

        $this->set(compact('departmentsSubjects'));
        $this->set('_serialize', ['departmentsSubjects']);
    }

    /**
     * View method
     *
     * @param string|null $id Departments Subject id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $departmentsSubject = $this->DepartmentsSubjects->get($id, [
            'contain' => ['Departments', 'Subjects']
        ]);

        $this->set('departmentsSubject', $departmentsSubject);
        $this->set('_serialize', ['departmentsSubject']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {   
        $department_id = $this->request->getData('departments.id') ;
        $subject_id = $this->request->getData('subjects.id');
        $departmentsSubject = $this->DepartmentsSubjects->newEntity();
        if ($this->request->is('post')) {
        $departmentsSubject->subject_id = $subject_id;
        $departmentsSubject->department_id = $department_id;
            $departmentsSubject = $this->DepartmentsSubjects->save($departmentsSubject);
            if ($this->DepartmentsSubjects->save($departmentsSubject)) {
                $this->Flash->success(__('The departments subject has been saved.'));

                return $this->redirect(['controller'=> 'departments','action' => 'index']);
            }
            $this->Flash->error(__('The departments subject could not be saved. Please, try again.'));
        }
        $departments = $this->DepartmentsSubjects->Departments->find('list', ['limit' => 200]);
        $subjects = $this->DepartmentsSubjects->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('departmentsSubject', 'departments', 'subjects'));
        $this->set('_serialize', ['departmentsSubject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Departments Subject id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $departmentsSubject = $this->DepartmentsSubjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $departmentsSubject = $this->DepartmentsSubjects->patchEntity($departmentsSubject, $this->request->getData());
            if ($this->DepartmentsSubjects->save($departmentsSubject)) {
                $this->Flash->success(__('The departments subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The departments subject could not be saved. Please, try again.'));
        }
        $departments = $this->DepartmentsSubjects->Departments->find('list', ['limit' => 200]);
        $subjects = $this->DepartmentsSubjects->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('departmentsSubject', 'departments', 'subjects'));
        $this->set('_serialize', ['departmentsSubject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Departments Subject id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {   
        $department_id = $this->request->params['pass'][0];
        $subject_id = $this->request->params['pass'][1];
        $this->request->allowMethod(['post', 'delete']);
        // $departmentsSubject = $this->DepartmentsSubjects->find()->where(['department_id' => $department_id, 'subject_id' => $subject_id]);
        $departmentsSubject = $this->DepartmentsSubjects->deleteAll(array(['department_id' => $department_id, 'subject_id' => $subject_id]));
        // echo json_encode($departmentsSubject);
        // var_dump($this->DepartmentsSubjects->deleteAll($departmentsSubject));
        if ($departmentsSubject) {
            $this->Flash->success(__('The departments subject has been deleted.'));
        } else {
            $this->Flash->error(__('The departments subject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'departments','action' => 'index']);
    }
}
