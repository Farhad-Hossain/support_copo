<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <style>
        a{
            width: 50%; 
            height: 80px; 
            padding: 10px 20px; 
            background-color: grey; 
            color: white;
              
        }
        a:hover{
            text-decoration: none;
            color: white; 
            font-weight: bold;
        }
    </style>
    
</head>
<body>
    <div class="row">
        <div class="col-6 offset-3 text-center mt-5">
            <a href="{{route('institute_page')}}" >SCHOOL / COLLEGE</a>
            <a href="{{route('board_page')}}" >BOARD</a>    
        </div>
            
            
        </div>
    </div>
    
</body>
</html>
