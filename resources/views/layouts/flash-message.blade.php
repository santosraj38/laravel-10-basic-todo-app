@if ($message = Session::get('success'))

<div class="text-green-500" role="alert">

  <strong>{{ $message }}</strong>

</div>

@endif 

    

@if ($message = Session::get('error'))

<div class="text-red-500" role="alert">

  <strong>{{ $message }}</strong>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>

@endif

     

@if ($message = Session::get('warning'))

<div class="text-yellow-500" role="alert">

  <strong>{{ $message }}</strong>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>

@endif




    

@if ($errors->any())

<div class="text-red-500" role="alert">

  <strong>Please check the form below for errors</strong>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>

@endif