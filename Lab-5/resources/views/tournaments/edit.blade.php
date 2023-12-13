<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit</title>

    <!-- Styles -->
    <style>
    </style>
</head>
<body class="antialiased bg-slate-200 ml-20 mt-10">
    <h1 class="border-b-4 border-neutral-700 w-40 mb-4 mt-6 text-2xl">Edit</h1>
<form action="/tournaments/{{$tournament->id}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="put" />
    <label for="" class="block border-b-2 border-neutral-700 w-80 mb-4">
        FullName:
        <input name="fullName" type="text" value="{{$tournament->fullName}}">
    </label>
    <label for="" class="block border-b-2 border-neutral-700 w-80 mb-4">
        Sex:
        <input name="sex" type="text" value="{{$tournament->sex}}">
    </label>
    <label for="" class="block border-b-2 border-neutral-700 w-80 mb-4">
        Country:
        <input name="country" type="text" value="{{$tournament->country}}">
    </label>
    <label for="" class="block border-b-2 border-neutral-700 w-80 mb-4">
        Marks:
        <input name="marks" type="text" value="{{$tournament->marks}}">
    </label>
    <button type="submit" class="border-4 py-2 px-5 mt-1 border-cyan-900 bg-cyan-700">Save</button>
</form>
</body>
</html>
