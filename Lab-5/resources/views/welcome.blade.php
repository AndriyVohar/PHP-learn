<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body>
    <header style="display: flex">
        <h1>Вся таблиця даних</h1>
        <a href="{{route('dashboard')}}" style="margin-left:20vw; font-size:24px;">Profile</a>
    </header>
    <br>
    <table border="1">
        <tr style="background-color: gray;">
            <td>FullName</td>
            <td>Sex</td>
            <td>Country</td>
            <td>Marks</td>
            <td>Show Btn</td>
            <td>Edit Btn</td>
            <td>Delete Btn</td>
        </tr>
        @foreach($tournaments as $tournament)
            <tr>
                <td>{{$tournament->fullName}}</td>
                <td>{{$tournament->sex}}</td>
                <td>{{$tournament->country}}</td>
                <td>{{$tournament->marks}}</td>
                <td style="background-color: lightyellow"><a href="/tournaments/{{$tournament->id}}">Show</a></td>
                <td style="background-color: lightsalmon"><a href="/tournaments/{{$tournament->id}}/edit">Edit</a></td>
                <td style="background-color: silver"><a onclick="event.preventDefault(); document.getElementById('delete-form-{{$tournament->id}}').submit();">Delete
                    <form id="delete-form-{{$tournament->id}}" action="/tournaments/{{$tournament->id}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </a></td>
            </tr>
        @endforeach
    </table>
    <br>
    <a href="/tournaments/create" style="padding: 10px; background-color: orange;">Create</a>
    
</body>
</html>
