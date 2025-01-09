<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function home()
    {
        // Return a view or response for the homepage
        return view('home');  // Ensure you have a home.blade.php view
    }

    public function index()
    {
        return Page::with('children')->whereNull('parent_id')->get();
    }

    // public function show($slug)
    // {
    //     $slugParts = explode('/', $slug);
    //     $page = null;

    //     foreach ($slugParts as $slugPart) {
    //         if ($page) {
    //             $page = $page->children()->where('slug', $slugPart)->first();
    //         } else {
    //             $page = Page::where('slug', $slugPart)->whereNull('parent_id')->first();
    //         }

    //         if (!$page) {
    //             return response()->json(['error' => 'Page not found'], 404);
    //         }
    //     }

    //     return response()->json($page);
    // }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return response()->json($page);
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'slug' => 'required|unique:pages',
                'title' => 'required',
                'content' => 'required',
                'parent_id' => 'nullable|exists:pages,id',
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log the exception or handle it
            return response()->json(['errors' => $e->errors()], 422);
        }

        $page = Page::create($request->all());

        return response()->json($page, 201);
    }


    public function update(Request $request, $slug)
    {
        $page = Page::where('slug', $slug)->first();
        $page->update($request->all());
        return response()->json($page);
    }

    public function destroy($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $page->delete();
        return response()->json(null, 204);
    }
}
