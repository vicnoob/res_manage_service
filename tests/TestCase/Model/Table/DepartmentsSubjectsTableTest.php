<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepartmentsSubjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepartmentsSubjectsTable Test Case
 */
class DepartmentsSubjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DepartmentsSubjectsTable
     */
    public $DepartmentsSubjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.departments_subjects',
        'app.departments',
        'app.subjects',
        'app.clips',
        'app.images'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DepartmentsSubjects') ? [] : ['className' => 'App\Model\Table\DepartmentsSubjectsTable'];
        $this->DepartmentsSubjects = TableRegistry::get('DepartmentsSubjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DepartmentsSubjects);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
