<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 17.10.2016
 * Time: 1:34
 */

?>


<div class="row marketing">
    <div class="col-lg-6">
        <form action="<?=HTTP_PATH;?>/sale/SaveInfo" method="POST">
            <table class="table-responsive">
                <tr>
                    <td><label for="id_user">Ученик</label></td>
                    <td>
                        <?=labels::getSelect($info['id_user'],'id_user',$info['infoSale']['id_user'])?>
                    </td>
                </tr>
                <tr>
                    <td><label for="type">Тип оплаты</label></td>
                    <td>
                        <?=labels::getSelect($info['type'],'type',$info['infoSale']['type'])?>
                    </td>
                </tr>
                <tr>
                    <td><label for="sale">Сумма к оплате</label></td>
                    <td><input type="text" name="sale" id="sale" value="<?=$info['infoSale']['sale']?>"></td>
                </tr>
                <tr>
                    <td><label for="sale">Дата начала</label></td>
                    <td><input type="date" name="dateStart" id="dateStart" value="<?=$info['infoSale']['dateStart']?>"></td>
                </tr>
                <tr>
                    <td><label for="dateFinal">Дата окончания</label></td>
                    <td><input type="date" name="dateFinal" id="dateFinal" value="<?=$info['infoSale']['dateFinal']?>"></td>
                </tr>
                <tr>
                    <td><label for="countVisitLimit">Количество дней</label></td>
                    <td><input type="number" name="countVisitLimit" id="countVisitLimit" value="<?=$info['infoSale']['countVisitLimit']?>"></td>
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