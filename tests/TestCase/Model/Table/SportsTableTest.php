<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SportsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * App\Model\Table\SportsTable Test Case
 */
class SportsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SportsTable
     */
    public $Sports;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sports',
        'app.results'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Sports') ? [] : ['className' => SportsTable::class];
        $this->Sports = TableRegistry::getTableLocator()->get('Sports', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sports);

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
	
	 public function testSaving() {
        $data = [
          'id' => 3,
                'name' => 'Test Sport Name3',
                'created' => '2018-10-11 16:35:35',
                'modified' => '2018-10-11 16:35:35'
        ];
        $sport = $this->Sports->newEntity($data);
        $countBeforeSave = $this->Sports->find()->count();
        $this->Sports->save($sport);
        $countAfterSave = $this->Sports->find()->count();
        $this->assertEquals($countAfterSave, $countBeforeSave + 1);
    }
	
    public function testEditing() {
        $sportBeforeSave = $this->Sports->find('all', ['conditions' => ['name' => 'Test Sport Name2']])->first();
        $id = $sportBeforeSave->id;
        $sportBeforeSave->name = 'BasketBall';
        $this->Sports->save($sportBeforeSave);
        $sportAfterSave = $this->Sports->find('all', ['conditions' => ['id' => $id]])->first();
        $this->assertEquals('BasketBall', $sportAfterSave->name);
    }
	
    public function testDeleting() {
        $countBeforeDelete = $this->Sports->find()->count();
        $sport = $this->Sports->find()->first();
        $this->Sports->delete($sport);
        $countAfterDelete = $this->Sports->find()->count();
        $this->assertEquals($countAfterDelete, $countBeforeDelete - 1);
    }
	

}
