<?php
namespace App\Domain\Admin\Services;

use App\Domain\Admin\Models\Admin;
use App\DTOs\AdminDTO;
use App\DataTables\BaseDataTable;
use App\Domain\Admin\DTOs\AdminData;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class AdminSearchDataTable extends BaseDataTable
{
    protected string $modelClass = Admin::class;
    protected string $dtoClass = AdminData::class;

    /**
     * Build the AJAX response using DataTables and the DTO.
     */
    public function build()
    {
        $query = $this->applySearch($this->query(), request('search.value'));
            $models = $query->get();

            $dtos = $models->map(fn($model) => $this->dtoClass::fromModel($model));

       return  DataTables::of($dtos)->toJson();

        
    }

    /**
     * Provide column definitions for DataTables frontend.
     */
    public function getColumnDefinitions(): array
    {
        return collect($this->getColumns())->map(function ($column) {
            return [
                'data' => $column,
                'title' => $this->resolveTitle($column),
            ];
        })->values()->all();
    }

    protected function resolveTitle(string $column): string
    {
        $parts = explode('.', $column);
        return ucfirst(str_replace('_', ' ', end($parts)));
    }
}
