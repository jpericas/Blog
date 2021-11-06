<div {{$attributes->merge(["class" => "alert alert-$alertType"])}}  role="alert">
    <h4 class="alert-heading">{{$majuscules($title)}}</h4>
    <p>{{$slot}}</p>
</div>