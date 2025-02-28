<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Nuevo Barco') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('barcos.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Nombre -->
                        <div class="mb-4">
                            <label for="nombre" class="block text-sm font-medium text-ligth-700">Nombre</label>
                            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required class="text-black mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Clase -->
                        <div class="mb-4">
                            <label for="clase" class="block text-sm font-medium text-ligth-700">Clase</label>
                            <input type="text" name="clase" id="clase" value="{{ old('clase') }}" required class="text-black mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('clase') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Nacionalidad -->
                        <div class="mb-4">
                            <label for="nacionalidad" class="block text-sm font-medium text-ligth-700">Nacionalidad</label>
                            <input type="text" name="nacionalidad" id="nacionalidad" value="{{ old('nacionalidad') }}" required class="text-black mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('nacionalidad') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Descripción -->
                        <div class="mb-4">
                            <label for="descripcion" class="block text-sm font-medium text-ligth-700">Descripción</label>
                            <textarea name="descripcion" id="descripcion" rows="4" required class=" text-black mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('descripcion') }}</textarea>
                            @error('descripcion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Imagen -->
                        <div class="mb-4">
                            <label for="imagen" class="block text-sm font-medium text-ligth-700">Imagen</label>
                            <input type="file" name="imagen" id="imagen" class="text-black mt-1 block w-full text-sm text-ligth-500 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('imagen') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Botón de Guardar -->
                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Crear Barco
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
