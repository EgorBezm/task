const myModal = new HystModal({
    catchFocus: true,
    closeOnEsc: true,
    backscroll: true,
});

const buffer = [];

$(document).ready(function() {
    getTasks();
    if (! $('.title_authorized').length)
        $('.dropdown-workspace').css('display', 'none');
});

$('body').on('click', '.account__emoji', function (){
    $(this).toggleClass('active');
})

$('body').on('click', '.select-emoji-user', function (){
    if ($('#avatar').attr('data-id') !== $(this).attr('data-id')) {
        $.post(window.location.href + 'api/user/update/emoji', {id: $('#avatar').attr('data-user'), emoji_id: $(this).attr('data-id')});
        if ($('#avatar').attr('src') === undefined) {
            $("#avatar").replaceWith(
                "<img src=http://task/resources/images/emoji/image3.png' width='50px' height='50px'" +
                "alt='avatar' id='avatar' data-id='' data-user='"+$("#avatar").attr('data-user')+"'>"
            )
        }
        $('#avatar').attr('data-id', $(this).attr('data-id'))
        $('#avatar').attr('src', $(this).attr('src'))
    }
})

$('body').on('click', '#change', function (){
    $('#changeTaskForm').find("input[name='header']").val($(this).parents('.task').find('.task__header').text())
    $('#changeTaskForm').find("input[name='id']").val($(this).parents('.task').attr('data-id'))
    $('#changeTaskForm').find("textarea[name='text']").val($(this).parents('.task').find('.task__text').text())
    $('#openChange').click();
})

$('body').on('click', '.item-workspace', function () {
    if (! $(this).hasClass("item-workspace_active") &&  ! $(this).hasClass("add-workspace")) {
        toBuffer($('.item-workspace_active').attr('data-id'))
        $('.item-workspace_active').removeClass('item-workspace_active');
        $(this).addClass('item-workspace_active');
        $('.header__counter').text('0');
        tasksBuffer($(this).attr('data-id'));
    }
})

$('body').on('click', '#delete', function (){
    $.post(window.location.href + 'api/tasks/delete', {id: $(this).attr('data-id')} );
    $(this).parents('.task').remove();
})

$( "#changeTaskForm" ).on( "submit", function( event ) {
    event.preventDefault();

    $.ajax({
        url: window.location.href + 'api/tasks/change',
        method: 'post',
        dataType: 'html',
        data: $(this).serialize(),
    });

    let $id = $(this).find("input[name='id']").val();

    $('#task' + $id).find('.task__header').text($(this).find("input[name='header']").val())
    $('#task' + $id).find('.task__text').text($(this).find("textarea[name='text']").val())

    $('.modal__close').click();
    clearingForm(this);
});

$('body').on('click','#deleteWorkspace', function (){
    const result = confirm('Are you sure you want to delete "' + $('.item-workspace_active').find('.item-workspace__label').text() + '"');
    if (result) {
        $.post(window.location.href + 'api/workspace/delete', {id: $('.item-workspace_active').attr('data-id')} );
        $('.item-workspace_active').remove();
        $('.item-workspace').first().click();
    }
})

$('body').on('click','#changeWorkspace', function (){
    clearingForm('#changeWorkspaceForm');
    $('#changeWorkspaceForm').find('#forEmoji').attr('src', window.location.href + 'resources/images/icons/for-emoji.png');

    if ($('.item-workspace_active').find('img').length) {
        $('#changeWorkspaceForm').find('#forEmoji').attr('src', $('.item-workspace_active').find('img').attr('src'));
        $('#changeWorkspaceForm').find('#emojiInput').val( $('.item-workspace_active').find('img').attr('data-id') );
    }

    $('#changeWorkspaceForm').find('#nameWorkspace').val( $('.item-workspace_active').find('.item-workspace__label').text() );
    $('#changeWorkspaceForm').find('#id').val( $('.item-workspace_active').attr('data-id') );

    $('#openChangeWorkspace').click();
})

$( "#changeWorkspaceForm" ).on( "submit", function( event ) {
    event.preventDefault();

    $.ajax({
        url: window.location.href + 'api/workspace/change',
        method: 'post',
        dataType: 'html',
        data: $(this).serialize(),
    });

    $('.item-workspace_active').find('img').attr('src', $(this).find('#forEmoji').attr('src'))
    $('.title__emoji').find('img').attr('src', $(this).find('#forEmoji').attr('src'))

    $('.item-workspace_active').find('.item-workspace__label').text( $(this).find('#nameWorkspace').val() )
    $('.title__text').text( $(this).find('#nameWorkspace').val() )

    $('.modal__close').click();
});

$('#changeWorkspaceForm').find('#emojis').children().on('click', function (){
    $('#changeWorkspaceForm').find('#forEmoji').attr('src', $(this).attr('src'));
    $('#changeWorkspaceForm').find('#forEmoji').attr('data-id', $(this).attr('data-id'));
    $('#changeWorkspaceForm').find('#emojiInput').val($(this).attr('data-id'));
})

$('#emojis').children().on('click', function (){
    $('#forEmoji').attr('src', $(this).attr('src'));
    $('#forEmoji').attr('data-id', $(this).attr('data-id'));
})

let oldIcon = $('#forEmoji').attr('src');
$('#forEmoji').on('click', function (){
    $('#forEmoji').attr('src', oldIcon);
    $('#forEmoji').attr('data-id', '');
})

$( "#addTaskForm" ).on( "submit", function( event ) {
    event.preventDefault();
    var $data = {};
    $(this).find ('input, textarea, select').each(function() {
        $data[this.name] = $(this).val();
    });
    newTask($data);
    clearingForm('#addTaskForm');
});

$('.new-task').on('click', function (){
    clearingForm('#modalAddTask');
    $('#status_id').val($(this).attr('data-id'));
    $('#workspace_id').val($('.item-workspace_active').attr('data-id'));
})

$( "#addWorkspaceForm" ).on( "submit", function( event ) {
    event.preventDefault();
    $('#emojiInput').val($('#forEmoji').attr('data-id'));
    var $data = {};
    $(this).find ('input, textarea, select').each(function() {
        $data[this.name] = $(this).val();
    });

    $.ajax({
        url: window.location.href + 'api/workspace/create',
        type: 'post',
        data: $data,
    }).done(function( response )
    {
        console.log(response);
        if (response !== 'error') {
            drawWorkspace(response);
            $('.modal__close').click();
        }
    });
    clearingForm('#addWorkspaceForm');
});

function clearingForm($form) {
    $($form).find ('input, textarea, select').each(function() {
        $(this).val('');
    });
}

function drawWorkspace($workspace) {
    let img
    if(typeof $workspace['emoji_id'] === "undefined")
        img = "<div style='width: 32px; height: 32px'></div>";
    else
        img = "<img src='" +
            $('.form-top__for-emoji').find('img').attr('src') +
            "' width='32px' height='32px' data-id='" + $workspace['emoji_id'] + "' alt=''>";

    let data = "<div class='item-workspace'" +
                    "id='workspace"+  $workspace['id'] +"' data-id='"+  $workspace['id'] +"'>" +
        "<div class='item-workspace__cover'>" +
            "<div class='item-workspace__emoji'>" +
                img +
            "</div>" +
            "<div class='item-workspace__label'>" +
        $workspace['name'] +
        "</div>" +
        "</div>" +
    "</div>";

    $('.item-workspace').last().after(data)
}

$( "#jsForm" ).on( "submit", function( event ) {
    event.preventDefault();
    var $data = {};
    $(this).find ('input, textarea, select').each(function() {
        $data[this.name] = $(this).val();
    });

    $.ajax({
        url: $(this).attr('action'),
        type: 'post',
        data: $data,
    }).done(function( response )
    {
        if (response.indexOf("success|") != -1) {
            var newResponse = response.replace("success|", '');
            var link = $( "#jsFormLogin" ).attr('data-url') + '?data=' + newResponse + '&remember=' + $('#remember').prop('checked');
            clearingForm('#jsForm');
            location.href =  link;
        }

        let errors = JSON.parse(response);
        for (const errorsKey in errors) {
            $('#regError').prepend(errors[errorsKey]);
        }
        $('#jsForm').find("input[name='password']").val('');
        $('#jsForm').find("input[name='password_confirmation']").val('');
        $('#jsForm').parent().find('.loginblock__error').css('display', 'block');
    });
});

$( "#jsFormLogin" ).on( "submit", function( event ) {
    event.preventDefault();
    var $data = {};
    $(this).find ('input, textarea, select').each(function() {
        $data[this.name] = $(this).val();
    });

    $.ajax({
        url: $(this).attr('action'),
        type: 'post',
        data: $data,
    }).done(function( response )
    {
        switch (response) {
            case 'error':
                alert('Error!');
                break;
            case 'data is not correct':
                $('#jsFormLogin').find("input[name='password']").val('');
                $('#jsFormLogin').parent().find('.loginblock__error').css('display', 'block');
                break;
            default:
                var link = $( "#jsFormLogin" ).attr('data-url') + '?data=' + response + '&remember=' + $('#remember').prop('checked');
                clearingForm('#jsFormLogin');
                location.href =  link;
                break;
        }
    });

});

$( "#passwordResetForm" ).on( "submit", function( event ) {
    event.preventDefault();

    $.ajax({
        url: window.location.href + 'api/user/password/reset',
        method: 'post',
        dataType: 'html',
        data: $(this).serialize(),
        success: function(data){
            console.log(data);
        }
    });
});

$('body').on('click', '#right', function (){
    changeStatus('right', $(this));
})

$('body').on('click', '#left', function (){
    changeStatus('left', $(this));
})

$('.menu').on('click', function (){
    $('.sidebar').addClass('sidebar_open');
    $('.bg').addClass('bg_open');
})

$('.bg').on('click', function (){
    $('.sidebar').removeClass('sidebar_open');
    $('.bg').removeClass('bg_open');
})

function newTask($data) {
    $.ajax({
        url: window.location.href + 'api/tasks/create',
        type: 'post',
        data: $data,
    }).done(function( response )
    {
        if (response !== 'error') {
            $data[0] = $data;
            drawTask($data);
            $('.modal__close').click()
        }
        else {
            alert('Error!');
        }
    });
}

function getTasks() {
    $('.title__text').text(
        $('.item-workspace_active').find('.item-workspace__label').text()
    )
    let icons = $('.item-workspace_active').find('img').attr('src');
    if (icons === undefined)
        icons = window.location.href + "/resources/images/icons/crutch.png";

    $('.title__emoji').children('img').attr(
        'src', icons
    )
    // if ( buffer( $('.item-workspace_active').attr('data-id') ) )
    // {
    //     $('.tasks').html('');
    //     drawTask(tasksBuffer( $('.item-workspace_active').attr('data-id') ))
    // }
    // else{
        $.ajax({
            url: window.location.href + 'api/tasks',
            type: 'post',
            data: {
                'workspace':$('.item-workspace_active').attr('data-id'),
            }

        }).done(function( response )
        {
            if (response !== "error") {
                //tasksBuffer( $('.item-workspace_active').attr('data-id'), response )
                $('.tasks').html('');
                drawTask(response);
            }
        });
    // }


}

function drawTask(response) {
    for (let key in response) {
        let data = "<div class='task' id='task" + response[key]['id'] + "' data-id='" + response[key]['id'] + "'>" +
            "<div class='task__left'>" +
            "<div class='task__header'>" +
            response[key]['header'] +
            "</div>" +
            "<div class='task__text'>" +
            response[key]['text'] +
            "</div>" +
            "</div>" +
            "<div class='task__right'>" +
            "<div class='task__menu' style='background-image: url(http://task/resources/images/icons/menu.png);'></div>" +
            "<div class='dropdown-content'>";

        if (response[key]['status_id'] != 3)
            data += "<img src='" + window.location.href + "/resources/images/icons/right.png' id='right' data-id='" + response[key]['id'] + "' alt=''>";

        if (response[key]['status_id'] != 1)
            data += "<img src='" + window.location.href + "/resources/images/icons/left.png' id='left' data-id='" + response[key]['id'] + "' alt=''>";

        data += "<img src='" + window.location.href + "/resources/images/icons/change.png' id='change' data-id='" + response[key]['id'] + "' alt=''>" +
            "<img src='" + window.location.href + "/resources/images/icons/delete.png' id='delete' data-id='" + response[key]['id'] + "' alt=''>" +
            "</div>" +
            "</div>" +
            "</div>"
        $('#tasks' + response[key]['status_id']).prepend(data);
        let oldCount = $('#counter' + response[key]['status_id']).text();
        $('#counter' + response[key]['status_id']).text(++oldCount);
    }
    $(".task").draggable({revert:true});
}

function changeStatus(action, el) {
    let $id = $(el).attr('data-id');
    let $parent = $(el).parents('.tasks').attr('id')
    let $idParent = $parent.replace('tasks', '');
    let statusId;
    if (action === 'right')
        statusId = (Number($idParent) + 1);
    if (action === 'left')
        statusId = (Number($idParent) - 1);

    let $data = [{
        id: $id,
        header: $(el).parents('.task').find('.task__header').text(),
        text: $(el).parents('.task').find('.task__text').text(),
        status_id: statusId
    }];

    $('#task' + $id).remove();
    drawTask($data)

    $.post(window.location.href + 'api/tasks/change/status', {id: $id, status_id: statusId});
}

$(".column").droppable({drop:function(event,ui){
    if (! $(this).find(ui.draggable).length) {
        $(this).find('.tasks').prepend(ui.draggable);
        $.post(window.location.href + 'api/tasks/change/status', {
            id: ui.draggable.attr('data-id'),
            status_id: $(this).attr('data-id')
        });
    }
}});

function tasksBuffer(workspace_id) {
    if ( buffer[workspace_id] !== undefined ) {
        $('.tasks').html('');
        drawTask(buffer[workspace_id]);
    }
    else {
        getTasks();
    }
}

function toBuffer() {
    let arr = [];
    let workspace_id = $('.item-workspace_active').attr('data-id');

    $('.cards').children().each(function() {
        let status_id = $(this).attr('data-id');

        $(this).find('.tasks').each(function() {
            let id = $(this).attr('data-status-id');

            $(this).children().each(function() {
                let header = $(this).find('.task__header').text();
                let text = $(this).find('.task__text').text();
                let task = {
                    id: id,
                    status_id: status_id,
                    workspace_id: workspace_id,
                    header: header,
                    text: text
                }
                arr.push(task);
            })
        })
    });

    buffer[workspace_id] = arr;
}








