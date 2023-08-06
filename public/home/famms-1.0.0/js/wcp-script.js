

      
    $(document).ready(function (e) {
    
        $('.wcp-comment-reply').click(function (e) {
           
            let html = "<div class='reply-section'>\
                <form method='post' action='/reply/"+comment_id+"'>\
            <input class='reply-textarea' name='reply' placeholder='Enter your reply'/>\
            <input type='hidden' name='comment_id' value='{{$val->id}}' />\
            <input type='hidden' name='_token' value='"+token+"' class='wcp_csrf_token'>\
  <input type='submit' value='Reply' />\
        </form>\
                        <button class='btn btn-primary reply-process'>Reply</button>\
                        <button class='btn btn-danger reply-cancel'>Cancel</button>\
                        </div>";
                        
            let parent_container = $(this).parent().parent();
            $(html).insertAfter(parent_container);
           
        })/

        $(document).on('click', '.reply-cancel', function () {

            $(this).parent().remove();

        })

    })

