<?php

namespace AsifM42\ScormCloudGateway;

use AsifM42\ScormCloud\ScormEngineService;
use AsifM42\ScormCloud\ScormEngineUtilities;

class ScormCloudGateway
{
    protected $scormService = null;

    public function __construct($config = [])
    {
        $url = $config['url'] ?? config('scormcloud.url');
        $appId = $config['appId'] ?? config('scormcloud.app_id');
        $key = $config['key'] ?? config('scormcloud.key');
        $organization = $config['organization'] ?? config('scormcloud.organization');
        $appName = $config['appName'] ?? config('scormcloud.app_name');
        $version = $config['version'] ?? config('scormcloud.version');
        $origin = $config['origin'] ?? ScormEngineUtilities::getCanonicalOriginString(
              $organization,
              $appName,
              $version
            );

        $this->scormService = new ScormEngineService(
            $url,
            $appId,
            $key,
            $origin
        );
    }

    public function getCourses()
    {
        return $this->scormService->getCourseService()->getCourseList();
    }

    public function getRegistrations($courseId = null, $learnerId = null)
    {
        return $this->scormService->getRegistrationService()->getRegistrationList(null, 'asifm42+scorm2@gmail.com');
    }

    public function getScormService()
    {
        return $this->scormService;
    }
}