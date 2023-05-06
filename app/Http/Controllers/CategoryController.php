<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Categorys;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request): View
    {
        $categorys = Categorys::where('parent_id', '=', 0)->get();
        $childs = Categorys::with('childs')->get();
        if($request->get('sort') === "1"){
            $categorys = Categorys::where('parent_id', '=', 0)->orderBy('name', 'asc')->get();
        }else if($request->get('sort') === "2"){
            $categorys = Categorys::where('parent_id', '=', 0)->orderBy('name', 'desc')->get();
        }
        return view('category.index', compact('categorys', 'childs'));   
    }

    public function create(): View
    {
        $branches = Categorys::where('type', '=', 'galaz')->get();
        return view('category.create', compact('branches'));
        
    }

    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        $categorys = new Categorys();
        $categorys->name = $request->name;
        $categorys->parent_id = $request->parent_id;
        $categorys->type = $request->type;
        $categorys->save();
        return redirect(route('category.index'))->with('message', 'Dodano element');
    }

    public function show($id)
    {
        //
    }

    public function edit($id): View
    {
        $category_id = Categorys::find($id);
        $branches = Categorys::where('type', '=', 'galaz')->get();
        return view('category.edit',compact('category_id', 'branches'));
    }

    public function update(CategoryUpdateRequest $request, $id): RedirectResponse
    {

        $categorys = Categorys::find($id);
        $categorys->name = $request->name;
        $categorys->parent_id = $request->parent_id;
        $categorys->save();
        return redirect()->route('category.index')->with('message', 'Aktualizacja elementu');



    }

    public function destroy($id): RedirectResponse
    {
        $category = Categorys::find($id);
        $category->childs()->delete();
        $category->delete($id);

        return redirect()->route('category.index')->with('message', 'Usunięto element');
    }
}
