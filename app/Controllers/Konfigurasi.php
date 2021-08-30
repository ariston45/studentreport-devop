<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Konfigurasi extends BaseController
{
	public function index()
	{
		return redirect()->back()->withInput();
	}
}
