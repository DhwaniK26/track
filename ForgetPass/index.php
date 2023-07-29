<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmail/phpmail/Exception.php';
require '../phpmail/phpmail/PHPMailer.php';
require '../phpmail/phpmail/SMTP.php';

$mail = new PHPMailer(true);

if(isset($_REQUEST['smb'])) {
$conn = new mysqli('localhost', 'root', '', 'tracking');
$result = $conn -> query('SELECT * FROM signup where Email="'.$_REQUEST['email'].'"');
$row = $result -> fetch_assoc();
if($row) {

        try {                  
            $mail->isSMTP();                                        
            $mail->Host       = 'smtp.gmail.com';                   
            $mail->SMTPAuth   = true;                               
            $mail->Username   = '21amtics252@gmail.com';             
            $mail->Password   = 'somyorkqqmanmttb';                 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;                                
        
            $otp = rand(100000,999999);
            $_SESSION['otp']=$otp;
            $_SESSION['id']=$_REQUEST['email'];
        
            $mail->setFrom('21amtics252@gmail.com');
            $mail->addAddress($_REQUEST['email']);
            $mail->isHTML(true);

            $mail->Body    = "This otp is :".$otp;
            if($mail->send()) {
                header('location: enterotp.php');
            }
        } catch (Exception $e) {}
    } else {
        $error = "Username doesn't exist";
    }
}
?>
<html>
    <head>
    <style>
.card {
    background: #ffe4e1 !important;
 }

 .mb-2 {
    padding: 40px;
 }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
    <section class="vh-100">
        <div class="container py-5 h-100">
          <form action="" method="POST">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card" style="border-radius: 1rem;">
                  <div class="card-body p-5 text-center">
                    <div class="mb-md-4 mt-md-4 pb-5">
                      <h2 class="fw-bold mb-2 text-uppercase text-dark">Forget Password</h2>
                      <div class="form-outline form-white mb-4">
                        <input type="email" class="form-control form-control-lg" id="username" name="email" placeholder="abc@xyz.com" autofocus/>
                      </div>
                      <div class="form-outline mb-4 text-dark" id='error'>
                        <?php if(isset($error)) echo $error; ?>
                      </div>
                      <button class="btn btn-outline-dark btn-lg px-5" name="smb" type="submit">Send Email</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
    </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>