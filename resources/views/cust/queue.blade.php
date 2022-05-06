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
                            <div class="text-black text-2xl text-transform: uppercase text-center font-bold pt-4">
                                {{ $rest->name }}
                            </div>
                            <div class="text-black text-lg text-center font-bold pt-4">
                                Queue Ticket
                            </div>
                            <div class="text-black text-s text-center font-bold pt-4">
                                Current Number
                            </div>
                            <div class="text-black text-[32px] text-center font-bold pt-2 pb-4">
                                @if ($current->current_queue == NULL) 
                                    0000
                                @else
                                    {{ 1000 + $current->current_queue }}
                                @endif
                            </div>
                            <div class="text-black text-[14px] text-center font-bold pb-4">
                                Latest Queue Ticket <br/>
                                @if ($last == 'null') 
                                    0000
                                @else
                                    {{ 1000+ $last->id }} <!-- last queue time? -->
                                @endif
                            </div>
                            <div class="text-black text-xs text-center font-bold pb-4">
                                Would you like to join queue?
                            </div>
                            <div class="text-center">
                                <a href="{{$rest->id}}/form" class="bg-transparent hover:bg-rose-200 text-rose-400 font-semibold hover:text-white text-center py-1.7 px-2.5 border border-rose-300 text-xs hover:border-transparent rounded-full place-content-center">Join Queue</a>
                            </div>
                        </div>
                    </div>
                {{-- </div> --}}
            </div>
            
        </div>


        @livewireScripts
    </body>
</html>



