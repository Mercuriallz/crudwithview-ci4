<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Popup</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script> 
    <style>
        #popup-container{
            position: absolute;
            left: 25%;
            top: 10%;
            z-index: 11111;
            width: 45%;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px #ccc;
            display: none;
        }

        #btn {
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

        #close-btn{
            float: right;
            cursor: pointer;
        }

        .form-control {
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <button id="show-popup-btn">Insert Event</button>

    <div id="popup-container">
        <div id="close-btn">
            <span id="close-btn">Close</span>
        </div>
        <h2>Insert Event</h2>
        <form action="/add-event" method="post" enctype="multipart/form-data">
            Enter your event <br>
            <input type="text" name="title" class="form-control" placeholder="input your event title">
            <br>
            <input type="text" name="description" class="form-control" placeholder="input your description event">
            <br>
            <input type="file" name="gambar" class="form-control"> 

        <input type="submit" class="btn" value="submit">

        </form>

    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#show-popup-btn").click(function(){
                $("#popup-container").show();
            })

            $("#close-btn").click(function(){
                $("#popup-container").hide()
            })
        })
    </script> 
</body>
</html>