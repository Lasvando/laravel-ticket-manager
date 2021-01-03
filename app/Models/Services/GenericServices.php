<?php

namespace App\Models\Services;

// Import PHPMailer classes into the global namespace
use App\Models\Ticket;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";
//

class GenericServices
{
    public function sendMail(string $message, string $object, string $userEmail, string $userName)
    {
        

        try {
            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            //Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = env("MAIL_HOST");                    // Set the SMTP server to send through

            //$mail->SMTPSecure = false;
            $mail->CharSet = 'UTF-8';
            $mail->SMTPAutoTLS = false;
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = env("MAIL_USERNAME");                     // SMTP username
            $mail->Password   = env("MAIL_PASSWORD");                              // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = env("MAIL_PORT"); ;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            //$mail->setLanguage('it', 'PHPMailer/language');

            //Recipients
            $mail->setFrom("sciarabbafederico@outlook.it", "Ticket");
            //$mail->addAddress('federico.sciarabba@gls-italy.com', 'Federico Sciarabba');     // Add a recipient
            $mail->addAddress($userEmail, $userName);          // Name is optional
            $mail->addCC("federico.sciarabba@gls-italy.com", "Federico Sciarabba");

            // // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $object;
            $mail->Body    = $message;
            $mail->AltBody = substr($message,0,20);

            $mail->send();
        } catch (Exception $e) {
            echo "SMTP Error\n";
            echo $e;
            die();
        }
    }

    public function createdTicketMail(Ticket $ticket)
    {
        $object = "Il ticket $ticket->id è stato inserito correttamente";
        $message = "Buongiorno gent. ". $ticket->user->name .",<br>
        Le confermiamo che il ticket è stato inserito con successo, un nostro operatore si occuperà di prendere in carico la sua richiesta non appena possibile<br>
        Di seguito un recap del ticket appena aperto:<br>
        <ul>
        <li><b>Oggetto:</b>".$ticket->object."</li>
        <li><b>Categoria:</b>".$ticket->category->name."</li>
        <li><b>Data di creazione:</b>".$ticket->created_at->format('d/m/yy')."</li>
        <li><b>Descrizione:</b>".$ticket->description."</li>
        </ul>
        <br>
        <small>La preghiamo di non rispondere a questa mail in quanto auto-generata dal sistema</small>";

        $this->sendMail($message, $object, $ticket->user->email, $ticket->user->name);
    }

    public function deletedTicketMail(Ticket $ticket)
    {
        $object = "Il ticket $ticket->id è stato rimosso correttamente";
        $message = "Buongiorno gent. ". $ticket->user->name .",<br>
        Le confermiamo che il ticket è stato rimosso con successo,
        <br>
        <br>
        <small>La preghiamo di non rispondere a questa mail in quanto auto-generata dal sistema</small>";

        $this->sendMail($message, $object, $ticket->user->email, $ticket->user->name);
    }
}
