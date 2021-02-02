
function disablebutton(){
    document.getElementById('submit').disabled = true;
}



function validation()
{
    // alert("fuction call");
    var username=document.getElementById('name').value;
    // alert(username);
    if(username == "")
    {
        // alert("this call");
        document.getElementById('span_name').innerHTML =" ** Please fill the username field";
        return false;
    }
    if((username.length <= 2) || (username.length > 20)) 
    {
        // salert("this call");
        document.getElementById('span_name').innerHTML =" ** Username length must be between 2 and 20";
        return false;   
    }
    if(!isNaN(username))
    {
        document.getElementById('span_name').innerHTML =" ** only characters are allowed";
        return false;
    }

    var password=document.getElementById('password').value;
    // alert(password);
    if(password == "")
    {
        document.getElementById('span_password').innerHTML =" ** Please fill the password field";
        return false;
    }
    if((password.length <= 8) || (password.length > 20)) 
    {
        document.getElementById('span_password').innerHTML =" ** Passwords length must be between  8 and 20";
        return false;   
    }

    var address=document.getElementById('address').value;
    if(address == "")
    {
        document.getElementById('span_address').innerHTML =" ** Please fill the address field";
        return false;
    }

    var game = [];
    var checkboxes = document.getElementsByName("game[]");
    var checked=false;
    for(var i=0; i < checkboxes.length; i++) 
    {
        if(checkboxes[i].checked) 
        {
            // Populate hobbies array with selected values
            game.push(checkboxes[i].value);
            checked=true;
        }
    }
    if(checked == false)
    {
        document.getElementById('span_selectgame').innerHTML =" ** Please Check atleast one game";
        // alert("pick atlest one game");
        return false;
    }
    var gender=document.UserForm.gender.value;
    if(gender=="")
    {
        document.getElementById('span_gender').innerHTML =" ** Please Check gender";
        return false;
    }

    var month=document.getElementById('Month').value;
    var day=document.getElementById('Day').value;
    var year=document.getElementById('Year').value;
    if(month == "none"){
    document.getElementById('bod').innerHTML =" * select a month";
    return false;
    }

if(day == "none"){
    document.getElementById('bod').innerHTML =" * select a day";
    return false;
    }
if(year == "none"){
    document.getElementById('bod').innerHTML =" * select a year";
    return false;
    }


    // var check=document.UserForm.agree.value;
    // if (check.checked==false) 
    // {
    //     document.getElementById('span_agree').innerHTML= " ** you dont have permit to terms and condition";
    // }
    // else
    // {
    //     return true;
    // }
    

    var marital=document.UserForm.MaritalStatus.value;
    if(marital=="")
    {
        document.getElementById('span_maritalstatus').innerHTML =" ** Please Check  MaritalStatus";
        return false;
    }

 
    // var file=document.getElementById('fileupload').value;
    // if(file==""){
    //     document.getElementById('span_file').innerHTML =" ** Please upload file";
    //     return false;
    // }
}
function activateButton(element) {

    if(element.checked) {
      document.getElementById("submit").disabled = false;
     }
     else  {
      document.getElementById("submit").disabled = true;
    }

}