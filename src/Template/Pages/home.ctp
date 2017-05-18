<?php


$this->layout = false;
$cakeDescription = 'Dashboard';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $cakeDescription ?></a></h1>
            </li>
        </ul>
        
    </nav>
    <?= $this->Flash->render() ?>
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
        <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('Departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Sliders'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Blog'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>

        </ul>
    </nav>
    <div class="departments form large-9 medium-8 columns content">
        
    </div>
    <footer>
    </footer>
</body>
</html>
