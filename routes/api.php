<?php

use App\Http\Controllers\wisataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resources(['pengunjung' => 'pengunjungController', 'wisata' => 'wisataController']);
