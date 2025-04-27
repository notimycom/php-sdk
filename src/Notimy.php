<?php

namespace Notimy\PhpSdk;

use Exception;

class Notimy
{

    /**
     * Api url
     * @var string
     */
    public static $API_URL = 'https://notimy.com';

    /**
     * Notimy authorization token
     * @var string
     */
    private string $token;

    /**
     * Create instance
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * Send notification
     * @param string $streamKey
     * @param string $title
     * @param string $body
     * @return mixed
     * @throws Exception
     */
    public function sendNotification(string $streamKey, string $title, string $body): mixed
    {
        $url = self::$API_URL . '/api/notifications/add/' . $streamKey;

        $data = [
            'title' => $title,
            'body'  => $body
        ];

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: ' . $this->token
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        var_dump($response, $statusCode, $url);

        if ($statusCode === 200) {
            return json_decode($response, true);
        } else {
            throw new Exception("Error sending notification: " . $response);
        }
    }
}
