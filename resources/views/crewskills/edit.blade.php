<!DOCTYPE html>
<html lang="pl">
@include('partials.head')
<body>
    <div id="idMenu">
        @include('partials.top')
        @include('partials.navi')
    </div>
    <div id="idContent">
        <h2>Edit Crew skill</h2>

        <form class="form-inline" action="<?=config('app.url'); ?>/crewskills/update/{{$crewskill->id}}" method="POST">
            @csrf
            <p class = "inputData">
                <label for="module_crew_id">Nick:</label>
                <input id="module_crew_id" name="module_crew_id" value="{{$crewskill->crewSkills->nick}}" readonly required>
            </p>
            <p class = "inputData">
                <label for="name">Name:</label>
                <input id="name" name="name" value="{{$crewskill->name}}" required>
            </p>
            <p><button type="submit" class="btn">Update</button></p>
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