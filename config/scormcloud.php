<?php

return [

    /*
    |--------------------------------------------------------------------------
    | ScormCloud Config
    |--------------------------------------------------------------------------
    |
    | These values will be used to create an instance of a ScormCloudGateway
    |
    */

    'url' => env('SCORMCLOUD_URL',''),
    'app_id' => env('SCORMCLOUD_APPID',''),
    'key' => env('SCORMCLOUD_KEY',''),
    'organization' => env('SCORMCLOUD_ORGANIZATION',''),
    'app_name' => env('SCORMCLOUD_APP_NAME',''),
    'version' => env('SCORMCLOUD_VERSION','')
];