<?php
namespace App\Http\Controllers\Site;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\CategoryContract;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function show($slug)
    {
        $category = $this->categoryRepository->findBySlug($slug);
            //echo '<pre>' ; print_r($category->products); die;
        return view('site.pages.category', compact('category'));
    }

    public function test()
    {
        $cats =  Category::orderByRaw('-name ASC')->get();
        foreach ($cats as  $k => $cat){
            if($cat->parent_id != null){
                if($cat->parent_id == 1){
                    $super_cat[$cat->id][] = $cat;
                }else{
                    $children[$k]['name'] = $cat->name ;
                    $children[$k]['slug'] = $cat->slug ;
                    $super_cat[$cat->parent_id][0]['children'] =$children;
                }
            }
        }
       // dd($super_cat);
    }
}