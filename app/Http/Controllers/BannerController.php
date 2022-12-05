<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BannerType;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use Activity;
use CSHelper;
use Storage;
use Carbon\Carbon;
class BannerController extends Controller
{
    public function index()
    {
        return view('master_data.banner.index');
    }

    public function load_ajax()
    {
        $banners = Banner::
        select(['banners.id', 'banners.title', 'banners.enabled', 'banners.created_at', 'banners.updated_at', 'bt.name as banner_type'])
        ->leftJoin('banner_types as bt', 'bt.id', '=', 'banners.banner_type_id');

        return Datatables::of($banners)

            ->editColumn('enabled', function ($obj) {
                return ($obj->enabled) ? 'Yes' : 'No';
            })
            ->addColumn('action', function ($obj) {
                return view('admin.banner.dt_action', compact('obj'))->render();
            })
            ->rawColumns(['action'])
            ->make(TRUE);
    }

    public function view($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.view', compact('banner'));
    }

    public function create()
    {
        $banner_types = BannerType::orderBy('name', 'asc')->get();
        return view('master_data.banner.create', compact('banner_types'));
    }

    public function store(Request $request)
    {
        $input = $request->input();
        
        $rules = [
            'title' => 'nullable|max:100|unique:banners,title',
            'banner_type' => 'required|integer',
            // 'image' => 'required|image',
            'channel' => 'required|in:WEB,MOBILE',
            'enabled' => 'boolean',
        ];

        if(isset($input['banner_type']) && $input['banner_type']){
            $banner_type = BannerType::findOrFail($input['banner_type']);
            $image_width = $banner_type->image_width;
            $image_height = $banner_type->image_height;
            //$rules['image'] = "required|image|dimensions:width=".$image_width.",height=".$image_height;
            
        }
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => FALSE, 'msg' => implode('<br>', $validator->errors()->all())]);
        } else {

            $banner = Banner::create([
                'title' => $input['title'],
                'banner_type_id' => $input['banner_type'],
                'image' => $this->upload_image($request, 'image'),
                'channel'  => $input['channel'],
                'enabled' => isset($input['enabled']) ? $input['enabled'] : 0,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
                'updated_by' => Auth::user()->id,
            ]);

            // Activity::log("Banner added - " . sprintf('%s', $input['title']));
            return response()->json(['status' => TRUE, 'msg' => 'Banner details added successfully.']);
        }
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        $banner_types = BannerType::orderBy('name', 'asc')->get();
        return view('admin.banner.edit', compact('banner', 'banner_types'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->input();

        $rules = [
            'title' => 'nullable|max:100|unique:banners,title,'.$id,
            'banner_type' => 'required|integer',
            'image' => 'nullable|image',
            'channel' => 'required|in:WEB,MOBILE',
            'enabled' => 'boolean',
        ];

        if(isset($input['banner_type']) && $input['banner_type']) {
            $banner_type = BannerType::findOrFail($input['banner_type']);
            $image_width = $banner_type->image_width;
            $image_height = $banner_type->image_height;
            //$rules['image'] = "nullable|image|dimensions:width=" . $image_width . ",height=" . $image_height;
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status' => FALSE, 'msg' => implode('<br>', $validator->errors()->all())]);
        } else {
            $input = $request->input();
            $banner = Banner::findOrFail($id);
            $data = [
                'title' => $input['title'],
                'banner_type_id' => $input['banner_type'],
                'channel'  => $input['channel'],
                'enabled' => isset($input['enabled']) ? $input['enabled'] : 0,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),
                'updated_by' => Auth::user()->id,
            ];

            $image = $this->upload_image($request, 'image');
            if(!empty($image)){
                $data['image'] = $image;
            }

            $banner->fill($data);
            $banner->save();

            // Activity::log("Banner updated - " . sprintf('%s', $input['title']));
            return response()->json(['status' => TRUE, 'msg' => 'Banner details updated successfully.']);
        }
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        Activity::log("Banner " . sprintf('%s', $banner->title) . " deleted");
        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner deleted successfully.');
    }


    private function upload_image($request, $file_key)
    {
        $file_path = "";
        if ($request->hasFile($file_key)) {
            $file = $request->file($file_key);
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $new_file_name = sha1($filename . time()) . '.' . $extension;
            $file_path = 'banners/' . $new_file_name;
            Storage::put($file_path, file_get_contents($file), 'public');
        }
        return $file_path;
    }
}