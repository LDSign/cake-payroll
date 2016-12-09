<?php
$this->assign('title', __('Tax calculation'));
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Calculate taxes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Calculate social insurance'), ['action' => 'index']) ?></li>
    </ul>
</nav>

<div class="taxes form large-5 medium-4 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Calculate taxes') ?></legend>
        <?php
        echo $this->Form->input('year', ['label' => 'Year', 'options' => [2016 => '2016', 2017 => '2017']]);
        echo $this->Form->input('RE4', ['label' => "Taxable employee's wages (RE4)", 'type' => 'number']);
        echo $this->Form->input('LZZ', ['label' => 'Period (LZZ)', 'type' => 'radio', 'default' => 1, 'options' => [1 => 'Year', 2 => 'Month', 3 => 'Week', 4 => 'Day']]);

        echo $this->Form->button(__('Calculate'));
        ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>

<div class="taxes large-4 medium-4 columns content">
    <fieldset>
        <legend><?= __('Results') ?></legend>
    <?php
    if (!empty($tax)) {
        echo '<table>';

        foreach ($tax as $key => $value) {
            echo '<tr>';
            echo '<td><strong>'.$key.'</strong><td>';
            echo '<td>'.$value.'</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
    ?>
    </fieldset>
</div>
