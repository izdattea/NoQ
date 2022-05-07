<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> {{-- shaddow --}}
                <div class="p-8 sm:px-20 bg-white border-b border-gray-200">
                    <div class="text-2xl text-center">
                        {{-- Welcome, {{ Auth::user()->name }}. --}}
                        {{-- have to change to user()->name but get the user() from controller; have to add for thingy --}}
                    </div>
                    <!-- Page content -->
                    <div class="bg-secondary shadow sm:rounded-lg">
                        <div class="bg-gray-50 sm:rounded-lg">
                            <div class="col-span-1 p-4 ">
                                <div class="text-gray-800 text-lg text-left px-2">
                                    {{ $user->name }} 
                                    {{-- <a href="update/{{Auth::user()->id}}" class="text-left bg-transparent hover:bg-gray-500 text-gray-700 font-semibold text-[15px] hover:text-white py-1.5 px-2.5 border border-gray-500 hover:border-transparent rounded-full">Update</a> --}}
                                </div>
                            </div>
                            <div class="col-span-1 p-4 bg-gray-100">
                                <div class="text-gray-400 text-left">
                                    User Information
                                </div>
                                <div class="flex bg-gray-100">
                                    <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                        Restaurant Name
                                        <div class="bg-secondary shadow sm:rounded-lg">
                                            <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">
                                                {{ $user->name }}</div>
                                        </div>
                                    </div>
                                    <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                        Restaurant ID
                                        <div class="bg-secondary shadow sm:rounded-lg">
                                            <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">
                                                {{ $user->id }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex bg-gray-100">
                                    <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                        Email Address
                                        <div class="bg-secondary shadow sm:rounded-lg">
                                            <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">
                                                {{ $user->email }}</div>
                                        </div>
                                    </div>
                                    <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                        Contact number
                                        <div class="bg-secondary shadow sm:rounded-lg">
                                            <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">
                                                {{ $user->phone_number }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 divide-y">
                                    <div class="py-4"></div>
                                    <div class="py-4"></div>
                                </div>
                                <div class="text-gray-400 text-left">
                                    Restaurant Information
                                </div>
                                <div class="flex bg-gray-100">
                                    <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                        Address
                                        <div class="bg-secondary shadow sm:rounded-lg">
                                            <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">
                                                @if ($rest->address == null)
                                                    <i>NULL</i>
                                                @else
                                                    {{ $rest->address }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex bg-gray-100">
                                    <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                        Description
                                        <div class="bg-secondary shadow sm:rounded-lg">
                                            <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">
                                                @if ($rest->description == null)
                                                    <i>NULL</i>
                                                @else
                                                    {{ $rest->description }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-gray-400">
                                    Table Management
                                </div>
                                <div class="flex bg-gray-100">
                                    <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                        Table for 2
                                        <div class="bg-secondary shadow sm:rounded-lg">
                                            <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">
                                                @if ($rest->i2 == null)
                                                    <i>NULL</i>
                                                @else
                                                    {{ $rest->i2 }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                        Table for 4
                                        <div class="bg-secondary shadow sm:rounded-lg">
                                            <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">
                                                @if ($rest->i4 == null)
                                                    <i>NULL</i>
                                                @else
                                                    {{ $rest->i4 }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                        Table for 8
                                        <div class="bg-secondary shadow sm:rounded-lg">
                                            <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">
                                                @if ($rest->i8 == null)
                                                    <i>NULL</i>
                                                @else
                                                    {{ $rest->i8 }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex bg-gray-100">
                                    <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                        Avg Time for 2 pax
                                        <div class="bg-secondary shadow sm:rounded-lg">
                                            <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">
                                                @if ($rest->time2 == null)
                                                    <i>NULL</i>
                                                @else
                                                    {{ $rest->time2 }} minutes
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                        Avg Time for 4 pax
                                        <div class="bg-secondary shadow sm:rounded-lg">
                                            <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">
                                                @if ($rest->time4 == null)
                                                    <i>NULL</i>
                                                @else
                                                    {{ $rest->time4 }} minutes
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                        Avg Time for 8 pax
                                        <div class="bg-secondary shadow sm:rounded-lg">
                                            <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">
                                                @if ($rest->time8 == null)
                                                    <i>NULL</i>
                                                @else
                                                    {{ $rest->time8 }} minutes
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
