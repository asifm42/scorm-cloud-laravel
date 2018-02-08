<?php

namespace AsifM42\ScormCloudGateway;

interface ScormGateway
{
    public function getCourses();

    public function getRegistrations($courseId = null, $learnerId = null);

    public function getScormService();

    public function getLaunchUrl($regId, $redirectUrl = 'closer');
}