<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Webinar;
use Illuminate\Http\Request;

class WebinarController extends Controller
{
    public function index() {
        $webinar = Webinar::Active()->latest()->first();

		return Inertia::render('Webinar', [
            'webinar' => $webinar
		]);
	}
}
