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
            <div class="row">
                <div class="col-2 offset-10">
                    Hello {{ auth()->user()->name }}! <a href="/logout">Signout?</a>
                </div>
            </div>
            <br>
            <br>
            <h1 class="the-big-heading">Mind V Data</h1>
            <h4>The Game</h4>
            <br>
            <br>
            <div class="row">
                <div class="col-6">
                    <form method="POST" action="/play">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <input class="custom-input" type="text" id="g0" name="g0" size="1" maxlength="1"></input>
                            <input class="custom-input" type="text" id="g1" name="g1" size="1" maxlength="1"></input>
                            <input class="custom-input" type="text" id="g2" name="g2" size="1" maxlength="1"></input>
                            <input class="custom-input" type="text" id="g3" name="g3" size="1" maxlength="1"></input>
                            <button type="submit" class="btn-sm btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </div>
                    </form>

                    <!-- <div class="card">
                        <div class="card-block">
                            You have 5 codes to break. Each code is comprised of r,g,b,c,y, and or m. Submit a code and it will display to the right. If it's an answer, you'll know. If it's incorrect, you are given clues
                            . The first group of numbers between the |x|x|x|x| relate to the number of codes with that color. x? is for how many codes with that color are in all of the other spots (not a single answer has
                            that color right there). x! means there is that color right there, and x represents how many. After that, the x&amp;x numbers represent how many answers have those first two colors in the first two
                            spots and how many answers have those first three colors in the first three spots.
                        </div>
                    </div> -->
                    <div class="card">
                        <div class="card-block">
                    Possible answers: r g b c y m <br><br>

                    ! right color, right spot <br> ? right color, wrong spot <br>
                    1st 2 like this <b>&amp;</b> 1st 3 like this <br> <br>

                    A 0? means there isn't that color in any of the answers<br><br>

                    Goal: guess all 5 answers one at a time<br> <br>

                    <a href="/newgame">Would you like to start a new game?</a><br>
                        </div>
                    </div>
                    <div class="col-12">
                        <a href="https://christianlowry.com/mindvdataj/tutorial1.html">Play the tutorial without signing up</a>
                    </div>
                    <div class="col-12">
                        <a href="https://christianlowry.com/mindvdataj/game.html">Play a basic version of the game without signing up</a>
                    </div>
                </div>

                <div class="col-6">
                    @foreach ($guesses as $guess)
                        {!! $guess->HTML_representation !!} <br>
                    @endforeach
                </div>

            </div>
        </div>

        <script src="/js/inputcolorer.js"></script>

    </body>


</html>
