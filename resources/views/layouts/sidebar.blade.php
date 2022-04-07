<div class="sidebar">
    <div class="sidebar__container">
        <div class="account">
            <div class="account__emoji">
                <img src="{{ asset('images/emoji/image1.png') }}" width="50px" height="50px" alt="avatar">
            </div>
            <div class="account__label">Please, log in</div>
        </div>
        <div class="workspace">
            <div class="workspace__label">
                Workspace
            </div>
            <div class="workspace__list">
                {{--        авторизован        --}}
                <div class="item-workspace item-workspace_active">
                    <div class="item-workspace__cover">
                        <div class="item-workspace__emoji">
                            <img src="{{ asset('images/emoji/image6.png') }}" width="32px" height="32px" alt="">
                        </div>
                        <div class="item-workspace__label">Task List</div>
                    </div>
                </div>
                <div class="item-workspace">
                    <div class="item-workspace__cover">
                        <div class="item-workspace__emoji">
                            <img src="{{ asset('images/emoji/image7.png') }}" width="32px" height="32px" alt="">
                        </div>
                        <div class="item-workspace__label">Home</div>
                    </div>
                </div>
                <div class="item-workspace">
                    <div class="item-workspace__cover">
                        <div class="item-workspace__emoji">
                            <img src="{{ asset('images/emoji/image8.png') }}" width="32px" height="32px" alt="">
                        </div>
                        <div class="item-workspace__label">Work</div>
                    </div>
                </div>

                <div class="add-workspace" data-hystmodal="#modalAddWorkspace">
                    <div class="item-workspace__cover">
                        <div class="add-workspace__icon">
                            <img src="{{ asset('images/icons/plus-blue.png') }}" alt="Add workspace">
                        </div>
                        <div class="add-workspace__text">Add workspace</div>
                    </div>
                </div>

                {{--        не авторизован        --}}
<!--
                <div class="item-workspace item-workspace_active">
                    <div class="item-workspace__cover">
                        <div class="item-workspace__emoji">
                            <img src="{{ asset('images/emoji/image2.png') }}" width="32px" height="32px" alt="">
                        </div>
                        <div class="item-workspace__label">This is where your workspace will be</div>
                    </div>
                </div>
-->

            </div>
        </div>
    </div>
    <div class="sign-out">
        <a href="#" class="sign-out__link">
            <div class="sign-out__img">
                <img src="{{ asset('images/icons/logout.png') }}" alt="Sign Out">
            </div>
            <div class="sign-out__text">Sign Out</div>
        </a>
    </div>

</div>
