@extends("admin.layout.extension")

@section("content")
<div class="col-10 offset-2  mt-5">
            <div class="col-md-10">
              <div class="card">
                <!-- alert start -->
                @if(session("status"))
              <div class="alert alert-success alert-dismissible fade show border-collapse" role="alert">
                <strong>Status!</strong> {{ session("status") }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

         
              <!-- alert end -->
                <div class="card-header p-2">
                  <legend class="text-center">User Profile</legend>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane p-5" id="activity">
                      <form class="form-horizontal" action="{{ route('admin#updateCategory') }}" method="post">
                        @csrf
                        <input type="hidden" name="idforupdate" id="" value="{{ $data['id'] }}">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Category</label>
                          <div class="col-sm-10">
                            <input name="nameforupdate" type="text" class="form-control shadow border-0" id="inputbox" placeholder="Name" value="{{ old('nameforupdate' , $data['name']) }}">
                            @error("nameforupdate") <small class="text-danger"> {{ $message }} </small>  @enderror
                          </div>
                        </div>

                 
                     
                        <div class="form-group row ms-3">
                          <div class="offset-sm-4 col-sm-6 mt-4">
                            <button type="submit" id="button">Update</button>
                          </div>
                        </div>
                      </form>
                         
                      
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection