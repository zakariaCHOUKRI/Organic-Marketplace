<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == 0) {
        echo '<div id="error-popup">Incorrect email or password. Please try again.<button id="close-btn">Close</button></div>';
    }
    else if ($_GET['error'] == 1) {
        echo '<div id="error-popup">Email or username already used. Please try again.<button id="close-btn">Close</button></div>';
    }
}
?>