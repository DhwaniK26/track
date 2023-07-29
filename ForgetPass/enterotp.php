<?php
    session_start();
    if(!isset($_SESSION['otp'])) {
        header('location: ../ForgetPass');
    } else if(isset($_SESSION['username'])) {
        header('location: ../enterotp');
    }
?>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<style>
    .card {
        background: #ffe4e1;
    }

    .mb-2 {
        padding: 40px;
    }
</style>
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
                      <h2 class="fw-bold mb-2 text-uppercase text-dark">Verification</h2>
                      <div class="form-outline form-white mb-4">
                        <input type="text" class="form-control form-control-lg" id="otp" placeholder="Enter OTP" autofocus/>
                      </div>
                      <div class="form-outline form-white mb-4">
                        <input type="password" class="form-control form-control-lg" id="password" placeholder="New Password"/>
                      </div>
                      <div class="form-outline form-white mb-4">
                        <input type="password" class="form-control form-control-lg" id="passwordc" placeholder="Confirm Password"/>
                      </div>
                      
                      <div class="form-outline mb-4 text-dark" id='error'>
                      </div>
                      <button class="btn btn-outline-dark btn-lg px-5" onclick="validation(document.getElementById('otp').value, document.getElementById('password').value, document.getElementById('passwordc').value)"  type="button">Verify</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
    </section>
    <script src="include/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>