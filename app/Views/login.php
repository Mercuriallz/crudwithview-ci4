<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form design</title>
     <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }
        body{
            min-height: 100vh;
             background: #eee;
             display: flex;
             font-family: sans-serif;
        }
        .container{
            margin: auto;
            width: 500px;
            max-width: 90%;
        }
        .container form{
            width: 100%;
            height: 100;
            padding: 20px;
            background: white;
            border-radius: 4px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, .3);
        }
        .container form h1{
            text-align: center;
            margin-bottom: 30px;
            color: #222;
        }
        .container form .form-control{
            width: 100%;
            height: 40px;
            background: white;
            border-radius: 4px;
            border: 1px solid silver;
            margin: 10px 0 18px 0;
            padding: 0 10px;
        }
        .container form .btn {
            margin-left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 34px;
            border: none;
            outline: none;
            background: #27a327;
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
            color: white;
            border-radius: 4px;
            transition: .3s;
            padding: 10px;
            margin-bottom: 10px;
        }

        .container form .btn1 {
            margin-left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 34px;
            border: none;
            outline: none;
            background: #27a327;
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
            color: white;
            border-radius: 4px;
            transition: .3s;
            padding: 10px;
        }
        .container form .btn:hover{
            opacity: .7;
        }
     </style>
</head>
<body>

<div class="container">
    <form action="/signin" method="post">
        <h1>Login</h1>
        <div class="form-group">
            <label for=""> Email</label>
            <input type="text" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <input type="submit" class="btn" value="login">
        <input type="submit" class="btn1" value="register">
        </form>
</div>
    
</body>
</html>