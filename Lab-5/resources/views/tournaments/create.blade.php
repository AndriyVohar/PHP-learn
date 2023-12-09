<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create</title>

    <!-- Styles -->
    <style>
    </style>
</head>
<body class="antialiased">
    <form action="/tournaments" method="post">
        @csrf
        <label for="">
            FullName
            <input name="fullName" type="text">
        </label>
        <label for="">
            Sex
            <input name="sex" type="text">
        </label>
        <label for="">
            Country
            <input name="country" type="text">
        </label>
        <label for="">
            Marks
            <input name="marks" type="text">
        </label>
        <button type="submit">Save</button>
    </form>
</body>
</html>
