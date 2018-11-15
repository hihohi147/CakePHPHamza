<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Athlete $athlete
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $athlete->slug],
                ['confirm' => __('Are you sure you want to delete # {0}?', $athlete->slug)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Athletes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="athletes form large-9 medium-8 columns content">
    <?= $this->Form->create($athlete) ?>
    <fieldset>
        <legend><?= __('Edit Athlete') ?></legend>
        <?php
		$gender = ['1'=>'M','0'=>'F'];
		
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
           echo $this->Form->control('gender', ['options'=>$gender, 'value'=>$athlete->gender]);
            echo $this->Form->control('birth_date');
          
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
