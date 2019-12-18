<?php
namespace app\TransferCreator;

require_once '../vendor/autoload.php';
use my_package\app\LogsToTelegram;

class TransferCreator
{
    public function send($data)
    {
        switch (key($data)) {
            case 'telegram':
                $this->sendByTelegram($data['telegram']);
                break;
            case 'mail':
                $this->sendByMail($data['mail']);
                break;
        }
    }

    private function sendByTelegram($config)
    {
        $telegram = new LogsToTelegram('chanel1');
        $telegram->sendLog($config['message']);
    }

    private function sendByMail($config)
    {
        // Create the Transport
        $transport = (new Swift_SmtpTransport($config['host'], $config['port'], $config['encryption']))
            ->setUsername($config['username'])
            ->setPassword($config['password'])
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message($config['subject']))
            ->setFrom([$config['fromEmail'] => $config['fromName']])
            ->setTo([$config['toEmail'] => $config['toName']])
            ->setBody($config['message'])
        ;

        // Send the message
        $result = $mailer->send($message);
    }
}