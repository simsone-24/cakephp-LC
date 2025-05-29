<?php

declare(strict_types=1);

use Migrations\BaseMigration;

class Users extends BaseMigration
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
        $this->table('users')
            ->addColumn('name', 'string')
            ->addColumn('email', 'string')
            ->addColumn('password', 'string')
            ->addColumn('created', 'datetime', ['null' => true])
            ->addColumn('modified', 'datetime')
            ->addColumn('deleted', 'datetime', ['null' => true])
            ->addIndex(['email'],['unique'=>true])
            ->create();
    }
}
