@extends('Layout.HTML_Layout')

@section('content')
    {{--article row contains all the column infor on the article and is accessed like shown
    this goes the same for the taggs --}}
    <h1>{{$articleRow->ArticleHeading}}</h1>
    <p>{{$articleRow->ArticlePara1}}</p>

    @if($articleRow->ArticlePara2)
        <p>{{$articleRow->ArticlePara2}}</p>
    @endif

    @if($articleRow->ArticlePara3)
        <p>{{$articleRow->ArticlePara3}}</p>
    @endif

    <p>
        Category : {{$articleRow->Category}}<br><br>
        Tags : @foreach($taggs as $tagg)
                    <span>{{$tagg->TagName}}, </span>
                @endforeach
        <br><br>
        Date Created : {{$articleRow->TimeStamp}}<br>
    </p>
    {{--action goes to home page using routes--}}
    <form action="{{url('/')}}" style="display: inline">
        <button type="submit">Home</button>
    </form>
    {{--action goes to search page using routes--}}
    <form action="{{url('/Search')}}" style="display: inline">
        <button type="submit">Search</button>
    </form>
@endsection
