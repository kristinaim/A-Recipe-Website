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

function toggleStar(currentValue, starElement, recipeId) {
  const xhttp = new XMLHttpRequest();
  xhttp.open("POST", starElement.getAttribute("action"));
  xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
  let fav = 0;
  if (currentValue == decodeHtml(starOn)) {
    starElement.innerHTML = starOff;
  } else {
    starElement.innerHTML = starOn;
    fav = 1;
  }
  starElement.setAttribute("fav", fav);
  
  xhttp.send("function=set_favorite&recipe_id="+recipeId+"&fav="+fav);
}

function isFavorite(action, recipeId, callback) {
  const xhttp = new XMLHttpRequest();
  xhttp.open("POST", action);
  xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhttp.onload = function() {
    callback(parseInt(this.responseText));
  }
  xhttp.send("function=is_favorite&recipe_id="+recipeId);
}

function onRecipeLoad() {
  const recipeTitle = document.getElementById("recipeTitle");
  const favoriteStar = document.getElementById("favoriteStar");

  // exit if neither exist
  if (recipeTitle === null || favoriteStar === null) {
    return;
  }

  // https://stackoverflow.com/a/16825593
  const action = favoriteStar.getAttribute("action");
  const recipeId = recipeTitle.getAttribute("recipe-id"); 
  isFavorite(action, recipeId, favorited => {
    favoriteStar.innerHTML = (favorited==true) ? starOn : starOff;
  });

  favoriteStar.addEventListener("click", (event) => {
    toggleStar(event.target.innerHTML, favoriteStar, recipeId);
  });
}
