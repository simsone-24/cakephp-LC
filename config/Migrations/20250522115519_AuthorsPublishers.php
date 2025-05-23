<?php
declare(strict_types=1);

use Migrations\BaseMigration;
use Migrations\Db\Action\AddForeignKey;

class AuthorsPublishers extends BaseMigration
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
        $this->table('authors_publishers')
        ->addColumn('author_id','integer')
        ->addColumn('publisher_id','integer')
        ->AddForeignKey('author_id','authors','id',['delete'=>'CASCADE'])
        ->AddForeignKey('publisher_id','publishers','id',['delete'=>'CASCADE'])
        ->addIndex(['author_id','publisher_id'],['unique'=>true])
        ->create();
    }
}
