<?php

session_start();

$conn = new mysqli('localhost', 'root', '', 'enterprise_project');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}