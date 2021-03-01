import {menuActive} from './responsiveMenu.js';

function rateRecipe() {
    var rating = this.dataset.rating;
    var recipeId = this.dataset.recipeid;
    var sendInfo = "rating=" + rating + "&recipeId=" + recipeId;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../scripts/addRating.php', true);
    xhr.onload = function () {
        if (xhr.status === 200 && xhr.readyState === 4 && !xhr.responseText) {
            getRatings();
            getUserRating();
        } else {
            window.location.pathname = "/Recepti/root/pages/login.php";
        }
    }
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(sendInfo);
}

function getRatings() {
    var recipeId = document.getElementById("avgRating").dataset.recipeid;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../scripts/getRating.php?recipeId='+recipeId, true);
    xhr.onload = function () {
        if(this.status == 200 && xhr.readyState == 4) {
            var rating = JSON.parse(this.responseText);
            if(rating[0].avgRating > 0 && rating[0].avgRating <= 5) {
                document.getElementById("avgRating").innerHTML =  "<strong>Rating: </strong>" + rating[0].avgRating;
            } else {
                document.getElementById("avgRating").innerHTML =  "<strong>Rating: </strong>not rated";
            }
        } else {
            document.getElementById("avgRating").innerHTML =  "<strong>Rating: </strong>not rated";//test
            }
        }
    xhr.send();
}

function getUserRating() {
    var recipeId = document.getElementById("avgRating").dataset.recipeid;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../scripts/getUserRating.php?recipeId='+recipeId, true);
    xhr.onload = function () {
        if(this.status == 200 && xhr.readyState == 4 && xhr.responseText) {
            var userRating = JSON.parse(this.responseText);
            if(userRating[0].value > 0 && userRating[0].value <= 5) {
                var stars = document.getElementsByClassName('fa-star');
                var starList = document.querySelectorAll('span'); 
                for(var i = 0; i < userRating[0].value; i++) {
                    stars[i].classList.remove("far");
                    stars[i].classList.add("fas");
                    stars[i].style.color = "#ddd722";
                }
                for(var i = 0; i < 5; i++) {
                    starList[i].removeEventListener("mouseout", starsOut, false);
                    starList[i].removeEventListener("mouseover", starsHover, false);
                }
            }
        }
    }
    xhr.send();
}
// Stars change color when user hovers over them
function starsHover() {
    var stars = document.getElementsByClassName('fa-star');
    var starRating = this.dataset.rating;
    for(var i = 0; i < starRating; i++) {
        stars[i].classList.remove("far");
        stars[i].classList.add("fas");
        stars[i].style.color = "#ddd722";
    }
}
// Check if user can rate recipe
function checkLogin() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../scripts/checkLogin.php', true);
    xhr.onload = function () {
        if(this.status == 200 && xhr.readyState == 4) {
            var login = JSON.parse(this.responseText);
            if(login == true) {
               getUserRating();
            }
        }
    }
    xhr.send();
}

// Stars return to default state (after hover)
function starsOut() {
    var stars = document.getElementsByClassName('fa-star');
    var starRating = this.dataset.rating;
    for(var i = 0; i < starRating; i++) {
        stars[i].classList.remove("fas");
        stars[i].classList.add("far");
    }
}

const starList = document.querySelectorAll('span');
starList.forEach ( function(star) {
     star.addEventListener("click", rateRecipe, false);
     star.addEventListener("mouseover", starsHover, false);
     star.addEventListener("mouseout", starsOut, false);
    }   
);

window.addEventListener('load', (e) => {
    checkLogin();
    getRatings();
});