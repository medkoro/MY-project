<!-- filepath: /c:/Users/T470s/kids-learning-site/resources/views/numbers/index.blade.php -->
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6">{{ __('Numbers / Nombres') }}</h2>
                    
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($numbers as $number)
                            <div class="p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                                <div class="text-4xl font-bold text-center text-blue-600 mb-2">{{ $number->value }}</div>
                                <div class="text-lg text-center mb-2">
                                    <span class="font-semibold">{{ $number->number_word }}</span>
                                    <span class="text-gray-500"> / </span>
                                    <span class="font-semibold">{{ $number->number_word_fr }}</span>
                                </div>
                                <div class="text-2xl text-center text-blue-400">
                                    {{ $number->visual_representation }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>