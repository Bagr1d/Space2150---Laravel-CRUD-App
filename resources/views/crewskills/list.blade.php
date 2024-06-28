<!DOCTYPE html>
<html lang="pl">
@include('partials.head')
<body>
    <div id="idMenu">
        @include('partials.top')
        @include('partials.navi')
    </div>
    <div id="idContent">
        <h2>List of all crew skills</h2>

        <table>
            <thead>
                <tr> 
                    <th>ID</th> 
                    <th>Nick</th> 
                    <th>Name</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($crew_skills as $skill)
                    <tr> 
                        <td>{{ $skill->id }}</td> 
                        <td>{{ $skill->crewSkills->nick }}</td> 
                        <td>{{ $skill->name }}</td> 
                        @if(auth()->check() && auth()->user()->role === 'admin')
                        <td>
                            <a href="<?=config('app.url'); ?>/crewskills/edit/{{ $skill->id }}" id="idEdit">Edit</a>
                        </td> 
                        <td>
                            <a href="<?=config('app.url'); ?>/crewskills/show/{{ $skill->id }}" id="idDelete">Del</a>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>