<?php

require __DIR__ . "../core/Controller.php";
require __DIR__ . "../core/Database.php";
class UserController extends Controller {
    private $db;

    public function __construct($config) {
        $this->db = new Database($config);
    }

    public function getUsers() {
        $stmt = $this->db->query("SELECT * FROM users");
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->json([
            "status" => "success",
            "message" => "Users retrieved successfully",
            "code" => 200,
            "data" => $users
        ]);
    }
    public function getUsersById($id) {
        $stmt = $this->db->query("SELECT * FROM users WHERE id = ?", [$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->json([
            "status" => "success",
            "message" => "Users retrieved successfully",
            "code" => 200,
            "data" => $user
        ]);
    }

    public function createUser() {
        $input = $this->getInput();
        if (isset($input['email']) && isset($input['password'])) {
            $stmt = $this->db->query("INSERT INTO users (userId, email, password) VALUES (null, ?, ?)", [
                $input['email'],
                $input['password']
            ]);
     
            $this->json([
                "status" => "success",
                "message" => "User created successfully",
                "code" => 201,
                "data" => [
                    "email" => $input['email']
                ]
            ], 201);
        } else {
            $this->json([
                "status" => "error",
                "message" => "Invalid input",
                "code" => 400
            ], 400);
        }
    }
}