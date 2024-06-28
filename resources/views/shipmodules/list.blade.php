<!DOCTYPE html>
<html lang="pl">
@include('partials.head')
<body>
    <div id="idMenu">
        @include('partials.top')
        @include('partials.navi')
    </div>
    <div id="idContent">
        <h2>List of all ship modules</h2>

        <table>
            <thead>
                <tr> 
                    <th>ID</th> 
                    <th>Module name</th> 
                    <th>Is workable?</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($ship_modules as $module)
                    <tr> 
                        <td>{{ $module->id }}</td> 
                        <td>
                            <a href="<?=config('app.url'); ?>/shipmodules/crew/{{ $module->module_name }}" id="idCrew">{{ $module->module_name }}</a>
                        </td> 
                        <td>{{ $module->is_workable }}</td> 
                        @if(auth()->check() && auth()->user()->role === 'admin')
                        <td>
                            <a href="<?=config('app.url'); ?>/shipmodules/edit/{{ $module->id }}" id="idEdit">Edit</a>
                        </td> 
                        <td>
                            <a href="<?=config('app.url'); ?>/shipmodules/show/{{ $module->id }}" id="idDelete">Del</a>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
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