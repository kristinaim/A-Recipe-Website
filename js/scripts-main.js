var starOff = "&#9734";
var starOn = "&#9733";

/** https://stackoverflow.com/a/4793630 */
function insertAfter(newNode, referenceNode) {
  referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

/** https://stackoverflow.com/a/7394787 */
function decodeHtml(html) {
  const txt = document.createElement("textarea");
  txt.innerHTML = html;
  return txt.value;
}

function toggleStar(currentValue, starElement, recipeElement) {
  const xhttp = new XMLHttpRequest();
  let fav = 0;
  let request;

  if (currentValue == decodeHtml(starOn)) {
    starElement.innerHTML = starOff;
  } else {
    starElement.innerHTML = starOn;
    fav = 1;
  }

  starElement.setAttribute("fav", fav);
  request = starElement.getAttribute("action")
            +"?recipe_id="
            +recipeElement.getAttribute("recipe-id")
            +"&fav="+fav;
  xhttp.open("GET", request);
  xhttp.send();
}

function isFavorite(action, recipe_id, callback) {
  const xhttp = new XMLHttpRequest();
  xhttp.open("POST", action);
  xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhttp.onload = function() {
    callback(parseInt(this.responseText));
  }
  xhttp.send("function=is_favorite&recipe_id="+recipe_id);
}

function onRecipeLoad() {
  const recipeTitle = document.getElementById("recipeTitle");
  const favoriteStar = document.getElementById("favoriteStar");

  let favorited;

  // exit if neither exist
  if (recipeTitle === null || favoriteStar === null) {
    return;
  }

  // TODO: change to async!!!
  // https://stackoverflow.com/a/16825593
  isFavorite((favoriteStar.getAttribute("action"),
              recipeTitle.getAttribute("recipe-id"),
              favorited) => {
    favoriteStar.innerHTML = (favorited==true) ? starOn : starOff;
  });

  favoriteStar.addEventListener("click", (event) => {
    toggleStar(event.target.innerHTML, favoriteStar, recipeTitle);
  });
}
