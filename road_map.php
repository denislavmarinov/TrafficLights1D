<?php 
session_name('traffic_lights');
session_start();

$roadMap = $_SESSION['roadMap'];

var_dump($roadMap);