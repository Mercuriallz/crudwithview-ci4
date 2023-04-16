<?php

namespace app\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModels;
use \Firebase\JWT\JWT;

class UserController extends ResourceController {

    use ResponseTrait;

    public function indexLogin() {
        return view("login");
    }

    public function indexRegister() {
        return view("register");
    }

    public function getUser() {
        $userModel = new UserModels();
        $result = $userModel->findAll();

        if($result) {
            $response = [
            "status" => 200,
            "data" => $result,
            "message" => "Successfully Get User"
            ];
            return $this->respond($response);
        } else {
            $response = [
            "status" => 404,
            "message" => "User Not Found"
            ];
            return $this->respond($response, 400);
        }
    }

    public function signUp () {
        $rules = [
            'username' => 'required|min_length[8]|',
            'password' => 'required|min_length[8]|'
            
        ];

        $message = [
            'username' => [
                'required' => 'min 8 characters'
            ],
            'password' => [
                'required' => 'min 8 characters'
            ] 
            ];

            $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);

            if (!$this->validate($rules, $message)) {
                $response = [
                    "status" => 400,
                    "error" => true,
                    "message" => $this->validator->getErrors(),
                    'data' => []
                ];
                return $this->respond($response, 400);
            } else {
                $authModel = new UserModels();
                $data = [
                    "email" => $this->request->getVar("email"),
                    "username" => $this->request->getVar("username"),
                    "password" => $password
                ];

                $result = $authModel->save($data);
                
                if($result) {
                    $response = [
                        "status" => 201,
                        "message" => "succesfully create account"
                    ];
                    return redirect()->to("/login");
                } else {
                    $response = [
                        "status" => 400,
                        "message" => "cannot create account"
                    ];
                    return $this->respond($response, 400);
                }
            }
    }

    public function signIn()
    {
        $usersModels = new UserModels();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        // $findUsers = $usersModels->where("username", $username)->first();
        $user = $usersModels->where('email', $email)->first();
        $pwd_verify = password_verify($password, $user['password']);
        if($pwd_verify) {
            $key = "SECRET_KEY";
            $iat = time(); // current timestamp value
            $exp = $iat + 3600;
 
            $payload = array(
              
                "iat" => $iat, //Time the JWT issued at
                "exp" => $exp, // Expiration time of token
                "email" => $user['email'],
                "password" => $user['password']
                
            );
              
            $token = JWT::encode($payload, $key, 'HS256');
      
            $response = [
                'message' => 'Login Succesful',
                'token' => $token
            ];
              
            // return $this->respond($response, 200);
            return redirect()->to("/home");
        } else {
            return $this->respond([
                "error" => "ERROR"
            ]);
        }
        // return $this->respond($pwd_verify);
     
        
        // if($user == null || $user == []) {
        //     $this->respond(["error" => "Error"]);
        // } else {
        // $passwordVerify = password_verify($password,$user["password"]);
        //     if(!$passwordVerify) {
        //         $this->respond(["error" => "password not matching"]);
        //     } else {
        //         $key = getEnv('JWT_SECRET');

        //         $iat = time();
        // $exp = $iat + 3600;

        // $payload = array(
        //     "iss" => "issuer of the jwt",
        //     "aud" => "Audience that the jwt",
        //     "sub" => "Subject of the JWT",
        //     "iat" => $iat, //Time the JWT issued at
        //     "exp" => $exp, // Expiration time of token
        //     "email" => $user['email'],
        // );

        // $token = JWT::encode($payload, $key, 'HS256');

        // $response = [
        //     "message" => "Success Login",
        //     "token" => "$token"
        // ];

        // return $this->respond($response, 200);
        //     }
        // }



        // if(is_null($user)) {
        //     return $this->respond(['error' => 'Invalid Username']);
        // } else if($user !=null) {
        // password_verify($password, $user['password']);
        // } else {
        //  $this->respond(['error' => 'invalid username or password']);
        // }
        
        // // if(!$pwd_verify) {
        // //     return $this->respond(['error' => 'Invalid Username or Password']);
        // // }

        // $key = getEnv('JWT_SECRET');
        // $iat = time();
        // $exp = $iat + 3600;

        // $payload = array(
        //     "iss" => "issuer of the jwt",
        //     "aud" => "Audience that the jwt",
        //     "sub" => "Subject of the JWT",
        //     "iat" => $iat, //Time the JWT issued at
        //     "exp" => $exp, // Expiration time of token
        //     "email" => $user['email'],
        // );

        // $token = JWT::encode($payload, $key, 'HS256');

        // $response = [
        //     "message" => "Success Login",
        //     "token" => "$token"
        // ];

        // return $this->respond($response, 200);
        // $authPass = password_hash(base64_encode(hash('sha256', $this->request->getVar('password'), true)), PASSWORD_BCRYPT);

    //     $authVerify = password_verify($password, $findUsers['password']);

    //     if ($authVerify) {
    //         $response = [
    //             "status" => 200,
    //             "data" => [
    //                 'id' => $findUsers['id'],
    //                 'name' => $findUsers['name'],
    //                 'username' => $findUsers['username'],
    //             ]   
    //         ];
    //         return $this->respond($response);
    //     } else {
    //         $response = [
    //             "status" => 400,
    //             'error' => true,
    //             "message" => "Wrong Password"
    //         ];
    //         return $this->respond($response, 400);
    //     }
    // }

    }
}
