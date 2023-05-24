<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Admin\PharmacyCreateEditRequest;

class PharmacyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index(Request $request) {
        $search = $request->search ?? null;

        $pharmacies = Pharmacy::query()
            ->when($search, function($query) use ($search) {
                return $query->where('name', 'like', '%'.$search.'%')
                        ->orWhere('nif', 'like', '%'.$search.'%')
                        ->orWhere('code', 'like', '%'.$search.'%');
            })
            ->paginate(config('app.pagination'))->withQueryString();


		return Inertia::render('Admin/Pharmacies/List', [
			'pharmacies'    => $pharmacies,
            'search'        => $search,
		]);
	}

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        return Inertia::render('Admin/Pharmacies/Create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(PharmacyCreateEditRequest $request)
    {
        Pharmacy::create($request->all());

        Cache::forget('pharmacies');

        return redirect()->route('admin.pharmacies.index')->with('message', 'Se ha creado con éxito');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Pharmacy $pharmacy)
    {
        return Inertia::render('Admin/Pharmacies/Edit', [
            'pharmacy' => $pharmacy
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update($id, PharmacyCreateEditRequest $request)
    {
        Pharmacy::find($id)->update($request->all());

        Cache::forget('pharmacies');

        return redirect()->route('admin.pharmacies.index')->with('message', 'Se ha actualizado con éxito');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy($id)
    {
        Pharmacy::find($id)->delete();

        Cache::forget('pharmacies');

        return redirect()->route('admin.pharmacies.index')->with('message', 'Se ha eliminado con éxito');
    }
}
