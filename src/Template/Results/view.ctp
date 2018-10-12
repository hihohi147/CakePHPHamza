<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Result $result
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Result'), ['action' => 'edit', $result->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Result'), ['action' => 'delete', $result->id], ['confirm' => __('Are you sure you want to delete # {0}?', $result->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Results'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Result'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Athletes'), ['controller' => 'Athletes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Athlete'), ['controller' => 'Athletes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sports'), ['controller' => 'Sports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sport'), ['controller' => 'Sports', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="results view large-9 medium-8 columns content">
    <h3><?= h($result->medal_color) ." ". h($result->athlete->last_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Athlete') ?></th>
            <td><?= $result->has('athlete') ? $this->Html->link($result->athlete->last_name, ['controller' => 'Athletes', 'action' => 'view', $result->athlete->slug]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sport') ?></th>
            <td><?= $result->has('sport') ? $this->Html->link($result->sport->sport_name, ['controller' => 'Sports', 'action' => 'view', $result->sport->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Medal Color') ?></th>
            <td><?= h($result->medal_color) ?></td>
        </tr>
       
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($result->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($result->modified) ?></td>
        </tr>
    </table>
</div>
