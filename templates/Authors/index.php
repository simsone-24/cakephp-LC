<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Author> $authors
 */
?>
<div class="authors index content">
    <?= $this->Html->link(__('New Author'), ['action' => 'form'], ['class' => 'button float-right']) ?>
    <h3><?= __('Authors') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Image') ?></th>
                    <th><?= $this->Paginator->sort('Name') ?></th>
                    <th><?= $this->Paginator->sort('Email') ?></th>
                    <th><?= $this->Paginator->sort('Gender') ?></th>
                    <th><?= $this->Paginator->sort('Status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($authors as $author): ?>
                    <tr>
                        <td><img src="<?= $this->url->image($author->image) ?>" alt="Author image" height="50px"></td>
                        <td><?= h($author->name) ?></td>
                        <td><?= h($author->email) ?></td>
                        <td><?= h($author->gender) ?></td>
                        <td><?= h($author->status) == '1' ? 'active' : 'InActive' ?></td>

                        <td class="actions">
                            <?= $this->Html->link(
                                '<i class="bi bi-eye-fill fs-5 text-white"></i>',
                                ['action' => 'view', $author->id],
                                [
                                    'escape' => false,
                                    'class' => 'btn btn-info btn-md px-3 py-1  text-dark',
                                ]
                            ) ?>
                            <?= $this->Html->link(
                                '<i class="bi bi-pencil-square fs-5 text-white"></i>',
                                ['action' => 'form', $author->id],
                                [
                                    'escape' => false,
                                    'class' => 'btn btn-primary btn-md px-3 py-1  text-dark',
                                ]
                            ) ?>
                            <?= $this->Form->postLink('<i class="bi bi-trash3-fill fs-5 text-white"></i>',
                                ['action' => 'delete', $author->id],
                                [
                                    'method' => 'delete',
                                    'confirm' => __('Are you sure you want to delete # {0}?', $author->id),
                                    'escape' => false,
                                    'class' => 'btn btn-danger btn-md px-3 py-1  text-dark',
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