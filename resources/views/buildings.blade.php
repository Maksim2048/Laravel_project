<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>609-32</title>
</head>
<body>
    <h2>Список корпусов:</h2>
    <table border = 1>
        <thead>
            <td>ID</td>
            <td>Наименование</td>
        </thead>
        @foreach($buildings as $building)
            <tr>
                <td>{{$building->id}}</td>
                <td>{{$building->name}}</td>
            </tr>
            </tr>
        @endforeach
    </table>

</body>
</html>
