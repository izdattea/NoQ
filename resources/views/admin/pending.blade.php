<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pending List') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Restaurant</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone Number</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                                        <th scope="col" class="px-6 py-3 text-centre text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($users as $user)
                                        @if($user->usertype == "1")
                                        <tr>
                                            <td class="px-6 py-4 whitespace-normal text-sm font-medium text-gray-500">{{$user['name']}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$user['email']}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">{{$user['phone_number']}}</td>
                                            <td class="px-6 py-4 whitespace-normal text-sm font-medium text-gray-500">{{$user['location']}}, {{$user['postcode']}}, {{$user['city']}}, {{$user['state']}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="/accept/{{$user->id}}" class="bg-green-500 hover:bg-green-700 text-white font-bold text-sm font-medium py-2 px-4 rounded-full">Accept</a>
                                                <a href="/delete/{{$user->id}}" class="bg-red-500 hover:bg-red-700 text-white font-bold text-sm font-medium py-2 px-4  rounded-full">Decline</a>
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

</x-app-layout>
