<!DOCTYPE html>
<html lang="pl">
@include('partials.head')
<body>
    <div id="idMenu">
        @include('partials.top')
        @include('partials.navi')
    </div>
    <div id="idContent">
        <h2>Confirmation - Delete Id: {{$crewskill->id}}</h2>

        <form class="form-inline" action="<?=config('app.url'); ?>/crewskills/delete/{{$crewskill->id}}" method="POST">
            @csrf
            <p class = "inputData">
                <label for="id">Id:</label>
                <input id="id" name="id" value="{{$crewskill->id}}" readonly>
            </p>
            <p class = "inputData">
                <label for="module_crew_id">Module Crew ID:</label>
                <input id="module_crew_id" name="module_crew_id" value="{{$crewskill->module_crew_id}}" readonly>
            </p>
            <p class = "inputData">
                <label for="name">Name:</label>
                <input id="name" name="name" value="{{$crewskill->name}}" readonly required>
            </p>
            <p><button type="submit" class="btn">Delete</button></p>
        </form>
    </div>
</body>
</html>