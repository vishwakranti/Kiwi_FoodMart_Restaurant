<?php

function isLoggedIn()
{
    if (isset($_SESSION) && isset($_SESSION['logged_in']))
        return $_SESSION['logged_in'];

    return false;
}

function isAdmin()
{
    if (isLoggedIn() && isset($_SESSION['is_admin']) && $_SESSION['is_admin'])
        return $_SESSION['is_admin'];

    return false;
}

function getUserId()
{
    if (isset($_SESSION) && isset($_SESSION['user_id']))
        return  $_SESSION['user_id'];

    return NULL;
}

function isRequestMethodGet()
{
    if ($_SERVER["REQUEST_METHOD"] == "GET")
        return true;
    return false;
}

function isRequestMethodPost()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST")
        return true;
    return false;
}

function getPostRequestValue(string $postString)
{
    if (isset($_POST[$postString]))
        return $_POST[$postString];

    return NULL;
}

function getGetRequestValue(string $getString)
{
    if (isset($_GET[$getString]))
        return $_GET[$getString];

    return NULL;
}

function getSessionValue(string $sessString)
{
    if (isset($_SESSION) && isset($_SESSION[$sessString]))
        return $_SESSION[$sessString];

    return NULL;
}

function setupUserSession(string $id, string $userEmail, $isAdmin = false)
{
    $_SESSION["logged_in"] = true;
    $_SESSION["user_id"] = $id;
    $_SESSION["user_email"] = $userEmail;
    $_SESSION["is_admin"] = $isAdmin;
}
