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
            <h4>Create a Code, {{ auth()->user()->name }}</h4>
            <br>
            <!-- @if (isset($newAnswers))
                You created {!! $newAnswers->HTML_representation !!}
            @endif -->
            <!-- {{{ $newAnswers->HTML_representation or ''}}} -->
            <br>
            <form method="POST" action="/create-an-answer">

                {{ csrf_field() }}


                <div class="form-group">
                    <label>The code:</label>
                    <input class="custom-input" type="text" id="g0" name="g0" size="1" maxlength="1"></input>
                    <input class="custom-input" type="text" id="g1" name="g1" size="1" maxlength="1"></input>
                    <input class="custom-input" type="text" id="g2" name="g2" size="1" maxlength="1"></input>
                    <input class="custom-input" type="text" id="g3" name="g3" size="1" maxlength="1"></input>
                </div>
                <div class="form-group">
                    <label>The message:</label>
                    <textarea name="message" class="message"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-sm btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
                <div class="form-group">
                    @include ('errors')
                </div>
            </form>
        </div>

        <script src="/js/inputcolorer.js"></script>
    </body>


</html>
