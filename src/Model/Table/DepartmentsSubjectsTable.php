<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DepartmentsSubjects Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Departments
 * @property \Cake\ORM\Association\BelongsTo $Subjects
 *
 * @method \App\Model\Entity\DepartmentsSubject get($primaryKey, $options = [])
 * @method \App\Model\Entity\DepartmentsSubject newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DepartmentsSubject[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentsSubject|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DepartmentsSubject patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentsSubject[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DepartmentsSubject findOrCreate($search, callable $callback = null, $options = [])
 */
class DepartmentsSubjectsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('departments_subjects');
        $this->setDisplayField('department_id');
        $this->setPrimaryKey(['department_id', 'subject_id']);

        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Subjects', [
            'foreignKey' => 'subject_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['department_id'], 'Departments'));
        $rules->add($rules->existsIn(['subject_id'], 'Subjects'));

        return $rules;
    }
}
