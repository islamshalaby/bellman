<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Employees\Store;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Employees extends AdminController
{
    public function __construct(Employee $model)
    {
        parent::__construct($model);
    }

    protected function append()
    {
        $array = [
            'companies' => []
        ];
        if (request()->segment(3) == 'create' || request()->route()->parameter('employee')) {
            $array['companies'] = Company::all();
        }
        return $array; // TODO: Change the autogenerated stub
    }

    // Store
    public function store(Store $request) {
        $post = $request->all();

        $this->model::create($post);

        Session::flash('success', 'Employee has been added successfully');

        return redirect('admin-panel/' . $this->getModelPluralName());
    }

    // Update
    public function update(Store $request, $id) {
        $post = $request->all();
        $row = $this->model::findOrFail($id);

        $row->update($post);

        Session::flash('success', 'Employee has been updated successfully');

        return redirect('admin-panel/' . $this->getModelPluralName());
    }
}
