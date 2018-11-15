<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SportsController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\SportsController Test Case
 */
class SportsControllerTest extends IntegrationTestCase
{
	 public $AuthAdmin;
     public $User;
	  public $Sports;
    public function setUp()
    {
        parent::setUp();
        $this->Sports = TableRegistry::get('Sports');
        $usersTable = TableRegistry::get('Users');
        $userAdmin = $usersTable->find('all', ['conditions' => ['Users.email1' => 'admin@gmail.com']])->first()->toArray();
        $User = $usersTable->find('all', ['conditions' => ['Users.email1' => 'user@gmail.com']])->first()->toArray();
        $this->AuthAdmin = [
            'Auth' => [
                'User' => $userAdmin
            ]
        ];
        $this->User = [
            'Auth' => [
                'User' => $User
            ]
        ];
    }
	
	 public function tearDown()
    {
        unset($this->AuthAdmin);
        unset($this->User);
        unset($this->Sports);
        parent::tearDown();
    }


    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sports',
        'app.results'
    ];
	
	   public function testIsAuthorized()
    {
        $this->session($this->AuthSuper);
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->delete('/sports/delete/1');
        $this->assertResponseSuccess();
    }


    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
	
	

    /**
     * Test view method
     *
     * @return void
     */
	
	 public function testView()
    {
        $this->session($this->AuthAdmin);
        $this->get('/sports/view/1');
        $this->assertResponseContains('Test Sport Name');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
         $this->session($this->AuthAdmin);
        $this->get('/sports/add');
        $this->assertResponseOk();
        $data = [
            'id' => 2,
                'name' => 'Test Sport Name',
                'created' => null,
                'modified' => null
        ];
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/sports/add', $data);
        $this->assertResponseSuccess();
        $query = $this->Sports->find('all', ['conditions' => ['Sports.id' => $data['id']]]);
        $this->assertNotEmpty($query);
    }


    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
          $this->session($this->AuthAdmin);
        $newName = 'Test Sport Edit';
        $sport = $this->Sports->find('all')->first();
        $sport->name = $newName;
        $sportId = $sport->id;
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/sports/edit/' . $sportId, $sport->toArray());
        $this->assertResponseSuccess();
        $query = $this->Sports->find('all', ['conditions' => ['Sports.id' => $sportId]])->first();
        $this->assertEquals($newName, $query->name);
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->session($this->AuthAdmin);
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->delete('/sports/delete/1');
        $this->assertResponseSuccess();
        $query = $this->Sports->find('all', ['conditions' => ['Sports.id' => 1]])->first();
        $this->assertEmpty($query);
    }
}
