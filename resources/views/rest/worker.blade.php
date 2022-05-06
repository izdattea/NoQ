<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class ="m-4 p-4 grid bg-gray-100 grid-flow-col gap-4 auto-cols-fr sm:rounded-lg">
                    <div class = "col-span-1 p-4 bg-white sm:rounded-lg">
                        <div class="text-gray-500 text-left">
                            QR Code
                        </div>
                        <div class="flex justify-center">
                            {!! QrCode::size(210)->generate('http://localhost:8000/queue/'.$rest->id); !!}
                        </div>
                    </div>
                    <div class="col-span-1 p-4 bg-white sm:rounded-lg">
                        <div class="text-gray-500 text-left">
                            Queue Management
                            <div class="flex justify-center">
                                <div class="grid grid-rows-5 grid-flow-col bg-gray-200 w-52 h-52 rounded-lg place-content-center">
                                    <div class="row-start-2 row-span-1 text-md text-gray-500 text-center">
                                        Current Queue Number
                                    </div>
                                    <div class="row-start-3 row-span-1 text-[50px] text-black text-center">
                                        @if ($data->current_queue == NULL)
                                            0000
                                        @else 
                                            {{ 1000+$data->current_queue }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-span-2 p-4 bg-white sm:rounded-lg">
                        <div class="text-gray-500 text-left">
                            Table Availability
                            <table class="min-w-full divide-y divide-gray-200 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Table</th>
                                    <th scope="col" class="py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Availability</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-normal text-center text-sm font-medium text-gray-500">2 Pax</td>
                                        <td class="px-6 py-4 whitespace-normal text-center text-sm font-medium text-gray-500">{{ $data->pax2 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-normal text-center text-sm font-medium text-gray-500">4 Pax</td>
                                        <td class="px-6 py-4 whitespace-normal text-center text-sm font-medium text-gray-500">{{ $data->pax4 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-normal text-center text-sm font-medium text-gray-500">8 Pax</td>
                                        <td class="px-6 py-4 whitespace-normal text-center text-sm font-medium text-gray-500">{{ $data->pax8 }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class ="m-4 p-4 grid bg-gray-100 grid-flow-col gap-4 auto-cols-fr sm:rounded-lg">
                    <div class = "col-span-1 p-4 bg-white sm:rounded-lg"> 
                        <div class="text-gray-500 text-left">
                            In Queue
                            <table class="min-w-full divide-y divide-gray-200 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Queue</th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">No. of Pax.</th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">In Queue</th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">To Call</th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Enter</th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">To Exit</th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($cust as $cust)
                                    <tr>
                                        <td class="px-2 py-4 whitespace-nowrap">
                                            <div class="text-center text-sm text-gray-900">{{ 1000 + $cust->id }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-center text-sm text-gray-900">{{ $cust->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-center text-sm text-gray-900">{{ $cust->pax }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-center text-sm text-gray-900">{{ $cust->in_queue }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-center text-sm text-gray-900">{{ $cust->est_enter }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-center text-sm text-gray-900">{{ $cust->enter }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-center text-sm text-gray-900">{{ $cust->out_system }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-center text-sm text-gray-900">
                                                @if ( $cust->status  == NULL)
                                                    Waiting
                                                @else
                                                    Serving: {{ $cust->status }}m
                                                @endif
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap text-center text-sm font-medium">
                                            <a href="/call/{{$cust->id}}" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Call</a>
                                            <a href="/remove/{{$cust->id}}" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Remove</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

