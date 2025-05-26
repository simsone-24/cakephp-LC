<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */

use function PHPSTORM_META\type;

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Books'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="books  content">
        </div>
    </div>
</div>