<h1>
    Athletes tagged with
    <?= $this->Text->toList(h($tags), 'or') ?>
</h1>

<section>
<?php foreach ($athletes as $athlete): ?>
    <athlete>
        <!-- Use the HtmlHelper to create a link -->
        <h4><?= $this->Html->link(
            $athlete->last_name,
            ['controller' => 'Athletes', 'action' => 'view', $athlete->slug]
        ) ?></h4>
        <span><?= h($athlete->created) ?>
    </athlete>
<?php endforeach; ?>
</section>