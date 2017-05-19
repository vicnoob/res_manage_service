<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DepartmentsSubject Entity
 *
 * @property int $department_id
 * @property int $subject_id
 *
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Subject $subject
 */
class DepartmentsSubject extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'department_id' => false,
        'subject_id' => false
    ];
}
