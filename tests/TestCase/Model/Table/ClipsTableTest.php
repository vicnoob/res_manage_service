<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClipsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClipsTable Test Case
 */
class ClipsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClipsTable
     */
    public $Clips;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clips',
        'app.subjects',
        'app.images',
        'app.departments',
        'app.departments_subjects'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Clips') ? [] : ['className' => 'App\Model\Table\ClipsTable'];
        $this->Clips = TableRegistry::get('Clips', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Clips);

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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
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
