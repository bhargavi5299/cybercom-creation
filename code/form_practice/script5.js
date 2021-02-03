function submitFunction(){

var uemail=document.getElementById('uemail').value;
//alert(uemail);
var email="bhargaveep@gmail.com";
//alert(email);
var upass=document.getElementById('upass').value;
var pass='bhamu@123'

 if(uemail=="")
{
	document.getElementById('uemail_e').innerHTML="* Please fill the email field";
	return false;
}
else if(uemail != email)
 {
	document.getElementById('uemail_e').innerHTML="* Incorrect Email";
	return false;
}


 if(upass=="")
{
	document.getElementById('upass_e').innerHTML="* Please fill the Password field";
	return false;
}
else if((upass.length < 8) || (upass.length > 20)) {
    document.getElementById('upass_e').innerHTML =" * Passwords length must be between  8 and 20";
    return false;   
    }
else if(upass != pass)
 {
	document.getElementById('upass_e').innerHTML="* Incorrect Password";
	return false;
}


}	