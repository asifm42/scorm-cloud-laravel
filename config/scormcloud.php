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

    /**
     * The scorm engine service url.
     *
     * This attribute is a relic of a previous Rustici ScormCloud product
     * iteration. It will most likely not need to be overriden. But its
     * there for instances such as when HTTPS cannot be supported, etc.
     */
    'url' => env('SCORMCLOUD_URL', 'https://cloud.scorm.com/EngineWebServices'),

    /**
     * The application id
     *
     * Required
     */
    'app_id' => env('SCORMCLOUD_APPID', ''),

    /**
     * Any secret key associated with the app id
     *
     * Required
     */
    'key' => env('SCORMCLOUD_KEY', ''),

    /**
     * The organization name.
     *
     * This will be used to create an origin string which is useful
     * for debugging on the SCORM Cloud developers’ side
     *
     * optional
     */
    'organization' => env('SCORMCLOUD_ORGANIZATION', 'scl'),

    /**
     * The app name.
     *
     * This will be used to create an origin string which is useful
     * for debugging on the SCORM Cloud developers’ side
     *
     * optional
     */
    'app_name' => env('SCORMCLOUD_APP_NAME', 'app'),

    /**
     * The version number.
     *
     * This will be used to create an origin string which is useful
     * for debugging on the SCORM Cloud developers’ side
     *
     * optional
     */
    'version' => env('SCORMCLOUD_VERSION','1.0')
];