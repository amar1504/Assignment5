@if($errors->any())

    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach

@endif

<form method="POST" action="{{ route('contactstore') }}">
    {{ csrf_field() }}
    <label>Name: </label>
    <input type="text" name="name">
    <input type="submit" value="Submit">
</form>