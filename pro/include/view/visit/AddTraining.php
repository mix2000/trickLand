<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 16.11.2016
 * Time: 13:10
 */
?>

<div class="row marketing">
    <div class="col-lg-12">
        <form action="<?=HTTP_PATH;?>/visit/saveTraining" method="post">
            <table class="table table-responsive table-hover">
                <tbody>
                <tr>
                    <td><label for="training_type">Тип тренировки</label></td>
                    <td>
                        <?= labels::getSelect([
                            ['value' => 1, 'name' => 'Индивидуальное занятие'],
                            ['value' => 2, 'name' => 'Групповое занятие'],
                        ], 'training_type', $info['data']['training_type']); ?>
                    </td>

                </tr>
                <tr>
                    <td><label for="date">Дата и время проведения</label></td>
                    <td><input type="datetime-local" name="date" value="<?= $info['data']['dateLabel']; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" class="btn btn-success" name="submit">
                        <?= labels::getHidden($info['data']['id'], 'red'); ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>

    </div>
</div>
