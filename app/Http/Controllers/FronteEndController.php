<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;

class FronteEndController extends Controller
{
    //

	public function index()
	{
		return view('index')

		->with('title',Setting::first()->site_name)/* to get title of site */
		->with('categories',Category::take(4)->get())
		->with('first_post',Post::orderBy('created_at','desc')->first()) /* to get last post added */
		->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())/*first_post*/
		->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first()) /*second post */
		->with('career',Category::find(4))
		->with('tutorial',Category::find(3))
		->with('setting',Setting::first()); /* to make footer */
	}


	public function singlePost($slug)
	{


		$post = Post::where('slug',$slug)->first();

		$next_id = Post::where('id','>',$post->id)->min('id');
		$prev_id = Post::where('id','<',$post->id)->max('id');

		return view('single')->with('post',$post)
								  ->with('title',$post->title)/* to get title of site */
								  ->with('setting',Setting::first()) /* to make footer */
		                          ->with('categories',Category::take(4)->get())
		                          ->with('next',Post::find($next_id))
		                          ->with('prev',Post::find($prev_id));
	}

/******************* category for categroy .blade.php **************/
	public function category($id)
	{
		$category = Category::find($id);

		return view('category')->with('category',$category)
							   ->with('title',$category->name)
							   ->with('categories',Category::take(4)->get())
							   ->with('setting',Setting::first());;


	}





	/********************* tag for tag.blade.php *******************/


	public function tag($id)
	{

		$tag = Tag::find($id);


		return view('tag')->with('tag',$tag)
						   ->with('title',$tag->tag)
						   ->with('categories',Category::take(4)->get())
							->with('setting',Setting::first());
	}




}
