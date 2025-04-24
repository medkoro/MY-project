<!-- filepath: /c:/Users/T470s/kids-learning-site/resources/views/colors/index.blade.php -->
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6">{{ __('Colors / Couleurs') }}</h2>
                    
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                        @foreach($colors as $color)
                            <div class="p-4 rounded-lg shadow-md text-center transition-transform hover:scale-105"
                                 style="background-color: {{ $color->hex_code }}; color: {{ in_array($color->name, ['White', 'Yellow']) ? 'black' : 'white' }}">
                                <div class="font-bold mb-2">{{ $color->name }}</div>
                                <div>{{ $color->name_fr }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>