<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
</head>
<body class="bg-slate-200 ml-20">
<h1 class="border-b-4 border-neutral-700 w-40 mb-4 mt-6 text-xl">Учасник за Id: <span class="text-red-500">{{$tournament->id}}</span></h1>
<div class="border-b-2 border-neutral-700 w-60">FullName: {{$tournament->fullName}}</div>
<div class="border-b-2 border-neutral-700 w-40">Sex: {{$tournament->sex}}</div>
<div class="border-b-2 border-neutral-700 w-40">Country: {{$tournament->country}}</div>
<div class="border-b-2 border-neutral-700 w-40">Marks: {{$tournament->marks}}</div>
</body>
</html>
