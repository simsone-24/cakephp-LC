<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersHistoryTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersHistoryTable Test Case
 */
class UsersHistoryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersHistoryTable
     */
    protected $UsersHistory;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.UsersHistory',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UsersHistory') ? [] : ['className' => UsersHistoryTable::class];
        $this->UsersHistory = $this->getTableLocator()->get('UsersHistory', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UsersHistory);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UsersHistoryTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
