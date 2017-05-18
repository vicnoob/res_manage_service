<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $clip->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $clip->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Clips'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clips form large-9 medium-8 columns content">
    <?= $this->Form->create($clip) ?>
    <fieldset>
        <legend><?= __('Edit Clip') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('dir');
            echo $this->Form->control('subject_id', ['options' => $subjects]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
