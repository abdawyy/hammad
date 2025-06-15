<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Admin\Requests\RegisterFormRequest;
use App\Domain\Role\Models\Roles;
use App\Domain\Admin\DTOs\RegisterAdminData;
use App\Domain\Admin\Services\RegisterAdminAction;

use Illuminate\Support\Facades\Auth;



class ReigsterController extends Controller
{
    public function showRegisterForm()
    {
        $roles = Roles::where('is_active', 1)->get();
        return view('admin.register', compact('roles'));
    }
     public function register(RegisterFormRequest $request)
    {
        $dto = RegisterAdminData::fromRequest($request->validated());

        $admin = (new RegisterAdminAction())->execute($dto);

        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.dashboard');
    }

}
