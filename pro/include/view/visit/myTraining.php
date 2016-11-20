<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 18.11.2016
 * Time: 3:22
 */

?>
<div class="row marketing visit-my-training">
    <div class="col-lg-12">
        <table class="table table-responsive table-hover">
            <thead>
            <tr>
                <td>Дата</td>
                <td>Тип</td>
                <td>Количество человек</td>
                <td>Редактировать</td>
            </tr>
            </thead>
            <tbody>
            <? foreach ($info['training'] as $value) { ?>
                <tr>
                    <td><?= $value['date'] ?></td>
                    <td><?= labels::getValue([
                            ['value' => 1, 'name' => 'Индивидуальное занятие'],
                            ['value' => 2, 'name' => 'Групповое занятие'],
                        ], $value['training_type']); ?>
                    </td>
                    <td><?= $value['countUser'] ?></td>
                    <td>
                        <a href="<?=HTTP_PATH;?>/visit/add?red=<?= $value['id'] ?>" class="btn btn-default">Ученики</a>
                        <a href="<?=HTTP_PATH;?>/visit/addTraining?red=<?= $value['id'] ?>" class="btn btn-default">Занятие</a>
                    </td>
                </tr>
            <? } ?>
            </tbody>
        </table>
    </div>
</div>
