<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AthletesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AthletesTable Test Case
 */
class AthletesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AthletesTable
     */
    public $Athletes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.athletes',
        'app.tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Athletes') ? [] : ['className' => AthletesTable::class];
        $this->Athletes = TableRegistry::getTableLocator()->get('Athletes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Athletes);

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
     * Test beforeSave method
     *
     * @return void
     */
    public function testBeforeSave()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findTagged method
     *
     * @return void
     */
    public function testFindTagged()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
