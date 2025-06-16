<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Admin\Models\Admin;
use App\Domain\Admin\Requests\ForgotFormRequest;
use Illuminate\Support\Facades\Password;
use App\Domain\Admin\Services\AdminSearchDataTable;
use Illuminate\Support\Facades\URL;

class AdminController extends Controller
{
    public function showAdminIndex(AdminSearchDataTable $dataTable)
    {
    $columns = $dataTable->getColumnDefinitions();
    return view('admin.index', compact('columns'));   
 }

    public function data(Request $request, AdminSearchDataTable $dataTable)
    {
        // This handles AJAX DataTables request
        // if ($request->ajax()) {
            return $dataTable->build();
        // }

        // This returns the view if not AJAX (optional fallback)
        // return view('admin.index', [
        //     'columns' => $dataTable->getColumnDefinitions()
        // ]);
    }}
