<?php

    function send_mail(array $mail_settings, array $to, string $subject, string $body) : bool 
    {
        $mail = new \PHPMailer\PHPMailer\PHPMailer(exceptions,true);


        try {
            //Server settings
            $mail->SMTPDebug = 1;                                 //міняю цифру на більшу якщо є в мене неполадка
            $mail->isSMTP();                                      //Send using SMTP
            $mail->Host       = $mail_settings['host'];           //Set the SMTP server to send through
            $mail->SMTPAuth   = $mail_settings['auth'];           //Enable SMTP authentication
            $mail->Username   = $mail_settings['username'];       //SMTP username
            $mail->Password   = $mail_settings['password'];       //SMTP password
            $mail->SMTPSecure = $mail_settings['secure'];         //Enable implicit TLS encryption
            $mail->Port       = $mail_settings['port'];           //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet    =$mail_settings['charset'];  


            //Recipients
            $mail->setFrom($mail_settings['from'], $mail_settings['name']);   //Add a recipient
                foreach($to as $email) {
                    $mail->addAddress($email);
                }
        
            //Content
            $mail->isHTML($mail_settings['is_html']);               //Set email format to HTML
            $mail->Subject = '$subject';
            $mail->Body    = '$body';
        
            return $mail->send();

        } catch (\PHPMailer\PHPMailer\Exception $e) {
               //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }


    var_dump(send_mail($mail_settings_prod, ['olochka27@gmail.com'], $body));

?>



<?php
/**
 * Copyright 2022 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

//[START sheets_create]
use Google\Client;
use Google\Service\Drive;
use Google\Service\Sheets\SpreadSheet;

/**
* create an empty spreadsheet
* 
*/

 function create($title)
    {   
        /* Load pre-authorized user credentials from the environment.
           TODO(developer) - See https://developers.google.com/identity for
            guides on implementing OAuth2 for your application. */
        $client = new Google\Client();
        $client->useApplicationDefaultCredentials();
        $client->addScope(Google\Service\Drive::DRIVE);
        $service = new Google_Service_Sheets($client);
        try{

            $spreadsheet = new Google_Service_Sheets_Spreadsheet([
                'properties' => [
                    'title' => $title
                    ]
                ]);
                $spreadsheet = $service->spreadsheets->create($spreadsheet, [
                    'fields' => 'spreadsheetId'
                ]);
                printf("Spreadsheet ID: %s\n", $spreadsheet->spreadsheetId);
                return $spreadsheet->spreadsheetId;
        }
        catch(Exception $e) {
            // TODO(developer) - handle error appropriately
            echo 'Message: ' .$e->getMessage();
          }
    }
    // [END sheets_create]
require_once 'vendor/autoload.php';
create('title');