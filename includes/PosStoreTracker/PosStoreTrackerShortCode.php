<?php

function posStoreTrackerShortCode()
{
    ob_start();
    include(__DIR__ . './../../public/partials/PosStoreParcelShortCode.html');
    return ob_get_clean();
}