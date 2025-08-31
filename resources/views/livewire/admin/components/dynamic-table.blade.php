<div class="space-y-6 max-w-full ">

    <h3 class="text-xl font-semibold tracking-wide mb-5 text-accent animate__animated animate__fadeInDown">
        {{ __('Advanced Filters') }}</h3>
    {{-- Seletor de colunas --}}
    <div x-data="dataTableComponent()" class="relative inline-block text-left mb-4 animate__animated animate__fadeInDown  z-50">
        <button @click="open = !open" type="button"
            class="inline-flex justify-center items-center gap-2 rounded-md border border-zinc-600 bg-white/10  px-4 py-2 text-sm font-medium text-zinc-100 shadow-sm hover:bg-white/5 focus:outline-none focus:ring-2 focus:ring-accent"
            aria-haspopup="true" :aria-expanded="open.toString()">
            {{ __('Select Columns') }}
            <svg :class="{ 'rotate-180': open, 'rotate-0': !open }" class="h-5 w-5 transition-transform duration-200"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <div x-show="open" @click.away="open = false" x-transition
            class="absolute mt-2 w-56 rounded-md bg-zinc-900 shadow-lg    z-50 p-4" style="display: none;">
            <template x-for="([key, label], index) in Object.entries(columns)" :key="key">
                <label class="flex items-center space-x-2 cursor-pointer select-none mb-2">
                    <input type="checkbox" :value="key" :checked="visibleColumns.includes(key)"
                        @change="toggleColumn(key)"
                        class="form-checkbox h-4 w-4 text-accent  bg-accent transition duration-150 ease-in-out" />
                    <span x-text="label"></span>
                </label>
            </template>
        </div>
    </div>

    <script>
        function dataTableComponent() {
            return {
                open: false,
                columns: @json($columns),
                visibleColumns: @json($visibleColumns),
                toggleColumn(key) {
                    if (this.visibleColumns.includes(key)) {
                        this.visibleColumns = this.visibleColumns.filter(k => k !== key);
                    } else {
                        this.visibleColumns = [...this.visibleColumns, key];
                    }
                    // Chama o método Livewire para atualizar no backend
                    this.$wire.toggleColumn(key);
                }
            }
        }
    </script>

    {{-- Busca Global --}}
    <div class="max-w-lg animate__animated animate__fadeInUp z-10">
        <flux:input type="search" wire:model.debounce.500ms="search" placeholder="{{ __('Search...') }}"
            icon:trailing="search" />
    </div>
    <flux:separator />
    {{-- Filtros avançados --}}
    <div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 max-w-5xl hidden">

            @foreach ($visibleColumns as $field)
                @php $label = $columns[$field] ?? ucfirst($field); @endphp
                <div class="flex flex-col space-y-1">
                    <flux:label>{{ __($label) }}</flux:label>
                    <flux:select wire:model="filters.{{ $field }}.operator"
                        class="animate__animated animate__fadeIn  ">
                        <option value="like">{{ __('Contains') }}</option>
                        <option value="=">{{ __('Equals') }}</option>
                        <option value=">">{{ __('Greater than') }}</option>
                        <option value="<">{{ __('Less than') }}</option>
                    </flux:select>
                    {{-- <input
                        type="text"
                        wire:model.defer="filters.{{ $field }}.value"
                        placeholder="{{ __('Filter value') }}"
                        class="border rounded px-3 py-1 focus:outline-none focus:ring-1 focus:ring-indigo-400"
                    /> --}}
                </div>
            @endforeach

        </div>
    </div>
    @if (session()->has('message'))
        <div class="bg-green-200 dark:bg-zinc-700 text-green-800 px-4 py-2 rounded mb-2">
            {{ session('message') }}
        </div>
    @endif
    {{-- Tabela responsiva --}}
    <div class=" ">
        <table
            class="min-w-full border-collapse border  border-white/10  rounded-lg text-left  animate__animated animate__fadeInUp  ">
            <thead
                class=" border-b border-white/10  text-zinc-600   dark:text-zinc-100  rounded-lg animate__animated animate__fadeIn">
                <tr>
                    @foreach ($visibleColumns as $column)
                        <th scope="col" class="cursor-pointer px-4 py-3 select-none whitespace-nowrap"
                            wire:click="sortBy('{{ $column }}')"
                            title="{{ __('Sort by') }} {{ __($columns[$column]) }}">
                            <div class="flex items-center space-x-1">
                                <span>{{ __($columns[$column]) }}</span>
                                @if ($sortColumn === $column)
                                    @if ($sortDirection === 'asc')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 15l7-7 7 7" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    @endif
                                @endif
                            </div>
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="bg-white/40 dark:bg-zinc-700 divide-y divide-zinc-600">
                @forelse ($data as $item)
                    <tr class="hover:bg-white/5 ">
                        @foreach ($visibleColumns as $column)
                            @php
                                $rawValue = data_get($item, $column);
                                $formatted = $item->getFormattedValue($column);
                            @endphp


                            <td class="px-4 py-2 whitespace-nowrap text-zinc-700  dark:text-zinc-100">
                                @if ($column === 'status')
                                    <span
                                        class="w-full px-2 py-1 rounded text-xs font-semibold {{ $rawValue ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $formatted }}
                                    </span>
                                @elseif ($column === 'permissions')
                                    {{-- Renderizar badges --}}
                                    @foreach ($formatted as $permission)
                                        <span
                                            class="inline-block bg-green-100 text-green-700 rounded px-2 py-1 text-xs font-semibold mr-1 mb-1">
                                            {{ $permission }}
                                        </span>
                                    @endforeach

                                    @if (count($item->permissions) > 4)
                                        <span
                                            class="inline-block bg-green-100 text-green-700 rounded px-2 py-1 text-xs font-semibold mr-1 mb-1">
                                            ...
                                        </span>
                                    @endif
                                @else
                                    {{ $formatted }}
                                @endif
                            </td>
                        @endforeach
                        {{-- Coluna de ações --}}
                        <td class="px-4 py-3 whitespace-nowrap text-right space-x-5 flex justify-end items-center ">
                            @props(['item', 'editRoute' => null, 'editParam' => [], 'showRoute' => null])

                            <div class="flex justify-end items-center space-x-3">
                                {{-- Editar --}}
                                @if ($editRoute)
                                    @php
                                        $paramse = [];
                                        foreach ($editParam as $routeKey => $modelField) {
                                            $paramse[$routeKey] = data_get($item, $modelField);
                                        }
                                    @endphp
                                    <flux:button icon="square-pen" variant="primary"
                                        href="{{ route($editRoute, $paramse) }}">
                                        {{ __('Editar') }}
                                    </flux:button>
                                @endif

                                {{-- Visualizar --}}
                                @if ($showRoute)
                                    @php
                                        $params = [];
                                        foreach ($showParams as $routeKey => $modelField) {
                                            $params[$routeKey] = data_get($item, $modelField);
                                        } 
  
  $modalData = [];
foreach ($viewFields as $field) {
    if (str_contains($field, '.')) {
        $parts = explode('.', $field);
        $parent = $parts[0]; // 'product'
        $child = $parts[1];  // 'name'
        if (!isset($modalData[$parent])) {
            $modalData[$parent] = data_get($item, $parent); // pega o objeto product
        }
    } else {
        $modalData[$field] = data_get($item, $field);
    }
}
@endphp

        <flux:button icon="eye" color="blue" variant="primary"
            @click.prevent="$store.viewModal.openModal({{ json_encode($modalData) }})">
            Visualizar
        </flux:button>

                          
                                @endif

                                {{-- Excluir --}}
                                <flux:button @click="$store.deleteModal.confirmDelete({{ $item->id }})"
                                    icon="trash" variant="danger" class="cursor-pointer">
                                </flux:button>
                            </div>

                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="{{ count($visibleColumns) }}" class="text-center py-6 text-zinc-500">
                            {{ __('No records found.') }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginação --}}
    <div class="mt-4">
        {{ $data->links() }}
    </div>
    <div x-cloak x-show="$store.deleteModal.open" x-transition.opacity @keydown.escape.window="$store.deleteModal.close"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50  h-screen flex items-center justify-center"
        role="dialog" aria-modal="true">

        <div @click.away="$store.deleteModal.close" x-transition
            class="bg-zinc-900 rounded-xl p-6 w-full max-w-md shadow-xl border border-zinc-700">
            <h2 class="text-lg font-semibold text-zinc-700 dark:text-zinc-100 mb-4">
                {{ __('Delete Content') }}
            </h2>

            <p class="text-zinc-300 mb-6">
                {{ __('Are you sure you want to delete this item? This action cannot be undone.') }}
            </p>

            <div class="flex justify-end gap-3">
                <button @click="$store.deleteModal.close()" id="cancelBtn"
                    class="px-4 py-2 rounded bg-zinc-700 hover:bg-zinc-600 text-white">
                    {{ __('Cancel') }}
                </button>
                <button @click="$store.deleteModal.confirm()"
                    class="px-4 py-2 rounded bg-red-600 hover:bg-red-700 text-white">
                    {{ __('Confirm') }}
                </button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('deleteModal', {
                open: false,
                itemId: null,
                confirmDelete(id) {
                    this.itemId = id;
                    this.open = true;
                    document.getElementById('cancelBtn')?.focus();
                },
                close() {
                    this.itemId = null;
                    this.open = false;
                },
                confirm() {
                    Livewire.dispatch('deleteItem', {
                        id: this.itemId
                    });
                    this.close();
                }
            });
            Alpine.store('viewModal', {
                open: false,
                item: null, // armazena o item selecionado
                openModal(item) {
                    this.item = item;
                    this.open = true;
                },
                closeModal() {
                    this.item = null;
                    this.open = false;
                }
            });
        });
    </script>
    <div x-cloak x-show="$store.viewModal.open" x-transition.opacity
        class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center"
        @keydown.escape.window="$store.viewModal.closeModal()">
        <div @click.away="$store.viewModal.closeModal()"
            class="bg-zinc-900 rounded-xl p-6 w-full max-w-md shadow-xl border border-zinc-700">

            <h2 class="text-lg font-semibold text-zinc-100 mb-4" x-text="$store.viewModal.item?.name ?? ''"></h2>
<template x-for="field in @js($viewFields)" :key="field">
    <p class="text-zinc-300 mb-2">
        <strong x-text="(() => {
            const labels = @js($columns);
            if (labels[field]) return labels[field] + ':';
            // fallback automático
            let lastPart = field.split('.').pop();
            return lastPart.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase()) + ':';
        })()"></strong>

        <span x-text="field.split('.').reduce((obj, key) => obj?.[key], $store.viewModal.item) ?? ''"></span>
    </p>
</template>
            <div class="flex justify-end gap-3 mt-4">
                <button @click="$store.viewModal.closeModal()"
                    class="px-4 py-2 rounded bg-zinc-700 hover:bg-zinc-600 text-white">
                    Fechar
                </button>
            </div>
        </div>
    </div>
</div>
