@extends('layouts.from')
@section('title', 'detail')
@section('content')
<header>
<div class="page-section pt-4">
      <div class="container">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb bg-transparent mb-4">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="blog.html">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">How to growth your Business with scalable Employee</li>
          </ol>
        </nav>
        <div class="row">
          <div class="col-lg-8">
            <div class="blog-single-wrap">
              <div class="post-thumbnail">
                <img src="../assets/img/bg_image_1.jpg" alt="">
              </div>
              <h1 class="post-title">How to growth your Business with scalable Employee</h1>
              <div class="post-meta">
                <div class="post-author">
                  <span class="text-grey">By</span> <a href="#">Admin</a>  
                </div>
                <span class="gap">|</span>
                <div class="post-date">
                  <a href="#">22 Jan, 2018</a>
                </div>
                <span class="gap">|</span>
                <div>
                  <a href="#">StreetStyle</a>, <a href="#">Fashion</a>, <a href="#">Couple</a>  
                </div>
                <span class="gap">|</span>
                <div class="post-comment-count">
                  <a href="#">8 Comments</a>
                </div>
              </div>
              <div class="post-content">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, magnam aliquam sit tempora atque numquam, porro autem eius in odio quos nisi sequi doloribus, quo ipsam labore corrupti mollitia! Quos.</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Suscipit voluptatum dolor, nemo optio voluptatibus, distinctio obcaecati repudiandae recusandae sint sunt neque dignissimos reiciendis voluptates voluptate quibusdam temporibus, amet molestiae hic?</p>
                <p>Praesent vel mi bibendum, finibus leo ac, condimentum arcu. Pellentesque sem ex, tristique sit amet suscipit in, mattis imperdiet enim. Integer tempus justo nec velit fringilla, eget eleifend neque blandit. Sed tempor magna sed congue auctor. Mauris eu turpis eget tortor ultricies elementum. Phasellus vel placerat orci, a venenatis justo. Phasellus faucibus venenatis nisl vitae vestibulum. Praesent id nibh arcu. Vivamus sagittis accumsan felis, quis vulputate</p>
                
              </div>
            </div> <!-- .blog-single-wrap -->

            
          </div>
          
          <div class="col-lg-4">
            <div class="widget">
              <div class="widget-box">
                <h3 class="widget-title">Search</h3>
                <div class="divider"></div>
                <form action="#" class="search-form">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                    <button type="submit" class="btn"><span class="icon mai-search"></span></button>
                  </div>
                </form>
              </div>
              <div class="widget-box">
                <h3 class="widget-title">Visitor(จำนวนคนมาดูเว็บ)</h3>
                <div class="divider"></div>
                <ul class="categories">
                  <li><a href="#">Food <span>12</span></a></li>
                  <li><a href="#">Dish <span>22</span></a></li>
                  <li><a href="#">Desserts <span>37</span></a></li>
                  <li><a href="#">Drinks <span>42</span></a></li>
                  <li><a href="#">Ocassion <span>14</span></a></li>
                </ul>
              </div>
  
              <div class="widget-box">
                <h3 class="widget-title">Recent Blog(ข่าวเก่า)</h3>
                <div class="divider"></div>
                <div class="blog-item">
                  <div class="content">
                    <h6 class="post-title"><a href="#">Even the all-powerful Pointing has no control</a></h6>
                    <div class="meta">
                      <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                      <a href="#"><span class="mai-person"></span> Admin</a>
                      <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                    </div>
                  </div>
                </div>
                <div class="blog-item">
                  <div class="content">
                    <h6 class="post-title"><a href="#">Even the all-powerful Pointing has no control</a></h6>
                    <div class="meta">
                      <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                      <a href="#"><span class="mai-person"></span> Admin</a>
                      <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                    </div>
                  </div>
                </div>
                <div class="blog-item">
                  <div class="content">
                    <h6 class="post-title"><a href="#">Even the all-powerful Pointing has no control</a></h6>
                    <div class="meta">
                      <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                      <a href="#"><span class="mai-person"></span> Admin</a>
                      <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                    </div>
                  </div>
                </div>
              </div>
  
              
            </div>
          </div>
          
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
</header>



@endsection