$(function() {
    $('.message').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
           sendTxtMessage($(this).val());
        }
    });
    $('.btnSend').click(function(){
           sendTxtMessage($('.message').val());
    });
    // $('.selectVendor').click(function(){
        ChatSection(1);
          var receiver_id = $('.selectVendor').first().attr('id');
        //   var receiver_id = new URLSearchParams(window.location.search).get('id');
        //   alert(receiver_id);
          $('#ReciverId_txt').val(receiver_id);
          $('#ReciverName_txt').html($(this).attr('title'));
          
          GetChatHistory(receiver_id);
                     
    // });
    // ChatSection(1);
    // var receiver_id = $('.selectVendor').attr('id');

    // GetChatHistory(receiver_id);

  
//     var urlParams = new URLSearchParams(window.location.search);
// var receiver_id = urlParams.get('id');

// // Vérifier si l'ID est présent dans la requête
// if (!receiver_id) {
//     ChatSection(1);
//     var firstVendor = $('.selectVendor').first();
//     receiver_id = firstVendor.attr('id');
//     urlParams.set('id', receiver_id);
//     var newUrl = window.location.pathname + '?' + urlParams.toString();
//     window.history.pushState({ path: newUrl }, '', newUrl);
// }

// $('.selectVendor').click(function () {
//     var Sender_Name = $('#Sender_Name').val();
//     var Sender_ProfilePic = $('#Sender_ProfilePic').val();
//     var chatBox = '<div class="box box-warning direct-chat direct-chat-primary">';
//         chatBox += '<div class="box-header with-border">';
//         chatBox += '<h3 class="box-title" style="display: none;" id="ReciverName_txt"></h3>';
//         chatBox += '<h3 class="box-title" id="appendTitle"></h3>';
//         chatBox += '<div class="box-tools pull-right">';
//         chatBox += '<span data-toggle="tooltip" title="Clear Chat" class="ClearChat"><i class="fa fa-comments"></i></span>';
//         chatBox += '</div></div>';
//         chatBox += '<div class="box-body">';
//         chatBox += '<div class="direct-chat-messages" id="content">';
//         chatBox += '<div id="dumppy"></div>';
//         chatBox += '</div></div>';
//         chatBox += '<div class="box-footer">';
//         chatBox += '<div class="input-group">';
//         chatBox += '<input type="hidden" id="Sender_Name" value="' + Sender_Name + '">';
//         chatBox += '<input type="hidden" id="Sender_ProfilePic" value="' + Sender_ProfilePic + '">';
//         chatBox += '<input type="hidden" id="ReciverId_txt">';
//         chatBox += '<input type="text" name="message" placeholder="Type Message ..." class="form-control message">';
//         chatBox += '<span class="input-group-btn">';
//         chatBox += '<button type="button" class="btn btn-success btn-flat btnSend" id="nav_down">Send</button>';
//         chatBox += '<div class="fileDiv btn btn-info btn-flat"> <i class="fa fa-upload"></i>';
//         chatBox += '<input type="file" name="file" class="upload_attachmentfile"/></div>';
//         chatBox += '</span></div></div></div>';
//     $('#chatSection').html(chatBox);
//     $('#bannertitle').append('#appendTitle');
//     receiver_id = $(this).attr('id');
//     $('#ReciverId_txt').val(receiver_id);
//     $('#ReciverName_txt').html($(this).attr('title'));
//     urlParams.set('id', receiver_id);
//     var newUrl = window.location.pathname + '?' + urlParams.toString();
//     window.history.pushState({ path: newUrl }, '', newUrl);
//     GetChatHistory(receiver_id);
// });

// ChatSection(1);
// $('#ReciverId_txt').val(receiver_id);
// $('#ReciverName_txt').html($('.selectVendor[id="' + receiver_id + '"]').attr('title'));
// GetChatHistory(receiver_id);


    
    $('.upload_attachmentfile').change(function(){
        
        DisplayMessage('<div class="spiner"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        ScrollDown();
        
        var file_data = $('.upload_attachmentfile').prop('files')[0];
        var receiver_id = $('#ReciverId_txt').val();   
        var form_data = new FormData();
        form_data.append('attachmentfile', file_data);
        form_data.append('type', 'Attachment');
        form_data.append('receiver_id', receiver_id);
        
        $.ajax({
                    url: 'chat-attachment/upload', 
                    dataType: 'json',  
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,                        
                    type: 'post',
                    success: function(response){
                        
                        $('.upload_attachmentfile').val('');
                        GetChatHistory(receiver_id);
                    },
                    error: function (jqXHR, status, err) {
                                  // alert('Local error callback');
                    }
         });
        
    });
    $('.ClearChat').click(function(){
           var receiver_id = $('#ReciverId_txt').val();
                       $.ajax({
                              //dataType : "json",
                                url: 'chat-clear?receiver_id='+receiver_id,
                              success:function(data)
                              {
                                   GetChatHistory(receiver_id);		 
                              },
                              error: function (jqXHR, status, err) {
                                  // alert('Local error callback');
                              }
                         });
                     
    });
    
     
    
    });	///end of jquery
    
    function ViewAttachment(message_id){
    //alert(message_id);
                /*$.ajax({
                              //dataType : "json",
                                url: 'view-chat-attachment?message_id='+message_id,
                              success:function(data)
                              {
                                            
                              },
                              error: function (jqXHR, status, err) {
                                  // alert('Local error callback');
                              }
                         });*/
    }
    function ViewAttachmentImage(image_url,imageTitle){
        $('#modelTitle').html(imageTitle); 
        $('#modalImgs').attr('src',image_url);
        $('#myModalImg').modal('show');
    }
    
    function ChatSection(status){
        //chatSection
        if(status==0){
            $('#chatSection :input').attr('disabled', true);
        } else {
            $('#chatSection :input').removeAttr('disabled');
        }   
    }
    ChatSection(0);
    
    
    function ScrollDown(){
        var elmnt = document.getElementById("content");
        var h = elmnt.scrollHeight;
       $('#content').animate({scrollTop: h}, 1000);
    }
    window.onload = ScrollDown();
    
    function DisplayMessage(message){
        var Sender_Name = $('#Sender_Name').val();
        var Sender_ProfilePic = $('#Sender_ProfilePic').val();
        
            var str = '<div class="direct-chat-msg right">';
                    str+='<div class="direct-chat-info clearfix">';
                     str+='<span class="direct-chat-name pull-right">'+Sender_Name ;
                     str+='</span><span class="direct-chat-timestamp pull-left"></span>'; //23 Jan 2:05 pm
                     str+='</div><img class="direct-chat-img" src="'+Sender_ProfilePic+'" alt="">';
                     str+='<div class="direct-chat-text">'+message;
                     str+='</div></div>';
            $('#dumppy').append(str);
    }
    
    function sendTxtMessage(message){
        var messageTxt = message.trim();
        if(messageTxt!=''){
            //console.log(message);
             DisplayMessage(messageTxt);
            
                    var receiver_id = $('.selectVendor').attr('id');
                    $.ajax({
                              dataType : "json",
                              type : 'post',
                              data : {messageTxt : messageTxt, receiver_id : receiver_id },
                              url: 'send-message',
                              success:function(data)
                              {
                                  GetChatHistory(receiver_id)		 
                              },
                              error: function (jqXHR, status, err) {
                                  // alert('Local error callback');
                              }
                         });
                        
            
            
            ScrollDown();
            $('.message').val('');
            $('.message').focus();
        }else{
            $('.message').focus();
        }
    }
    
    function GetChatHistory(receiver_id){
                    $.ajax({
                              //dataType : "json",
                                url: 'get-chat-history-vendor?receiver_id='+receiver_id,
                              success:function(data)
                              {
                                  $('#dumppy').html(data);
                                ScrollDown();	 
                              },
                              error: function (jqXHR, status, err) {
                                  // alert('Local error callback');
                              }
                         });
    }
    
    setInterval(function(){ 
        var receiver_id = $('#ReciverId_txt').val();
        if(receiver_id!=''){GetChatHistory(receiver_id);}
    }, 3000);
    