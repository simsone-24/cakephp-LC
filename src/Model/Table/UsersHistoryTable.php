<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsersHistory Model
 *
 * @method \App\Model\Entity\UsersHistory newEmptyEntity()
 * @method \App\Model\Entity\UsersHistory newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\UsersHistory> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsersHistory get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\UsersHistory findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\UsersHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\UsersHistory> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsersHistory|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\UsersHistory saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\UsersHistory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsersHistory>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UsersHistory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsersHistory> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UsersHistory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsersHistory>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\UsersHistory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\UsersHistory> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UsersHistoryTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users_history');
        $this->setDisplayField('email');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->dateTime('time')
            ->requirePresence('time', 'create')
            ->notEmptyDateTime('time');

        return $validator;
    }
}
