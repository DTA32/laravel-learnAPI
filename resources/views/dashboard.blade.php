<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Learn API</title>

        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="flex justify-center items-center h-screen bg-gray-500">
            <div class="h-2/3 w-1/4 rounded-lg border border-2 bg-white p-8 flex flex-col items-center gap-12">
                <h1 class="text-4xl font-bold">Dashboard</h1>
                <div class="">
                    <p>User name: {{Auth::user()->name}}</p>
                    <p>Email: {{Auth::user()->email}}</p>
                    <p>User type: {{Auth::user()->type}}</p>
                    <p>Google ID: {{Auth::user()->google_id}}</p>
                </div>
                <a href="{{route('auth_logout')}}" class="text-center border rounded bg-orange-400 hover:bg-orange-500 w-1/2 py-1 px-3">Logout</a>
            </div>
        </div>
    </body>
</html>
