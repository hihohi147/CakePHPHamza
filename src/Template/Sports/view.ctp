<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sport $sport
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sport'), ['action' => 'edit', $sport->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sport'), ['action' => 'delete', $sport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sport->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sports'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sport'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Results'), ['controller' => 'Results', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Result'), ['controller' => 'Results', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sports view large-9 medium-8 columns content">
    <h3><?= h($sport->sport_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sport Name') ?></th>
            <td><?= h($sport->sport_name) ?></td>
        </tr>
        <tr>
		<p hidden><?= $this->Number->format($sport->id) ?></p>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sport->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sport->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Results') ?></h4>
        <?php if (!empty($sport->results)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
               
             
                <th scope="col"><?= __('Medal Color') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sport->results as $results): ?>
            <tr>
                <p hidden><?= h($results->id) ?></p>
                <p hidden><?= h($results->athlete) ?></p>
                <p hidden><?= h($results->sport) ?></p>
                <td><?= h($results->medal_color) ?></td>
                <td><?= h($results->created) ?></td>
                <td><?= h($results->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Results', 'action' => 'view', $results->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Results', 'action' => 'edit', $results->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Results', 'action' => 'delete', $results->id], ['confirm' => __('Are you sure you want to delete # {0}?', $results->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
