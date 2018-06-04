@extends('layouts.app')

@section('content')

<div class="row">
            <div class="card col-lg-3">
                <div class="card-header text-center">Published Post</div>

                <div class="card-body">

                        <div class="alert alert-success text-center">

                            {{$post_count}}
                        </div>
                    

                   
                </div>
            </div>



                <div class="card col-lg-3">
                <div class="card-header text-center">Trashed Post</div>

                <div class="card-body">

                        <div class="alert alert-danger text-center">

                            {{$trash_count}}
                        </div>
                    

                   
                </div>
            </div>


                 <div class="card col-lg-3">
                <div class="card-header text-center">users</div>

                <div class="card-body">

                        <div class="alert alert-info text-center">

                            {{$user_count}}
                        </div>
                </div>
            </div>



                 <div class="card col-lg-3">
                <div class="card-header text-center">Categories</div>

                <div class="card-body">

                        <div class="alert alert-warning text-center">

                            {{$category_count}}
                        </div>
                </div>
            </div>
</div>
     
@endsection
