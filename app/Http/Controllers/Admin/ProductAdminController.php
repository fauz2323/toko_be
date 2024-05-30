<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    function category() {
        return view('web.admin.product.category');
    }

    function product() {
        return view('web.admin.product.product');
    }

    function order() {
        return view('web.admin.product.order');
    }

    function detail() {
        return view('web.admin.product.detail');
    }
}
