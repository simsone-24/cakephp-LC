<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AuthorsFixture
 */
class AuthorsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-05-21 09:54:54',
                'modified' => '2025-05-21 09:54:54',
                'deleted' => '2025-05-21 09:54:54',
            ],
        ];
        parent::init();
    }
}
