<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Session;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $post = Post::all(); // class 

        return view('admin.posts.index')->with('posts',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();/* to check if there are categories to make post */
        $tag = Tag::all();/* to check if there are tags to make post */

        if($categories->count()==0||$tag->count()==0)
                {
        Session::flash('info','You must have Some Categories or tag First before attempting to create some post.');
            return redirect()->back();
        }


        return view('admin.posts.create')->with('categories',Category::all())->with('tags',Tag::all()); 
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
            $this->validate($request,[

                'title' => 'required|max:255',
                'featured' =>'required|image',
                'content' => 'required',
                'category_id' =>'required',
                'tags' => 'required'
               
                
            ]);

            $featured = $request->featured;
            /* give an new name of image */

            $featured_new_name = time().$featured->getClientOriginalName();
            /* move file into application */
            $featured->move('uploads/posts/',$featured_new_name);
            
            $post = Post::create([

                    'title' => $request->title,
                    'content' => $request->content,
                    'featured' => 'uploads/posts/'.$featured_new_name,
                    'category_id' => $request->category_id,
                    'slug' => str_slug($request->title)
            ]);

            /* Many ro many Relation Ship */
            $post->tags()->attach($request->tags);

            Session::flash('success','Post Created Succesfully');
            
            return redirect()->back();
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
        return view('admin.posts.edit')->with('post',$post)
                                        ->with('categories',Category::all())
                                        ->with('tags',Tag::all());

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
        /* validated First */
        $this->validate($request,[

            'title' => 'required',
            'content'=>'required',
            'category_id'=>'required'

        ]);

/* find it */
        $post = Post::find($id);
/* if has file */
        if($request->hasFile('featured'))
        {
             $featured = $request->featured;
             /* give an new name of image */

            $featured_new_name = time().$featured->getClientOriginalName();
            /* move file into application */
            $featured->move('uploads/posts/',$featured_new_name);

            $post->featured ='uploads/posts/'. $featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags); /* to save edit tags */

        Session::flash('success','Post Update Succesfully');
        return redirect()->route('posts');
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

         $post = Post::find($id);

        $post->delete();

      Session::flash('success','You Succesfully Trashed the Post');

        return redirect()->route('posts');
    }


      public function trashed()
    {
        //

        $post = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts',$post);
    }

     public function kill($id)
    {
        //

         $post = Post::withTrashed()->where('id',$id)->first(); /* get the post with id */
         
         $post->forceDelete();

        Session::flash('success','Post Deleted Permanelty.');

        return redirect()->back();

    }

      public function restore($id)
    {
        //

         $post = Post::withTrashed()->where('id',$id)->first(); /* get the post with id */
         
         $post->restore();

        Session::flash('success','Post Restored Succesfully.');

        return redirect()->back();

    }
}
