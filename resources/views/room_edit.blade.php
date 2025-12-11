<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>609-32</title>
    <style> .is-invalid{color: red;}</style>
</head>
<body>
    <h2>Редактирование комнаты</h2>
    <form method="post" action="{{url('room/update/' .$room->id)}}">
        @csrf
        <label>Номер комнаты</label>
        <input type="text" name="room_number" value="@if (old('room_number')) {{old('room_number')}} @else {{$room->room_number}}@endif">
        @error('room_number')
        <div class="is-invalid">{{$message}}</div>
        @enderror
    <br>
    <br>
        <label>Цена</label>
        <input type="text" name="price" value="@if (old('price')) {{old('price')}} @else {{$room->price}}@endif">
        @error('price')
        <div class="is-invalid">{{$message}}</div>
        @enderror
    <br>
    <br>
        <label>Корпус:</label>
        <select name="building_id" value="{{old('building_id')}}">
            @foreach($buildings as $building)
                <option value="{{$building->id}}"
                        @if(old('building_id') == $building->id) selected @endif>
                    {{$building->name}}
                </option>
            @endforeach
        </select>
        @error('building_id')
        <div class="is-invalid">{{$message}}</div>
        @enderror
    <br>
    <br>
        <label>Количество мест:</label>
        <input type="number" name="beds_count" value="{{ old('beds_count', $room->beds_count) }}">
        @error('beds_count')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
    <br>
        <input type="submit">
    </form>
</body>
</html>
