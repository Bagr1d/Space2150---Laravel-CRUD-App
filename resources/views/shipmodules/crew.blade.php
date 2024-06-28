<!DOCTYPE html>
<html lang="pl">
@include('partials.head')
<body>
    <div id="idMenu">
        @include('partials.top')
        @include('partials.navi')
    </div>
    <div id="idContent">
        <h2>Crew members for {{ $shipModule->module_name }}</h2>

        <table>
            <thead>
                <tr> 
                    <th>ID</th> 
                    <th>Nick</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($crewMembers   as $crew)
                    <tr> 
                        <td>{{ $crew->id }}</td> 
                        <td>{{ $crew->nick }}</td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
        <a href="<?=config('app.url'); ?>/shipmodules/list" id="idBack" class="btn">Back</a>
    </div>
</body>
</html>
