<?php

echo "<footer><pre>";
echo "<h2>GET</h2>";
var_dump($_GET);

echo "<h2>POST</h2>";
var_dump($_POST);

echo "<h2>COOKIE</h2>";
var_dump($_COOKIE);

echo "<h2>SESSION</h2>";
var_dump($_SESSION);

echo "<h2>REQUEST</h2>";
var_dump($_REQUEST);

echo "<h2>FILES</h2>";
var_dump($_FILES);

echo "<h2>SERVER</h2>";
var_dump($_SERVER);

echo "</pre></footer>";