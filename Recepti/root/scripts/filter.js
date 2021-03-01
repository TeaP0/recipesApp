import {menuActive} from './responsiveMenu.js';

function filterRecipes() {
    var category = this.dataset.cat;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', './scripts/filter.php?category='+category, true);
    xhr.onload = function () {
        if(this.status == 200 && xhr.readyState == 4) {
            var x = JSON.parse(this.responseText);
            var content = "<div class=\"recipes\">";
            for(var i = 0; i < x.length; i++) {
                content += "<article><a href='./pages/recipe.php?id=" + x[i][0] +  "'>" +
                "<img src=\"img/" + x[i][1] + "\">" + "<h4>" + x[i][2] + "</a></h4>" + "<p><strong>" + x[i][3] + "</strong></p></article>";
            }
            document.getElementsByTagName("main")[0].innerHTML = content + "</div>";
        } else {
            document.getElementsByTagName("main")[0].innerHTML += "<h2>No results were found!</h2>";
        }
    }
    xhr.send();
}

const catList = document.querySelectorAll('button');
catList.forEach(function(category) {
     category.addEventListener("click", filterRecipes, false);
    }
);