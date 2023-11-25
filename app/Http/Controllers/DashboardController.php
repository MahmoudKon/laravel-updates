<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Mix;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected string $folder;
    protected string $model;
    protected bool $btn_ajax = true;

    public function __construct()
    {
        view()->share('btn_ajax', $this->btn_ajax);
    }

    public function index()
    {
        if (request()->ajax()) {
            $rows = $this->query();
            return response()->json([
                'count' => $rows->count(),
                'view'  => view("dashboard.{$this->getModule()}.rows", ['rows' => $rows->paginate( request()->get('limit', 1) )])->render(),
            ]);
        }
        return view("dashboard.includes.pages.index");
    }

    public function create()
    {
        if (! request()->ajax()) $this->btn_ajax = false;
        $folder = $this->btn_ajax ? "forms" : "pages";
        return view("dashboard.includes.$folder.create", $this->append());
    }

    public function show($id)
    {
        $row = $this->query($id)->first();
        return view("dashboard.{$this->getModule()}.show", compact('row'));
    }

    public function edit($id)
    {
        $row = $this->query($id)->first();
        if (! request()->ajax()) $this->btn_ajax = false;
        $folder = $this->btn_ajax ? "forms" : "pages";
        return view("dashboard.includes.$folder.update", compact('row'), $this->append());
    }

    public function destroy($id)
    {
        $this->query($id)->delete();
        return response()->json([
            'message' => trans('flash.row deleted', ['model' => trans('menu.'.$this->getModule(true) ) ] )
        ], 200);
    }

    public function multiDelete(Request $request)
    {
        $count = $this->query()->whereIn('id', $request->get('ids'))->delete();
        return response()->json([
            'message' => trans('flash.rows deleted', ['model' => trans('menu.'.$this->getModule(true) ), 'count' =>$count] )
        ], 200);
    }

    public function getModule(bool $singular = false): string
    {
        return $singular ? str($this->folder)->singular() : $this->folder;
    }

    protected function query(mixed $id = null): Builder
    {
        return $this->model::filter()->when($id, fn($query) => $query->where('id', $id));
    }

    protected function append(): array
    {
        return [
            //
        ];
    }
}
