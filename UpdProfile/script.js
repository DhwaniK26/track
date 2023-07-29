
function update(){
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var vehicleno = document.getElementById('vehicleno').value;
    var contact = document.getElementById('contact').value;
    var oldpass = document.getElementById('oldpass').value;
    var newpass = document.getElementById('newpass').value;

if(!(name = "" && email == "" && vehicleno == "" && contact == "" && oldpass == "" && newpass == "")){
        var xmlHttp = new XMLHttpRequest();

        xmlHttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText)
                switch (this.responseText) {
                    case 1: {
                        alert("Name should only contain characters !");
                        document.getElementById('err').innerHTML="Name err"
                        break;
                    }

                    case "2": {
                        alert("Enter valid email!");
                        document.getElementById('err').innerHTML="Mail err"
                        break;
                    }

                    case "3": {
                        alert("Enter valid vehicle number!");
                        document.getElementById('err').innerHTML="Vehicle err"
                        break;
                    }

                    case "4": {
                        alert("Contact number should contains only 10 digits !");
                        document.getElementById('err').innerHTML="number err"
                        break;
                    }
                    case "5": {
                         //old pass is empty
                         alert("Enter the Current Password")
                         document.getElementById('err').innerHTML="cuurent err"
                        break;
                        
                    } case "6": {
                        //fail old pass
                        alert("Incorrect current password");
                        document.getElementById('err').innerHTML="old err"
                        break;   
                    }

                    case 0: {
                        //Success
                        alert("Signup Successfull");
                        document.getElementById('err').innerHTML="success"
                        
                    }
                }
            }
        }

        xmlHttp.open('POST', 'script.php', true);
        xmlHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlHttp.send("name=" + name + "&email=" + email + "&vehicleno=" + vehicleno + "&contact=" + contact + "&oldpass=" + oldpass + "&newpass=" + newpass);
    }
}
