<div class="row">
    <div class="col-sm-12">
        <ul class="alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
</div>