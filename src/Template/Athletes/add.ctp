<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "cities",
    "action" => "getByCountry",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Athletes/add', ['block' => 'scriptBottom']);
?>


<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Athlete $athlete
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Athletes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="athletes form large-9 medium-8 columns content">
    <?= $this->Form->create($athlete) ?>
    <fieldset>
        <legend><?= __('Add Athlete') ?></legend>
        <?php
		  $gender = ['1'=>'M','0'=>'F'];
		   echo $this->Form->control('country_id', ['options' => $countries]);
        echo $this->Form->control('city_id', ['options' => $cities]);
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('gender', ['options'=>$gender, 'value'=>'M']);
           echo $this->Form->input('birth_date', array('dateFormat'=>'DMY', 'minYear'=>date('Y')-80, 'maxYear'=>date('Y')-15+1));
           
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
