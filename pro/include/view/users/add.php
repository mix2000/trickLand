<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 15.11.2016
 * Time: 23:39
 */ ?>

<div class="row users-add">
    <div class="col-lg-6">
        <form action="<?=HTTP_PATH;?>/users/saveInfo" method="POST">
            <table class="table-responsive">
                <tr>
                    <td><label for="username">Имя пользователя</label></td>
                    <td><input type="text" name="username" id="username" value="<?= $info['user']['username'] ?>">
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="text" name="email" id="email" value="<?= $info['user']['email'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="group">Группа</label></td>
                    <td><?= labels::getSelect([
                            ['value' => 'admin', 'name' => 'Администратор'],
                            ['value' => 'user', 'name' => 'Пользователь'],
                            ['value' => 'trainer', 'name' => 'Тренер']
                        ], 'group', $info['user']['group']) ?></td>
                </tr>
                <tr>
                    <td><label for="status">status</label></td>
                    <td><?= labels::getSelect([
                            ['value' => '1', 'name' => 'Активен'],
                            ['value' => '0', 'name' => 'Заблокирован'],
                        ], 'status', $info['user']['status']) ?></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" class="btn btn-success" name="submit">
                        <?= labels::getHidden($info['user']['id'], 'id'); ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
