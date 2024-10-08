<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attaques') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex justify-between mt-8">
                <div class=" text-2xl">
                    Modifier une Attaque
                </div>
            </div>

            <div class="text-gray-500">
                <form method="POST" action="{{ route('attaques.update', $attaque) }}" class="flex flex-col space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="nom" :value="__('Nom')" />
                        <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom"
                            :value="old('nom', $attaque->nom)" autofocus />
                        <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="degats" :value="__('Dégâts')" />
                        <x-text-input id="damage" class="block mt-1 w-full" type="number" name="damage"
                            :value="old('damage', $attaque->damage)" />
                        <x-input-error :messages="$errors->get('damage')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            name="description" rows="5">{{ old('description', $attaque->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="type_id" :value="__('Type')" />
                        <select id="type_id" class="block mt-1 w-full" name="type_id">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ $attaque->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('type_id')" class="mt-2" />
                    </div>
                    <div class="flex justify-end">
                        <x-primary-button type="submit">
                            {{ __('Modifier') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
