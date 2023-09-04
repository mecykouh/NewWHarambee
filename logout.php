<?php

    session_start();
    session_unset();
    session_destroy();

    //go to home page
    header("location: index.php");
    


?>