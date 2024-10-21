<?php 

// This is the response page for the cv05/index.php
// It is called by the main05.js script when the user clicks on the "Ano" or "Ne" buttons
// The response is a simple alert box with the text "Ano" or "Ne" depending on the button clicked

if (isset($_GET['id'])) {
    $response = $_GET['id'];
    // create an alert box with the response text using bootstrap classes
    // if id is yes, the alert box will be green, if id is no, the alert box will be red
    echo '<div class="alert alert-' . ($response == 'ano' ? 'success' : 'danger') . ' alert-dismissible fade show" role="alert">
        <strong>' . ucfirst($response) . '</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>';
}
