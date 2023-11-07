<?php

namespace bin\epaphrodite\api\sms;

use \Mailjet\Resources;

class SendSms
{
    public function sms()
    {   
        // Utilisez vos informations d'identification sauvegardées et spécifiez que vous utilisez l'API Send v3.1
        $senderEmail = "2250708631645";
        $recipientEmail = "2250708631645";
        $token = '44d6fb7ae7c38f949af7f9140d3dc97c26da23c464341310c11bb2f7f3b234ee';
        $mj = new \Mailjet\Client($token, NULL, true, ['version' => 'v3.1']);
        
        // Définissez le corps de votre demande
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => $senderEmail,
                        'Name' => "Me"
                    ],
                    'To' => [
                        [
                            'Email' => $recipientEmail,
                            'Name' => "You"
                        ]
                    ],
                    'Subject' => "My first Mailjet Email!",
                    'TextPart' => "Greetings from Mailjet!",
                    'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href=\"https://www.mailjet.com/\">Mailjet</a>!</h3>
                    <br />May the delivery force be with you!"
                ]
            ]
        ];
        
        // Toutes les ressources se trouvent dans la classe Resources
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        
        // Lisez la réponse
        $response->success() && var_dump($response->getData());
    }
}
