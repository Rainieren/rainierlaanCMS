<?php

namespace App\Http\Controllers;

use App\Block;
use App\Layout;
use App\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::all();
        $layouts = Layout::all();
        return view('pages.create', compact('pages', 'layouts'));
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
            'layout' => ['required', 'integer'],
            'sub_page' => ['required', 'integer'],
        ]);

        $identifier = str_replace(' ', '_', strtolower($request->name));

        if ($request->sub_page == 0) {
            $url = Str::slug($request->name);
        } else {
            $parent_page = Page::find($request->sub_page);
            $url = $parent_page->url . '/' . Str::slug($request->name);
        }


        $page = Page::create([
            'name' => $request->name,
            'identifier' => $identifier,
            'url' => $url,
            'status' => 1,
            'layout_id' => $request->layout,
            'page_id' => $request->sub_page,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('/dashboard/pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $page = Page::where('url', $id)->firstOrFail();
        $blocks = Block::where('page_id', $page->id)->where('status', 1)->get();
        $pages = Page::where('page_id', $page->id)->get();

        return view('pages.show', compact('page', 'blocks', 'pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $page = Page::where('url', $id)->firstOrFail();
        $page = Page::find($page->id);
        $blocks = Block::where('page_id', $page->id)->get();

        return view('pages.edit', compact('page', 'blocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $page = Page::where('url', $id)->firstOrFail();
        $page = Page::find($page->id);
        $page->blocks()->delete();
        $page->delete();

        return back();
    }

    /**
     * @param $data
     * @return
     */
    public function changeOrder(Request $request)
    {
        foreach($request->get('order') as $id => $order) {
            Block::find($id)->update(['order' => $order]);
        }
    }
}
