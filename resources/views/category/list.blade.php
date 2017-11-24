@extends ('layouts.app')
@section('content')
    My list of categories
    @foreach ($categories as $category)
        <p>This is category : {{ $category->label }}</p>
    @endforeach
@endsection