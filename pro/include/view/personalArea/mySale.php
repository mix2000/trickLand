<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 14.11.2016
 * Time: 2:40
 */
?>

<div class="row my-sale">
    <table class="table table-responsive">
        <thead>
        <tr>
            <td>Дата оплаты</td>
            <td>Тип оплаты</td>
            <td>Стоимость услуги</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($info['payData'] as $value) { ?>
            <tr>
                <td><?= $value['date_at'] ?></td>
                <td><?= $value['typeName'] ?></td>
                <td><?= $value['sale'] ?> р.</td>
            </tr>
        <? } ?>
        </tbody>
    </table>
</div>

