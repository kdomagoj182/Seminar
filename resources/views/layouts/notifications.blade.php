@if(session()->has('success'))
<div class="container" >
    <div class="row justify-content-center" style="text-align:center">
    <div class="alert alert-success">
      <strong>{{ session()->get('success') }}</strong>
    </div>
  </div>
  </div>
  @endif

@if(session()->has('danger'))
  <div class="container" >
      <div class="row justify-content-center" style="text-align:center">
      <div class="alert alert-danger">
        <strong>{{ session()->get('danger') }}</strong>
      </div>
    </div>
    </div>
@endif

@if(session()->has('update'))
<div class="container" >
    <div class="row justify-content-center" style="text-align:center">
    <div class="alert alert-success">
      <strong>{{ session()->get('update') }}</strong>
    </div>
  </div>
  </div>
@endif
