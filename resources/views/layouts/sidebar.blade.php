<div class="sidebar">
    <div class="sidebar__container">
        <div class="account">
            <div class="account__emoji">
                @if(\Illuminate\Support\Facades\Auth::check())
                    @if($user['emoji_id'] != '')
                        <img src="{{ asset('images/emoji/' . $user->emoji->url) }}" width="50px" height="50px" alt="avatar"
                             id="avatar" data-id="{{ $user->emoji->id }}" data-user="{{ $user->id }}">
                    @else
                        <div id="avatar" data-user="{{ $user->id }}" style="width: 50px; height: 50px"></div>
                    @endif
                    <div class="dropdown-emoji-user">
                        @foreach($emojis as $emoji)
                            <img class="select-emoji-user" src="{{ asset('images/emoji/' . $emoji->url) }}" data-id="{{ $emoji->id }}" alt="{{ $emoji->name }}">
                        @endforeach
                    </div>
                @else
                    <img src="{{ asset('images/emoji/image1.png') }}" width="50px" height="50px" alt="avatar">
                @endif
            </div>
            <div class="account__label">
                @if(\Illuminate\Support\Facades\Auth::check())
                    {{ $user['name'] }}
                @else
                    Please, log in
                @endif
            </div>
        </div>
        <div class="workspace">
            <div class="workspace__label">
                Workspace
            </div>
            @if(\Illuminate\Support\Facades\Auth::check())
                <div class="workspace__list" id="workspaceList">
            @else
                <div></div>
            @endif
                {{--        авторизован        --}}
                @if(\Illuminate\Support\Facades\Auth::check())
                    @foreach($workspaces as $workspace)
                        <div class="item-workspace @if($loop->first) item-workspace_active @endif" id="workspace{{ $workspace->id }}" data-id="{{ $workspace->id }}">
                            <div class="item-workspace__cover">
                                <div class="item-workspace__emoji">
                                    @if(isset($workspace->emoji->url))
                                        <img src="{{ asset('images/emoji/' . $workspace->emoji->url) }}" data-id="{{ $workspace->emoji->id }}" width="32px" height="32px" alt="">
                                    @else
                                        <div style="width: 32px; height: 32px"></div>
                                    @endif
                                </div>
                                <div class="item-workspace__label">{{ $workspace->name }}</div>
                            </div>
                        </div>
                    @endforeach

                    <div class="add-workspace" data-hystmodal="#modalAddWorkspace">
                        <div class="item-workspace__cover">
                            <div class="add-workspace__icon">
                                <img src="{{ asset('images/icons/plus-blue.png') }}" alt="Add workspace">
                            </div>
                            <div class="add-workspace__text">Add workspace</div>
                        </div>
                    </div>

                {{--        не авторизован        --}}
                @else
                    <div class="item-workspace item-workspace_active">
                        <div class="item-workspace__cover">
                            <div class="item-workspace__emoji">
                                <img src="{{ asset('images/emoji/image2.png') }}" width="32px" height="32px" alt="">
                            </div>
                            <div class="item-workspace__label">This is where your workspace will be</div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @if(\Illuminate\Support\Facades\Auth::check())
    <div class="sign-out">
        <a class="sign-out__link" href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            <div class="sign-out__img">
                <img src="{{ asset('images/icons/logout.png') }}" alt="Sign Out">
            </div>
            <div class="sign-out__text">Sign Out</div>
        </a>
    </div>
    @endif

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

</div>
