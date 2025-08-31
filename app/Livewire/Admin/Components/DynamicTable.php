<?php

namespace App\Livewire\Admin\Components;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
use Masmerise\Toaster\Toaster;

class DynamicTable extends Component
{
    use WithPagination;

    public string $model;
    public array $columns = []; // ['db.field' => 'Lang Key']
    public array $visibleColumns = []; // Colunas que o usuário quer ver
    public string $sortColumn = '';
    public string $sortDirection = 'asc';
    public int $perPage = 10;
    public array $fixedFilters = [];
    public string $search = ''; // Busca global
    public ?string $editRoute = null;
    public array $editParam = [];
    public ?string $showRoute = null;
    public array $showParams = [];

    // Filtros avançados: chave = campo, valor = ['operator' => '', 'value' => '']
    public array $filters = [];
public array $viewFields = [];
    public function mount(string $model = '', $viewFields = [],array $columns = [], $editRoute = '', array $editParam = [])
    {
        $this->model = $model;
        $this->columns = $columns;
        $this->editRoute = $editRoute;
    $this->viewFields = $viewFields;
        $this->editParam = $editParam;
        $this->visibleColumns = array_keys($columns);
        $this->sortColumn = array_key_first($columns);
    }
public function getFieldLabel($field)
{
    $parts = explode('.', $field);
    $last = end($parts);
    return ucwords(str_replace('_', ' ', $last));
}
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilters()
    {
        $this->resetPage();
    }

    public function toggleColumn(string $column)
    {
        if (in_array($column, $this->visibleColumns)) {
            $this->visibleColumns = array_filter($this->visibleColumns, fn($c) => $c !== $column);
        } else {
            $this->visibleColumns[] = $column;
        }
    }

    public function sortBy(string $column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortColumn = $column;
            $this->sortDirection = 'asc';
        }
    }

    protected function applyFilters(Builder $query): Builder
    {
        foreach ($this->filters as $field => $filter) {
            $operator = $filter['operator'] ?? 'like';
            $value = $filter['value'] ?? '';

            if ($value === '' || $value === null)
                continue;

            if ($operator === 'like') {
                $query->where($field, 'like', "%{$value}%");
            } else {
                $query->where($field, $operator, $value);
            }
        }
        return $query;
    }

    public function render()
    {
        $modelClass = $this->model;

        $query = $modelClass::query();

        // Busca global em colunas visíveis sem relacionamento
        if ($this->search) {
            $query->where(function (Builder $q) {
                foreach ($this->visibleColumns as $col) {
                    if (!str_contains($col, '.')) {
                        $q->orWhere($col, 'like', "%{$this->search}%");
                    }
                }
            });
        }

        // Aplica filtros avançados
        $query = $this->applyFilters($query);

        // Ordena apenas colunas sem relacionamento
        if (!str_contains($this->sortColumn, '.')) {
            $query->orderBy($this->sortColumn, $this->sortDirection);
        }
        foreach ($this->fixedFilters as $field => $value) {
            $query->where($field, $value);
        }
        $data = $query->paginate($this->perPage);

        return view('livewire.admin.components.dynamic-table', [
            'data' => $data,
        ]);
    }

    #[On('deleteItem')]
    public function deleteItem($id)
    {
        $modelClass = $this->model;
        $item = $modelClass::findOrFail($id);
        $item->delete();

        Toaster::success('Conteudo deletado com sucesso!');
        session()->flash('message', 'Item deletado com sucesso.');
    }
}
