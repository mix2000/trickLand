<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 20.11.2016
 * Time: 17:08
 */ ?>

<div class="logs-main">
    <? foreach (logger::getArrayLog() as $value) { ?>
        <div> >>
            <p>
                <strong>Файл:</strong><?= $value['fileName'] ?>
            </p>

            <p>
                <strong>Строка:</strong><?= $value['line'] ?>
            </p>

            <p>
                <strong>Сообщение:</strong><?= $value['msg'] ?>
            </p>

        </div>
    <? } ?>
    <div>
        <p> >> <? printf('Скрипт выполнялся %.4F сек.', logger::getTimeScript()); ?></p>
    </div>
</div>
