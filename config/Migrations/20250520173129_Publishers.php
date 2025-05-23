<?php

declare(strict_types=1);

use Migrations\BaseMigration;

class Publishers extends BaseMigration
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
        $this->table('publishers')
            ->addColumn('name', 'string', ['limit' => 50])
            ->addColumn('email', 'string', ['limit' => 100])
            ->addColumn('address', 'string', ['limit' => 100])
            ->addColumn('author_id', 'integer')
            ->addColumn('created', 'datetime',['null' => true])
            ->addColumn('modified', 'datetime')
            ->addColumn('deleted', 'datetime', ['null' => true])
            // ->addForeignKey('author_id', 'authors', 'id', ['delete' => 'CASCADE'])
            ->create();
    }
}
