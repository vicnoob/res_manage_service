<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Clip'), ['action' => 'edit', $clip->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Clip'), ['action' => 'delete', $clip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clip->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clips'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clip'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clips view large-9 medium-8 columns content">
    <h3><?= h($clip->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($clip->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dir') ?></th>
            <td><?= h($clip->dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subject') ?></th>
            <td><?= $clip->has('subject') ? $this->Html->link($clip->subject->name, ['controller' => 'Subjects', 'action' => 'view', $clip->subject->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($clip->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($clip->created) ?></td>
        </tr>
    </table>
</div>
