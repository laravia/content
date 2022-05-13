<?php

namespace Laravia\Content\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravia\Content\App\Models\Content;
use Laravia\Core\App\Laravia;

class ContentController extends Controller
{

    public function index()
    {
        $contents = Content::orderByDesc('id')->get();

        return view('laravia.content::admin.index', ['contents' => $contents]);
    }

    public function edit(Request $request, $id)
    {
        $content = Content::with('tags')->find($id);

        return view('laravia.content::admin.edit', ['content' => $content]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        $request->merge(['user_id' => auth()->user()->id]);
        $content = Content::create($request->all());
        $content->addTags($request->get('tags'));
        return back()->with('message', Laravia::trans('core.storeSuccess'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'title' => 'required',
            'body' => 'required'
        ]);
        $request->merge(array('active' => ($request->get('active') == 'on' ? true : false)));

        $content = Content::find($request->id);
        $content->reTag($request->get('tags'));
        $content = $content->update($request->all());
        return back()->with('message', Laravia::trans('core.updateSuccess'));
    }

    public function list()
    {
        $tags = Route::getOptions('tags');
        $contents = Content::orderByDesc('id');
        if ($tags) {
            $contents = $contents->WithAnyTag($tags);
        }
        $contents = $contents->paginate(100);
        return view('laravia.content::frontend.index', ['contents' => $contents]);
    }
}
