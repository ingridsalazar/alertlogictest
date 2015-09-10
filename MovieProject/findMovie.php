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
        <script type="text/javascript">
            var cadena = '';
            var peliculas = '';

            function custom_sort(a, b) {
                return new Date(a.release_date).getTime() < new Date(b.release_date).getTime();
            }

            function make_item_rows(result_array) {
                var rowCount = $('#result tr').size();
                if (rowCount > 1) {
                    $('#result tr').not(':first-child').remove();
                }
                cadena = '';
                for (i = 0; i < result_array.length; i++) {
                    result_array[i].known_for.sort(custom_sort);
                    peliculas = '';
                    for (j = 0; j < result_array[i].known_for.length; j++) {
                        peliculas += result_array[i].known_for[j].title + ' - ' + result_array[i].known_for[j].release_date + '<br>';
                    }
                    cadena += '<tr><td>' + result_array[i].name + '</td><td>' + peliculas + '</td></tr>';
                }

                $('#result tr:last').after(cadena);
            }

            $(document).ready(function () {
                $(':text:first').focus();
                var url = 'http://api.themoviedb.org/3/';
                var mode = 'search/person?query=';
                var key = '&api_key=cfda3111aff857552ddbdb06e50bb825';
                var input = '<?php echo $_POST['nameActor']; ?>';
                $.ajax({
                    type: 'GET',
                    url: url + mode + input + key,
                    async: false,
                    contentType: 'application/json',
                    dataType: 'jsonp',
                    success: function (json) {
                        make_item_rows(json.results);
                    },
                    error: function (e) {
                        console.log(e.message);
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h1>Find Movies</h1>
                <p>Search for an actor's name.</p> 
            </div>
            <div class="row">
                <table class="table table-striped table-bordered table-hover table-condensed" id="result">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Peliculas</th>
                        </tr>
                    </thead>
                    <tbody id="cuerpo"></tbody>
                </table>
            </div>
        </div>
    </body>
</html>
