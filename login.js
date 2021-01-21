var arr = [];

function data() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if (localStorage.getItem('arr')) {
        arr = JSON.parse(localStorage.getItem('arr'));
    }

    function checkuser_register() {
        for (var i = 0; i < arr.length; ++i) {

            var temp = arr[i];

            if (temp.email == email && temp.pass == password) {
               
                var a = window.confirm("You are register successfully");
                if (a) {
                    window.location.href = "dashboard.html";
                    }

                break;
            }
            else
            {
                alert("Email & Password is Invalid!");
            }
        }
    }
    checkuser_register();

};