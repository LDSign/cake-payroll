<?php
    $this->assign('title', __('Tax calculation'));

    echo $this->Form->create();
    echo $this->Form->input('year', ['label' => 'Jahr', 'options' => [2016 => '2016', 2017 => '2017']]);
    echo $this->Form->input('RE4', ['label' => 'Steuerpflichtiger Arbeitslohn (RE4)', 'type' => 'number']);
    echo $this->Form->input('LZZ', ['label' => 'Lohnzahlungszeitraum (LZZ)', 'type' => 'radio', 'default' => 1, 'options' => [1 => 'Jahr', 2 => 'Monat', 3 => 'Woche', 4 => 'Tag']]);
    echo $this->Form->button(__('Calculate'));
    echo $this->Form->end();

    if (empty($tax)) {
        return;
    }

    pr($tax);
