<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Winner Entity
 *
 * @property int $id
 * @property string $country_name
 * @property string $host
 * @property \Cake\I18n\FrozenDate $year
 * @property int $medal_number
 */
class Winner extends Entity
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
        'country_name' => true,
        'host' => true,
        'year' => true,
        'medal_number' => true
    ];
}
