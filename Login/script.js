function login() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username == "" || password == "") {
        document.getElementById('error').innerHTML = "Password or username empty"
    } else {
        document.getElementById('error').innerHTML = ''
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {

                if (this.responseText == 0) {
                    document.getElementById('error').innerHTML = "Incorrect Username or Password";
                } else if (this.responseText == 1) {
                    location.assign('../Dashboard');
                }
            }
        }
        xmlHttp.open('POST', 'script.php', true);
        xmlHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlHttp.send("username=" + username + "&password=" + password);
    }
}

function sign() {
    window.location.assign("/Tracking/Signup")
}