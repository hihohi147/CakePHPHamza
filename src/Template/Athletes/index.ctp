<?php
$urlToAthletesAutocompletedemoJson = $this->Url->build([
    "controller" => "Athletes",
    "action" => "findAthletes",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToAthletesAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('Athletes/autocomplete', ['block' => 'scriptBottom']);
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Result[]|\Cake\Collection\CollectionInterface $results
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Athlete'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Winners'), ['controller' => 'Winners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Winner'), ['controller' => 'Winners', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Results'), ['controller' => 'Results', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Result'), ['controller' => 'Results', 'action' => 'add']) ?></li>
		 <li><?= $this->Html->link(__('List Sports'), ['controller' => 'Sports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sport'), ['controller' => 'Sports', 'action' => 'add']) ?></li>
		 <li><?= $this->Html->link(__('List File'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
		  <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New city'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articles index large-9 medium-8 columns content">

<table>
    <tr>
        <th><? echo __('First Name')?></th>
        <th><? echo __('Last Name')?></th>
        <th><? echo __('Gender')?></th>
     
        <th><? echo __('Birth date')?> </th>
        <th><? echo __('Created')?></th>
        <th><? echo __('Action')?></th>
    </tr>

    <!-- Here is where we iterate through our $athletes query object, printing out article info -->

    <?php foreach ($athletes as $athlete): ?>
	
    <tr>
        <td>
            <?= $this->Html->link($athlete->first_name, ['action' => 'view', $athlete->slug]) ?>
        </td>
        <td>
            <?= $athlete->last_name?>
        </td>    
        <td>
		<? if ($athlete->gender == 1) {
    $gender = "M";
} else {
    $gender = "F";
}
?>
		<? echo
		 $gender
            ?>
        </td>    
        
        <td>
            <?= $athlete->birth_date->format("Y/m/d") ?>
        </td>
        <td>
            <?= $athlete->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $athlete->slug]) ?>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $athlete->slug],
                ['confirm' => 'Are you sure?'])
            ?>
        </td>
        
    </tr>
    <?php endforeach; ?>

</table>
</div>

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

