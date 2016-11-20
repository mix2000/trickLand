<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 17.10.2016
 * Time: 3:21
 */?>


<div class="row marketing">
    <div class="col-lg-12">
        <table class="table table-responsive table-hover">
            <thead>
            <tr>
                <th>Название</th>
                <th>Сумма</th>
                <th>-</th>
                <th>-</th>
            </tr>
            </thead>
            <?foreach($info['sale'] as $value){?>
                <tr>
                    <td><?=$value['typeName']?></td>
                    <td><?=$value['sale']?></td>
                    <td><a class="btn btn-success" href="<?=HTTP_PATH;?>/saleType/redact?red=<?=$value['id']?>">Подробнее</a></td>
                    <td><a class="btn btn-danger" href="<?=HTTP_PATH;?>/saleType/delete?id=<?=$value['id']?>">Удалить</a></td>
                </tr>
            <?}?>
        </table>
    </div>

</div>
