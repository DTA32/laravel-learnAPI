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
                    <p>ID: {{Auth::id()}}</p>
                    <p>User name: {{Auth::user()->name}}</p>
                    <p>Email: {{Auth::user()->email}}</p>
                    <p>Google ID: {{Auth::user()->google_id}}</p>
                </div>
                <div class="overflow-y-scroll divide-y divide-solid">
                    @foreach ($orders as $order)
                    <div class="grid grid-cols-2">
                        <div>
                            <p>ID: {{$order->id}}</p>
                            <p>Amount: {{$order->amount}}</p>
                        </div>
                        <div class="w-1/3 h-1/3 justify-self-end">
                            <a href={{route('order_detail', $order->id)}} class="rounded bg-gray-300 hover:bg-gray-400 text-center">Detail</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{route('auth_logout')}}" class="text-center border rounded bg-orange-400 hover:bg-orange-500 w-1/2 py-1 px-3">Logout</a>
            </div>
        </div>
    </body>
</html>
