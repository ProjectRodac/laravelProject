var postId = 0;
var postBodyElement = null;

$('.post').find('.interaction').find('.glyphicon.glyphicon-pencil').on('click', function(event){
    event.preventDefault();

    postBodyElement = event.target.parentNode.parentNode.childNodes[1];
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
});

$('#modal-save').on('click', function () {
    $.ajax({
        method: 'POST',
        url: urlEdit,
        data: {body: $('#post-body').val(), postId: postId, _token: token}
    })
        .done(function (msg) {
            $(postBodyElement).text(msg['new_body']);
            $('#edit-modal').modal('hide');
        });
});

$('.like').on('click', function(event){
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {isLike: isLike, postId: postId , _token: token}
    })
        .done(function() {
            event.target.innerText = isLike ? event.target.innerText == ' Like' ? ' You like it' : ' Like' : event.target.innerText == ' Dislike' ? ' You don\'t like it' : ' Dislike';
            if(isLike){
                event.target.nextElementSibling.innerText = ' Dislike';
            }else{
                event.target.previousElementSibling.innerText = ' Like';
            }
        });
});


$('.collapse.navbar-collapse').find('.navbar-link.signup').on('click' , function (event) {
    event.preventDefault();
    $('#signup-modal').modal();
});

$('.collapse.navbar-collapse').find('.navbar-link.login').on('click' , function (event) {
    event.preventDefault();
    $('#login-modal').modal();
});

$('.jumbotron').find('.signup').on('click' , function (event) {
    event.preventDefault();
    $('#signup-modal').modal();
});


jQuery(document).ready(function() {

    var offset = 250;

    var duration = 300;

    jQuery(window).scroll(function() {

        if (jQuery(this).scrollTop() > offset) {

            jQuery('.back-to-top').fadeIn(duration);

        } else {

            jQuery('.back-to-top').fadeOut(duration);

        }

    });


    jQuery('.back-to-top').click(function(event) {

        event.preventDefault();

        jQuery('html, body').animate({scrollTop: 0}, duration);

        return false;

    })

});

$('.back-to-top').css({"display": "none"});


