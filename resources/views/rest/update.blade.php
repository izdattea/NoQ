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
                                            Restaurant Name
                                            <div class="bg-secondary shadow sm:rounded-lg">
                                                <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">{{Auth::user()->name}}</div>
                                            </div>
                                        </div>
                                        <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                            Branch ID
                                            <div class="bg-secondary shadow sm:rounded-lg">
                                                <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">{{Auth::user()->id}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex bg-gray-100">
                                        <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                            Email Address
                                            <div class="bg-secondary shadow sm:rounded-lg">
                                                <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">{{Auth::user()->email}}</div>
                                            </div>
                                        </div>
                                        <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                            Contact number
                                            <div class="bg-secondary shadow sm:rounded-lg">
                                                <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">{{Auth::user()->phone_number}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 divide-y">
                                        <div class="py-4"></div>
                                        <div class="py-4"></div>
                                    </div>
                                    <div class="text-gray-400 text-left">
                                        Location Information
                                    </div>
                                    <div class="flex bg-gray-100">
                                        <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                            Address
                                            <div class="bg-secondary shadow sm:rounded-lg">
                                                <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">{{Auth::user()->location}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex bg-gray-100">
                                        <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                            City
                                            <div class="bg-secondary shadow sm:rounded-lg">
                                                <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">{{Auth::user()->city}}</div>
                                            </div>
                                        </div>
                                        <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                            State
                                            <div class="bg-secondary shadow sm:rounded-lg">
                                                <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">{{Auth::user()->state}}</div>
                                            </div>
                                        </div>
                                        <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                            Postal Code
                                            <div class="bg-secondary shadow sm:rounded-lg">
                                                <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">{{Auth::user()->postcode}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 divide-y">
                                        <div class="py-4"></div>
                                        <div class="py-4"></div>
                                    </div>
                                    <div class="text-gray-400 text-left">
                                        About Me
                                    </div>
                                    <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                        Opening Hours
                                        <div class="bg-secondary shadow sm:rounded-lg">
                                            <div class="block text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">{{Auth::user()->opening}} - {{Auth::user()->closing}}</div>
                                        </div>
                                    </div>
                                    <div class="flex bg-gray-100">
                                        <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                            Description
                                            <div class="bg-secondary shadow sm:rounded-lg">
                                                <div class="block h-24 text-gray-700 bg-gray-50 px-4 py-2 sm:rounded-lg">{{Auth::user()->description}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex bg-gray-100">
                                        <div class="flex-1 text-gray-700 bg-gray-100 px-4 py-2 m-2">
                                            Menu
                                            <div class="mb-3 w-96">
                                                {{Auth::user()->menu}}
                                            </div>
                                            <!-- Custom scripts -->
                                            <script type="text/javascript">
                                                const checkbox = document.getElementById("flexCheckIndeterminate");
                                                checkbox.indeterminate = true;
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
