<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Winner $winner
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Winner'), ['action' => 'edit', $winner->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Winner'), ['action' => 'delete', $winner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $winner->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Winners'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Winner'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="winners view large-9 medium-8 columns content">
    <h3><?= h($winner->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Country Name') ?></th>
            <td><?= h($winner->country_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Host') ?></th>
            <td><?= h($winner->host) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($winner->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Medal Number') ?></th>
            <td><?= $this->Number->format($winner->medal_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= h($winner->year) ?></td>
        </tr>
    </table>
</div>
