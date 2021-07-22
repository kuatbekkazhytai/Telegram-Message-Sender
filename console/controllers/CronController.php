<?php
/**
 * Отправка сообщений в телеграм
 *
 * @license      Proprietary and confidential
 * @author       Written by Kuatbek Kazhytai<kuatbek.kazhytai@nu.edu.kz>, июль 2021
 */

namespace console\controllers;

use yii\console\Controller;

class CronController extends Controller {

    const MESSAGE_METHOD = "sendMessage";

    /**
     * @param string $message
     */
    public function actionSend(string $message) {

        $parameters = array(
            'chat_id' => '-1001502711310',
            'text' => $message
        );

        $bot_token = '1946924534:AAFyrlIC54NFURxWPyGo35MweCWg8rKJyyM';
        $url = "https://api.telegram.org/bot$bot_token/" . self::MESSAGE_METHOD;

        $this->sendMessageToTelegramChannel($parameters, $url);
        exit();
    }

    /**
     * @param array $parameters
     * @param string $url
     */
    private function sendMessageToTelegramChannel(array $parameters,string $url) {

        if (!$curl = curl_init()) {
            exit();
        }
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_exec($curl);
    }
}