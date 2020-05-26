<!-- The Modal for chat -->
<div class="modal" id="chatmodal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Sending a message</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="chat">write your message:</label>
                    <textarea class="form-control" id="chat" rows="3"></textarea>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">

                <button type="button" class="btn btn-dark" id="closemodal" data-dismiss="modal">close</button>
                <button type="button" id="sendchat"  class="btn btn-danger" >Send</button>
            </div>

        </div>
    </div>
</div>
<!-- The Modal end -->


<script>


    $(document).on("click","#sendchat", function () {
        var message = $('#chat').val();
        var receiver_id = {{$user->id}};
        $('#chat').val("");
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            url: "{{ url('/chat')}}",
            type: "POST",
            data: {"_token": token,
                'message':message,
                'receiver_id':receiver_id},
            success: function () {
                alert("message sent")
                $("#closemodal").click();

            }
        });

    });

</script>
