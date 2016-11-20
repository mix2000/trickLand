<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 14.11.2016
 * Time: 6:13
 */?>


<div class="row index-authorization">
    <form action="<?=HTTP_PATH;?>/index/enter" method="post">
        <table>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td><label for="password">password</label></td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <input type="submit" value="Войти" name="submit">
            </tr>
        </table>
    </form>
</div>
