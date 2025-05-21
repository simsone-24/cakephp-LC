<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BooksFixture
 */
class BooksFixture extends TestFixture
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
                'year' => 'Lorem ipsum dolor sit amet',
                'rate' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-05-21 10:04:12',
                'modified' => '2025-05-21 10:04:12',
                'deleted' => '2025-05-21 10:04:12',
            ],
        ];
        parent::init();
    }
}
