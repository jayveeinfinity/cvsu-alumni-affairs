<?php

namespace App\Http\Controllers\Admin;

use App\Models\Industry;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Industry\StoreRequest;
use App\Presenters\CustomPaginationPresenter;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industries = Industry::orderBy('label')->paginate(20);

        $links = new CustomPaginationPresenter($industries);

        return view('admin.industries.index', compact('industries', 'links'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $industry = Industry::create($request->validated());

        return response()->json('success', Response::HTTP_OK);
    }
}
