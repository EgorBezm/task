<div class="header">
    <div class="title @if(\Illuminate\Support\Facades\Auth::check()){{ 'title_authorized' }}@endif">
        <div class="title__emoji">
            <img src="{{ asset('images/emoji/image3.png') }}" width="33" height="33" alt="Emoji">
        </div>
        <div class="title__text">
            @if(! \Illuminate\Support\Facades\Auth::check())
                Hey! Please login or register to use "Task"
            @endif
        </div>
        <div class="dropdown-workspace">
            <img src="{{ asset('images/icons/change.png') }}" width="20px" height="21px" id="changeWorkspace" alt="">
            <img src="{{ asset('images/icons/delete.png') }}" width="20px" height="22px" id="deleteWorkspace" alt="">
        </div>
    </div>
    <div class="subtitle">
        @if(\Illuminate\Support\Facades\Auth::check())
            Use this template to track your personal tasks.
        @else
            This way we can store your tasks so you don't forget anything!
        @endif
    </div>
</div>
