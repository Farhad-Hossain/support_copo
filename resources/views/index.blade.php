<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Support | Shikkhangon</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <style>
        a.institute{
            padding: 5px 10px; 
            background-color: deeppink;
            border-radius: 50px; 
            font-size: 22px;
            width: 100%;
            display: block;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
            text-align: center;
        }
        a.board{
            padding: 5px 10px; 
            background-color: green;
            border-radius: 50px; 
            font-size: 22px;
            width: 100%;
            display: block;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
            text-align: center;
        }
        a.institute:hover{
            text-decoration: none;
            background-color: red;
            color: white; 
            font-weight: bolder;
        }
        a.board:hover{
            text-decoration: none;
            background-color: darkgreen;
            color: white; 
            font-weight: bolder;
        }
    </style>
    
</head>
<body>
    <div>
        <div class="row">
            <div class="col-sm-12 col-md-6 offset-md-3">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center" style="margin-bottom: 10px;">
                        <img src="{{asset('assets/img/shikkhangon_logo.png')}}" style="width: 100px; height: 100px;">
                    </div>



                    <div class="col-sm-12 col-md-6 mb-4 mb-md-0">
                        <hr />
                        <a href="{{route('institute_page')}}" class="institute">School / College</a>
                    </div>    

                    <div class="col-sm-12 col-md-6">
                        <hr />
                        <a href="{{route('board_page')}}" class="board">Board</a>
                    </div>  
                </div>        

                <div class="fixed-bottom d-flex justify-content-center">
                    <div>
                        <img src="{{asset('assets/img/copotronic_logo.png')}}"><br />
                        <span>&copy; {{date('Y')}} copotronic Info Systems Ltd</span>    
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>
