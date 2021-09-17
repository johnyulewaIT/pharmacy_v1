<?php

if (!isset($_SESSION['sessionId'])) {
    header("Location:../index.php");
}