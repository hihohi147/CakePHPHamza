<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Winner $winner
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Winners'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="winners form large-9 medium-8 columns content">
    <?= $this->Form->create($winner) ?>
    <fieldset>
        <legend><?= __('Add Winner') ?></legend>
        <?php
		
		 
            echo $this->Form->control('country_name');
            echo $this->Form->control('host');
            echo $this->Form->control('year');
            echo $this->Form->control('medal_number');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
