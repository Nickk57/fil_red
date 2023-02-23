<?php
    session_start();
    session_destroy();
    header("location: ../include/connexion_admin.php");