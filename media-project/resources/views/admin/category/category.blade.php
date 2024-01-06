@extends("admin.layout.extension")
@section("content")
<h1>category page</h1>
<div class="row">
<div class="col-4">
  <div class="card p-4">
    <div class="card-body">
      <form action="{{ route('admin#createCategory') }}" method="post">
        @csrf
        <label for="name">Category Name</label>
        <input type="text" name="categoryname" id="" class="form-control">
        @error("categoryname") <small class="text-danger"> {{ $message }} </small> @enderror
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
                  <form action="{{ route('admin#categoryPage') }}" method="get">
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
                      <th>Category ID</th>
                      <th>Category Name</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($data) != null)
                    @foreach($data as $item)
                    <tr>
                      <td>{{ $item['id'] }}</td>
                      <td>{{ $item['name'] }}</td>
                      <td>{{ $item['created_at']->format("d-m-Y") }}</td>
                      <td>
                        <a href="{{ route('admin#editPage' , $item['id']) }}">
                        <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                        </a>
                        <a href="{{ route('admin#deleteCategory', $item['id']) }}">
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
            <!-- /.card -->
          </div>
          </div>
@endsection