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
    @if($rooms instanceof \Illuminate\Support\Collection)
        {{-- Если $rooms — коллекция (список комнат) --}}
        <h2>Список номеров</h2>
        <table border="1">
            <thead>
            <tr>
                <th>ID</th>
                <th>Номер комнаты</th>
                <th>Количество мест</th>
                <th>Цена</th>
                <th>Корпус</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->room_number }}</td>
                    <td>{{ $room->beds_count }}</td>
                    <td>{{ $room->price }}</td>
                    <td>{{$room->building->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @elseif($rooms instanceof \App\Models\Room)
        {{-- Если $rooms — одна комната --}}
        <h2>{{$rooms ? "Список гостей для комнаты c ID: " .$rooms->id : "Неверный ID комнаты!"}}</h2>

        @if($rooms->users && $rooms->users->count() > 0)
            <table border="1">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Телефон</th>
                    <th>Дата заезда</th>
                    <th>Дата выезда</th>
                    <th>Статус</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rooms->users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->pivot->check_in_date }}</td>
                        <td>{{ $user->pivot->check_out_date }}</td>
                        <td>{{ $user->pivot->status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Нет гостей в этом номере</p>
        @endif
    @endif
</body>
</html>
