<?php

if (! function_exists('GetExtraWorkDetails')) {
    function GetExtraWorkDetails($ExtraworkId)
    {
        return $Data['ExtraWorks'] = App\ExtraWork::findorfail($ExtraworkId);
    }
}
