<x-guest-layout>
    <h1 class="font-bold text-xl mb-4 capitalize">{{ $pokemon->name }}</h1>

    <div class="mb-4 text-xs text-gray-500">
        {{ $pokemon->created_at->diffForHumans() }}
    </div>

    <div class="flex items-center justify-center">
        @if ($pokemon->image)
            <img src="{{ Storage::url($pokemon->image) }}" alt="{{ $pokemon->nom }}" class="rounded shadow aspect-auto object-cover object-center">
        @endif
    </div>

    <div class="mt-4">{!! \nl2br($pokemon->description) !!}</div>

    <div class="mt-8 flex items-center justify-center">
        <a href="{{ route('pokemon.index') }}" class="font-bold bg-white text-gray-700 px-4 py-2 rounded shadow">
            Retour à la liste des Pokemon
        </a>
    </div>
</x-guest-layout>
