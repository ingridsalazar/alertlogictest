<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Find Movies</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
        <form id="sampleForm" name="sampleForm" method="post" action="findMovie.php">
            <div class="container">
                <div class="jumbotron">
                    <h1>Find Movies</h1>
                    <p>Search for an actor's name.</p> 
                </div>
                <div class="row">
                    <input id="nameActor" name="nameActor" type="text" />
                    <button id="find" type="submit" class="btn btn-primary">Search</button>
                    <br>
                </div>
            </div>
        </form>
    </body>
</html>
