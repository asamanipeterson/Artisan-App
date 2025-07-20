<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ServiceContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        // $services =  auth::user()->services()->get();
        return view("services.index", ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("services.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        } else {
            $data['image'] = null;
        }
        $data['user_id'] = auth()->user()->id;
        Service::create($data);
        return redirect(route("services.index"))->with([
            'key' => 'success',
            'message' => 'Service created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        // dd($service);
        return view('services.edit', [
            'service' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(ServiceRequest $request, Service $service)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // Check if there's an existing image path before attempting to delete it
            if ($service->image) { // This checks if $service->image is not null or empty
                Storage::delete($service->image); // Delete old image
            }

            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        } else {
            // If no new image is uploaded, we explicitly keep the existing image path.
            // This line is good: it ensures if no new file, the old path is retained.
            $data['image'] = $service->image;
        }

        $service->update($data);

        return redirect(route('services.index'))->with('success', 'Service updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
