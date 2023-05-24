<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Channel;
use App\Models\Library;
use App\Models\Product;
use App\Models\Category;
use App\Models\ContentType;
use Illuminate\Support\Str;
use App\Traits\SaveFileTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ResourceEditRequest;

class ResourcesController extends Controller
{
    use SaveFileTrait;

    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index() {

        $resources = Library::with('products', 'category', 'contenttype', 'channel')
            ->Select('id', 'material', 'category_id', 'content_type_id', 'channel_id', 'link', 'image')
            ->paginate(config('app.pagination'));


		return Inertia::render('Admin/Resources/List', [
			'resources' => $resources
		]);
	}

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        $channels = Channel::popularFields()->get();
        $content_types = ContentType::popularFields()->get();
        $categories = Category::popularFields()->get();
        $products = Product::popularFields()->get();

        return Inertia::render('Admin/Resources/Create', [
            'channels'      => $channels,
            'contenttypes'  => $content_types,
            'categories'    => $categories,
            'products'      => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(ResourceEditRequest $request)
    {
        $edited = $request->all();

        $image = $request->image;
        $edited['image'] = $this->saveImage($image, 'library');

        $file = $request->link;
        $edited['link'] = $this->saveFile($file, 'library/resources');

        $library = Library::create($edited);

        $library->products()->sync($edited['products']);

        Cache::forget('library');

        return redirect()->route('admin.resources.index')->with('message', 'Se ha creado con éxito');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Library $resource)
    {
        $channels = Channel::popularFields()->get();
        $content_types = ContentType::popularFields()->get();
        $categories = Category::popularFields()->get();
        $products = Product::popularFields()->get();

        $resource->loadMissing('products');

        return Inertia::render('Admin/Resources/Edit', [
            'resource' => $resource,
            'channels'  => $channels,
            'contenttypes' => $content_types,
            'categories' => $categories,
            'products'      => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update($id, ResourceEditRequest $request)
    {
        $edited = $request->all();

        if($request->url) {
            $image = $request->image;
            $edited['image'] = $this->saveImage($image, 'library');
        }

        if($request->file) {
            $file = $request->file;
            $edited['link'] = $this->saveFile($file, 'library/resources');
        }

        $library = library::find($id);

        $library->update($edited);

        $library->products()->detach();
        $library->products()->sync($edited['products']);

        Cache::forget('library');

        return redirect()->route('admin.resources.index')->with('message', 'Se ha actualizado con éxito');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy($id)
    {
        library::find($id)->delete();

        Cache::forget('library');

        return redirect()->route('admin.resources.index')->with('message', 'Se ha eliminado con éxito');
    }
}
