<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Museo Naval') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Sección para la Lista de Barcos -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6 p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Lista de Barcos</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($barcos as $barco)
                        <div class="bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-lg p-4">
                            <div class="flex flex-col items-center">
                                @if($barco->imagen)
                                    <img src="{{ asset('storage/' . $barco->imagen) }}" alt="Imagen de {{ $barco->nombre }}" class="w-full h-48 object-cover rounded-lg mb-4">
                                @else
                                    <div class="w-full h-48 bg-gray-300 dark:bg-gray-500 rounded-lg flex items-center justify-center text-gray-500">
                                        Sin imagen
                                    </div>
                                @endif
                                <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">{{ $barco->nombre }}</h3>
                                <p class="text-gray-700 dark:text-gray-300"><strong>Clase:</strong> {{ $barco->clase }}</p>
                                <p class="text-gray-700 dark:text-gray-300"><strong>Nacionalidad:</strong> {{ $barco->nacionalidad }}</p>
                                <p class="text-gray-700 dark:text-gray-300 text-sm mt-2 text-center">{{ $barco->descripcion }}</p>
                            </div>
                            <div class="mt-4 flex justify-center space-x-2">
                                <a href="{{ route('barcos.edit', $barco->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">
                                    Editar
                                </a>
                                <form action="{{ route('barcos.destroy', $barco->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este barco?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>

        </div>
    </div>
</x-app-layout>

