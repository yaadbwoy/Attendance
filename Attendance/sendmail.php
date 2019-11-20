<?php
    require 'vendor/autoload.php';
        class sendEmail{
        public static function sendMail($to,$subject,$content){
            $key = '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';
            $email = new \SendGrid\Mail\Mail();
            $email->setfrom("curtiscarlosja@gmail.com", "Carlos Curtis");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);
            $sendgrid = new \SendGrid($key);
            try{
                $response = $sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo 'Email exception caught : '. $e->getMessage() ."\n";
                return false;
            }
        }
    }
?> 