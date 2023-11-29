<?php

$db = mysqli_connect('localhost','root','','db_flutter');

if(!$db)
{
    echo "Database connection failed";
}
