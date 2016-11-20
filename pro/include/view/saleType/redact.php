<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 17.10.2016
 * Time: 3:21
 */
?>


<div class="row marketing sale-type">
    <div class="col-lg-6">
        <form action="<?=HTTP_PATH;?>/saleType/SaveInfo" method="POST">
            <table class="table-responsive">
                <tr>
                    <td><label for="name">Название шаблона</label></td>
                    <td><input type="text" name="name" id="name" value="<?= $info['infoSale']['name'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="sale">Сумма к оплате</label></td>
                    <td><input type="text" name="sale" id="sale" value="<?= $info['infoSale']['sale'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="timeDay">Время действия(количество дней)</label></td>
                    <td><input type="number" name="timeDay" id="timeDay" value="<?= $info['infoSale']['timeDay'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="countDayLimit">Количество посещений</label></td>
                    <td><input type="number" name="countDayLimit" id="countDayLimit" value="<?= $info['infoSale']['countDayLimit'] ?>"></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" class="btn btn-success">
                        <?=labels::getHidden($info['infoSale']['id'],'id');?>
                    </td>
                </tr>
            </table>
        </form>
    </div>


</div>