<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title . " - ". config('app.name')}}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <main>
        <div class="container">
            <div class="row vh-100 align-items-center justify-content-center">
                <div class="col-md-5">
                    <div class="card shadow border-0 bg-gradient border-top border-primary">
                        <div class="card-body">
                            {{$slot}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
