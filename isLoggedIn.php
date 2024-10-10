<?php
function checkIfLoggedIn()
{
    //existing session or start new one
    session_start();
    if(empty($_SESSION['LoggedInUser']))
    {
        //location header makes a new request (redirect)
        header("location:main_login.html");
    }
}