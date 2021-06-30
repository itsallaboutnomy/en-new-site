<?php

namespace App\Http\Controllers\Enablers;

use App\Models\Enablers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    protected $blog, $viewPrefix;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
        $this->viewPrefix = 'enablers.app.blogs.';
    }

    public function index(){

        $blogs = $this->blog->enabled()->get();

        return view($this->viewPrefix.'index', compact('blogs'));
    }

    public function blogDetail($slug){

        $blog = $this->blog->enabled()->where('slug',$slug)->first();

        if(!$blog){
            abort(404);
        }

        return view($this->viewPrefix.'blog-detail', compact('blog'));
    }
}
