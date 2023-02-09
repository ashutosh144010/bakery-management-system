<?php

// $customerMail = "chaudharidigambar52002@gmail.com";
// $name = "jojo";
// $amount = "300";
// $totalAmount = "400";
// $date = date("d/m/Y");
// $AccountNo = "123456789012";

// creditMoneyMail($customerMail,$name,$amount,$totalAmount,$date,$AccountNo);

require 'PHPMailerAutoload.php';
require 'class.smtp.php';


function orderMail($customerMail, $pname, $weight, $price, $item, $total, $address, $mobileno)
{


    $mail  = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';

    $mail->Username = 'pathakashutosh.engi@gmail.com';
    $mail->Password = 'amkjpwcdajptlbno';

    $content = file_get_contents('../mail/ordertemp.php');
    $mail->setFrom("pathakashutosh.engi@gmail.com", "Sky Bank");
    $mail->addAddress($customerMail);
    $mail->addReplyTo("pathakashutosh.engi@gmail.com");

    $mail->isHTML(true);
    $mail->Subject = "Your order '$pname' placed";

    $swap_var = array(

        "{pname}" => "$pname",
        "{weight}" => "$weight",
        "{price}" => "$price",
        "{item}" => "$item",
        "{total}" => "$total",
        "{address}" => "$address",
        "{mobileno}" => "$mobileno",

    );

    foreach (array_keys($swap_var) as $key) {
        if (strlen($key) > 2 && trim($key) != "") {
            $content = str_replace($key, $swap_var[$key], $content);
        }
    }

    $mail->Body = "$content";


    if (!$mail->send()) {
        echo "mail not sent";
    }
}
