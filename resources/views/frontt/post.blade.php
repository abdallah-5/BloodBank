@extends('front.master')
@section('content')
  <!-- Navigator Start -->
  <section id="navigator">
      <div class="container">
          <div class="path">
              <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
              <div class="path-main" style="color: darkred; display:inline-block;">/ Articles</div>
              <div class="path-directio" style="color: grey; display:inline-block;"> / Disease Protection</div>
          </div>

      </div>
  </section>
  <!-- Navigator End -->

  <!-- article Start -->
  <section id="article">
      <div class="container">
          <img class="head-img" src="{{asset('front/imgs/p4.jpg')}}" alt="">
          <div class="details-container">
              <div class="title">Donations Benefits</div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere qui eius asperiores, animi adipisci
                  quia eum beatae incidunt, laborum velit quibusdam debitis totam, et reiciendis ad? Commodi
                  cupiditate velit vero?
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum aspernatur est magnam, nesciunt
                  culpa provident sit nobis molestias possimus? A optio dolores dolorum, odio nam est ducimus quis
                  quisquam vero.
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae modi veritatis iste provident
                  quis consectetur animi soluta, rerum dicta dolorem suscipit facere quas, porro, pariatur tempora
                  consequuntur ad accusamus. Voluptatem?
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere qui eius asperiores, animi adipisci
                  quia eum beatae incidunt, laborum velit quibusdam debitis totam, et reiciendis ad? Commodi
                  cupiditate velit vero?
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum aspernatur est magnam, nesciunt
                  culpa provident sit nobis molestias possimus? A optio dolores dolorum, odio nam est ducimus quis
                  quisquam vero.
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae modi veritatis iste provident
                  quis consectetur animi soluta, rerum dicta dolorem suscipit facere quas, porro, pariatur tempora
                  consequuntur ad accusamus. Voluptatem?
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere qui eius asperiores, animi adipisci
                  quia eum beatae incidunt, laborum velit quibusdam debitis totam, et reiciendis ad? Commodi
                  cupiditate velit vero?
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum aspernatur est magnam, nesciunt
                  culpa provident sit nobis molestias possimus? A optio dolores dolorum, odio nam est ducimus quis
                  quisquam vero.
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae modi veritatis iste provident
                  quis consectetur animi soluta, rerum dicta dolorem suscipit facere quas, porro, pariatur tempora
                  consequuntur ad accusamus. Voluptatem?
              </p>
              <strong><a>Share this article:</a></strong>
              <div class="icons">
                  <i class="fab fa-facebook-square fa-3x"></i>
                  <i class="fab fa-google-plus-square fa-3x"></i>
                  <i class="fab fa-twitter-square fa-3x"></i>
              </div>

          </div>
          <!-- Articles Start -->
          <section id="articles">
              <div class="container">
                  <h2 style="display: inline-block;">Articles</h2>
                  <div class="swiper-container">
                      <div class="button-area" style="display: inline-block; margin-left: 850px;">
                          <div class="swiper-button-next"></div>
                          <div class="swiper-button-prev"></div>
                          </button>
                      </div>
                      <div class="swiper-wrapper">
                          <div class="swiper-slide">
                              <div class="card">
                                  <div class="card-img-top" style="position: relative;">
                                      <img src="imgs/p3.jpg" alt="Card image">
                                      <button class="like"><i class="fas fa-heart icon-large"></i></button>
                                  </div>
                                  <div class="card-body">
                                      <h4 class="card-title">Blood Types</h4>
                                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                          Nobis
                                          laborum
                                          dolor minus quibusdam sequi asperiores? Fugiat aut consectetur laudantium ea
                                          sed
                                          nihil
                                          dolore, in mollitia blanditiis, rem omnis recusandae maiores?</p>
                                      <div class="btn-cont">
                                          <button class="card-btn"
                                              onclick="window.location.href = 'article.html';">Details</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="swiper-slide">
                              <div class="card">
                                  <div class="card-img-top" style="position: relative;">
                                      <img src="imgs/p4.jpg" alt="Card image">
                                      <button class="like"><i class="fas fa-heart icon-large"></i></button>
                                  </div>
                                  <div class="card-body">
                                      <h4 class="card-title">Donations Benefits</h4>
                                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                          Nobis
                                          laborum
                                          dolor minus quibusdam sequi asperiores? Fugiat aut consectetur laudantium ea
                                          sed
                                          nihil
                                          dolore, in mollitia blanditiis, rem omnis recusandae maiores?</p>
                                      <div class="btn-cont">
                                          <button class="card-btn"
                                              onclick="window.location.href = 'article.html';">Details</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="swiper-slide">
                              <div class="card ">
                                  <div class="card-img-top" style="position: relative;">
                                      <img src="imgs/p1.jpg" alt="Card image">
                                      <button class="like"><i class="fas fa-heart icon-large"></i></button>
                                  </div>
                                  <div class="card-body">
                                      <h4 class="card-title">Disease Protection</h4>
                                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                          Nobis
                                          laborum
                                          dolor minus quibusdam sequi asperiores? Fugiat aut consectetur laudantium ea
                                          sed
                                          nihil
                                          dolore, in mollitia blanditiis, rem omnis recusandae maiores?</p>
                                      <div class="btn-cont">
                                          <button class="card-btn"
                                              onclick="window.location.href = 'article.html';">Details</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="swiper-slide">
                              <div class="card">
                                  <div class="card-img-top" style="position: relative;">
                                      <img src="imgs/p5.jpg" alt="Card image">
                                      <button class="like"><i class="fas fa-heart icon-large"></i></button>
                                  </div>
                                  <div class="card-body">
                                      <h4 class="card-title">How To Donate?</h4>
                                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                          Nobis
                                          laborum
                                          dolor minus quibusdam sequi asperiores? Fugiat aut consectetur laudantium ea
                                          sed
                                          nihil
                                          dolore, in mollitia blanditiis, rem omnis recusandae maiores?</p>
                                      <div class="btn-cont">
                                          <button class="card-btn"
                                              onclick="window.location.href = 'article.html';">Details</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!-- Articles End -->

      </div>
  </section>
  <!-- Article End -->
@endsection
