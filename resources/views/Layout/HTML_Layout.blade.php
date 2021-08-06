{{--THis is the layout we are using all over the html side of things--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name', 'CoolTech')}}</title>
</head>
<body>
    @yield('content'){{--here all the content goes when the layout is called
    basically a placeholder--}}
</body>
{{--the component is the alert to say this site uses cookies and is shown on all pages--}}
<x-cookie/>
{{--footer with quick navigations to legal and search page--}}
<footer style="position: absolute; bottom: 10px; background: #718096; width: 98%;line-height: 30px">
        <form action="{{url('/Search')}}" style="display: inline; padding-left: 10px">
            <button type="submit">Search</button>
        </form>
        <form action="{{url('/Legal_Terms_Privacy')}}" style="display: inline">
            <button type="submit">Legal, Terms $ Privacy</button>
        </form>
            <text>Copyright &#xa9; 2021 - 2021 Viljoen PTY. Ltd.</text>
</footer>
</html>
