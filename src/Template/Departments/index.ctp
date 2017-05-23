<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Department'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="departments index large-9 medium-8 columns content">
    <h3><?= __('Departments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($departments as $department): ?>
            <tr>
                <td><?= $this->Number->format($department->id) ?></td>
                <td><?= h($department->name) ?></td>
                <td><?= h($department->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $department->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $department->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $department->id], ['confirm' => __('Are you sure you want to delete # {0}?', $department->id)]) ?>
                </td>
                
                

            </tr>
            <?php foreach($department['subjects'] as $subject): ?>

                    <tr>
                    <td> </td>
                    <td> <?= $subject['name'] ?> </td>
                    <td> <?= $subject['description'] ?> </td>
                    
                    <td > <?= $this->Form->postLink(__('Delete'), ['controller' => 'DepartmentsSubjects', 'action' => 'delete', $department['id'], $subject->id],['confirm' => __('Are you sure you want to delete subject '. $subject->name)]) ?> </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                <td colspan="3"> 
                    <?= $this->Form->create(null,['url' => ['controller' => 'DepartmentsSubjects', 'action' => 'add' ] ] ) ?>
                    <fieldset>
                        <?php
                            echo $this->form->hidden('departments.id', ['default' => $department->id]);
                            echo $this->Form->control('subjects.id', ['options' => $subjects]);
                        ?>
                    </fieldset>
                    <td>
                    <?= $this->Form->button(__('Add')) ?>
                    </td>
                    <?= $this->Form->end() ?>
                </td>
                 </tr> 
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
    <div class="departments form large-9 medium-8 columns content">
    <!-- $this->Form->create("Post",array('action'=>'add')); -->
        <?= $this->Form->create(null,['url' => ['action' => 'add']] ) ?>
        <fieldset>
            <legend><?= __('Add Department') ?></legend>
            <?php
                echo $this->Form->control('name');
                echo $this->Form->control('description');
                echo $this->Form->control('subjects._ids', ['options' => $subjects]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
