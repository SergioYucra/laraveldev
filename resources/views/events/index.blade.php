<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <!-- Header responsivo -->
        <div class="bg-white shadow-sm border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900">
                    Eventos
                </h1>
            </div>
        </div>

        <!-- Contenedor principal responsivo -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
            <!-- Grid responsivo para el contenido -->
            <div class="space-y-6">
                <!-- Componente Livewire con clases responsivas -->
                <div class="bg-white rounded-lg shadow-sm border overflow-hidden">
                    @livewire('event-index')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
