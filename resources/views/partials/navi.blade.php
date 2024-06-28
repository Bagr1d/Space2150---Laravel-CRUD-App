<nav>
    <div id="side">
        <a href="<?=config('app.url');?>/"><img src="{{ URL::asset('banner2.png') }}" alt="spaceship"></a>
        <a href="<?=config('app.url');?>/" id="link">Home</a>
        <a href="<?=config('app.url');?>/shipmodules/list" id="link">Ship modules</a> 
        <a href="<?=config('app.url');?>/modulecrews/list" id="link">Module crew</a>
        <a href="<?=config('app.url');?>/crewskills/list" id="link">Crew Skills</a>
        @if(auth()->check() && auth()->user()->name === 'admin')
            <a href="<?=config('app.url');?>/shipmodules/add" id="link">Add ship module</a>
            <a href="<?=config('app.url');?>/modulecrews/add" id="link">Add module crew</a>
             <a href="<?=config('app.url');?>/crewskills/add" id="link">Add crew skill</a>
        @endif
    </div>
</nav>