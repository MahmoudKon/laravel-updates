<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use App\Services\UpdateService;
use Exception;
use Illuminate\Database\Eloquent\Builder;

class UpdateController extends DashboardController

{
    protected string $folder = 'updates';
    protected string $model  = 'App\\Models\\Update';

    public function store(UpdateRequest $request, UpdateService $service)
    {
        $row = $service->handel($request->validated());

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => trans('flash.row created', ['model' => trans('menu.'.$this->getModule(true))])], 200);
    }

    public function update(UpdateRequest $request, UpdateService $service, $id)
    {
        $row = $service->handel($request->validated(), $id);

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => trans('flash.row updated', ['model' => trans('menu.'.$this->getModule(true))])], 200);
    }

    public function checkUpdate()
    {
        $row = $this->model::filter()->when(request()->id, fn($query, $id) => $query->where('id', $id))->latest()->first();

        return response()->json(['row' => [
            'id'        => $row->id,
            'date'      => $row->getAttributes()['created_at'],
            'file'      => $row->getUpdateLink(),
            'path'      => $row->path,
            'type'      => $row->type,
            'size'      => $row->size,
            'name'      => $row->name,
            'extension' => $row->extension,
            'about'     => $row->about,
            'version'   => $row->version,
        ]], 200);
    }

    protected function query(mixed $id = null): Builder
    {
        return $this->model::filter()->when($id, fn($query) => $query->where('id', $id));
    }

    protected function append(): array
    {
        return [
            'next_version' => $this->model::getNextVersion()
        ];
    }
}
