<!DOCTYPE html>
<html lang="pl">
@include('partials.head')
<body>
    <div id="idMenu">
        @include('partials.top')
        @include('partials.navi')
    </div>
    <div id="idContent">
        <h2>Confirmation - Delete Id: {{$shipmodule->id}}</h2>

        <form class="form-inline" action="<?=config('app.url'); ?>/shipmodules/delete/{{$shipmodule->id}}" method="POST">
            @csrf
            <p class = "inputData">
                <label for="id">Id:</label>
                <input id="id" name="id" value="{{$shipmodule->id}}" readonly>
            </p>
            <p class = "inputData">
                <label for="module_name">Module name:</label>
                <input id="module_name" name="module_name" value="{{$shipmodule->module_name}}" size="25" readonly required>
            </p>
            <p><button type="submit" class="btn">Delete</button></p>
        </form>
    </div>
</body>
</html>