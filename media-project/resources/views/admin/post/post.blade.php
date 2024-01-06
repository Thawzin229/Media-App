@extends("admin.layout.extension")
@section("content")
<h1>Post page</h1>
<div class="row">
<div class="col-4">
  <div class="card p-1">
    <div class="card-body">
      <form action="{{ route('admin#createPost') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name" class="mt-3">Post Name</label>
        <input type="text" name="postname" id="" class="form-control">
        @error("postname") <small class="text-danger"> {{ $message }} </small> @enderror

        <label for="name" class="mt-3">Description</label>
        <input type="text" name="description" id="" class="form-control">
        @error("description") <small class="text-danger"> {{ $message }} </small> @enderror

        <label for="name" class="mt-3">Image</label>
        <input type="file" name="image" id="" class="form-control">
        @error("image") <small class="text-danger"> {{ $message }} </small> @enderror

        <label for="name" class="mt-3">Category Name</label>
        <select name="categoryid" id="" class="form-control">
          <option value="">Category...</option>
          @foreach($categoryData as $item)
          <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
          @endforeach
        </select>
        @error("categoryid") <small class="text-danger"> {{ $message }} </small> @enderror

        <div class="text-center mt-3"><button class="btn btn-success px-4">Create</button></div>
      </form>
    </div>
  </div>
</div>
<div class="col-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Order Table</h3>

                <div class="card-tools">
                  <form action="{{ route('admin#postPage') }}" method="get">
                    @csrf
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="searchVal" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                  </form>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>image</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if(count($postData) != null)
                    @foreach($postData as $item)
                    <tr>
                      <td>{{ $item['id'] }}</td>
                      <td>{{ $item['title'] }}</td>
                      <td>{{ $item['category_name'] }}</td>
                      <td>{{ $item['description'] }}</td>
                      <td>@if($item['image'] == null)
                        <img src="{{ asset('default-image.jpg') }}" alt=""width="100px" height="80px">
                        @else
                        <img class="shadow"  width="100px" height="80px" src="{{ asset('storage/'.$item['image']) }}" alt="">
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('admin#editPostPage' , $item['id']) }}">
                        <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                        </a>
                        <a href="{{ route('admin#deletePost', $item['id']) }}">
                        <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                    @else
                    <h5 class="my-5 text-center">there is no data named <span class="text-danger">{{ request('searchVal') }}</span></h5>
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            {{ $postData->appends(request()->query())->links() }}
            <!-- /.card -->
          </div>
          </div>
@endsection