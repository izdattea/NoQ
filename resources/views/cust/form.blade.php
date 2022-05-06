<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />
    
        <div class="min-h-screen bg-gray-100 p-4">
            <nav x-data="{ open: false }" class="">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        {{-- <div class="flex"> --}}
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <x-jet-application-mark class="block h-9 w-auto" />
                            </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </nav>

            <div class="py-8">
                {{-- <div class="max-w-xs sm:px-6 lg:px-8"> --}}
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg m-4"> 
                        <div class="p-8 sm:px-20 bg-white border-b border-gray-200">
                            <form action='/queue/{{$rest->id}}/save' method='post'>
                                @csrf
                                <div class = "col-span-1 p-4 ">
                                    <div class="text-gray-800 text-lg text-center text-transform: uppercase">
                                        {{$rest->name}}
                                    </div>
                                </div>
                                <div class="text-gray-400 text-left">
                                    Customer Information
                                </div>
                                <div class="text-gray-700 py-4">
                                    Customer Name
                                    <input type='text' name='name' placeholder='Name' class="text-gray-700 bg-gray-50 pl-4 pr-22 py-2 rounded-lg border-0 bg-secondary shadow sm:rounded-lg w-full">
                                </div>
                                <div class="text-gray-700 py-4">
                                    Number of Party
                                    {{-- <input type='text' name='id' placeholder='Pax' class="text-gray-700 bg-gray-50 pl-4 pr-22 py-2 rounded-lg border-0 bg-secondary shadow sm:rounded-lg w-full"> --}}
                                    <div class="text-gray-700">
                                        <select name="pax" class="border border-gray-300 rounded-full text-gray-700 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                            <option>Choose pax</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex text-gray-700 px-4 py-2 m-2">
                                    <button type='submit' class="bg-transparent hover:bg-gray-500 text-gray-700 font-semibold text-xs hover:text-white py-1 px-5 border border-gray-500 hover:border-transparent rounded-full">Join Queue</button>
                                    <button type="reset" class="bg-transparent hover:bg-gray-500 text-gray-700 font-semibold text-xs hover:text-white py-1 px-5 border border-gray-500 hover:border-transparent rounded-full" onclick="history.back()">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                {{-- </div> --}}
            </div>
            
        </div>


        @livewireScripts
    </body>
</html>



