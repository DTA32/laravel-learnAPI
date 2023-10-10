<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Learn API</title>

        @vite('resources/css/app.css')
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{config('services.midtrans.client_key')}}"></script>
    </head>
    <body>
        <div class="flex justify-center items-center h-screen bg-gray-500">
            <div class="h-2/3 w-1/4 rounded-lg border border-2 bg-white p-8 flex flex-col items-center gap-12">
                <div class="grid grid-cols-3">
                    <a class="rounded-lg bg-gray-300 hover:bg-gray-400 px-3 w-2/3 h-2/3 flex items-center" href="{{route('dashboard')}}">Back</a>
                    <h1 class="text-4xl font-bold text-center">Detail</h1>
                    <div></div>
                </div>
                <div>
                    <p>ID: {{$order->id}}</p>
                    <p>Amount: {{$order->amount}}</p>
                    <p>Snap Token: {{$order->snap_token}}</p>
                    <p>Status: {{$order->status}}</p>
                </div>
                <div class="flex flex-row gap-4">
                    <a href="{{route('order_token', $order->id)}}" class="rounded bg-blue-200 hover:bg-blue-300 text-xl text-white px-5 py-1">Trigger Snap Token</a>
                    <button id="snap-pay" class="rounded bg-blue-600 hover:bg-blue-700 text-xl text-white px-5 py-1" data-token="{{$order->snap_token}}">Pay</button>
                </div>
                <p class="text-center text-red-300">{{Session::pull('error')}}</p>
            </div>
        </div>
        <script>
            document.getElementById('snap-pay').onclick = function(){
                snap.pay(this.dataset.token);
            }
        </script>
    </body>
</html>
