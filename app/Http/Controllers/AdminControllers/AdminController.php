<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    protected $model;

    public function __construct($model)
    {
        return $this->model = $model;
    }

    public function index() {
        $rows = $this->model::paginate(10);
        $modelDirectory = $this->getModelPluralName();
        $sName = $this->getModelSingleName();
        $sectionName = Str::plural($this->getModelName());
        $title = $sectionName;


        return view('admin.' . $modelDirectory . '.index', compact(['rows', 'sectionName', 'title', 'sName', 'modelDirectory']));
    }

    public function create() {
        $modelDirectory = $this->getModelPluralName();
        $sectionName = Str::plural($this->getModelName());
        $sName = $this->getModelSingleName();
        $title = $sName;

        return view('admin.' . $modelDirectory . '.create', compact(['rows', 'sectionName', 'title', 'modelDirectory']))->with($this->append());
    }

    public function edit($id) {
        $row = $this->model::findOrFail($id);
        $modelDirectory = $this->getModelPluralName();
        $sectionName = Str::plural($this->getModelName());
        $sName = $this->getModelSingleName();
        $title = $sName;

        return view('admin.' . $modelDirectory . '.edit', compact(['row', 'sectionName', 'title', 'modelDirectory']))->with($this->append());
    }

    public function destroy($id) {
        $singleSectionName = $this->getModelSingleName();
        $row = $this->model::findOrFail($id);
        Session::flash('deleted', $singleSectionName . ' has been deleted');

        if (request()->segment(2) == 'companies' && $row['logo'] != 'storage/') {
            unlink($row->logo);
        }

        $row->delete();

        return redirect()->back();
    }

    protected function getModelName() {
        return class_basename($this->model);
    }

    protected function getModelSingleName() {
        return strtolower($this->getModelName());
    }

    protected function getModelPluralName() {
        return Str::plural($this->getModelSingleName());
    }

    protected function append() {
        return [];
    }

}
