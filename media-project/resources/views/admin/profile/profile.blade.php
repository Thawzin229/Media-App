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
                      <form class="form-horizontal" action="{{ route('admin#updateProfile') }}" method="post">
                        @csrf
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input name="name" type="text" class="form-control shadow border-0" id="inputbox" placeholder="Name" value="{{ old('name' , Auth::user()->name) }}">
                            @error("name") <small class="text-danger"> {{ $message }} </small>  @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input name="email"type="email" class="form-control shadow border-0" id="inputbox" placeholder="Email" value="{{ old('email' , Auth::user()->email) }}">
                            @error("email") <small class="text-danger"> {{ $message }} </small>  @enderror
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Ph.no</label>
                          <div class="col-sm-10">
                            <input name="phnumber" type="text" class="form-control shadow border-0" id="inputbox" placeholder="Ph-number" value="{{ old('phnumber' , Auth::user()->phnumber) }}">
                            @error("phnumber") <small class="text-danger"> {{ $message }} </small>  @enderror
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
                          <div class="col-sm-10">
                            <input name="address" type="text" class="form-control shadow border-0" id="inputbox" placeholder="address" value="{{ old('address' , Auth::user()->address) }}">
                            @error("address") <small class="text-danger"> {{ $message }} </small>  @enderror
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Gender</label>
                          <div class="col-sm-10">
                            <select name="gender" id="inputbox" class="form-control shadow">
                              <option value="null">choose</option>
                              <option value="male" @if(Auth::user()->gender == "male") selected @endif>Male</option>
                              <option value="female" @if(Auth::user()->gender == "female") selected @endif>Female</option>
                            </select>
                            @error("gender") <small class="text-danger"> {{ $message }} </small>  @enderror
                          </div>
                        </div>
                     
                        <div class="form-group row ms-3">
                          <div class="offset-sm-4 col-sm-6 mt-4">
                            <button type="submit" id="button">Submit</button>
                          </div>
                        </div>
                      </form>
                         
                      <div class="form-group row me-5">
                          <div class="offset-sm-5  col-sm-5">
                            <a href="{{ route('admin#changePasswordPage') }}">Change Password</a>
                          </div>
                        </div>
                      
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection