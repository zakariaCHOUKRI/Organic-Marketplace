// JavaScript to close the error popup
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('close-btn').addEventListener('click', function() {
        document.getElementById('error-popup').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    });
});

// Display the error popup and overlay
window.addEventListener('load', function() {
    var errorPopup = document.getElementById('error-popup');
    var overlay = document.getElementById('overlay');
    if (errorPopup.style.display !== 'none') {
        errorPopup.style.display = 'block';
        overlay.style.display = 'block';
    }
});