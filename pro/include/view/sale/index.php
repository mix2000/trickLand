<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 17.10.2016
 * Time: 1:06
 */

?>

<div class="row marketing">
    <div class="col-lg-12">
        <form action="<?=HTTP_PATH;?>/sale/index" method="get">
            <?=labels::getDate('date',$a = (isset($_GET['date']))?$_GET['date']:'');?>
            <select name="dateType" id="dateType">
                <option value="1">День</option>
                <option value="2">Месяц</option>
                <option value="3">Год</option>
            </select>
            <input type="submit" value="Получить данные" name="submit">
        </form>
        <table class="table table-responsive table-hover">
            <thead>
            <tr>
                <th>Дата</th>
                <th>Тип платежа</th>
                <th>Сумма</th>
                <th>Внес</th>
                <th>Пользователь</th>
                <th>-</th>
                <th>-</th>
            </tr>
            </thead>
            <? foreach ($info['sale'] as $value) { ?>

                <tr>
                    <td><?= $value['date_at'] ?></td>
                    <td><?= $value['typeName'] ?></td>
                    <td><?= $value['sale'] ?></td> 
                    <td><?= $value['enterMan'] ?></td>
                    <td><?= $value['saleMan'] ?></td>
                    <td><a class="btn btn-success" href="<?=HTTP_PATH;?>/sale/redact?red=<?= $value['id'] ?>">Подробнее</a></td>
                    <td><a class="btn btn-danger" href="<?=HTTP_PATH;?>/sale/delete?id=<?= $value['id'] ?>">Удалить</a></td>
                </tr>
            <? } ?>
        </table>
    </div>

</div>
