<!DOCTYPE html>
<html lang="pl">
@include('partials.head')
<body>
    <div id="idMenu">
        @include('partials.top')
        @include('partials.navi')
    </div>
    <div id="idContent">
        <h2>Error</h2>
        <p>{{$message}}</p>
        <br>
        <a href="<?=config('app.url'); ?>/crewskills/list" id="idBack" class="btn">Back</a>
    </div>
</body>
</html>