<!doctype html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>

<body class="bg-slate-200 ml-20 mt-5">
    <header class="flex text-2xl">
        <h1 >Вся таблиця даних</h1>
        <a href="{{ route('dashboard') }}" class="ml-8 border-4 border-cyan-700">
            <span class="material-symbols-outlined">
                person
            </span>
            Profile
        </a>
    </header>
    <br>
    <table class="rounded border-2 border-orange-950">
        <tr class="bg-red-300">
            <td class="border-2 border-orange-950">FullName</td>
            <td class="border-2 border-orange-950">Sex</td>
            <td class="border-2 border-orange-950">Country</td>
            <td class="border-2 border-orange-950">Marks</td>
            <td class="border-2 border-orange-950">Show Btn</td>
            <td class="border-2 border-orange-950">Edit Btn</td>
            <td class="border-2 border-orange-950">Delete Btn</td>
        </tr>
        @foreach ($tournaments as $tournament)
            <tr>
                <td class="border-2 border-orange-950 bg-red-100">{{ $tournament->fullName }}</td>
                <td class="border-2 border-orange-950 bg-red-100">{{ $tournament->sex }}</td>
                <td class="border-2 border-orange-950 bg-red-100">{{ $tournament->country }}</td>
                <td class="border-2 border-orange-950 bg-red-100">{{ $tournament->marks }}</td>
                <td class="border-2 border-orange-950 bg-orange-100"><a
                        href="/tournaments/{{ $tournament->id }}">Show</a></td>
                <td class="border-2 border-orange-950 bg-orange-200"><a
                        href="/tournaments/{{ $tournament->id }}/edit">Edit</a>
                </td>
                <td class="border-2 border-orange-950 bg-stone-500"><a
                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $tournament->id }}').submit();">Delete
                        <form id="delete-form-{{ $tournament->id }}" action="/tournaments/{{ $tournament->id }}"
                            method="POST" class="none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </a></td>
            </tr>
        @endforeach
    </table>
    <br>
    <a href="/tournaments/create" class="border-4 rounded-sm border-amber-800 px-10 bg-orange-300 text-red-900">Create</a>

</body>

</html>
