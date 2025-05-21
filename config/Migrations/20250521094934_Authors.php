<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class Authors extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
         $this->table('authors')
            ->addColumn('name', 'string', ['limit' => 50])
            ->addColumn('email', 'string', ['limit' => 100])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime') 
            ->addColumn('deleted', 'datetime', ['null' => true])
            ->create();
    }
}
