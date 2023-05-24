<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\GiftCard;
use App\Jobs\ImportGiftCard;
use Illuminate\Http\Request;
use App\Traits\SaveFileTrait;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\GiftCardImportRequest;

class GiftCardController extends Controller
{
    use SaveFileTrait;

    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index() {

        $giftcards = GiftCard::whereNull('user_id')->paginate(config('app.pagination'));
        $file = Storage::url('demo.csv');

		return Inertia::render('Admin/Giftcards/List', [
			'giftcards' => $giftcards,
            'file'      => $file,
		]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return Inertia::render('Admin/Giftcards/Import');
    }

    public function import(GiftCardImportRequest $request) {
        $filename = $this->saveFileStorage($request->file,'giftcard-import');
        $first = true;
        if (($handle = fopen($filename, 'r')) !== FALSE) {

            while (($row = fgetcsv($handle, 0, ",")) !== FALSE) {
                if( $first && (
                    trim($row[0], "\xEF\xBB\xBF") != 'Usuario' || trim($row[1], "\xEF\xBB\xBF") != 'Contraseña' ||
                    trim($row[2], "\xEF\xBB\xBF") != 'Importe' || trim($row[3], "\xEF\xBB\xBF") != 'Caducidad')) {
                        $first = false;
                        return redirect()->back()->withErrors('El archivo no está bien formateado, utilice el archivo de ejemplo');
                        break;
                }

                break;
            }
            fclose($handle);
        }

        ImportGiftCard::dispatch($filename);

        return redirect()->route('admin.giftcards.index')->with('message', 'Se inició la importación en segundo plano, en breve estarán disponibles');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $giftcard = GiftCard::find($id);

            if($giftcard->user_id) {
                return redirect()->back()->withErrors('No se puede eliminar una tarjeta de regalo ya entregada');
            }

            $giftcard->delete();
        } catch (QueryException $th) {
            return redirect()->back()->withErrors('No se puede eliminar la tarjeta de regalo');
        }

        return redirect()->route('admin.giftcards.index')->with('message', 'Se ha eliminado con éxito');
    }
}
