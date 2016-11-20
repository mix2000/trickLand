<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 17.10.2016
 * Time: 13:44
 */
?>

<div class="row marketing">
    <div class="col-lg-12">
        <form action="<?=HTTP_PATH;?>/visit/index" method="get">
            <?= labels::getDate('date', $a = (isset($_GET['date'])) ? $_GET['date'] : ''); ?>
            <input type="submit" value="Получить данные" name="submit">
        </form>


        <? if (isset($info['sale']) and count($info['sale']) > 0) { ?>
            <!--<h3>Посещаемость на <?/*= $_GET['date'] */?></h3>-->

            <?
            $mainId = '';
            foreach ($info['sale'] as $value) {
                if ($mainId == '' or $mainId != $value['trainingId']) {
                    if($mainId!=''){
                        ?>
                        </table>
                        <?
                    }
                    $mainId = $value['trainingId'];
                    ?>
                    <h3>Тренер - <?=$value['trainerName']?> -
                    <?= labels::getValue([
                             ['value' => 1, 'name' => 'Индивидуальное занятие'],
                            ['value' => 2, 'name' => 'Групповое занятие'],
                        ], $value['training_type']); ?>
                    </h3>
                    <table class="table table-responsive table-hover">
                    <thead>
                    <tr>
                        <th>Пользователь</th>
                        <th>Тип</th>
                    </tr>
                    </thead>
                    <?
                }
                ?>
                <tr>
                    <td><?= $value['saleMan']; ?></td>
                    <td><?= labels::getValue([
                            ['value' => 1, 'name' => 'Абонемент'],
                            ['value' => 2, 'name' => 'Разовое занятие'],
                        ], $value['typeName']); ?>
                    </td>
                </tr>
            <? } ?>
            </table>
        <? } ?>
    </div>

</div>

