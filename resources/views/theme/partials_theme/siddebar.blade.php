          @php
              use App\Models\Category;
              use App\Models\Blog;
              $categories = Category::get();
              $blog_di = Blog::latest()->take(3)->get();
          @endphp
          <!-- Start Blog Post Siddebar -->
          <div class="col-lg-4 sidebar-widgets">
              <div class="widget-wrap">
                  <form action="{{ route('subscriber.store') }}" method="post">
                      @csrf
                      <div class="single-sidebar-widget newsletter-widget">
                          <h4 class="single-sidebar-widget__title">Newsletter</h4>
                          @if (session('status'))
                              <div class="alert alert-success">
                                  {{ session('status') }}
                              </div>
                          @endif
                          <div class="form-group mt-30">
                              <div class="col-autos">
                                  <input type="text" name="email" value="{{ old('email') }}" class="form-control"
                                      id="inlineFormInputGroup" placeholder="Enter email"
                                      onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                                  @error('email')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                          </div>
                          <button type="submit" class="bbtns d-block mt-20 w-100">Subcribe</button>
                      </div>
                  </form>
                  <div class="single-sidebar-widget post-category-widget">
                      <h4 class="single-sidebar-widget__title">Catgory</h4>
                      @if (count($categories) > 0)
                          <ul class="cat-list mt-20">
                              @foreach ($categories as $category)
                                  <li>
                                      <a href="{{ route('theme.category', ['id' => $category->id]) }}"
                                          class="d-flex justify-content-between">
                                          <p>{{ $category->name }}</p>
                                          <p>({{ count($category->blogs) }})</p>
                                      </a>
                                  </li>
                              @endforeach
                          </ul>
                      @endif
                  </div>
                  <div class="single-sidebar-widget popular-post-widget">
                      <h4 class="single-sidebar-widget__title">Recent Post</h4>
                      <div class="popular-post-list">
                          @if (count($blog_di) > 0)
                              @foreach ($blog_di as $blog)
                                  <div class="single-post-list">
                                      <div class="thumb">
                                          <img class="card-img rounded-0"
                                              src="{{ asset('storage') }}/blogs/{{ $blog->image }}" alt="">
                                          <ul class="thumb-info">
                                              <li><a href="#">{{ $blog->user->name }}</a></li>
                                              <li><a href="#">{{ $blog->created_at->format('M d') }}</a></li>
                                          </ul>
                                      </div>
                                      <div class="details mt-20">
                                          <a href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                              <h6>{{ $blog->description }}</h6>
                                          </a>
                                      </div>
                                  </div>
                              @endforeach
                          @endif

                      </div>
                  </div>
              </div>
          </div>
          <!-- End Blog Post Siddebar -->
