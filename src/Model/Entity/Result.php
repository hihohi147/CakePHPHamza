<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Result Entity
 *
 * @property int $id
 * @property int $athlete_id
 * @property int $sport_id
 * @property string $medal_color
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Athlete $athlete
 * @property \App\Model\Entity\Sport $sport
 */
class Result extends Entity
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
        'athlete_id' => true,
        'sport_id' => true,
        'medal_color' => true,
        'created' => true,
        'modified' => true,
        'athlete' => true,
        'sport' => true
    ];
}
