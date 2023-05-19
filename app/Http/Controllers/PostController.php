<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $banner_image = null;
        if ($request->file('banner_image')) {
            $file = $request->file('banner_image');
            $filename = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $banner_image = $filename;
        }

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'banner_image' => $banner_image,
            'author_id' => Auth::user()->id,
            'slug' => $this->createSlug($request->title)
        ]);

        if (count($request->category) > 0) {
            $post->categories()->attach($request->category);
        }

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        $selected_categories = $post->categories;
        $all_categories = Category::all();
        $categories = [];
        $key = [];

        foreach ($all_categories as $category) {
            foreach ($selected_categories as $selected) {
                if ($selected->id == $category->id) {
                    $key[] = $selected->id;
                    $category->selected = true;
                    $categories[] = $category;
                }
            }
        }

        foreach ($all_categories as $category) {
            if (!in_array($category->id, $key)) {
                $category->selected = false;
                $categories[] = $category;
            }
        }

        return view('post.edit', compact('post', 'categories'));
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
        //
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->author_id = Auth::user()->id;
        $post->slug = $this->createSlug($request->title);

        if ($request->file('banner_image')) {
            $file = $request->file('banner_image');
            $filename = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $post->banner_image = $filename;
        }

        if (count($request->category) > 0) {
            $post->categories()->sync($request->category);
        }

        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Post::destroy($id);

        return redirect()->route('post.index');
    }

    public static function createSlug($str, $delimiter = '-')
    {
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }
}
