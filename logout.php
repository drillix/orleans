<?php
/**
 * Created by PhpStorm.
 * User: drillix
 * Date: 9/22/2017
 * Time: 11:58 AM
 */


session_start();
session_destroy();
header('Location:login.php');
