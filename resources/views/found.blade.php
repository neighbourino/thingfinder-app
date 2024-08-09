<x-guest-layout>
    <div class="pt-4 bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">

            <div class="prose">
                <h1>Fedt, du har fundet min/mit {{ $thing->name }}</h1>
                <p>{{ $thing->description }}</p>
            </div>

            <img src="{{ $thing->qrCodeBase64Image() }}" alt="{{ $thing->name }}">
        </div>
    </div>
</x-guest-layout>
