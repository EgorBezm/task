@extends('layouts.master')

@section('content')
    <div class="main-page">
        <div class="cards">
            <div class="column">
                <div class="column__header">
                    <div class="header__name header__name_todo">To Do</div>
                    <div class="header__counter">2</div>
                </div>
                <div class="new-task" data-hystmodal="#modalAddTask">
                    <img src="{{ asset('images/icons/plus.png') }}" width="16px" height="16px" alt="Add Task">
                </div>
                <div class="tasks">
                    <div class="task">
                        <div class="task__left">
                            <div class="task__header">Do something</div>
                            <div class="task__text">
                                Lorem ipsum че-то там
                            </div>
                        </div>
                        <div class="task__right">
                            <div class="task__menu" style="background-image: url(http://task/resources/images/icons/menu.png);"></div>
                            <div class="dropdown-content">
                                <img src="{{ asset('images/icons/right.png') }}" alt="">
                                <img src="{{ asset('images/icons/left.png') }}" alt="">
                                <img src="{{ asset('images/icons/change.png') }}" alt="">
                                <img src="{{ asset('images/icons/delete.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    {{--        TEST        --}}
                    <div class="task">
                        <div class="task__left">
                            <div class="task__header">Do something</div>
                            <div class="task__text">
                                Lorem ipsum че-то там
                            </div>
                        </div>
                        <div class="task__right">
                            <div class="task__menu" style="background-image: url(http://task/resources/images/icons/menu.png);"></div>
                            <div class="dropdown-content">
                                <img src="{{ asset('images/icons/right.png') }}" alt="">
                                <img src="{{ asset('images/icons/left.png') }}" alt="">
                                <img src="{{ asset('images/icons/change.png') }}" alt="">
                                <img src="{{ asset('images/icons/delete.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    {{--        END TEST        --}}
                </div>
            </div>

            {{--      DOING      --}}

            <div class="column">
                <div class="column__header">
                    <div class="header__name header__name_doing">Doing</div>
                    <div class="header__counter">5</div>
                </div>
                <div class="new-task" data-hystmodal="#modalAddTask">
                    <img src="{{ asset('images/icons/plus.png') }}" width="16px" height="16px" alt="Add Task">
                </div>
                <div class="tasks">
                    <div class="task">
                        <div class="task__left">
                            <div class="task__header">Do something</div>
                            <div class="task__text">
                                Lorem ipsum че-то там
                            </div>
                        </div>
                        <div class="task__right">
                            <div class="task__menu" style="background-image: url(http://task/resources/images/icons/menu.png);"></div>
                            <div class="dropdown-content">
                                <img src="{{ asset('images/icons/right.png') }}" alt="">
                                <img src="{{ asset('images/icons/left.png') }}" alt="">
                                <img src="{{ asset('images/icons/change.png') }}" alt="">
                                <img src="{{ asset('images/icons/delete.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    {{--        TEST        --}}
                    <div class="task">
                        <div class="task__left">
                            <div class="task__header">Do something</div>
                            <div class="task__text">
                                Lorem ipsum че-то там
                            </div>
                        </div>
                        <div class="task__right">
                            <div class="task__menu" style="background-image: url(http://task/resources/images/icons/menu.png);"></div>
                            <div class="dropdown-content">
                                <img src="{{ asset('images/icons/right.png') }}" alt="">
                                <img src="{{ asset('images/icons/left.png') }}" alt="">
                                <img src="{{ asset('images/icons/change.png') }}" alt="">
                                <img src="{{ asset('images/icons/delete.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="task">
                        <div class="task__left">
                            <div class="task__header">Do something</div>
                            <div class="task__text">
                                Lorem ipsum че-то там
                            </div>
                        </div>
                        <div class="task__right">
                            <div class="task__menu" style="background-image: url(http://task/resources/images/icons/menu.png);"></div>
                            <div class="dropdown-content">
                                <img src="{{ asset('images/icons/right.png') }}" alt="">
                                <img src="{{ asset('images/icons/left.png') }}" alt="">
                                <img src="{{ asset('images/icons/change.png') }}" alt="">
                                <img src="{{ asset('images/icons/delete.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="task">
                        <div class="task__left">
                            <div class="task__header">Do something</div>
                            <div class="task__text">
                                Lorem ipsum че-то там
                            </div>
                        </div>
                        <div class="task__right">
                            <div class="task__menu" style="background-image: url(http://task/resources/images/icons/menu.png);"></div>
                            <div class="dropdown-content">
                                <img src="{{ asset('images/icons/right.png') }}" alt="">
                                <img src="{{ asset('images/icons/left.png') }}" alt="">
                                <img src="{{ asset('images/icons/change.png') }}" alt="">
                                <img src="{{ asset('images/icons/delete.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="task">
                        <div class="task__left">
                            <div class="task__header">Do something</div>
                            <div class="task__text">
                                Lorem ipsum че-то там
                            </div>
                        </div>
                        <div class="task__right">
                            <div class="task__menu" style="background-image: url(http://task/resources/images/icons/menu.png);"></div>
                            <div class="dropdown-content">
                                <img src="{{ asset('images/icons/right.png') }}" alt="">
                                <img src="{{ asset('images/icons/left.png') }}" alt="">
                                <img src="{{ asset('images/icons/change.png') }}" alt="">
                                <img src="{{ asset('images/icons/delete.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    {{--        END TEST        --}}
                </div>
            </div>

            {{--      DONE      --}}

            <div class="column">
                <div class="column__header">
                    <div class="header__name header__name_done">Done</div>
                    <div class="header__counter">4</div>
                </div>
                <div class="new-task" data-hystmodal="#modalAddTask">
                    <img src="{{ asset('images/icons/plus.png') }}" width="16px" height="16px" alt="Add Task">
                </div>
                <div class="tasks">
                    <div class="task">
                        <div class="task__left">
                            <div class="task__header">Do something</div>
                            <div class="task__text">
                                Lorem ipsum че-то там
                            </div>
                        </div>
                        <div class="task__right">
                            <div class="task__menu" style="background-image: url(http://task/resources/images/icons/menu.png);"></div>
                            <div class="dropdown-content">
                                <img src="{{ asset('images/icons/right.png') }}" alt="">
                                <img src="{{ asset('images/icons/left.png') }}" alt="">
                                <img src="{{ asset('images/icons/change.png') }}" alt="">
                                <img src="{{ asset('images/icons/delete.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    {{--        TEST        --}}
                    <div class="task">
                        <div class="task__left">
                            <div class="task__header">Do something</div>
                            <div class="task__text">
                                Lorem ipsum че-то там
                            </div>
                        </div>
                        <div class="task__right">
                            <div class="task__menu" style="background-image: url(http://task/resources/images/icons/menu.png);"></div>
                            <div class="dropdown-content">
                                <img src="{{ asset('images/icons/right.png') }}" alt="">
                                <img src="{{ asset('images/icons/left.png') }}" alt="">
                                <img src="{{ asset('images/icons/change.png') }}" alt="">
                                <img src="{{ asset('images/icons/delete.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="task">
                        <div class="task__left">
                            <div class="task__header">Do something</div>
                            <div class="task__text">
                                Lorem ipsum че-то там
                            </div>
                        </div>
                        <div class="task__right">
                            <div class="task__menu" style="background-image: url(http://task/resources/images/icons/menu.png);"></div>
                            <div class="dropdown-content">
                                <img src="{{ asset('images/icons/right.png') }}" alt="">
                                <img src="{{ asset('images/icons/left.png') }}" alt="">
                                <img src="{{ asset('images/icons/change.png') }}" alt="">
                                <img src="{{ asset('images/icons/delete.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="task">
                        <div class="task__left">
                            <div class="task__header">Do something</div>
                            <div class="task__text">
                                Lorem ipsum че-то там
                            </div>
                        </div>
                        <div class="task__right">
                            <div class="task__menu" style="background-image: url(http://task/resources/images/icons/menu.png);"></div>
                            <div class="dropdown-content">
                                <img src="{{ asset('images/icons/right.png') }}" alt="">
                                <img src="{{ asset('images/icons/left.png') }}" alt="">
                                <img src="{{ asset('images/icons/change.png') }}" alt="">
                                <img src="{{ asset('images/icons/delete.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    {{--        END TEST        --}}
                </div>
            </div>
        </div>
    </div>

    {{--  MODALS WINDOWS  --}}

    {{--  ADD TASK  --}}
    <div class="hystmodal hystmodal--simple" id="modalAddTask" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window hystmodal__window--form hystmodal__window_task" role="dialog" aria-modal="true">
                <button class="modal__close" style="background-image: url('{{ asset('images/icons/close.png') }}');" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">
                    <form action="#" method="POST">
                        <div class="formitem formitem_task-title">
                            <input type="text" name="title" placeholder="Title..." value="">
                        </div>
                        <div class="formitem formitem_task-description">
                            <textarea name="description" id="" rows="1" placeholder="Description..."></textarea>
                        </div>
                        <div class="formsubmit-task">
                            <button type="submit" class="btn" onclick="alert('All is OK.'); return false;">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--  END ADD TASK  --}}

    {{--  ADD WORKSPACE  --}}
    <div class="hystmodal hystmodal--simple" id="modalAddWorkspace" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window hystmodal__window--form hystmodal__window_task" role="dialog" aria-modal="true">
                <button class="modal__close" style="background-image: url('{{ asset('images/icons/close.png') }}');" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled-workspace">
                    <form action="#" method="POST">
                        <div class="form__top">
                            <div class="form-top__for-emoji">
                                <img src="{{ asset('images/icons/for-emoji.png') }}" alt="Select emoji">
                            </div>
                            <div class="form-top__input">
                                <input type="text" class="input" name="name" placeholder="Type title..." value="">
                            </div>
                            <div class="form-top__button">
                                <button type="submit" class="btn" onclick="alert('All is OK.'); return false;">Create</button>
                            </div>
                        </div>
                        <div class="form__bottom">
                            <div class="form-bottom__header">You can choose an icon.</div>
                            <div class="form-bottom__body">
                                @for($i=0; $i!=35; $i++)
                                <img class="select-emoji" src="{{ asset('images/emoji/image3.png') }}" alt="">
                                @endfor
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--  END ADD WORKSPACE  --}}

    {{--  END MODALS WINDOWS  --}}
@stop
