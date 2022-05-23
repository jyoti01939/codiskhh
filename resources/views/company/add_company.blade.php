

<!DOCTYPE html>
<html lang="en">
  <head>
      <style>
          label
          {
              display: inline-block;
              width: 150px;
          }
      </style>
    @include('css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      @include('sidebar')
      @include('navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
       <h1>Add Company</h1>
       <div class="container" align="center" style="padding: 100px;">
        @if(session()->has('message'))
        <div class="alert alert-success" role="alert">

            {{ session()->get('message') }}
          </div>

        @endif
         <form action="{{ url('upload_company') }}" method="POST" enctype="multipart/form-data">
            @csrf
              <div style="padding: 15px;">
                  <label for="">Company Name:</label>
                  <input type="text" name="name" placeholder="Write the name" style="color: black;" value="{{ old('name') }}">
              </div>
              <span class="text-danger">
                  @error('name')
                    {{ $message }}
                  @enderror
              </span>
              <div style="padding: 15px;">
                <label for="">Email:</label>
                <input type="text" name="email" placeholder="Write your email" style="color: black;" value="{{ old('email') }}">
            </div>
            <span class="text-danger">
                @error('email')
                {{ $message }}
                @enderror
            </span>
            <div style="padding: 15px;">
                <label for="">Website:</label>
                <input type="text" name="website" placeholder="website" style="color: black;" value="{{ old('website') }}">
            </div>
            <span class="text-danger">
                @error('website')
                {{ $message }}
                @enderror
            </span>
            <div style="padding: 15px;">
                <label for="">Logo:</label>
                <input type="file" name="file">
            </div>
            <span class="text-danger">
                @error('file')
                {{ $message }}
                @enderror
            </span>
            <div style="padding: 15px;">

                <button class="btn btn-success">Add</button>
            </div>
         </form>
       </div>
        </div>
    <!-- container-scroller -->
   @include('script')
  </body>
</html>
