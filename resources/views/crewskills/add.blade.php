<!DOCTYPE html>
<html lang="pl">
@include('partials.head')
<body>
    <div id="idMenu">
        @include('partials.top')
        @include('partials.navi')
    </div>
    <div id="idContent">
        <h2>Add crew skill</h2>

        <form class="form-inline" action="<?=config('app.url'); ?>/crewskills/save" method="POST">
            @csrf
            <p class = "inputData">
                <label for="module_crew_id">Crew ID:</label>
                <select id="module_crew_id" name="module_crew_id" required>
                    @foreach ($ModuleCrew as $crew)
                        <option value="{{ $crew->id }}">{{ $crew->nick }}</option>
                    @endforeach
                </select>
            </p>
            <p class = "inputData">
                <label for="name">Name:</label>
                <input id="name" name="name" size="25" required>
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