<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\Enablers\SliderImage;
use App\Http\Requests\Enablers\Admin\SliderImageRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderImagesController extends Controller
{
    protected $sliderImage, $imagesDirectoryPath, $viewPrefix, $route;

    public function __construct(SliderImage $sliderImage)
    {
        $this->sliderImage = $sliderImage;
        $this->imagesDirectoryPath = $sliderImage::$imagesDirectoryPath;

        $this->viewPrefix = 'enablers.admin.slider-images.';
        $this->route = 'slider-images.';
    }

    public function index()
    {
        $sliderImages = $this->sliderImage->with('creator')->orderBy('id','DESC')->get();

        return view($this->viewPrefix.'index',compact('sliderImages'));
    }

    public function create()
    {
        return view($this->viewPrefix.'create');
    }

    public function store(SliderImageRequest $request)
    {
        $webImagePath = $request->file('web_image')->store($this->imagesDirectoryPath);
        $mobileImagePath = $request->file('mobile_image')->store($this->imagesDirectoryPath);

        $data = $request->all();
        $data['web_image_path'] = $webImagePath;
        $data['mobile_image_path'] = $mobileImagePath;

        $this->sliderImage->create($data);

        return redirect()->route($this->route.'index')->with('success','New Slider image added successfully');
    }

    public function show($id)
    {
        $sliderImage = $this->sliderImage->find($id);

        if(!$sliderImage){
            return redirect()->back()->with('error','Slider image not found');
        }

        return view($this->viewPrefix.'show',compact($sliderImage));
    }

    public function edit($id)
    {
        $sliderImage = $this->sliderImage->find($id);

        if(!$sliderImage){
            return redirect()->back()->with('error','Slider image not found');
        }

        return view($this->viewPrefix.'edit',compact('sliderImage'));
    }

    public function update(SliderImageRequest $request, $id)
    {
        $sliderImage = $this->sliderImage->find($id);

        if(!$sliderImage){
            return redirect()->back()->with('error','Slider image not found');
        }

        $data = $request->all();

        if($request->hasFile('web_image')) {
            $data['web_image_path'] = $request->file('web_image')->store($this->imagesDirectoryPath);
            \File::delete($sliderImage->web_image_path);
        }

        if($request->hasFile('mobile_image')) {
            $data['web_image_path'] = $request->file('mobile_image')->store($this->imagesDirectoryPath);
            \File::delete($sliderImage->mobile_image_path);
        }

        $sliderImage->update($data);

        return redirect()->route($this->route.'index')->with('success','Slider image updated successfully');
    }

    public function updateStatus($id)
    {
        $sliderImage = $this->sliderImage->find($id);

        if(!$sliderImage){
            return redirect()->back()->with('error','Slider image not found');
        }

        $sliderImage->is_enabled = !(bool)$sliderImage->is_enabled;
        $sliderImage->save();

        return redirect()->route($this->route.'index')->with('success','Slider image status updated successfully');
    }

    public function destroy($id)
    {
        $sliderImage = $this->sliderImage->find($id);

        if(!$sliderImage){
            return redirect()->back()->with('error','Slider image not found');
        }

        \File::delete($sliderImage->web_image_path);
        \File::delete($sliderImage->mobile_image_path);
        $sliderImage->delete();

        return redirect()->route($this->route.'index')->with('success','Slider image deleted successfully');
    }
}
