<?php
// users.php
$USERS = [
    'admin'    => ['password' => 'admin',    'role' => 'admin'],
    'user'     => ['password' => 'user',     'role' => 'user'],
    'student1' => ['password' => 'student1', 'role' => 'student'],
    'student2' => ['password' => 'student2', 'role' => 'student'],
];

function validLogin($username, $password) {
    global $USERS;

    if (!isset($USERS[$username])) {
        return null;
    }

    if ($USERS[$username]['password'] === $password) {
        return [
            'username' => $username,
            'role'     => $USERS[$username]['role'],
        ];
    }

    return null;
}
