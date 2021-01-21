var arr = [];


if(localStorage.getItem('array')) {
    arr = JSON.parse(localStorage.getItem('array'));
}

function Adminobject(){
    var aName = document.getElementById('fname').value;
    var aEmail = document.getElementById('email').value;
    var aPass = document.getElementById('pass').value;
    var aCpass = document.getElementById('cpass').value;

    var aCity = document.getElementById('city').value;
     var aState = document.getElementById('state').value;


    var pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
        var letters = /^[A-Za-z]+$/;
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if(aName=='')
        {
            alert('Please enter your name');
        }
        else if(!letters.test(aName))
        {
            alert('Name field required only alphabet characters');
        }
        else if(aEmail=='')
        {
            alert('Please enter email id');
        }
        else if (!filter.test(aEmail))
        {
            alert('Invalid email');
        }
        
        else if(aPass=='')
        {
            alert('Please enter Password');
        }
        else if(aCpass=='')
        {
            alert('Enter Confirm Password');
        }
        else if(!pwd_expression.test(aPass))
        {
            alert ('Upper case, Lower case, Special character and Numeric letter are required in Password filed');
        }
        else if(aPass != aCpass)
        {
            alert ('Password not Matched');
        }
        else if(document.getElementById("cpass").value.length < 6)
        {
            alert ('Password minimum length is 6');
        }
        else if(document.getElementById("cpass").value.length > 12)
        {
            alert ('Password max length is 12');
        }


      


    var admin = {
        name :aName,
        email : aEmail,
        pass : aPass,
        city:aCity,
        state:aState
    };

    if(localStorage.getItem('arr'))
    {
        arr = JSON.parse(localStorage.getItem('arr'));
    }

    arr.push(admin);
    console.log(arr);

    localStorage.setItem("arr", JSON.stringify(arr));
}

