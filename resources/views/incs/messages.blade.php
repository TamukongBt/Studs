@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show">
  <strong>Whoops! </strong> there where some problems with your input.<br>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
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
    <div class="alert alert-success alert-dismissible fade show">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
    </div>
@endif