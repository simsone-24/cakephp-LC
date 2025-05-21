<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PublishersFixture
 */
class PublishersFixture extends TestFixture
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
                'address' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2025-05-21 05:50:15',
                'modified_at' => '2025-05-21 05:50:15',
                'deleted_at' => '2025-05-21 05:50:15',
            ],
        ];
        parent::init();
    }
}
