<?php
$link = mysqli_connect(
    'localhost',
    'root',
    '',
    'hrm_db');

if (!$link) {
    printf("error connecting to server %s\n", mysqli_connect_error());
    exit;
}