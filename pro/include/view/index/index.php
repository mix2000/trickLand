<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 17.10.2016
 * Time: 0:33
 */
if (usersClass::$userType == 'defaultLogin') {
    ?>
    <div class="jumbotron">
        <h1>Trick-X-OUT</h1>

        <p class="lead">Добро пожаловать</p>

        <p><a class="btn btn-lg btn-success" href="<?=HTTP_PATH;?>/authorization/index" role="button">Авторизуйтесь</a></p>
    </div>
<? } ?>
<!--<div class="row marketing">
    <div class="col-lg-6">
        <h4>Subheading</h4>
        <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

        <h4>Subheading</h4>
        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

        <h4>Subheading</h4>
        <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
    </div>

    <div class="col-lg-6">
        <h4>Subheading</h4>
        <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

        <h4>Subheading</h4>
        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

        <h4>Subheading</h4>
        <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
    </div>
</div>
-->