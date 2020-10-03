<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ mix('css/apptwo.css') }}" rel="stylesheet"> --}}
</head>
<body>
    <h1 class="text-primary">Bootstrap text</h1>
    @if(session()->has('status'))
     <div class="bg-green-600 py-1 px-4">
         <p class="text-2xl text-white">{{ session()->get('status') }}</p>
     </div>
     @endif
@yield('content')

@yield('script')


</body>
</html>
