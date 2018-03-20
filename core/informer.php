<?php

/**
 * Created by PhpStorm.
 * User: Tolya
 * Date: 20.03.2018
 * Time: 15:24
 */
class Informer extends Page {

    private $username,$usermail,$usertel,$comment,$hasError;
    private $sendto,$subject;
    public  $isMsgSent,$sucsMsg;

    public function __construct($sucsMsg) {
        $this->sucsMsg = $sucsMsg;

        $cfg = require_once ROOT_DIR .'/data/cfg/config.php';
        $this->sendto  = $cfg["form"]["to"];
        $this->subject = $cfg["form"]["subject"];
        unset($cfg);

        if(trim($_POST['name']) == '')   { $this->hasError = true;   } else { $this->username = trim($_POST['name']);  }
        if(trim($_POST['email']) == '')  { $this->hasError = true;   } else { $this->usermail = trim($_POST['email']); }
        if(trim($_POST['phone']) == '')  { $this->usertel  = 'none'; } else { $this->usertel  = trim($_POST['phone']); }
        if(trim($_POST['message']) == ''){ $this->hasError = true;   } else {
            if(function_exists('stripslashes')) {
                $this->comment = stripslashes(trim($_POST['message']));
            } else {
                $this->comment = trim($_POST['message']);
            }
        }
    }

    public function informUs() {
        if(!isset($this->hasError)) {
            // creating headers
            $m = strip_tags($this->usermail) . "\r\n";
            $headers  = "From: "    . $m;
            $headers .= "Reply-To: ". $m;
            $headers .= 'Cc: '      . $m;
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html;charset=utf-8 \r\n";

            // creating the message body
            $msg  = "<html><body style='font-family:Arial,sans-serif;'>";
            $msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Cообщение с сайта</h2>\r\n";
            $msg .= "<p><strong>From:</strong> ".$this->username."</p>\r\n";
            $msg .= "<p><strong>E-mail:</strong> ".$this->usermail."</p>\r\n";
            $msg .= "<p><strong>Phone number:</strong> ".$this->usertel."</p>\r\n\n";
            $msg .= $this->comment;
            $msg .= "</body></html>";

            // sending the message
            $success = mail($this->sendto, $this->subject, $msg, $headers);
            if ($success && $this->hasError != true ){ $this->isMsgSent = 'OK'; }
            else {
                $this->isMsgSent = "FAIL" ;
                $success = error_get_last()['message'];
                $this->sucsMsg = "FAIL. ". strip_tags($success);
            }
        }
        else { $this->isMsgSent = $this->sucsMsg = "FAIL. Please, Try again later."; }

        return $this;
    }
}