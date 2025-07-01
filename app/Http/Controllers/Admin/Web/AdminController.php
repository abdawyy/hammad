<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Admin\Models\Admin;
use App\Domain\Admin\Requests\ForgotFormRequest;
use Illuminate\Support\Facades\Password;
use App\Domain\Admin\Services\AdminSearchDataTable;
use Illuminate\Support\Facades\URL;
use App\Domain\Admin\Services\RegisterAdminAction;
use App\Domain\Admin\DTOs\AdminData;
use App\Domain\Admin\Requests\RegisterFormRequest;
use App\Domain\Role\Models\Role;


class AdminController extends Controller
{
    public function showAdminIndex(AdminSearchDataTable $dataTable)
    {
        $columns = $dataTable->getColumnDefinitions();
        return view('admin.index', compact('columns'));
    }

    public function data(Request $request, AdminSearchDataTable $dataTable)
    {
        return $dataTable->build();

    }
    public function showAdminCreate()
    {
        $roles = Role::where('is_active', 1)->get();
        return view('admin.create',compact('roles'));

    }
    public function createAdmin(RegisterFormRequest $request)
    { {
            $dto = AdminData::fromRequest($request->validated());
            $admin = (new RegisterAdminAction())->execute($dto);
            return redirect()->route('admin.dashboard');
        }

    }
}
