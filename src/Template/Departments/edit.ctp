<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $department->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $department->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Departments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $department->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $department->id)]
            )
        ?>
<div class="departments form large-9 medium-8 columns content">

    <?= $this->Form->create($department) ?>
    <fieldset>
        <legend><?= __('Edit Department') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('subjects._ids', ['options' => $subjects]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
