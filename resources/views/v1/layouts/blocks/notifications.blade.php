<div class="toast-container position-absolute top-0 end-0 p-3" id="toast-container-alerts">
</div>

<div class="toast-container toast-container-notifications position-absolute bottom-0 end-0 p-3">
    <!--div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <strong class="me-auto">Bootstrap</strong>
          <small class="text-muted">just now</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          See? Just like this.
        </div>
      </div>
    
      <div class="toast">
        <div class="toast-header">
          <strong class="me-auto">Bootstrap</strong>
          <small class="text-muted">2 seconds ago</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          Heads up, toasts will stack automatically
        </div>
      </div>
</div!-->




<script src="/js/note.js"></script>

@php
  $alerts = \Session::has('alerts') ? \Session::get('alerts') : []; 
@endphp

<script>
    
    $note.init({!! ui::json_encode($alerts) !!});

    //$note.alert('Ещё одно сообщение, которое вызывается из Javascript!');
</script>