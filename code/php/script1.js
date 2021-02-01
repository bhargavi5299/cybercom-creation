



function validation(){
	alert("fuction call");
    var username=document.getElementById('name').value;
    alert(username);
    if(username == ""){
	document.getElementById('span_name').innerHTML =" ** Please fill the username field";
	return false;
	}

	var password=document.getElementById('pass').value;
    alert(password);
    if(password == ""){
	document.getElementById('span_pass').innerHTML =" ** Please fill the password field";
	return false;
	}

	var adress=document.getElementById('add').value;
    alert(adress);
    if(adress == ""){
	document.getElementById('span_add').innerHTML =" ** Please fill the address field";
	return false;
	}

    //var game= document.getElementById('game[]').value;
    var game= document.form.game;
    //console.log(game);
    
    var c = false;
    for(var i = 0; i<game.length;i++){
        if(game[i].checked)
            c = true;
        }
    
    if(c == false) {
        alert("pick atlest one game");
        return false;
    }

    var gender= document.form.gen;
    if(gender.value.length <=0) {
        alert("Gender is required.");
        return false;
    }

    var age = document.form.age;
    if(age.value == "none"){
        alert("age is required.");
        return false;
    }

    return false;

}