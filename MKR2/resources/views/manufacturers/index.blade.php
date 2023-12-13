<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>

<body>
    <table class="rounded border-2 border-orange-950">
        <tr border="1" class="bg-red-300">
            <td>Brand</td>
            <td>Country</td>
            <td>Phone number</td>
            <td>Email adress</td>
            <td></td>
        </tr>
        @foreach ($manufacturers as $manufacturer)
            <tr>
                <td class="border-2 border-orange-950 bg-red-100">{{ $manufacturer->brand }}</td>
                <td class="border-2 border-orange-950 bg-red-100">{{ $manufacturer->country }}</td>
                <td class="border-2 border-orange-950 bg-red-100">{{ $manufacturer->phone }}</td>
                <td class="border-2 border-orange-950 bg-red-100">{{ $manufacturer->email }}</td>
                <td class="border-2 border-orange-950 bg-stone-500">
                    <a href="/manufacturers/{{ $manufacturer->id}}">Show</a>
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
