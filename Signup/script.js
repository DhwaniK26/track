function validation() {

    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var vehicle = document.getElementById('vehiclenumber').value;
    var phone = document.getElementById('number').value;
    var userpass = document.getElementById('userpass').value;
    var conpass = document.getElementById('conpass').value;

    if (!(username == "" || email == "" || vehicle == "" || phone == "" || userpass == "" || conpass == "")) {
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText)
                switch (this.responseText) {
                    case "1": {
                        alert("Name should only contain characters !");
                        break;
                    }

                    case "2": {
                        alert("Enter valid email!");
                        break;
                    }

                    case "3": {
                        alert("Enter valid vehicle number!");
                        break;
                    }

                    case "4": {
                        alert("Contact number should contains only 10 digits !");
                        break;
                    }
                    case "5": {
                        alert("Re-enter the password to confirm it");
                        break;
                    }

                    case "0": {
                        //Success
                        alert("Signup Successfull");
                        location.replace("../Login");
                    }
                }
            }
        }

        xmlHttp.open('POST', 'script.php', true);
        xmlHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlHttp.send("username=" + username + "&email=" + email + "&vehicle=" + vehicle + "&phone=" + phone + "&password=" + userpass + "&conpass=" + conpass);

    } else {
        alert("Fill out the required fields");
    }
}
