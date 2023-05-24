<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Pharmacy;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\UpdateUserRequest;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    use ApiTrait;
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request)
    {
        $pharmacy = Pharmacy::where('code', $request->input('invitation_code'))->first();

        $user = $request->all();

        $rol = Role::where('short_name', $user['usu_codperfil'])->first();

        $user['usu_codperfil'] = ($user['usu_codperfil'] == 'FAA' || $user['usu_codperfil'] == 'FA') ? 'FA' : 'AX';

        if(!$pharmacy) {
            throw ValidationException::withMessages([
                'invitation_code' => 'El código no es válido',
            ]);
        }

        $this->register($user);

        $userModel = User::create([
            'email' => $user['usu_email'],
            'name' => $user['usu_nombre'].' '.$user['usu_ape1'],
            'pharmacy_id' => $pharmacy->id
        ]);

        $userModel->assignRole($rol->id);

        event(new Registered($userModel));

        return redirect('/confirmacion-registro');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update(UpdateUserRequest $request)
    {
        $response = $this->user_update($request->input());

        $user = Auth::user();

        session(['user' => json_encode($request->input())]);

        return redirect()->route('my-account')->with('message', 'Se ha actualizado con éxito');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function updateCode(Request $request)
    {
        $pharmacy = Pharmacy::where('code', $request->input('usu_numcolegiado'))->first();

        if(!$pharmacy) {
            throw ValidationException::withMessages([
                'usu_numcolegiado' => 'El código no es válido',
            ]);
        }

        $user = json_decode($request->session()->get('user'), true);
        $user['usu_numcolegiado'] = $request->input('usu_numcolegiado');
        $user['pharmacy_id'] = $pharmacy->id;

        $response = $this->user_update($user);

        User::where('email', $user['usu_email'])->update(['pharmacy_id' => $pharmacy->id]);

        session(['user' => json_encode($user)]);

        return redirect()->route('profile');
    }
}
