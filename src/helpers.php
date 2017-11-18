<?php

use AsifM42\ScormCloudGateway\ScormCloudGateway;

if (! function_exists('scormcloud')) {
    function scormcloud(): ScormCloudGateway
    {
        return app(ScormCloudGateway::class);
    }
}