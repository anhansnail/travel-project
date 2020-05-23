<?php
namespace VMA\Admin\Services;

use Illuminate\Support\Facades\Mail;
use Longtt\B2sapi\Response;
use Maatwebsite\Excel\Excel;

class NotificationFireBaseService {
    public function __construct(){}

    public function sendNotification($staff, $message){
        $app_id = array();
        $data = array();
        $fields = array();

        $registrationIds = $staff->pluck('registration_id')->toArray();
        // Prep the bundleh
        $fields = array(
            'registration_ids' => $registrationIds,
            //'to' 	=> $registrationIds[0],
            "data" => [
                "type" => "1",
                "time" => date('Y-m-d H:i:s'),
                "Room" => 0,
                'id' => ''// id cua ban ghi
            ],
            "notification" => [
                "title" => "SHARK DMS",
                "body" => $message,
                "sound" => "default",
                "badge" => "0"
            ],
        );

        try {
            $return = self::send($staff, $fields);
            return $return;
        } catch (\Exception $e) {
            Log::info('NOTIFICATION :' . $e->getMessage());
            return "Thất bại";
        }
    }
    public static function send($lender, $fields){
        // API access key from Google API's Console
        if (count($fields) > 0) {
            $registrationids = $fields['registration_ids'];
            $registrationids = array_chunk($registrationids, 500);
        }else {
            return "Thông Báo Thất Bại";
        }

        foreach ($registrationids as $key => $r) {
            $fields['registration_ids'] = $r;
            $API_ACCESS_KEY = env('API_NOTIFICATION_KEY');
            $headers = array(
                'Authorization: key=' . $API_ACCESS_KEY,
                'Content-Type: application/json'
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            $result = curl_exec($ch);
            curl_close($ch);

            $response = json_decode($result);
        }
        if ($response) {
            return true;
        } else {
            return false;
        }
    }

}
