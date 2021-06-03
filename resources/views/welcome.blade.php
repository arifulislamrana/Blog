@extends('_index')



@section('content')



<div class="full_bg">
      <!-- header inner -->
         <div class="section">
            <!-- carousel code -->
            <div id="banner1" class="carousel slide slider_main">
               <ol class="carousel-indicators ">
                  <li data-target="#banner1" data-slide-to="0" class="indicator-li-1">01</li>
               </ol>
               <div class="carousel-inner">
                  <!-- first slide -->
                  <div class="carousel-item active">
                     <div class="carousel-caption cuplle">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-8">
                                 <div class="photog">
                                    <h1>Ariful's Blog.</h1> 
                                    <a class="read_more" href="#" >Contact</a>
                                    <a class="read_more" href="#" >About</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end banner -->
      <!-- about -->
      <div class="about">
         <div class="container_width">
            <div class="row d_flex">
                   <div class="col-md-7">
                  <div class="titlepage text_align_left">
                     <h2>{{ $mostRecentPosts[0]->title }}</h2><br>

                        @foreach ($mostRecentPosts[0]->tags as $tag)
                        <a href="{{ Route('findPostsByTag', ['id' => $tag->id]) }}">#{{ $tag->name }}</a>
                        @endforeach

                     {!! $mostRecentPosts[0]->body !!}
                     <a class="read_more" href="{{Route('blogdetails', ['id' => $mostRecentPosts[0]->id])}}">About More</a>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="about_img text_align_center">
                     <figure><img src="/uploads/{{$mostRecentPosts[0]->image}}" alt="#"/></figure>
                  </div>
               </div>
              
            </div>
         </div>
      </div>
      <!-- end about -->
   



        <!-- categories -->
        <x-category />
      <!-- end categories -->



    <!-- cases -->
      <div class="cases">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage text_align_center ">
                     <h2>LATEST BLOGS</h2> 
                  </div>
               </div>
            </div>
            <div class="row d_flex">
               
               
               @foreach ($mostRecentPosts as $post)

               <div class=" col-md-4">
                  <div class="latest text_align_center">
                     <figure><img src="/uploads/{{$post->image}}" alt="#"/></figure>
                     <a class="read_more" href="{{Route('blogdetails', ['id' => $post->id])}}">Read More</a>
                     <div class="nostrud">
                        <h3>{{ $post->title }}</h3>

                        @foreach ($post->tags as $tag)
                        <a href="{{ Route('findPostsByTag', ['id' => $tag->id]) }}">#{{ $tag->name }}</a>
                        @endforeach

                        <br>
                        {!! $post->body !!} 
                     </div>
                  </div>
               </div>
              
                @endforeach

            </div>
         </div>
      </div>
      <!-- end cases -->
       

 @endsection