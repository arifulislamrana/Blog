
      <div class="protect">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="titlepage text_align_center">
                    <h2>BLOG CATEGORIES</h2>
                    <p>Choose any specific category of your interest to read interesting blogs
                    </p>
                 </div>
              </div>
           </div>
        </div>
          <div class="protect_bg">
        <div class="container">
            <div class="row">
              <div class="col-md-12">
                 <!--  Demos -->
                 <div class="owl-carousel owl-theme">

                    @foreach (getActiveCategories() as $category)

                    <div class="item">
                     <div class="protect_box text_align_center">
                       <div class="desktop">
                        <h3> {{ $category->name }}</h3>
                        <span> Under {{ $category->name }} we have {{ countNoOfPostOfCategory($category->id) }} blogs</span>
                       </div>
                        <a class="read_more" href="{{Route('categoryblog', ['id' => $category->id])}}">See Posts</a>
                     </div>
                  </div>

                  @endforeach
                  
                 </div>
              </div>
           </div>
         </div>
     </div>