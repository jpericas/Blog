@props(['alertType'])

<div {{$attributes->merge(['class' => 'card text-white bg-'.$alertType.' mb-3'])}}  style="max-width: 18rem; ">
    <div class="card-header">{{$title}}</div>
    <div class="card-body">
      <p class="card-text">{{$slot}}</p>
    </div>
</div>