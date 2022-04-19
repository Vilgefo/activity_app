<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ActivityApp</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            .app{
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                min-height: 100vh;
            }
            .list{
                margin: 0 auto;
            }
            .list__routes{
                display: grid;
                grid-template: auto/ auto auto auto;
            }
            .list__item{
                padding: 10px;
                border-bottom: 1px solid black;
            }
            .justify-between:inline-flex{
                display: flex;
            }
            svg{
                display: none;
            }
        </style>
    </head>
    <body>
    <div class="app">
        <div class="list">
            <div class="list__routes">
                <div class="list__item">
                    route
                </div>
                <div class="list__item">
                    count
                </div>
                <div class="list__item">
                    last ts
                </div>
                @foreach ($routes as $route)
                    <div class="list__item">
                        {{ $route['route'] }}
                    </div>
                    <div class="list__item">
                        {{ $route['count'] }}
                    </div>
                    <div class="list__item">
                        {{ $route['last_ts'] }}
                    </div>
                @endforeach
                <div class="pagination">
                    {{$routes->links()}}
                </div>
            </div>

        </div>

    </div>
    <script>
        function getCookie(name) {
            let matches = document.cookie.match(new RegExp(
                "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
            ));
            return matches ? decodeURIComponent(matches[1]) : undefined;
        }
        if(!getCookie('tz')){
            const tz = Intl.DateTimeFormat().resolvedOptions().timeZone;
            document.cookie = 'tz='+tz
            location.reload()
        }
    </script>
    </body>
</html>
