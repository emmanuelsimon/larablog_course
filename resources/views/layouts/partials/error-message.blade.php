@if(count($errors))
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li style="list-style-type:string">
                {{ $error }}
            </li>
        @endforeach
    </div>
@endif