<!DOCTYPE html>
<html lang="pl">
@include('partials.head')
<body>
    <div id="idMenu">
        @include('partials.top')
        @include('partials.navi')
    </div>
    <div id="idContent">
        <h2>Add ship module</h2>

        <form class="form-inline" action="<?=config('app.url'); ?>/shipmodules/save" method="POST">
            @csrf
            <p class = "inputData">
                <label for="module_name">Module name:</label>
                <input id="module_name" name="module_name" size="25" required>
            </p>
            <p>
                <label for="is_workable">Is workable:</label>
                <input type="radio" id="is_workable" name="is_workable" value=1 checked required>
                <label for="is_workable">True</label>
                <input type="radio" id="is_workable" name="is_workable" value=0 required>
                <label for="is_workable">False</label>
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