<?php
    session_start();
    session_destroy();
    header("location: ../../ajout_admin/connexion_admin.php");