function validation(otp, password, passwordc) {
    if(!(otp == ""  || password == "" || passwordc == "")) {
        if(password != passwordc) {
            alert("Password does not match");
        } else {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    if(this.responseText == 1) {
                        alert("Password Updated Successfully");
                        location.replace('../Login/');
                    } else if(this.responseText == 0){
                        alert("Invalid OTP");
                    }
                }
            }
            xmlHttp.open("GET", "include/script.php?otp=" + otp + "&password=" + password , true);
            xmlHttp.send(); 
        }
    } else {
        alert("Please fill out the required fields !");
    }
}