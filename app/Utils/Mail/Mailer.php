<?php
namespace App\Utils\Mail;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    private $mailer;
    
    public function __construct()
    {
        $this->mailer = new PHPMailer();
        $this->_setMailer();
    }

    private function _setMailer() : void
    {
        $this->mailer->isSMTP();
        $this->mailer->Host = 'smtp.mailtrap.io';
        $this->mailer->SMTPAuth = true;
        $this->mailer->Port = 2525;
        $this->mailer->Username = '9d7b4d69f58518';
        $this->mailer->Password = '93626fdf6c7556';
    }

    public function setHeaders(string $email) : Mailer
    {
        $this->mailer->setFrom('info@mailtrap.io', 'Mailtrap');
        $this->mailer->Subject = 'Test Report';
        $this->mailer->addAddress($email, 'Test');

        return $this;
    }

    public function addAttachment(string $filePath) : Mailer
    {
        $this->mailer->addAttachment($filePath, 'make_report.xlsx');

        return $this;
    }

    public function setContent(string $content = '') : Mailer
    {
        if ($content == '') {
            $mailContent = "<h1>Make Report</h1>
            <p>Sending the Excel report of the Makes.</p>";
            $this->mailer->Body = $mailContent;
        }

        return $this;
    }

    public function send(): void
    {
        if($this->mailer->send()){
            echo 'Message has been sent';
        }else{
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $this->mailer->ErrorInfo;
        }
    }
}