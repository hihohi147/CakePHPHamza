<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ResultsFixture
 *
 */
class ResultsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'athlete_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sport_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'medal_color' => ['type' => 'string', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'athlete_key' => ['type' => 'index', 'columns' => ['athlete_id'], 'length' => []],
            'sport_key' => ['type' => 'index', 'columns' => ['sport_id'], 'length' => []],
            'medal_key' => ['type' => 'index', 'columns' => ['medal_color'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'results_ibfk_1' => ['type' => 'foreign', 'columns' => ['athlete_id'], 'references' => ['athletes', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'results_ibfk_2' => ['type' => 'foreign', 'columns' => ['sport_id'], 'references' => ['sports', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'results_ibfk_3' => ['type' => 'foreign', 'columns' => ['medal_color'], 'references' => ['medals', 'medal_color'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'athlete_id' => 1,
                'sport_id' => 1,
                'medal_color' => 'Lorem ipsum dolor sit amet',
                'created' => '2018-10-11 16:35:35',
                'modified' => '2018-10-11 16:35:35'
            ],
        ];
        parent::init();
    }
}
