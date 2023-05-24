<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Channel;
use App\Models\Library;
use App\Models\Product;
use App\Models\Category;
use App\Models\ContentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;


class ResourcesController extends Controller
{
	public function index(Request $request) {
		$categories = Cache::rememberForever('categories', function () {
			return Category::Select('id', 'name', 'color')->get();
		});

		$products = Cache::rememberForever('products', function () {
			return Product::Select('id', 'name')->orderBy('name')->get();
		});
		$content_type = Cache::rememberForever('content_type', function () {
			return ContentType::Select('id','type')->get();
		});

		$channels = Cache::rememberForever('channels', function () {
			return Channel::Select('id','channel')->get();
		});

		$library = Cache::rememberForever('library', function () {
			$lib = Library::with('products')
                ->Select('id', 'material', 'category_id', 'content_type_id', 'channel_id', 'link', 'image')
                ->get()->toArray();

            foreach ($lib as $value) {
                if($value['link']) {
                    $filename = explode('/',$value['link']);
                    $value['filename'] = end($filename);
                } else {
                    $value['filename'] = null;
                }

                $library[] = $value;
            }

            return collect($library);
		});

		return Inertia::render('Resources', [
			'filters' => [
				'categories' => $categories,
				'products' => $products,
				'content_type' => $content_type,
				'channels' => $channels,
			],
			'content' => $library,
			'user' => Auth::user()
		]);
	}
}
