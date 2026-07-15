<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AdviserService;
use App\Http\Requests\StoreAdviserRequest;
use App\Http\Requests\UpdateAdviserRequest;
use App\Models\Adviser;

class AdviserController extends Controller
{   

    public function __construct(
        protected AdviserService $adviserService
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advisers = $this->adviserService->getAllAdvisers();

        return view(
            'admin.advisers.index',
            compact('advisers')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.advisers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdviserRequest $request)
    {
        $this->adviserService->createAdviser(
            $request->validated()
        );

        return redirect()
            ->route('admin.advisers.index')
            ->with('success', 'Adviser created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adviser $adviser)
    {
        return view(
            'admin.advisers.edit',
            compact('adviser')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateAdviserRequest $request,
        Adviser $adviser
    )
    {
        $this->adviserService->updateAdviser(
            $adviser,
            $request->validated()
        );

        return redirect()
            ->route('admin.advisers.index')
            ->with('success', 'Adviser updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adviser $adviser)
    {
        $this->adviserService->deleteAdviser($adviser);

        return redirect()
            ->route('admin.advisers.index')
            ->with('success', 'Adviser deleted successfully.');
    }
}
