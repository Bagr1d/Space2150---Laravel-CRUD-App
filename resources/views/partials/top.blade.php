<div id="top">
    <p>Space2150</p>
    @if(Auth::check())  
        <a href="<?=config('app.url');?>/logoutUser">Log out</a>
    @else 
        <a href="<?=config('app.url');?>/register">Log in</a>
    @endif
</div>