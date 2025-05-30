<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Book> $books
 */
?>
<div class="books index content">
        <div class="row author-index   bg-danger text-white pt-3">
             <div class="col-3">
            <h3 class="text-white"><?= __('Books') ?></h3>
        </div>
        <div class="name col-2">
            <?= $this->Form->create(null, [
                'type' => 'post',
                'url' => ['controller' => 'Books', 'action' => 'record']
            ]) ?>
            <?= $this->form->control('name', [
                'label' => false,
                'placeholder' => 'Search Name',
                'class'=>'bg-white'
            ]) ?>
        </div>
        <div class="status col-2">
            <?= $this->form->control('status', [
                'label' => false,
                'options' => [ '1' => 'available', '0' => 'not available'],
                // 'default'=>$field,
                'class' => 'form-select',
                'empty' => 'Status'
            ]) ?>
        </div>
        <div class=" col-1">
            <?= $this->Form->button('search', [
                'class' => 'search-btn btn btn-sm text-center btn-dark p-3',
                'id'=>'submit'
            ]) ?>
            <?= $this->Form->end() ?>
        </div>

    </div>
<div class="row mt-5 text-end">
    <div class="col-3 ">
    <?= $this->Html->link(__('New Book'), ['action' => 'form'], ['class' => 'button float-right']) ?>
    </div>
    
    <div class="table-responsive container">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('publish_year') ?></th>
                    <th><?= $this->Paginator->sort('rate') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                    <td><img src="<?= $this->url->image($book->image) ?>" alt="Book Cover" height="50px" ></td>
                    <td><?= h($book->name) ?></td>
                    <td><?= h($book->publish_year) ?></td>
                    <td><?= h($book->rate) ?></td>
                    <td><?= h($book->status=='1'?'Available':'Not Available') ?></td>
                    <td class="actions">
                            <?= $this->Html->link('<i class="bi bi-eye-fill fs-5 text-white"></i>', ['action' => 'view', $book->id], 
                            [
                                'escape' => false,
                                'class' => 'btn btn-info btn-md px-3 py-1  text-dark',
                                'title' => 'View Publisher'
                            ]) ?>
                            <?= $this->Html->link('<i class="bi bi-pencil-square fs-5 text-white"></i>', ['controller'=>'Books','action' => 'form',$book->id],
                            [
                                'escape'=>false,
                                'class' => 'btn btn-primary btn-md px-3 py-1  text-dark',
                                
                            ]) ?>
                            <?= $this->Form->postLink(
                                '<i class="bi bi-trash3-fill fs-5 text-white"></i>',
                                ['action' => 'delete', $book->id],
                                [
                                    'escape'=>false,
                                    'method' => 'delete',
                                    'confirm' => __('Are you sure you want to delete  {0}?', $book->name),
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