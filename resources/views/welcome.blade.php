<x-guest-layout>
    <form method="GET" action="{{ route('home') }}">
        <!-- DOB -->
        <div>
            <x-input-label for="name" :value="__('Date of Birth')" />
            <x-text-input id="name" class="block mt-1 w-full" type="date" name="dob" :value="request('dob')" required autofocus />
            <x-input-error :messages="$errors->get('dob')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <hr class="mt-3 mb-3">

    <h5 class="font-medium leading-tight text-xl mt-0 mb-2 text-gray-600">Upcoming Birthdays</h5>

    <div class="flex justify-center mt-5">
        <ul class="bg-white rounded-lg border border-gray-200 w-96 text-gray-900">

            @foreach ($birthdays as $item)
                <li class="px-6 py-2 border-b border-gray-200 w-full">{{ date('M d Y', strtotime($item->dob)). " - ". ucfirst($item->name) }}</li>   
            @endforeach
        </ul>
    </div>
</x-guest-layout>