<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Athlete $athlete
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Athlete'), ['action' => 'edit', $athlete->slug]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Athlete'), ['action' => 'delete', $athlete->slug], ['confirm' => __('Are you sure you want to delete # {0}?', $athlete->slug)]) ?> </li>
        <li><?= $this->Html->link(__('List Athletes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Athlete'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="athletes view large-9 medium-8 columns content">
    <h3><?= h($athlete->first_name ." ". $athlete->last_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($athlete->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($athlete->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
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
        </tr>
    
      
        <tr>
            <th scope="row"><?= __('Birth Date') ?></th>
            <td><?= h($athlete->birth_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($athlete->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($athlete->modified) ?></td>
        </tr>
    </table>
    <div class="related">
       
        <?php if (!empty($athlete->tags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
          
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($athlete->tags as $tags): ?>
            <tr>
                
                <td><?= h($tags->title) ?></td>
                <td><?= h($tags->last_name) ?></td>
                <td><?= h($tags->created) ?></td>
                <td><?= h($tags->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tags', 'action' => 'view', $tags->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tags', 'action' => 'edit', $tags->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tags', 'action' => 'delete', $tags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tags->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
