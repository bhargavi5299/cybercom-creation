function submitFunction(){

 var uname = document.getElementById("uname");
  var uemail=document.getElementById("uemail");
  var subject=document.getElementById("subject");
  var msg=document.getElementById("msg");
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  

  if (!uname.checkValidity()) {
    document.getElementById("uname_e").innerHTML = uname.validationMessage;
  }
  else if (!uemail.checkValidity()) {
  			if (!filter.test(uemail.value)) {
  				 var uemail_e="please enter valid email";

   			 document.getElementById("uemail_e").innerHTML = uemail_e;
			 }
			 else{
			 	document.getElementById("uemail_e").innerHTML = uemail.validationMessage;
			 }
  }
  else if (!subject.checkValidity()) {
    document.getElementById("subject_e").innerHTML = subject.validationMessage;
  }
 else if (!msg.checkValidity()) {
    document.getElementById("msg_e").innerHTML = msg.validationMessage;
  }
  

}