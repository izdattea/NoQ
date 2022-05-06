<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        <x-jet-application-logo class="block h-12 w-auto object-center" />
                    </div>

                    <div class="mt-8 text-2xl">
                        Welcome {{Auth::user()->name}}!
                    </div>

                    <div class="mt-6 text-gray-500">
                        You have {{$num}} pending request(s).
                    </div>
                </div>

                <div class="bg-gray-500 bg-opacity-25 ">
                    <div class="p-6">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-500 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 w-full">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Restaurant</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone Number</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($users as $user)
                                        @if($user->usertype == "1")
                                        <tr>
                                            <td class="px-6 py-4 whitespace-normal text-sm font-medium text-gray-500">{{$user['name']}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$user['email']}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">{{$user['phone_number']}}</td>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    <!-- More people... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
