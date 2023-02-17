<?php
    session_start();
    session_destroy();
    header("location: test/connexion_admin.php");