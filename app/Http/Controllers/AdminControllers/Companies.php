<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Companies\Store;
use App\Mail\SendMail;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class Companies extends AdminController
{
    public function __construct(Company $model)
    {
        parent::__construct($model);
    }

    // Store
    public function store(Store $request) {
        $post = $request->all();

        if ($request->hasFile('logo')) {
            $imageName = $this->uploadLogo($request);
            $post['logo'] = $imageName;
        }

        $this->model::create($post);

        Session::flash('success', 'New Company has added successfully');
        Mail::to($request->user())->send(new SendMail($post['name']));

        return redirect('admin-panel/' . $this->getModelPluralName());
    }

    // Update
    public function update(Store $request, $id) {
        $post = $request->all();
        $row = $this->model::findOrFail($id);
        if ($request->hasFile('logo')) {
            $imageName = $this->uploadLogo($request);
            $post['logo'] = $imageName;
        }

        $row->update($post);

        Session::flash('success', 'Company has been updated successfully');

        return redirect('admin-panel/' . $this->getModelPluralName());
    }


    // Upload logo
    public function uploadLogo($request) {
        $file = $request->file('logo');
        $imageName = time() . "_" . $file->getClientOriginalName();
        $file->move(storage_path('app/public'), $imageName);

        return $imageName;
    }
}
