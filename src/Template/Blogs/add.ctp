<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="blogs form large-9 medium-8 columns content">
    <?= $this->Form->create($blog) ?>
    <fieldset>
        <legend><?= __('Add Blog') ?></legend>
        <?php
            echo $this->Form->control('title');
            // echo $this->Form->control('content');
            echo $this->Form->textarea('content', array('div' => false, 'id' => 'content', 'class' => 'form-control', 'label' => FALSE));


            // echo $this->Froala->plugin();
            echo $this->Form->control('feature');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


<script type="text/javascript" src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
<script type="text/javascript">
    jQuery(function () {
        CKEDITOR.replace('content');
    });
</script>