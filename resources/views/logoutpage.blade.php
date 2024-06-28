<!DOCTYPE html>
<html id="en">
    @include('partials.head')
    <script>
        setTimeout(function() {
            window.location.href = "<?=config('app.url');?>/";
        }, 1000);
    </script>
<body>
<div id="idMenu">
    @include('partials.top')
        @include('partials.navi')
</div>
    <div id="idContent">
        <h2>logged out successfully</h2>
    </div>
</body>
</html>
