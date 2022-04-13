@extends('layouts.master')

@section('content')
    <div class="main-page">
        <div class="cards">
            @foreach($statuses as $status)
            <div class="column" data-id="{{ $status->id }}">
                <div class="column__header">
                    <div class="header__name header__name_{{ strtolower(str_replace(" ", '', $status->name)) }}">{{ $status->name }}</div>
                    <div class="header__counter" id="counter{{ $status->id }}">0</div>
                </div>
                <div class="new-task" data-hystmodal="#modalAddTask" data-id="{{ $status->id }}">
                    <img src="{{ asset('images/icons/plus.png') }}" width="16px" height="16px" alt="Add Task">
                </div>
                <div class="tasks" id="tasks{{ $status->id }}" data-status-id="{{ $status->id }}">

                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="menu">
        <img src="{{ asset('images/icons/burger.png') }}" width="50px" alt="menu">
    </div>
    <div class="bg"></div>

    {{--  MODALS WINDOWS  --}}

    {{--  ADD TASK  --}}
    <div class="hystmodal hystmodal--simple" id="modalAddTask" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window hystmodal__window--form hystmodal__window_task" role="dialog" aria-modal="true">
                <button class="modal__close" style="background-image: url('{{ asset('images/icons/close.png') }}');" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">
                    <form action="" method="POST" id="addTaskForm">
                        @csrf
                        <div class="formitem formitem_task-title">
                            <input type="text" name="header" placeholder="Title..." value="" required>
                        </div>
                        <div class="formitem formitem_task-description">
                            <textarea name="text" placeholder="Description..." required></textarea>
                        </div>
                        <input type="hidden" name="status_id" id="status_id" value="" required>
                        <input type="hidden" name="workspace_id" id="workspace_id" value="" required>
                        <div class="formsubmit-task">
                            <button type="submit" class="btn-2">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--  END ADD TASK  --}}

    {{--  CHANGE TASK  --}}
    <div data-hystmodal="#modalChangeTask" id="openChange" style="display: none"></div>
    <div class="hystmodal hystmodal--simple" id="modalChangeTask" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window hystmodal__window--form hystmodal__window_task" role="dialog" aria-modal="true">
                <button class="modal__close" style="background-image: url('{{ asset('images/icons/close.png') }}');" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">
                    <form action="" method="POST" id="changeTaskForm">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="formitem formitem_task-title">
                            <input type="text" name="header" placeholder="Title..." value="" required>
                        </div>
                        <div class="formitem formitem_task-description">
                            <textarea name="text" placeholder="Description..." required></textarea>
                        </div>
                        <input type="hidden" name="status_id" id="status_id" value="" required>
                        <input type="hidden" name="workspace_id" id="workspace_id" value="" required>
                        <div class="formsubmit-task">
                            <button type="submit" class="btn-2">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--  END CHANGE TASK  --}}

    {{--  ADD WORKSPACE  --}}
    <div class="hystmodal hystmodal--simple" id="modalAddWorkspace" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window hystmodal__window--form hystmodal__window_task" role="dialog" aria-modal="true">
                <button class="modal__close" style="background-image: url('{{ asset('images/icons/close.png') }}');" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled-workspace">
                    <form action="" method="POST" id="addWorkspaceForm">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                        <div class="form__top">
                            <div class="form-top__for-emoji">
                                <img src="{{ asset('images/icons/for-emoji.png') }}" width="70px" height="70px" id="forEmoji" data-id="" alt="Select emoji">
                                <input type="hidden" name="emoji_id" value="" id="emojiInput">
                            </div>
                            <div class="form-top__input">
                                <input type="text" class="input" name="name" id="nameWorkspace" placeholder="Type title..." value="" required>
                            </div>
                            <div class="form-top__button">
                                <button type="submit" class="btn-2">Create</button>
                            </div>
                        </div>
                        <div class="form__bottom">
                            <div class="form-bottom__header">You can choose an icon.</div>
                            <div class="form-bottom__body" id="emojis">
                                @foreach($emojis as $emoji)
                                    <img class="select-emoji" src="{{ asset('images/emoji/' . $emoji->url) }}" data-id="{{ $emoji->id }}" alt="">
                                @endforeach
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--  END ADD WORKSPACE  --}}

    {{--  CHANGE WORKSPACE  --}}
    <div data-hystmodal="#modalChangeWorkspace" id="openChangeWorkspace" style="display: none"></div>
    <div class="hystmodal hystmodal--simple" id="modalChangeWorkspace" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window hystmodal__window--form hystmodal__window_task" role="dialog" aria-modal="true">
                <button class="modal__close" style="background-image: url('{{ asset('images/icons/close.png') }}');" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled-workspace">
                    <form action="" method="POST" id="changeWorkspaceForm">
                        @csrf
                        <input type="hidden" name="id" value="" id="id">
                        <div class="form__top">
                            <div class="form-top__for-emoji">
                                <img src="{{ asset('images/icons/for-emoji.png') }}" width="70px" height="70px" id="forEmoji" data-id="" alt="Select emoji">
                                <input type="hidden" name="emoji_id" value="" id="emojiInput">
                            </div>
                            <div class="form-top__input">
                                <input type="text" class="input" name="name" id="nameWorkspace" placeholder="Type title..." value="" required>
                            </div>
                            <div class="form-top__button">
                                <button type="submit" class="btn-2">Save</button>
                            </div>
                        </div>
                        <div class="form__bottom">
                            <div class="form-bottom__header">You can choose an icon.</div>
                            <div class="form-bottom__body" id="emojis">
                                @foreach($emojis as $emoji)
                                    <img class="select-emoji" src="{{ asset('images/emoji/' . $emoji->url) }}" data-id="{{ $emoji->id }}" alt="">
                                @endforeach
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--  END CHANGE WORKSPACE  --}}

    {{--  END MODALS WINDOWS  --}}
@stop
