@extends('layouts.app')

@section('content')
<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h3 class="text-uppercase text-center mb-5">Add New Room</h3>

              <form action="{{route('addRoom')}}"  method="post">
              {{csrf_field()}}
            <div class="form-outline mb-4">
                <label class="form-label" for="cetegory">Cetegory</label>
                 <select class="form-select form-select-lg" id="cetegory" name="cetegory">
                    <option value="delux">Delux</option>
                    <option value="premium">Premium</option>
                    <option value="regular">Regular</option>
                </select>
                
            </div>

            <div class="form-outline mb-4">
            <label class="form-label">Rent(BDT)</label>
                <input type="number" id="rent" class="form-control form-control-lg" name="rent" value="1000"/>   
            </div>

                
                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" id="addButton">Add</button>
                </div>
    
              </form>

            </div>
            @if($errors->any())
                  <div class="err">
                  <h4 style="text-align: center;">{{$errors->first()}}</h4>
                  </div>
                @endif
          </div>
        </div>
      </div>
    </div>
    
  </div>
</section>

@endsection
