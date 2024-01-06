@extends("admin.layout.extension")

@section("content")
<div class="col-10 offset-2  mt-5">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header p-2">
                  <legend class="text-center">Post Detail</legend>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane p-5" id="activity">\
                      <div class="row">
                      <div class="col-5">
                      @if($post['image'] != null)
                        <img class="shadow border" src="{{ asset('storage/'.$post['image']) }}" width="240px" height="140px" alt="">
                        @else
                        <img class="shadow" src="{{ asset('default-image.jpg') }}" width="200px" height="100px" alt="">
                        @endif
                      </div>
                      <div class="col-7">
                        <h5> Title - {{ $post['title'] }}</h5>
                        <h5> Description  -  {{ $post['description'] }}</h5>
                      </div>
                      <a href="{{ route('admin#trendingPostPage') }}">Back</a>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection