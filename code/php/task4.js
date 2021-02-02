function validation(){

 var uname = document.getElementById("uname").value;
 
 var uemail=document.getElementById("uemail").value;
  var usubject=document.getElementById("usubject").value
  var umsg=document.getElementById("umsg").value;
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  
  if(uname == ""){
  	document.getElementById("uname_e").innerHTML="* Please fill the username field";
  	return false;
  }
  else if((isNaN(uname) && uname.length <= 2) || (uname.length > 20)) {
    
    document.getElementById('uname_e').innerHTML =" * Username length must be between 2 and 20";
    return false;   
    }
 else if(!isNaN(uname)){
    document.getElementById('uname_e').innerHTML =" * only characters are allowed";
    return false;
    }

  if(uemail == ""){
  	document.getElementById("uemail_e").innerHTML="* Please fill the email field";
  	return false;
  }
 else if (!filter.test(uemail)) {
  				

   			 document.getElementById("uemail_e").innerHTML = "* please enter valid email";
		}
if(usubject == ""){
  	document.getElementById("usubject_e").innerHTML="* Please fill the Subject field";
  	return false;
  }

if(umsg == ""){
  	document.getElementById("umsg_e").innerHTML="* Please fill the massege field";
  	return false;
  }



}