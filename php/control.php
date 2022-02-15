<?php

function control ($fdata)
{
    return addslashes(htmlentities(trim(strip_tags($fdata))));
}
?>