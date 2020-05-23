<?php

namespace Longtt\B2s\Services\NotificationViaSlack;

interface NotificationViaSlackInterface
{

    /**
     * @param $exception
     * @param $exceptionType
     * @return mixed
     */
    public function SendAttachmentFields($exception);

    /**
     * @param $exceptionType
     * @param $chanel
     * @return mixed
     */
    public function connect($exceptionType);
}
