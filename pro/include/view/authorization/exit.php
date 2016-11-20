<?php
/**
 * Created by PhpStorm.
 * User: one
 * Date: 15.11.2016
 * Time: 14:23
 */?>

<script>

    function delCookie(name) {
        document.cookie = name + "=" + "; expires=Thu, 01 Jan 1970 00:00:01 GMT";
    }
    delCookie('hash');
    delCookie('id');
    location.href='<?=HTTP_PATH;?>/';
</script>

