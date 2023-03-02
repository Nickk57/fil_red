<?php
    session_start();
    session_destroy();
    header("location: ../templates/connexion_admin.php");