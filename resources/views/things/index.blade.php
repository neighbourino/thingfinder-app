<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Things') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">


                @if ($things->isNotEmpty())
                    <div class="">
                        @foreach ($things as $thing)
                            <div class="p-3 mb-6">
                                <div class="">
                                    <div class="prose py-1">
                                        <h2>{{ $thing->name }}</h2>
                                    </div>

                                    <div class="w-32 h-32">
                                        <img src="{{ $thing->qrCodeBase64Image() }}" alt="{{ $thing->name }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                @endif
            </div>
        </div>
    </div>
</x-app-layout>
