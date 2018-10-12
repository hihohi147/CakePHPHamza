<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Winners Model
 *
 * @method \App\Model\Entity\Winner get($primaryKey, $options = [])
 * @method \App\Model\Entity\Winner newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Winner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Winner|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Winner|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Winner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Winner[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Winner findOrCreate($search, callable $callback = null, $options = [])
 */
class WinnersTable extends Table
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

        $this->setTable('winners');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
		
		$this->addBehavior('Translate', ['fields' => ['country_name', 'host']]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('country_name')
            ->maxLength('country_name', 20)
            ->requirePresence('country_name', 'create')
            ->notEmpty('country_name');

        $validator
            ->scalar('host')
            ->maxLength('host', 20)
            ->requirePresence('host', 'create')
            ->notEmpty('host');

        $validator
            ->date('year')
            ->requirePresence('year', 'create')
            ->notEmpty('year');

        $validator
            ->integer('medal_number')
            ->requirePresence('medal_number', 'create')
            ->notEmpty('medal_number');

        return $validator;
    }
}
