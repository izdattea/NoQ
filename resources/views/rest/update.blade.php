<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Profile') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> {{-- shaddow --}}
                <div class="p-8 sm:px-20 bg-white border-b border-gray-200">
                    {{-- <div class ="m-4 p-4 grid bg-gray-100 grid-flow-col gap-4 auto-cols-fr sm:rounded-lg"> --}}
                        <!-- Page content -->
                        <div class="bg-secondary shadow sm:rounded-lg">
                            <div class="bg-gray-50 sm:rounded-lg">
                                <form action='/save' method='post'>
                                    @csrf
                                    <div class = "col-span-1 p-4 ">
                                        <div class="text-gray-800 text-lg text-left px-2">
                                            My Account 
                                        </div>
                                    </div>
                                    <div class = "col-span-1 p-4 bg-gray-100">
                                        <div class="text-gray-400 text-left">
                                            User Information
                                        </div>
                                        <div class="flex bg-gray-100">
                                            <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                                {{-- @foreach ($user as $user) --}}
                                                Restaurant Name
                                                <input type='text' name='name' value='{{Auth::user()->name}}' class="text-gray-700 bg-gray-50 pl-4 pr-22 py-2 rounded-lg border-0 bg-secondary shadow sm:rounded-lg w-full cursor-not-allowed" disabled>
                                            </div>
                                            <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                                Restaurant ID
                                                <input type='text' name='id' value='{{Auth::user()->id}}' class="text-gray-700 bg-gray-50 pl-4 pr-22 py-2 rounded-lg border-0 bg-secondary shadow sm:rounded-lg w-full cursor-not-allowed" disabled>
                                            </div>
                                        </div>
                                        <div class="flex bg-gray-100">
                                            <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                                Email Address
                                                <input type='text' name='email' value='{{Auth::user()->email}}' class="text-gray-700 bg-gray-50 pl-4 pr-22 py-2 rounded-lg border-0 bg-secondary shadow sm:rounded-lg w-full" >
                                            </div>
                                            <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                                Contact number
                                                <input type='text' name='phone_number' value='{{Auth::user()->phone_number}}' class="text-gray-700 bg-gray-50 pl-4 pr-22 py-2 rounded-lg border-0 bg-secondary shadow sm:rounded-lg w-full" >
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
                                                <input type='text' name='address' value='{{$user->address}}' class="text-gray-700 bg-gray-50 pl-4 pr-22 py-2 rounded-lg border-0 bg-secondary shadow sm:rounded-lg w-full">
                                            </div>
                                        </div>
                                        <div class="flex bg-gray-100">
                                            <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                                Description
                                                <input type='text' name='description' value='{{$user->description}}' class="text-gray-700 bg-gray-50 pl-4 pr-22 py-2 rounded-lg border-0 bg-secondary shadow sm:rounded-lg w-full">
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 divide-y">
                                            <div class="py-4"></div>
                                            <div class="py-4"></div>
                                        </div>
                                        <div class="text-gray-400">
                                            Table Management
                                        </div>
                                        <div class="flex bg-gray-100">
                                            <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                                Table for 2
                                                <input type='text' name='pax2' value='{{$user->i2}}' class="text-gray-700 bg-gray-50 pl-4 pr-22 py-2 rounded-lg border-0 bg-secondary shadow sm:rounded-lg w-full">
                                            </div>
                                            <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                                Table for 4
                                                <input type='text' name='pax4' value='{{$user->i4}}' class="text-gray-700 bg-gray-50 pl-4 pr-22 py-2 rounded-lg border-0 bg-secondary shadow sm:rounded-lg w-full">
                                            </div>
                                            <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                                Table for 8
                                                <input type='text' name='pax8' value='{{$user->i8}}' class="text-gray-700 bg-gray-50 pl-4 pr-22 py-2 rounded-lg border-0 bg-secondary shadow sm:rounded-lg w-full">
                                            </div>
                                        </div>
                                        <div class="flex bg-gray-100">
                                            <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                                Avg Time for 2 pax
                                                <input type='text' name='time2' value='{{$user->time2}}' class="text-gray-700 bg-gray-50 pl-4 pr-22 py-2 rounded-lg border-0 bg-secondary shadow sm:rounded-lg w-full">
                                            </div>
                                            <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                                Avg Time for 4 pax
                                                <input type='text' name='time4' value='{{$user->time4}}' class="text-gray-700 bg-gray-50 pl-4 pr-22 py-2 rounded-lg border-0 bg-secondary shadow sm:rounded-lg w-full">
                                            </div>
                                            <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                                Avg Time for 8 pax
                                                <input type='text' name='time8' value='{{$user->time8}}' class="text-gray-700 bg-gray-50 pl-4 pr-22 py-2 rounded-lg border-0 bg-secondary shadow sm:rounded-lg w-full">
                                                {{-- @endforeach --}}
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 divide-y">
                                            <div class="py-4"></div>
                                            <div class="py-4"></div>
                                        </div>
                                        {{-- edit button to center --}}
                                        <div class="flex bg-gray-100"> 
                                            <div class="flex text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                                <button type='submit' class="flex bg-transparent hover:bg-gray-500 text-gray-700 font-semibold text-[15px] hover:text-white py-1 px-5 border border-gray-500 hover:border-transparent rounded-full">Save</button>
                                            </div>
                                            <div class="flex text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                                <button type="reset" class="flex bg-transparent hover:bg-gray-500 text-gray-700 font-semibold text-[15px] hover:text-white py-1 px-5 border border-gray-500 hover:border-transparent rounded-full" onclick="history.back()">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
