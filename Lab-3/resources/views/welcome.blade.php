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
    <h1>Вся таблиця даних</h1>
    <table border="1">
        <tr>
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
                <td><a href="/tournaments/{{$tournament->id}}">Show</a></td>
                <td><a href="/tournaments/{{$tournament->id}}/edit">Edit</a></td>
                <td><a onclick="event.preventDefault(); document.getElementById('delete-form-{{$tournament->id}}').submit();">Delete
                    <form id="delete-form-{{$tournament->id}}" action="/tournaments/{{$tournament->id}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </a></td>
            </tr>
        @endforeach
    </table>
    <button><a href="/tournaments/create">Create</a></button>

</body>
</html>
