<?php

namespace App\Modules\Administration\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modules\Administration\Facades\OfficeManager;

class OfficeController extends Controller
{
    public function __construct(OfficeManager $officeManager)
    {
        $this->officeManager = $officeManager;
    }

    public function view()
    {
        $vars = $this->officeManager->getPaginateAll();

        return view('administration::offices.index')->with('vars', $vars);
    }

    public function create(OfficeRequest $request)
    {
        if($this->officeManager->create($request->all()))
        {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $vars = $this->officeManager->getById($id);
        return view('administration::offices.edit')->with('vars', $vars);
    }

    public function update(OfficeRequest $request)
    {
        if($this->officeManager->update($request->all()))
        {
            return redirect()->route('offices.view');
        }
    }

    public function delete($id)
    {
        if($this->officeManager->delete($id))
        {
            return redirect()->route('offices.view');
        }
    }

    public function ajaxGetAll()
    {
        return $this->officeManager->getAll();
    }

}
