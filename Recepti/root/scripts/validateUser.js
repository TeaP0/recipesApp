import {menuActive} from './responsiveMenu.js';

function validateUser() {
  
    var check = true;
    var username = document.getElementById('username').value;
    var pass1 = document.getElementById('pass1').value;
    var pass2 = document.getElementById('pass2').value;     

    if(username == "") {
        document.getElementById('msgUser').innerHTML = "Username must be filled out";
        document.getElementById('msgUser').className = 'errorText';
        document.getElementById('username').className = 'error';
        var check = false;
    } else {
        document.getElementById('msgUser').innerHTML = "";
        document.getElementById('msgUser').classList.remove('errorText');
        document.getElementById('username').classList.remove('error');
    } 

    if(pass1 == "") {
        document.getElementById('msgPass1').innerHTML = "Password must be filled out";
        document.getElementById('msgPass1').className = 'errorText';
        document.getElementById('pass1').className = 'error';
        var check = false;
    } else {
        document.getElementById('msgPass1').innerHTML = "";
        document.getElementById('msgPass1').classList.remove('errorText');
        document.getElementById('pass1').classList.remove('error');
    }

    if(pass2 == "") {
        document.getElementById('msgPass2').innerHTML = "Please repeat password";
        document.getElementById('msgPass2').className = 'errorText';
        document.getElementById('pass2').className = 'error';
        var check = false;
    }
    else if(pass1 != pass2){
        document.getElementById('msgPass2').innerHTML = "Passwords must be the same";
        document.getElementById('msgPass2').className = 'errorText';
        document.getElementById('pass2').className = 'error';
        var check = false;
    }
    else {
        document.getElementById('msgPass2').innerHTML = "";
        document.getElementById('msgPass2').classList.remove('errorText');
        document.getElementById('pass2').classList.remove('error');
    }
    return check;
}

const forma = document.querySelector('form');
forma.addEventListener('submit', event => {
    if(validateUser() != true) {
        event.preventDefault();
    };
});