<div class="min-h-screen bg-gradient-to-br from-slate-50 to-teal-50 p-4 sm:p-6 lg:p-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header con título y botón -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-teal-900">Gestión de Eventos</h1>
                    <p class="text-teal-700 mt-1">Administra y organiza todos tus eventos</p>
                </div>
                <a href="{{ route('events.create') }}"
                   class="bg-teal-900 hover:bg-teal-800 text-white px-6 py-3 rounded-xl font-medium transition-all duration-200 shadow-lg hover:shadow-xl inline-flex items-center justify-center group">
                    <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Nuevo Evento
                </a>
            </div>
        </div>

        <!-- Tarjeta principal -->
        <div class="bg-white rounded-2xl shadow-xl border border-teal-100 overflow-hidden">
            <!-- Filtros y búsqueda -->
            <div class="bg-gradient-to-r from-teal-50 to-slate-50 p-6 border-b border-teal-100">
                <div class="flex flex-col lg:flex-row gap-4 items-center">
                    <!-- Buscador -->
                    <div class="relative flex-1 w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                            <svg class="w-5 h-5 text-teal-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input wire:model.live.debounce.300ms="search"
                               type="text"
                               placeholder="{{ $searchPlaceholder ?? 'Buscar eventos...' }}"
                               class="w-full pl-12 pr-4 py-3 border border-teal-200 bg-white text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent shadow-sm">
                    </div>

                    <!-- Selector de páginas -->
                    <div class="relative w-full sm:w-48">
                        <select wire:model.live="perPage"
                                class="w-full appearance-none bg-white border border-teal-200 text-teal-900 py-3 px-4 pr-8 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent shadow-sm cursor-pointer">
                            <option value="10">10 por página</option>
                            <option value="25">25 por página</option>
                            <option value="50">50 por página</option>
                            <option value="100">100 por página</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            @if($events->count())
                <!-- Tabla responsiva -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gradient-to-r from-teal-900 to-teal-800 text-white">
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Título</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Fecha Inicio</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Fecha Fin</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-teal-100">
                            @foreach ($events as $event)
                                <tr class="hover:bg-teal-50 transition-colors duration-200 group">
                                    <td class="px-6 py-4">
                                        <div class="text-teal-900 font-semibold group-hover:text-teal-800">
                                            {{ $event->title }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-teal-700 font-medium">
                                            {{ $event->start_time }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-teal-700 font-medium">
                                            {{ $event->end_time }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center gap-3">
                                            <!-- Botón Editar -->
                                            <a href="{{ route('events.edit', $event->id) }}"
                                               class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded-lg font-medium transition-all duration-200 shadow-md hover:shadow-lg inline-flex items-center group">
                                                <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                                Editar
                                            </a>

                                            <!-- Botón Eliminar -->
                                            <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                                  onsubmit="return confirm('¿Estás seguro de que deseas eliminar este evento?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="bg-rose-500 hover:bg-rose-600 text-white px-4 py-2 rounded-lg font-medium transition-all duration-200 shadow-md hover:shadow-lg inline-flex items-center group">
                                                    <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="bg-gradient-to-r from-teal-50 to-slate-50 px-6 py-4 border-t border-teal-100">
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                        <div class="text-teal-700 text-sm">
                            {{ $events->links() }}
                        </div>
                    </div>
                </div>
            @else
                <!-- Estado vacío -->
                <div class="py-16 text-center">
                    <div class="max-w-md mx-auto">
                        <div class="bg-teal-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-teal-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-teal-900 mb-2">No hay eventos disponibles</h3>
                        <p class="text-teal-600 mb-6">No se encontraron eventos que coincidan con tu búsqueda</p>
                        <a href="{{ route('events.create') }}"
                           class="bg-teal-900 hover:bg-teal-800 text-white px-6 py-3 rounded-xl font-medium transition-all duration-200 shadow-lg hover:shadow-xl inline-flex items-center">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Crear tu primer evento
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
