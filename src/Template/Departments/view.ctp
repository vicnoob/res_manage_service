<?php
/**
  * @var \App\View\AppView $this
  */
?>

</nav>
<div class="departments view large-9 medium-8 columns content">
    <h3><?= h($department->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($department->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($department->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($department->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($department->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Subjects') ?></h4>
        <?php if (!empty($department->subjects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Modified') ?></th> 
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($department->subjects as $subjects): ?>
            <tr>
                <td><?= h($subjects->id) ?></td>
                <td><?= h($subjects->name) ?></td>
                <td><?= h($subjects->description) ?></td>
                <td><?= h($subjects->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Subjects', 'action' => 'view', $subjects->id]) ?>
                    <?php echo $subjects->id; ?>
                    <?php echo $department->id; ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Subjects', 'action' => 'edit', $subjects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DepartmentsSubjects', 'action' => 'delete', $department->id, $subjects->id],['confirm' => __('Are you sure you want to delete subject '. $subjects->name)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
