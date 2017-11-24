<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogCategory;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    protected $redirectTo = '/category/';
    public function index(){
        $categories = Category::all();

        return view('category.list', ['categories' => $categories]);

 /*       foreach ($categories as $category) {
            echo $category->label . '<br>';
        }

        // select * from `categories` where `idcategories` = ? or `label` = ? order by `label` asc limit 2
        $categories = Category::where('idcategories', 1)
                                ->orWhere('label', "essai")
                                ->limit(2)
                                ->orderBy('label');

        //toSql() -> sert a extraire et eventuellement dump la requete Sql
        var_dump($categories->toSql());*/
    }

    public function create(){
        return view('category.create');
    }

    public function store(StoreBlogCategory $request){
        $category = new Category;

        $category->label = $request->label;

        $category->save();

        return redirect($this->redirectTo);
    }

    //Ex : http://project.dev/category/update/1
    public function update($id){
        $category = Category::find($id);
        return view('category.update', ['category' => $category]);
    }

    public function edit(StoreBlogCategory $request, $id){
        $category = Category::find($id);
        $category->label = $request->label;
        $category->save();

        return redirect($this->redirectTo);
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();

        return redirect($this->redirectTo);
    }
}
