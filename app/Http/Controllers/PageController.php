<?php

namespace App\Http\Controllers;

use App\Block;
use App\Http\Requests\ValidatePage;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $pages = Page::all();

        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $pages = Page::where('id', '!=', 1)->get();
        $layouts = Layout::all();

        return view('pages.create', compact('pages', 'layouts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ValidatePage $request)
    {
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
            'status' => $request->status,
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
    public function show($id = null)
    {
        $page = null;

        if(!$id) {
            $page = Page::where('name', 'Home')->firstOrFail();
        } else {
            $page = Page::where('url', $id)->firstOrFail();
        }
        $header = $page->layout->layoutHeader;

        if($page->status == 0) {
            return back();
        } else {
            $blocks = Block::where('page_id', $page->id)->where('status', 1)->get();
            $pages = Page::where('page_id', $page->id)->get();

            return view('pages.show', compact('page', 'blocks', 'pages', 'header'));
        }
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
        $pages = Page::all();
        $layouts = Layout::all();

        return view('pages.edit', compact('page', 'blocks', 'pages', 'layouts'));
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
        $page = Page::where('url', $id)->firstOrFail();

        if ($request->sub_page == 0) {
            $url = Str::slug($request->name);
        } else {
            $parent_page = Page::find($request->sub_page);
            $url = $parent_page->url . '/' . Str::slug($request->name);
        }

        $page->name = $request->name;
        $page->identifier = str_replace(' ', '_', strtolower($request->name));
        $page->url = $url;
        $page->status = $request->status;
        $page->layout_id = $request->layout;
        $page->page_id = $request->sub_page;

        $page->save();

        return redirect('dashboard/pages');
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
        $page->blocks()->delete();
        $page->delete();

        return back();
    }

    /**
     * @param Request $request
     * @return void
     */
    public function changeOrder(Request $request)
    {
        foreach($request->get('order') as $id => $order) {
            Block::find($id)->update(['order' => $order]);
        }
    }
}
