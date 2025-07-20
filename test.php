<?php
$to = "juangomes376@gmail.Com";
$subject = "test email";
$message = '
    Este é o conteúdo do email.
';
$headers = "From: juangomesdev@hotmail.com" . "\r\n" .
           "Reply-To: juangomesdev@hotmail.com" . "\r\n" .
           "X-Mailer: PHP/" . phpversion();

mail($to, $subject, $message, $headers);