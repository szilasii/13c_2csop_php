<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
if ($uri == "/api/users") {
    switch ($method) {
        case 'GET':
            $response = [
                "status" => "success",
                "message" => "This is a GET request",
                "code" => 201,
                "data" => [
                    [
                        "id" => 1,
                        "name" => "John Doe",
                        "email" => "john.doe@example.com"
                    ],
                    [
                        "id" => 2,
                        "name" => "Jane Smith",
                        "email" => "jane.smith@example.com"
                    ]
                ]
            ];

            echo json_encode($response);
            break;


        case 'POST':
            $input = json_decode(file_get_contents("php://input"), true);

            $response = [
                "status" => "success",
                "message" => "This is a POST request",
                "code" => 201,
                "data" => $input
            ];
            http_response_code(201);
            echo json_encode($response);
            break;
        default:
            http_response_code(405);
            echo json_encode(["message" => "Method Not Allowed"]);
            break;
    }
} else {
    http_response_code(404);
    echo json_encode(["message" => "Endpoint Not Found"]);
}
