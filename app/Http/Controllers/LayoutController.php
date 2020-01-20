<?php

namespace App\Http\Controllers;

use App\Layout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $layouts = Layout::paginate(15);
        return view('layouts.index', compact('layouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'content' => ['required', 'integer'],
        ]);
        // Make name camelcase
        $filename = Str::camel($request->name) . ".blade.php";
        $file = fopen(resource_path('views/layouts/layouts/' . $filename), 'w');
        if (is_resource($file)) {
            fwrite($file, $request->content);
            fclose($file);
        }

        $layout = new Layout();

        $layout->name = $request->name;
        $layout->filename = Str::camel($request->name) . ".blade.php";
        $layout->content = $request->content;

        $layout->save();

        return redirect('dashboard/layouts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $layout = Layout::find($id);
        return view('layouts.edit', compact('layout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $layout = Layout::find($request->id);
        $file = resource_path('views/layouts/layouts/' . $layout->filename);
        file_put_contents($file, $request->content, FILE_IGNORE_NEW_LINES);
        $newName = resource_path('views/layouts/layouts/' . Str::camel($request->name) . ".blade.php");
        rename($file, $newName);

        $layout->name = $request->name;
        $layout->filename = Str::camel($request->name) . ".blade.php";
        $layout->content = $request->content;

        $layout->save();
        if($request->edit == "edit") {
            return redirect('/dashboard/layouts');
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $layout = Layout::find($id);

        $file = resource_path('views/layouts/layouts/' . $layout->filename);
        if(unlink($file)) {
            $layout->delete();
        } else {
            dd("Unable to remove " . $file);
        }

        return back();
    }
}
