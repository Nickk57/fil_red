<?php
    session_start();
    session_destroy();
    header("location: ../view/connexion_admin.php");