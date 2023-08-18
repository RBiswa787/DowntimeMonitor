<?php
namespace App\Controllers;

use App\Models\User; 
public static function signup() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = new User();
        $user->username = $username;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->save();
        

        header('Content-Type: application/json');
        echo json_encode(['message' => 'User registered successfully']);
        exit();
    }
}

public static function signin() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = User::where('username', $username)->first();

        if ($user && password_verify($password, $user->password)) {
            header('Content-Type: application/json');
            echo json_encode(['message' => 'User signed in successfully']);
            exit();
        } else {
            header('Content-Type: application/json', true, 401);
            echo json_encode(['message' => 'Invalid username or password']);
            exit();
        }
    }
}
