<?php
session_start();

function loginUser($username, $role) {
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;
}

function isLoggedIn() {
    return isset($_SESSION['username']);
}

function getUsername() {
    return $_SESSION['username'] ?? null;
}

function getUserRole() {
    return $_SESSION['role'] ?? null;
}

function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: login.php?error=login_required");
        exit;
    }
}

function requireRole($role) {
    requireLogin();
    if (getUserRole() !== $role) {
        header("Location: unauthorized.php");
        exit;
    }
}

function logoutUser() {
    $_SESSION = [];
    session_destroy();
}
