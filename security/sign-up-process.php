<?php
    require ('../connect.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/OAuth.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/POP3.php';
    require '../PHPMailer/src/SMTP.php';

    $nama_mitra = mysqli_real_escape_string($koneksi, $_POST['nama_mitra']);
    $password = md5(mysqli_real_escape_string($koneksi, $_POST['password']));
    $des_password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $code = md5($email.date('Y-m-d'));
    $kontak = mysqli_real_escape_string($koneksi, $_POST['kontak']);

    $sql = "SELECT * FROM tb_mitra where email='$email'";
    $query = mysqli_query($koneksi,$sql);
    if(mysqli_num_rows($query) > 0){
        echo "<script>alert('Email sudah terdaftar');window.location='../sign-up'</script>";
    }else {
        $sql = "INSERT INTO tb_mitra(nama_mitra,password,des_password,email,verif_code,kontak)VALUES('$nama_mitra','$password','$des_password','$email','$code','$kontak')";
        $query = mysqli_query($koneksi,$sql);

        //Create a new PHPMailer instance
        $mail = new PHPMailer;

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // SMTP::DEBUG_OFF = off (for production use)
        // SMTP::DEBUG_CLIENT = client messages
        // SMTP::DEBUG_SERVER = client and server messages
        $mail->SMTPDebug = SMTP::DEBUG_OFF;

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

        //Set the encryption mechanism to use - STARTTLS or SMTPS
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = 'developeraljannah@gmail.com';

        //Password to use for SMTP authentication
        $mail->Password = 'developer4lj4nn4h';

        //Set who the message is to be sent from
        $mail->setFrom('no-reply@yourwebsite.com', 'Authentication Service');

        //Set an alternative reply-to address
        //$mail->addReplyTo('replyto@example.com', 'First Last');

        //Set who the message is to be sent to
        $mail->addAddress($email, $nama_mitra);

        //Set the subject line
        $mail->Subject = 'Verification Account - Mrs/Mr '.$nama_mitra;

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $body = "Hi, ".$nama_mitra."<br>Please verify your email before access our website : <br> http://localhost/web_ajmart/security/confirm_email.php?code=".$code;
        $mail->Body = $body;
        //Replace the plain text body with one created manually
        $mail->AltBody = 'Verification Account';

        //send the message, check for errors
        if (!$mail->send()) {
            echo 'Mailer Error: '. $mail->ErrorInfo;
        } else {
            echo "<script>alert('Lanjutkan dengan verifikasi email anda, lalu silahkan login');window.location='../sign-in'</script>";
            //Section 2: IMAP
            //Uncomment these to save your message in the 'Sent Mail' folder.
            #if (save_mail($mail)) {
            #    echo "Message saved!";
            #}
        }
    }