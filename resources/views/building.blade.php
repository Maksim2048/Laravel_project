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
    <h2>{{$building ? "Список номеров корпуса «"  .$building->name ."»" : "Неверный id корпуса"}}</h2>
    @if($building)
    <table border="1">
        <thead>
            <td>ID</td>
            <td>Номер комнаты</td>
            <td>Количество мест</td>
            <td>Цена</td>
        </thead>
        @foreach($building->rooms as $room)
            <tr>
                <td>{{$room->id}}</td>
                <td>{{$room->room_number}}</td>
                <td>{{$room->beds_count}}</td>
                <td>{{$room->price}}</td>
            </tr>
        @endforeach
    </table>
    @endif
</body>
</html>
