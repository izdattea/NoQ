<x-app-layout>
    {{-- remove tab on top and create a button Home to logout --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your account is under view.') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2 sm:px-20 bg-white border-b border-gray-200 text-center">
                    <div>
                        <x-jet-application-logo class="block h-12 w-auto object-center" />
                    </div>

                    <div class="py-8 text-2xl">
                        Thank you for registering with NoQ.
                    </div>

                    <div class="m-4 text-gray-500">
                        Our system is currently verifying your account. Do check the email you've registered with for the latest update.
                        <br/>Once your account is verified, you may use the registered phone number and password to log in.
                        <br/>Thank you for your patience.<br/><br/>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
