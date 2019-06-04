@if ($errors->any())
<div class="alert alert-danger">
  <strong>Whoops! </strong> there where some problems with your input.<br>
  <ul>
    <?php
       if (count($errors)>0) {
         echo '<li>'.$errors.'<li>';
       } 
       else if (count($errors)>1){ foreach ($errors as $error) {
        echo '<li>'.$error.'<li>';
       } }?>
  </ul>
</div>
@endif
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif