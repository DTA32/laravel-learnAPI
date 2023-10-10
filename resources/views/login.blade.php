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
            <div class="h-2/3 w-1/4 rounded-lg border border-2 bg-white p-8 flex flex-col gap-12">
                <h1 class="text-4xl text-center font-bold">Login</h1>
                <form method="POST" action="{{route('auth_login')}}" class="flex flex-col gap-12">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col">
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" class="border border-2 rounded-lg p-2">
                        </div>
                        <div class="flex flex-col">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="border border-2 rounded-lg p-2">
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 items-center text">
                        <button class="border rounded bg-orange-400 hover:bg-orange-500 w-1/2 py-1 px-3">Login</button>
                        <button class="border rounded bg-gray-200 hover:bg-gray-300 w-1/2 py-1 px-3">Login with Google</button>
                    </div>
                </form>
                <div class="flex flex-row justify-center">
                    <p>Doesn't have account yet?</p>
                    <a href={{route('register')}} class="text-blue-500">Register</a>
                </div>
                <p class="text-center text-red-500">{{Session::pull('error')}}</p>
            </div>
        </div>
    </body>
</html>
