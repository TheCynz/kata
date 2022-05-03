<?php

// phpinfo();
xdebug_info();
function isOfDrivingAge($age): bool
{
    return $age >= 16;
}

function notifyUserOfDriverStatus($name, $age): string
{
    $message = isOfDrivingAge($age) ? 'You may drive.' : 'You may not drive';

    return "{$name}: {$message}";
}

$status = notifyUserOfDriverStatus('Tom Jones', 14);
