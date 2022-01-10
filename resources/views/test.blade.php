<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
<form>
@csrf
    <select name="test" id="test">
        <option value="0">---</option>
        @foreach($lecturers as $lecturer)
            <option value="{{$lecturer['id']}}">{{$lecturer['name']}}</option>
        @endforeach
    </select>
    <select name="subtest" id="subtest">
        <option value="0">---</option>
    </select>
</form>
{{--<script src="https://code.jquery.com/jquery-3.4.1.js"></script>--}}
<!-- Scripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>


</body>
</html>
