@extends("admin.layout.extension")
@section("content")
<h1>trending post page</h1>
<div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Order Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>description</th>
                      <th>View Count</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($trendPost as $item)
                    <tr>
                      <td>{{ $item['post_id'] }}</td>
                      <td>{{ $item['title'] }}</td>
                      <td>@if($item['image'] == null)
                        <img src="{{ asset('default-image.jpg') }}" alt=""width="100px" height="80px">
                        @else
                        <img class="shadow"  width="100px" height="80px" src="{{ asset('storage/'.$item['image']) }}" alt="">
                        @endif
                      </td>
                      <td>{{ $item['description'] }}</td>
                      <td>{{ $item['count'] }}</td>
                      <td>
                        <a href="{{ route('admin#trendpostDetail',$item['post_id']) }}">
                          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
@endsection