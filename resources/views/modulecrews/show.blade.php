<!DOCTYPE html>
<html lang="pl">
@include('partials.head')
<body>
    <div id="idMenu">
        @include('partials.top')
        @include('partials.navi')
    </div>
    <div id="idContent">
        <h2>Confirmation - Delete Id: {{$modulecrew->id}}</h2>

        <form class="form-inline" action="<?=config('app.url'); ?>/modulecrews/delete/{{$modulecrew->id}}" method="POST">
            @csrf
            <p class = "inputData">
                <label for="id">Id:</label>
                <input id="id" name="id" value="{{$modulecrew->id}}" readonly>
            </p>
            <p class = "inputData">
                <label for="ship_module_id">Ship Module ID:</label>
                <input id="ship_module_id" name="ship_module_id" value="{{$modulecrew->ship_module_id}}" readonly>
            </p>
            <p class = "inputData">
                <label for="nick">Nick:</label>
                <input id="nick" name="nick" value="{{$modulecrew->nick}}" readonly required>
            </p>
            <p class = "inputData">
                <label for="gender">Gnder:</label>
                <input id="gender" name="gender" value="{{$modulecrew->gender}}" readonly required>
            </p>
            <p class = "inputData">
                <label for="age">Age:</label>
                <input id="age" name="age" value="{{$modulecrew->age}}" readonly required>
            </p>
            <p><button type="submit" class="btn">Delete</button></p>
        </form>
    </div>
</body>
</html>