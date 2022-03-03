<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> {{-- shaddow --}}
                <div class="p-8 sm:px-20 bg-white border-b border-gray-200">
                    <div class ="m-4 p-4 grid bg-gray-100 grid-flow-col gap-4 auto-cols-fr sm:rounded-lg">
                        <div class = "col-span-1 p-4 bg-white sm:rounded-lg">
                            <div class="text-gray-500 text-left">
                                QR Code
                            </div>
                            <img class="object-none object-left bg-gray-400 w-64 h-64" src="...">
                        </div>
                        <div class = "col-span-2 p-4 bg-white sm:rounded-lg">
                            <div class="text-gray-500 text-left">
                                Queue Management
                            </div>
                        </div>
                    </div>
                    <div class ="m-4 p-4 bg-gray-100 sm:rounded-lg">
                        <div class = "p-4 bg-white sm:rounded-lg">
                            <div class="text-gray-500 text-left">
                                <a href="/reservation" class="no-underline hover:underline">Today's Reservation(s)</a>
                                <!-- This example requires Tailwind CSS v2.0+ -->
                                <div class="flex flex-col">
                                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="py-4 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                <table class="min-w-full divide-y divide-gray-200">
                                                    <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. of Pax.</th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-200">
                                                        <tr>
                                                            <td class="px-2 py-4 whitespace-nowrap">
                                                                <div class="flex items-center">
                                                                    <div class="ml-2">
                                                                        <div class="text-sm text-gray-900">0001</div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="text-sm text-gray-900">Nurul Izzati</div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="text-sm text-gray-900">4</div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="text-sm text-gray-900">12/02/2022</div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="text-sm text-gray-900">1400</div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Active </span>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">View</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
