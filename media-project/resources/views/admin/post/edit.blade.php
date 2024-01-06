@extends("admin.layout.extension")

@section("content")
<div class="col-10 offset-2  mt-5">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header p-2">
                  <legend class="text-center">Post update</legend>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane p-5" id="activity">
                      <form class="form-horizontal" action="{{ route('admin#updatePost') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="text-center mb-4">
                          @if($editData['image'] != null)
                        <img class="shadow border" src="{{ asset('storage/'.$editData['image']) }}" width="240px" height="140px" alt="">
                        @else
                        <img class="shadow" src="{{ asset('default-image.jpg') }}" width="200px" height="100px" alt="">
                        @endif
                        </div>
                        <input type="hidden" name="idforupdate" id="" value="{{ $editData['id'] }}">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Title</label>
                          <div class="col-sm-10">
                            <input name="postnameforupdate" type="text" class="form-control shadow border-0" id="inputbox" placeholder="title" value="{{ old('postnameforupdate', $editData['title'])}}">
                            @error("postnameforupdate") <small class="text-danger"> {{ $message }} </small>  @enderror
                            </div>
                            </div>

                          <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Description</label>
                          <div class="col-sm-10">
                            <input name="descriptionforupdate" type="text" class="form-control shadow border-0" id="inputbox" placeholder="description" value="{{ old('descriptionforupdate', $editData['description'])}}">
                            @error("descriptionforupdate") <small class="text-danger"> {{ $message }} </small>  @enderror
                            </div>
                            </div>

                            <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Image</label>
                          <div class="col-sm-10">
                            <input name="imageforupdate" type="file" class="form-control shadow border-0" id="inputbox" placeholder="title" value="{{ old('imageforupdate')}}">
                            @error("imageforupdate") <small class="text-danger"> {{ $message }} </small>  @enderror
                            </div>
                            </div>

                            <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Category</label>
                          <div class="col-sm-10">
                            <select name="categoryforupdate" id="" class="form-control">
                              <option value="null">choose</option>
                              @foreach($categoryData as $item)
                              <option value="{{ $item['id'] }}" @if($item['id'] == $editData['category_id']) selected @endif>{{ $item['name'] }}</option>
                              @endforeach
                            </select>
                            </div>
                            </div>
                          </div>
                        </div>

                 
                     
                        <div class="form-group row ms-3">
                          <div class="offset-sm-4 col-sm-6">
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