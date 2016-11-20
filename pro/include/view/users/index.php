<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 15.11.2016
 * Time: 21:18
 */
?>
<div class="row users-index">
    <div class="col-lg-12">
        <table class="table table-responsive table-hover">
            <thead>
            <tr>
                <th>ФИО</th>
                <th>Email</th>
                <th>Группа</th>
                <th>Status</th>
                <th>-</th>
                <th>-</th>
                <th>-</th>
                <th>-</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($info['users'] as $value) { ?>
                <tr data-id="<?= $value['id'] ?>">
                    <td><?= $value['username'] ?></td>
                    <td><?= $value['email'] ?></td>
                    <td>
                        <?= labels::getSelect([
                            ['value' => 'admin', 'name' => 'Администратор'],
                            ['value' => 'user', 'name' => 'Пользователь'],
                            ['value' => 'trainer', 'name' => 'Тренер']
                        ], 'group', $value['group']) ?>
                    </td>
                    <td><?= labels::getSelect([
                            ['value' => '1', 'name' => 'Активен'],
                            ['value' => '0', 'name' => 'Заблокирован'],
                        ], 'status', $value['status']); ?>
                    </td>
                    <td>
                        <?=$value['fpassword'];?>
                    </td>
                    <td>
                        <a href="<?=HTTP_PATH;?>/users/add?red=<?=$value['id'];?>" class="btn btn-success">Редактировать</a>
                    </td>
                    <td>
                        <a href="<?=HTTP_PATH;?>/users/delete?red=<?=$value['id'];?>" class="btn btn-danger">Удалить</a>
                    </td>
                </tr>
            <? } ?>
            </tbody>
        </table>
    </div>
</div>
