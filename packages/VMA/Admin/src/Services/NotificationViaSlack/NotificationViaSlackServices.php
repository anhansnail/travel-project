<?php

namespace Longtt\B2s\Services\NotificationViaSlack;

use Maknz\Slack\Client;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class NotificationViaSlackServices implements NotificationViaSlackInterface
{
    private $client = '';

    /**
     * NotificationViaSlackServices constructor.
     */

    /**
     * @param $exception
     */
    public function SendAttachmentFields($exception)
    {
        $webHookUrl = env('SLACK_WEBHOOK_URL','');
        self::connect($webHookUrl);
//        $trace = 'File: '.$exception->getFile().' at line '.$exception->getLine();
        $trace = $exception->getTraceAsString();
        $user = Auth::user();
        $userEmail = ($user) ? $user['email'] : "";
        $error = $exception->getMessage();
        $baseLastUrl = \Request::url();

        $this->client->to('')->attach([
            'fallback' => 'Current server stats',
            'text' => 'Current server stats',
            'color' => 'danger',
            'title' => 'Click here go to url link SharkDMS error!!',
            'title_link' => $baseLastUrl,
            'fields' => [
                [
                    'title' => $userEmail . ' using route name ' . $baseLastUrl . ' Something went wrong.',
                    'value' => '',
                    'long' => true
                ],
                [
                    'title' => $error,
                    'value' => $trace,
                    'long' => true
                ]
            ]
        ])->send('New alert from the monitoring system'); // no message, but can be provided if you'd like
    }

    public function connect($webHookUrl = '')
    {
        $settings = [
            'username' => env('USER_NAME_WEBHOOK', ''),
            'channel' => '',
            'link_names' => true,
            'icon' => ':ghost:'
        ];
        $this->client = new Client($webHookUrl, $settings);
    }

    public function sendNotiToTelesale($data = [])
    {
        $webHookUrl = env('SLACK_WEBHOOK_URL_TELESALE','');
        self::connect($webHookUrl);

        $this->client->attach([
            'fallback' => 'Current server stats',
            'text' => 'Current server stats',
            'color' => 'danger',
            'title' => '',
            'fields' => [
                [
                    'title' => 'Người dùng đăng kí mới tại trang web',
                    'value' => '',
                    'long' => true
                ],
                [
                    'title' => 'Tên người dùng: '.$data['name'],
                    'value' => 'Email: '. $data['email'],
                    'long' => true
                ]
            ]
        ])->send('New alert from the monitoring system'); // no message, but can be provided if you'd like
    }
}
