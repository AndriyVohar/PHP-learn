<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
</head>

<body class="bg-slate-200 mt-10 ml-5">
    <div class="border-b-2 border-neutral-700 w-60">Id: {{ $manufacturer->id }}</div>
    <div class="border-b-2 border-neutral-700 w-60">Brand: {{ $manufacturer->brand }}</div>
    <div class="border-b-2 border-neutral-700 w-60">Country: {{ $manufacturer->country }}</div>
    <div class="border-b-2 border-neutral-700 w-60">Phone number: {{ $manufacturer->phone }}</div>
    <div class="border-b-2 border-neutral-700 w-80">Email: {{ $manufacturer->email }}</div>
    <hr>
    <div>
        Products:
        @foreach ($products as $product)
            <div>
                Name: {{ $product->name }} -> Price: {{ $product->price }}
            </div>
        @endforeach
    </div>
    <div class="mt-5"><a href="/manufacturers/{{ $manufacturer->id }}/edit" class="border-neutral-700 border-4">Edit Manufacturer</a></div>
</body>

</html>
