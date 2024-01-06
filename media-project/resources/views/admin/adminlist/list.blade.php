@extends("admin.layout.extension")
@section("content")

@if(session("deleteStatus"))
<div class="alert alert-danger alert-dismissible fade show border-collapse" role="alert">
  <strong>Status!</strong> {{ session("deleteStatus") }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin list Table</h3>
                <div class="card-tools">
            <!-- search -->
            <form action="{{ route('admin#listPage') }}" method="get">
              @csrf
            <div class="input-group input-group-sm" style="width: 280px;">
                    <input type="text" name="searchVal" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
            </form>
            <!-- search -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Ph-number</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($userData) != null)
                  @foreach($userData as $item)
                    <tr>
                      <td>{{ $item['id'] }}</td>
                      <td>{{ $item['name'] }}</td>
                      <td>{{ $item['email'] }}</td>
                      <td>{{ $item['gender'] }}</td>
                      <td>{{ $item['phnumber'] }}</td>
                      <td>
                        @if($item['id'] == Auth::user()->id)
                        <p class="text-muted"> logined account </p>
                        @else
                        <a href="{{ route('admin#deleteUser' , $item['id']) }}">
                        <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                        </a>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                    @else
                      <h5 class="text-center my-4 text-muted">There is no data named <span class="text-danger">{{ request('searchVal') }}</span></h5>
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
@endsection