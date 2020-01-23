<?php

namespace App\Http\Controllers;

use App\Block;
use App\Http\Requests\CreateBlock;
use App\Http\Requests\ValidateBlock;
use App\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlockController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $blocks = Block::with('page')->paginate(15);

        return view('blocks.index', compact('blocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $pages = Page::all();

        return view('blocks.create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ValidateBlock $request)
    {
        $identifier = str_replace(' ', '_', strtolower($request->name));
        $blocks = Block::where('page_id', $request->page)->get();

        if(count($blocks) == 0) {
            $order = 0;
        } else {
            $order = $blocks->max('order') + 1;
        }

        $block = Block::create([
            'name' => $request->name,
            'page_id' => $request->page,
            'identifier' => $identifier,
            'status' => $request->status,
            'content' => $request->content,
            'order' => $order,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('/dashboard/blocks');
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
        $block = Block::where('identifier', $id)->firstOrFail();
        $pages = Page::all();

        return view('blocks.edit', compact('block', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ValidateBlock $request, $id)
    {
        $identifier = str_replace(' ', '_', strtolower($request->name));

        $block = Block::where('identifier', $id)->firstOrFail();
        $block = Block::find($block->id);

        $block->page_id = $request->page;
        $block->name = $request->name;
        $block->identifier = $identifier;
        $block->status = $request->status;
        $block->content = $request->content;

        $block->save();


        return redirect('/dashboard/blocks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $block = Block::where('identifier', $id)->firstOrFail();
        $block = Block::find($block->id);
        $block->delete();

        return back();
    }
}
