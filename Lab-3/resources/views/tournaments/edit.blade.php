<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit</title>

    <!-- Styles -->
    <style>
    </style>
</head>
<body class="antialiased">
<form action="/tournaments/{{$tournament->id}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="put" />
    <label for="">
        FullName
        <input name="fullName" type="text" value="{{$tournament->fullName}}">
    </label>
    <label for="">
        Sex
        <input name="sex" type="text" value="{{$tournament->sex}}">
    </label>
    <label for="">
        Country
        <input name="country" type="text" value="{{$tournament->country}}">
    </label>
    <label for="">
        Marks
        <input name="marks" type="text" value="{{$tournament->marks}}">
    </label>
    <button type="submit">Save</button>
</form>
</body>
</html>
