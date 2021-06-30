<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\Blog;
use App\Http\Requests\Enablers\Admin\BlogRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{

    protected $blog, $imagesDirectoryPath, $viewPrefix, $route;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
        $this->imagesDirectoryPath = $blog::$imagesDirectoryPath;

        $this->viewPrefix = 'enablers.admin.blogs.';
        $this->route = 'blogs.';
    }

    public function index()
    {
        $blogs = $this->blog->with('creator')->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('blogs'));
    }

    public function create() {

        return view($this->viewPrefix.'create');
    }

    public function store(BlogRequest  $request)
    {
        $imagePath = $request->file('blog_image')->store($this->imagesDirectoryPath);

        $data = $request->all();
        $data['blog_image'] = $imagePath;

        $this->blog->create($data);

        return redirect()->route($this->route.'index')->with('success','New blog added successfully');
    }

    public function show($id)
    {
        $blog = $this->blog->find($id);

        if(!$blog){
            return redirect()->back()->with('error','Blog not found');
        }

        return view($this->viewPrefix.'show',compact('blog'));
    }
    public function edit($id)
    {
        $blog = $this->blog->find($id);

        if(!$blog){
            return redirect()->back()->with('error','Blog not found');
        }

        return view($this->viewPrefix.'edit',compact('blog'));
    }

    public function update(BlogRequest $request, $id)
    {
        $blog = $this->blog->find($id);

        if(!$blog){
            return redirect()->back()->with('error','Blog found');
        }

        $data = $request->all();

        if($request->hasFile('blog_image'))
        {
            $data['blog_image'] = $request->file('blog_image')->store($this->imagesDirectoryPath);
            \File::delete($blog->blog_image);
        }

        $blog->update($data);

        return redirect()->route($this->route.'index')->with('success','Blog update successfully');
    }

    public function updateStatus($id)
    {
        $blog = $this->blog->find($id);

        $blog->is_enabled = !(bool)$blog->is_enabled;
        $blog->save();

        return redirect()->route($this->route.'index')->with('success','Blog status updated successfully');
    }

    public function destroy($id)
    {
        $blog = $this->blog->find($id);

        if(!$blog){
            return redirect()->back()->with('error','Blog not found');
        }

        \File::delete($blog->blog_image);
        $blog->delete();

        return redirect()->route($this->route.'index')->with('success','Blog deleted successfully');
    }
}
