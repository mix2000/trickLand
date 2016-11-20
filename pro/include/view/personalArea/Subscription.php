<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 14.11.2016
 * Time: 3:11
 */ ?>

<div class="row personal-area-subscription">
    <h3><?= $info['info'] ?></h3>
    <? if (isset($info['dateStart'])) { ?>
        <p>Дата покупки абонемента: <?= $info['dateStart']; ?></p>
        <p>Дата окончания абонемента: <?= $info['dateFinal']; ?></p>
    <? } ?>
    <? if (count($info['visit']) > 0) { ?>
        <h3>
            Даты посещений:
        </h3>
        <? foreach ($info['visit'] as $date) { ?>
            <p><?= $date ?></p>
        <? } ?>

    <? } ?>
    <? if (isset($info['dateStart'])) { ?>
        <h3>
            Осталось посещений:
            <?= $info['countVisitLimit']; ?>
        </h3>
    <? } ?>
</div>
