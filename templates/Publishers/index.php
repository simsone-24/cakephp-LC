<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Publisher> $publishers
 */
?>
<div class="publishers index content">
    <div class="row author-index   bg-danger text-white pt-3">
        <div class="col-3">
            <h3 class="text-white"><?= __('Publishers') ?></h3>

        </div>
        <div class="name col-2">
            <?= $this->Form->create(null, [
                'type' => 'post',
                'url' => ['controller' => 'Publishers', 'action' => 'record']
            ]) ?>
            <?= $this->form->control('name', [
                'label' => false,
                'placeholder' => 'Search Publisher',
                'class' => 'bg-white name',
                'id' => 'name'

            ]) ?>
        </div>
        <div class="status col-2">
            <?= $this->form->control('status', [
                'label' => false,
                'options' => ['1' => 'Active', '0' => 'In Active'],
                // 'default'=>$field,
                'class' => 'form-select status',
                'id' => 'status',
                'empty' => 'Status'
            ]) ?>
        </div>
        <div class=" col-1">
            <?= $this->Form->button('search', [
                'class' => 'search-btn btn btn-sm text-center btn-dark p-3',
                'id' => 'searchBtn'
            ]) ?>
            <?= $this->Form->end() ?>
        </div>

    </div>

    <?= $this->Html->link(__('New Publisher'), ['action' => 'form'], ['class' => 'button float-right mt-5']) ?>
    <h3 class=""><?= __('Publishers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Image') ?></th>
                    <th><?= $this->Paginator->sort('Name') ?></th>
                    <th><?= $this->Paginator->sort('Email') ?></th>
                    <th><?= $this->Paginator->sort('Address') ?></th>
                    <th><?= $this->Paginator->sort('Status') ?></th>

                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($publishers as $publisher): ?>
                    <tr>
                        <td><img src="<?= $this->url->image($publisher->image) ?>" alt="Publication image" height="50px"></td>
                        <td><?= h($publisher->name) ?></td>
                        <td><?= h($publisher->email) ?></td>
                        <td><?= h($publisher->address) ?></td>
                        <td><?= h($publisher->status) == '1' ? 'active' : 'InActive' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(
                                '<i class="bi bi-eye-fill fs-5 text-white"></i>',
                                ['action' => 'view', $publisher->id],
                                [
                                    'escape' => false,
                                    'class' => 'btn btn-info btn-md px-3 py-1  text-dark',
                                    'title' => 'View Publisher'
                                ]
                            ) ?>
                            <?= $this->Html->link(
                                '<i class="bi bi-pencil-square fs-5 text-white"></i>',
                                ['action' => 'form', $publisher->id],
                                [
                                    'escape' => false,
                                    'class' => 'btn btn-primary btn-md px-3 py-1  text-dark',

                                ]
                            ) ?>
                            <?= $this->Form->postLink(
                                '<i class="bi bi-trash3-fill fs-5 text-white"></i>',
                                ['action' => 'delete', $publisher->id],
                                [
                                    'escape' => false,
                                    'method' => 'delete',
                                    'confirm' => __('Are you sure you want to delete  {0}?', $publisher->name),
                                    'class' => 'btn btn-danger btn-md px-3 py-1  text-white',


                                ]
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>