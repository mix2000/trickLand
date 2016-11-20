<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 17.10.2016
 * Time: 14:04
 */

?>


<div class="row marketing visit-add">
    <div class="col-lg-12">
        <h3><?=$info['userData']['date']?> - <?=$info['userData']['username']?></h3>
        <input type="hidden" value="<?=(is_numeric($_GET['red']))?$_GET['red']:'';?>" name="idVisit" id="idVisit">
        <table class="table table-responsive table-hover">
            <thead>
            <tr>
                <th>ФИО</th>
                <th>Посещение</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($info['user'] as $value) {
                $class = (in_array($value['value'],$info['userVisit']))?'btn-success':'btn-warning';
                ?>
                <tr>
                    <td><?= $value['name'] ?></td>
                    <td><a class="btn <?=$class;?> addTo" data-id="<?= $value['value'] ?>">Присутствовал</a></td>
                </tr>
            <? } ?>
            </tbody>
        </table>
    </div>
</div>