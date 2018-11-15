<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Athlete Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property \Cake\I18n\FrozenDate $birth_date
 * @property string $slug
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $city_id
 *
 * @property \App\Model\Entity\Tag[] $tags
 */
class Athlete extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'gender' => true,
        'birth_date' => true,
        'slug' => true,
        'created' => true,
        'modified' => true,
        'city_id' => true,
        'tags' => true
    ];
}
