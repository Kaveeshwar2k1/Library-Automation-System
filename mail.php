<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

			$mail = new PHPMailer(true);

			$mail->isSMTP();

			$mail->Host = 'smtp.gmail.com';

			$mail->SMTPAuth = true;

			$mail->Username = 'lmsdept22@gmail.com';

			$mail->Password = 'Pwdis1234#';

			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

			$mail->Port = 587;

			$mail->setFrom('lmsdept22@gmail.com', 'LMS Dept');

			$mail->addAddress('kaveeshwar.2@gmail.com','Kaveeshwar');

			$mail->isHTML(true);

			$mail->Subject = 'Registration Verification for Library Management System';

			$mail->Body = '
                <head>
                <style>
                    .button {
                        appearance: button;
                        background-color: #405cf5;
                        border-radius: 6px;
                        border-width: 0;
                        color: #fff;
                        cursor: pointer;
                        font-size: 100%;
                        height: 44px;
                        line-height: 1.15;
                        text-align: center;
                        width: 5cm;
                        }
                </style>
                </head>
                <body>
                    <p>Thank you for registering for Library Management System <br> Your Unique ID is <b>'.$user_unique_id.'</b>.</p>
                    <p>This is a verification email, please click the link to verify your email address.</p>
                    <p><a href="'.base_url().'verify.php?code='.$user_verificaton_code.'"><button class="button" role="button">Click to Verify</button></a></p>
                    <p>Thank you.</p>
                </body>


                <p>Thank you for registering for Library Management System <br> Your Unique ID is <b>'.$user_unique_id.'</b>.</p>
                <p>This is a verification email, please click the link to verify your email address.</p>
                <p><a href="'.base_url().'verify.php?code='.$user_verificaton_code.'"><button class="button" role="button">Click to Verify</button></a></p>
                <p>Thank you.</p>
			';

            $mail->send();

?>