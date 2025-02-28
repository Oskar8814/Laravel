<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Barco
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('barcos.update', $barco->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Nombre</label>
                        <input type="text" name="nombre" value="{{ $barco->nombre }}" class="w-full p-2 border rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Clase</label>
                        <input type="text" name="clase" value="{{ $barco->clase }}" class="w-full p-2 border rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Nacionalidad</label>
                        <input type="text" name="nacionalidad" value="{{ $barco->nacionalidad }}" class="w-full p-2 border rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Descripción</label>
                        <textarea name="descripcion" class="w-full p-2 border rounded-lg">{{ $barco->descripcion }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Imagen</label>
                        <input type="file" name="imagen" class="w-full p-2 border rounded-lg">
                        @if($barco->imagen)
                            <img src="{{ asset('storage/' . $barco->imagen) }}" width="100" class="mt-2">
                        @endif
                    </div>

                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Guardar Cambios
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
