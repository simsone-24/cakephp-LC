<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Publisher Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $address
 * @property \Cake\I18n\DateTime $created_at
 * @property \Cake\I18n\DateTime $modified_at
 * @property \Cake\I18n\DateTime|null $deleted_at
 */
class Publisher extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'image'=>true,
        'name' => true,
        'email' => true,
        'address' => true,
        'status'=>true,
        'author_id'=>true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
    ];
}
