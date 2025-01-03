<?php

function getPossibleStatuses()
{
    $stateMachineConfig = config('state-machine');
    return $stateMachineConfig['graphA']['states'];
}
