import {menuActive} from './responsiveMenu.js';


function validateRecipe() {
  
    var check = true;
    //Selecting values
    var title = document.getElementById('title').value;
    var time = document.getElementById('time').value;
    var ingredients = document.getElementById('ingredients').value;
    var directions = document.getElementById('directions').value;
    var categories = [];
    form.querySelectorAll('input').forEach(function (input) {
      if(input.type === 'checkbox' && input.checked) {
        categories.push(input.value);
      }
    })
    var photo = document.getElementById('img').value;

    // Form validation 
    if(title == "") {
        document.getElementById('msgTitle').innerHTML = "Title must be filled out";
        document.getElementById('msgTitle').className = 'errorText';
        document.getElementById('title').className = 'error';
        var check = false;
    } else if (title.length < 5 ) {
        document.getElementById('msgTitle').innerHTML = "Title must have at least 5 characters";
        document.getElementById('msgTitle').className = 'errorText';
        document.getElementById('title').className = 'error';
        var check = false;
    } else {
        document.getElementById('msgTitle').innerHTML = "";
        document.getElementById('msgTitle').classList.remove('errorText');
        document.getElementById('title').classList.remove('error');
    } 

    if(time == "") {
      document.getElementById('msgTime').innerHTML = "Time must be filled out";
      document.getElementById('msgTime').className = 'errorText';
      document.getElementById('time').className = 'error';
      var check = false;
  } else {
      document.getElementById('msgTime').innerHTML = "";
      document.getElementById('msgTime').classList.remove('errorText');
      document.getElementById('time').classList.remove('error');
  } 

    if(ingredients == "") {
        document.getElementById('msgIngredients').innerHTML = "Ingredients must be filled out";
        document.getElementById('msgIngredients').className = 'errorText';
        document.getElementById('ingredients').className = 'error';
        var check = false;
    } else if (ingredients.length < 10) {
        document.getElementById('msgIngredients').innerHTML = "Ingredients must have at least characters";
        document.getElementById('msgIngredients').className = 'errorText';
        document.getElementById('ingredients').className = 'error';
        var check = false;
    } else  {
        document.getElementById('msgIngredients').innerHTML = "";
        document.getElementById('msgIngredients').classList.remove('errorText');
        document.getElementById('ingredients').classList.remove('error');
    } 

    if(directions == "") {
        document.getElementById('msgDirections').innerHTML = "Directions must be filled out";
        document.getElementById('msgDirections').className = 'errorText';
        document.getElementById('directions').className = 'error';
        var check = false;
    } else if (directions.length < 20) {
        document.getElementById('msgDirections').innerHTML = "Directions must have at least 20 characters";
        document.getElementById('msgDirections').className = 'errorText';
        document.getElementById('directions').className = 'error';
        var check = false;
    } else {
        document.getElementById('msgDirections').innerHTML = "";
        document.getElementById('msgDirections').classList.remove('errorText');
        document.getElementById('directions').classList.remove('error');
    }

    if(categories.length == 0) {
        document.getElementById('msgCategories').innerHTML = "Choose at least 1 category";
        document.getElementById('msgCategories').className = 'errorText';
        var check = false;
    } else if (categories.length > 0) {
        document.getElementById('msgCategories').innerHTML = "";
        document.getElementById('msgCategories').classList.remove('errorText');
    } 

    if(photo == "") {
        document.getElementById('msgPhoto').innerHTML = "Photo must be uploaded";
        document.getElementById('msgPhoto').className = 'errorText';
        document.getElementById('img').className = 'error';
        var check = false;
    } else {
        document.getElementById('msgPhoto').innerHTML = "";
        document.getElementById('msgPhoto').classList.remove('errorText');
        document.getElementById('img').classList.remove('error');
    }
    
    console.log(check);
    return check;   
}

const form = document.querySelector('form');
form.addEventListener('submit', event => {
    if(validateRecipe() != true) {
        event.preventDefault();
    };  
});