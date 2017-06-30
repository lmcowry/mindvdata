<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mind V Data</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

        <!-- Font Awesome -->
        <script src="https://use.fontawesome.com/30e8d04d9b.js"></script>

        <link rel="stylesheet" href="/css/customstyle.css">

        <link href="https://fonts.googleapis.com/css?family=Bungee+Outline" rel="stylesheet">

    </head>

    <body>
        <div class="container">
            <br>
            <br>
            <h1 class="the-big-heading">Mind V Data</h1>
            <h4>Register</h4>
            <br>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <form method="POST" action="/register">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                            <div>I will never email you stuff or send your data to others</div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Password Confirmation:</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <div>
                            <button type="submit" class="btn-sm btn-primary">Register</button>
                        </div>

                        <div class="form-group">
                            @include ('errors')
                        </div>

                    </form>
                </div>
                <div class="col-12">
                    <a href="https://christianlowry.com/mindvdataj/tutorial1.html">Play the tutorial without signing up</a>
                </div>
                <div class="col-12">
                    <a href="https://christianlowry.com/mindvdataj/game.html">Play a basic version of the game without signing up</a>
                </div>
            </div>



        </div>

    </body>


</html>
