
<x-app-layout>
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Eventos</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/3.3.0/tailwind.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/3.3.0/tailwind.min.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-br from-amber-50 to-amber-100">
    <!-- Header con diseño mejorado -->
    <div class="bg-gradient-to-r from-amber-800 to-amber-700 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white drop-shadow-sm">
                ✨ Crear Evento
            </h1>
            <p class="text-amber-100 mt-2 text-sm sm:text-base">
                Completa la información para crear tu nuevo evento
            </p>
        </div>
    </div>

    <!-- Formulario principal -->
    <form action="{{route('events.store')}}" enctype="multipart/form-data" method="POST"
          class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @csrf

        <!-- Contenedor principal del formulario -->
        <div class="bg-white rounded-2xl shadow-xl border border-amber-200 overflow-hidden">
            <!-- Header del formulario -->
            <div class="bg-gradient-to-r from-amber-800 to-amber-700 px-6 py-4">
                <h2 class="text-lg font-semibold text-white">Información del Evento</h2>
            </div>

            <!-- Campos del formulario -->
            <div class="p-6 sm:p-8 space-y-8">
                <!-- Título -->
                <div class="group">
                    <label for="title" class="block text-sm font-semibold text-amber-800 mb-2 transition-colors group-focus-within:text-amber-900">
                        📝 Título del Evento
                    </label>
                    <input type="text"
                           name="title"
                           id="title"
                           required
                           placeholder="Ej: Conferencia de Tecnología 2024"
                           class="block w-full px-4 py-3 border-2 border-amber-200 rounded-xl shadow-sm transition-all duration-200 focus:border-amber-800 focus:ring-4 focus:ring-amber-200 hover:border-amber-300 sm:text-sm placeholder-amber-400">
                </div>

                <!-- Descripción -->
                <div class="group">
                    <label for="description" class="block text-sm font-semibold text-amber-800 mb-2 transition-colors group-focus-within:text-amber-900">
                        📋 Descripción
                    </label>
                    <textarea name="description"
                             id="description"
                             rows="4"
                             required
                             placeholder="Describe los detalles del evento, objetivos, agenda..."
                             class="block w-full px-4 py-3 border-2 border-amber-200 rounded-xl shadow-sm transition-all duration-200 focus:border-amber-800 focus:ring-4 focus:ring-amber-200 hover:border-amber-300 sm:text-sm placeholder-amber-400 resize-none"></textarea>
                </div>

                <!-- Fechas en grid responsivo -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Fecha de inicio -->
                    <div class="group">
                        <label for="start_time" class="block text-sm font-semibold text-amber-800 mb-2 transition-colors group-focus-within:text-amber-900">
                            📅 Fecha de Inicio
                        </label>
                        <input type="date"
                               name="start_time"
                               id="start_time"
                               required
                               class="block w-full px-4 py-3 border-2 border-amber-200 rounded-xl shadow-sm transition-all duration-200 focus:border-amber-800 focus:ring-4 focus:ring-amber-200 hover:border-amber-300 sm:text-sm">
                    </div>

                    <!-- Fecha de fin -->
                    <div class="group">
                        <label for="end_time" class="block text-sm font-semibold text-amber-800 mb-2 transition-colors group-focus-within:text-amber-900">
                            🏁 Fecha de Fin
                        </label>
                        <input type="date"
                               name="end_time"
                               id="end_time"
                               required
                               class="block w-full px-4 py-3 border-2 border-amber-200 rounded-xl shadow-sm transition-all duration-200 focus:border-amber-800 focus:ring-4 focus:ring-amber-200 hover:border-amber-300 sm:text-sm">
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-amber-200">
                    <button type="submit"
                            class="group relative inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-amber-800 to-amber-700 border border-transparent rounded-xl font-bold text-white uppercase tracking-wider hover:from-amber-700 hover:to-amber-600 active:from-amber-900 active:to-amber-800 focus:outline-none focus:ring-4 focus:ring-amber-300 disabled:opacity-50 transition-all duration-200 transform hover:scale-105 active:scale-95 shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5 mr-2 transition-transform group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Crear Evento
                    </button>

                    <a href="{{route('events.index')}}"
                       class="inline-flex items-center justify-center px-8 py-4 bg-white border-2 border-amber-300 rounded-xl font-semibold text-amber-800 uppercase tracking-wider hover:bg-amber-50 hover:border-amber-400 active:bg-amber-100 focus:outline-none focus:ring-4 focus:ring-amber-200 transition-all duration-200 transform hover:scale-105 active:scale-95 shadow-md hover:shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Cancelar
                    </a>
                </div>
            </div>
        </div>

        <!-- Información adicional -->
        <div class="mt-6 text-center">
            <p class="text-sm text-amber-700 bg-amber-100 rounded-lg px-4 py-2 inline-block">
                💡 Tip: Asegúrate de completar todos los campos para crear tu evento exitosamente
            </p>
        </div>
    </form>
</x-app-layout>
