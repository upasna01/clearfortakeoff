<div class="row">
    <div class="col-sm-12">
        @if(isset($errors))
            <ul class="alert-danger">
                @foreach($errors as $error)
                    <li>$error</li>
                @endforeach
            </ul>
        @endif

    </div>
</div>