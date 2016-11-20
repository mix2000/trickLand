<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 14.11.2016
 * Time: 6:21
 */
?>


<div class="row authorization-index">
    <h1>Вход</h1>
    <form action="<?=HTTP_PATH;?>/authorization/enter" method="post">
        <? if (isset($_GET['error'])) {
            switch ($_GET['error']) {
                case 'PASSWORD_ERROR':
                    $text = "Неверно связка email - пароль";
                    break;
                case 'ERROR_EMAIL':
                    $text = "Неверный или не существует email";
                    break;
                default:
                    $text = false;
            }
            if ($text !== false) {
                ?>
                <div class="alert alert-danger">
                    <?= $text; ?>
                </div>
            <? }
        } ?>
        <table>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Войти" name="submit" class="btn btn-default">
                </td>
            </tr>
        </table>
    </form>
</div>

