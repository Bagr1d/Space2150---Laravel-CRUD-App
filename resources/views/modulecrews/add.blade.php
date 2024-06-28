<!DOCTYPE html>
<html lang="pl">
@include('partials.head')
<body>
    <div id="idMenu">
        @include('partials.top')
        @include('partials.navi')
    </div>
    <div id="idContent">
        <h2>Add module crew</h2>

        <form class="form-inline" action="<?=config('app.url'); ?>/modulecrews/save" method="POST">
            @csrf
            <p class = "inputData">
                <label for="ship_module_id">Ship Module:</label>
                <select id="ship_module_id" name="ship_module_id" required>
                    @foreach ($shipModules as $module)
                        <option value="{{ $module->id }}" class="clOption">{{ $module->module_name }}</option>
                    @endforeach
                </select>
            </p>
            <p class = "inputData">
                <label for="nick">Nick:</label>
                <input id="nick" name="nick" size="25" required>
            </p>
            <p>
                <label for="gender">Gender:</label>
                <input type="radio" id="gender" name="gender" value="F" required>
                <label for="gender">Female</label>
                <input type="radio" id="gender" name="gender" value="M" required>
                <label for="gender">Male</label>
            </p>
            <p class = "inputData">
                <label for="age">Age:</label>
                <input id="age" name="age" required>
            </p>
           
            <p><button type="submit" class="btn">Add</button></p>
        </form>
        <p>
            @if ($errors->any())
                <div class="alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $errors }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </p>
    
    </div>
</body>
</html>