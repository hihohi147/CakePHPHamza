<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Athletes'), ['controller' => 'Athletes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Athlete'), ['controller' => 'Athletes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tags view large-9 medium-8 columns content">
    <h3><?= h($tag->last_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($tag->last_name) ?></td>
        </tr>
        <tr>
           <p hidden><?= __('Id') ?></p>
             <p hidden><?= $this->Number->format($tag->id) ?></p>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tag->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tag->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Athletes') ?></h4>
        <?php if (!empty($tag->athletes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <p hidden><?= __('Id') ?></p>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Birth Date') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
            
            </tr>
            <?php foreach ($tag->athletes as $athletes): ?>
            <tr>
               <p hidden><?= h($athletes->id) ?></p>
                <td><?= h($athletes->first_name) ?></td>
                <td><?= h($athletes->last_name) ?></td>
                <td><?= h($athletes->gender) ?></td>
                <td><?= h($athletes->birth_date) ?></td>
                <td><?= h($athletes->slug) ?></td>
                <td><?= h($athletes->created) ?></td>
                <td><?= h($athletes->modified) ?></td>
               
     
               
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
