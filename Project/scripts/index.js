/* ---------------------------------------------------------------------- */
/* Popup Box JS */

function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

/* ------------------------------------------------------------------------ */

/* ------------------------------------------------------------------------ */
// Cookie used to display at the bottom of the page //
function setCookie() {
    let y = document.cookie = "username=John Doe";
    let x = document.cookie;
    document.getElementById("footerFullname").innerHTML = 'test';
}