<!DOCTYPE html>
<html lang="pl">
@include('partials.head')
<body>
    <div id="idMenu">
        @include('partials.top')
        @include('partials.navi')
    </div>
    <div id="idContent">
        <h2>List of all module crews</h2>

        <table>
            <thead>
                <tr> 
                    <th>ID</th> 
                    <th>Ship module</th> 
                    <th>Nick</th> 
                    <th>Gender</th> 
                    <th>Age</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($module_crews as $crew)
                    <tr> 
                        <td>{{ $crew->id }}</td> 
                        <td>{{ $crew->moduleCrew->module_name }}</td> 
                        <td>{{ $crew->nick }}</td> 
                        <td>{{ $crew->gender }}</td> 
                        <td>{{ $crew->age }}</td> 
                        @if(auth()->check() && auth()->user()->role === 'admin')
                        <td>
                            <a href="<?=config('app.url'); ?>/modulecrews/edit/{{ $crew->id }}" id="idEdit">Edit</a>
                        </td> 
                        <td>
                            <a href="<?=config('app.url'); ?>/modulecrews/show/{{ $crew->id }}" id="idDelete">Del</a>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>