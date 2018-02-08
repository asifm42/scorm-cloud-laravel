<?php

namespace AsifM42\ScormCloudGateway;

use AsifM42\ScormCloudGateway\ScormGateway;
use AsifM42\ScormCloud\ScormEngineService;
use AsifM42\ScormCloud\ScormEngineUtilities;

class ScormCloudGateway implements ScormGateway
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
        return $this->scormService->getRegistrationService()->getRegistrationList($courseId, $learnerId);
    }

    public function getLaunchUrl($regId, $redirectUrl = 'closer')
    {
        return $this->scormService->getRegistrationService()->getLaunchUrl($regId, $redirectUrl);
    }

    public function getScormService()
    {
        return $this->scormService;
    }
}