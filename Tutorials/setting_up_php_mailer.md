# Setting Up SMTP Server with PHPMailer

Follow these steps to set up an SMTP server with PHPMailer:

1. First, you need to install PHPMailer. You can do this with Composer by running the following command in your project directory:
    ```bash
    composer require phpmailer/phpmailer
    ```

2. Once PHPMailer is installed, you can use it to send an email with SMTP. Here's a basic example:

    ```php
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 
        $mail->isSMTP();                                      
        $mail->Host       = 'smtp.example.com';               
        $mail->SMTPAuth   = true;                             
        $mail->Username   = 'user@example.com';               
        $mail->Password   = 'secret';                         
        $mail->SMTPSecure = 'tls';                            
        $mail->Port       = 587;                              

        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress('joe@example.net', 'Joe User');     

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    ?>
    ```

Replace the placeholders (`smtp.example.com`, `user@example.com`, `secret`, `from@example.com`, `joe@example.net`) with your actual SMTP server details and recipient email address.

You can update this in `buyrequest.php` file.