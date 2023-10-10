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
            <div class="h-5/6 w-1/4 rounded-lg border border-2 bg-white p-8 flex flex-col gap-12">
                <div class="flex flex-col">
                    <a class="rounded-lg bg-gray-300 hover:bg-gray-400 px-3 w-1/6 h-2/3 flex items-center" href="{{route('login')}}">Back</a>
                    <h1 class="text-4xl font-bold text-center">Register</h1>
                    <div></div>
                </div>
                <form method="POST" action="{{route('auth_register')}}" class="flex flex-col gap-12">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col">
                            <label for="username">Name:</label>
                            <input type="text" name="name" id="name" class="border border-2 rounded-lg p-2">
                        </div>
                        <div class="flex flex-col">
                            <label for="username">Email:</label>
                            <input type="text" name="email" id="email" class="border border-2 rounded-lg p-2">
                        </div>
                        <div class="flex flex-col">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="border border-2 rounded-lg p-2">
                        </div>
                        <div class="flex flex-col">
                            <label for="password">Confirm Password:</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="border border-2 rounded-lg p-2">
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 items-center text">
                        <button class="border rounded bg-orange-400 hover:bg-orange-500 w-1/2 py-1 px-3">Register</button>
                    </div>
                </form>
                <p class="text-center text-red-300">{{Session::pull('error')}}</p>
            </div>
        </div>
    </body>
</html>
