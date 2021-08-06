@extends('Layout.HTML_Layout')

@section('content')
    <h1>For Category "{{$title}}"</h1>
    {{--The isEmpty method returns true if the collection is empty; otherwise, false is returned:--}}
    @if($categories->isEmpty())
        <h2>The category does not exist</h2>
    @else
        {{--here we generate the articles one by one with a link and a paragraph of the article
        this will continue until the end of the data is reached by the for loop--}}
        @foreach($categories as $category)
            <div>
                <a href="{{url('/ArticleView/'.$category->ArticleID)}}"><h2>{{$category->ArticleHeading}}</h2></a>
                <p>{{$category->ArticlePara1}}</p>
            </div>
        @endforeach
    @endif
{{--buttons to go to pages using url --}}
    <form action="{{url('/')}}" style="display: inline">
        <button type="submit">Home</button>
    </form>
    <form action="{{url('/Search')}}" style="display: inline">
        <button type="submit">Search</button>
    </form>
@endsection
