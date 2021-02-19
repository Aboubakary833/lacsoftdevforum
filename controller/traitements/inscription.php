<?php
    require_once "../classes/Authentification.class.php";

    $formData = [];
    foreach ($_POST as $key => $value) {
        array_push($formData, $value);
    }

    $inscription = new Authentification($formData);
    $inscription->signup();
?>