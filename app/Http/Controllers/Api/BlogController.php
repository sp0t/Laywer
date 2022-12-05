<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\Traits\APITokenTrait;
use App\Models\Blog;
use Validator;

class BlogController extends Controller
{
    use APITokenTrait;

    protected function guard()
    {
        return Auth::guard('api');
    }

    public function index(Request $request){
        $page = $request->input('page', 0);
        $limit = $request->input('limit', 10);
        $type = $request->input('type', 'all');
        $search_key = $request->input('q', null);
        $filter_by = $request->input('filter_by', 'nw');

        $blogs = Blog::select('id', 'title', 'blog_text', 'description')
                        ->where('status', 0);

        if ($search_key) {
            $blogs = $blogs->where(function ($q) use ($search_key) {
                $q->where('title', 'LIKE', "%{$search_key}%");
                $q->orWhere('blog_text', 'LIKE', "%{$search_key}%");
                $q->orWhere('description', 'LIKE', "%{$search_key}%");
            });
        }

        if($filter_by == 'nw'){
            $blogs = $blogs->orderBy('created_at', 'desc');
        } elseif ($filter_by == 'mv') {
            $blogs = $blogs->orderBy('view_count', 'desc');
        } else {
            $blogs = $blogs->orderBy('id');
        }

        $blogs = $blogs->paginate($limit, $page);

        return api_success_response(API_REQUEST_SUCCESS, ['blogs' => $blogs]);
    }

    public function view(Request $request, $id){

        $blog = Blog::findOrFail($id);
        if($blog){

            $blog->view_count = $blog->view_count + 1;
            $blog->save();

            unset($blog->view_count);
            unset($blog->created_by);
            unset($blog->updated_by);
            unset($blog->updated_at);
            unset($blog->status);

            return api_success_response(API_REQUEST_SUCCESS, ['blog' => $blog]);
        } else {
            return api_error_response(API_REQUEST_SUCCESS, 'Blog not found.');
        }
        
    }
}
