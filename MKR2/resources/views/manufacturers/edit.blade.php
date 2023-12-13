<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Edit</title>
</head>
<body class="antialiased" class="ml-20 mt-10">
    <form method="POST" action="/manufacturers/{{$manufacturer->id}}" class=" bg-slate-200 mb-4 mt-6 block">

        @csrf
        @method('PUT')
        <label for="" class="block">
            Brand:
            <input name="brand" type="text" value="{{$manufacturer->brand}}" class="border-neutral-700 border-2">
        </label>
        <label for="" class="block">
            Country:
            <input name="country" type="text" value="{{$manufacturer->country}}" class="border-neutral-700 border-2">
        </label>
        <label for="" class="block">
            Phone number: 
            <input name="phone" type="text" value="{{$manufacturer->phone}}" class="border-neutral-700 border-2">
        </label>
        <label for="" class="block">
            Email: 
            <input name="email" type="text" value="{{$manufacturer->email}}" class="border-neutral-700 border-2">
        </label>
        <button type="submit" class="border-neutral-700 border-4">Save</button>
    </form>
</body>
</html>