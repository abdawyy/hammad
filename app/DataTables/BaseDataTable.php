<?php
namespace App\DataTables;

use Yajra\DataTables\DataTables;
use Illuminate\Database\Eloquent\Builder;

abstract class BaseDataTable
{
    protected string $modelClass;
    protected string $dtoClass;

    public function query(): Builder
    {
        $relations = array_keys($this->getRelationColumns());
        return app($this->modelClass)->newQuery()->with($relations);
    }

    protected function applySearch(Builder $query, string $search = null): Builder
    {
        if (!$search) return $query;

        $model = app($this->modelClass);
        $table = $model->getTable();
        $columns = $model->getFillable();

        $relations = $this->getRelationColumns();

        return $query->where(function ($q) use ($columns, $relations, $table, $search) {
            foreach ($columns as $column) {
                $q->orWhere("{$table}.{$column}", 'like', "%{$search}%");
            }

            foreach ($relations as $relation => $fields) {
                $q->orWhereHas($relation, function ($relQ) use ($fields, $search) {
                    foreach ($fields as $field) {
                        $relQ->orWhere($field, 'like', "%{$search}%");
                    }
                });
            }
        });
    }

    protected function getRelationColumns(): array
    {
        return method_exists($this->dtoClass, 'relations') ? $this->dtoClass::relations() : [];
    }

    protected function getColumns(): array
    {
        return method_exists($this->dtoClass, 'columns') ? $this->dtoClass::columns() : [];
    }
}
