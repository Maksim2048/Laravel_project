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
    <h2>Добавление комнаты</h2>
    <form method="post" action={{url('room')}}>
        @csrf
        <label>Наименование</label>
        <input type="text" name="name" value="{{old('name')}}">
        @error('name')
        <div class="is-invalid">{{$message}}</div>
        @enderror
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
        @error('category_id')
        <div class="is-invalid">{{$message}}</div>
        @enderror
    <br>
        <input type="submit">
    </form>
</body>
</html>
