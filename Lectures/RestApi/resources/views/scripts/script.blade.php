<script src="//code.jquery.com/jquery.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.js"></script>
<script>
    $(function() {
        let postTbl = $('#postsTbl').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/api/posts',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'content',
                    name: 'content'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'user.name',
                    name: 'user.name'
                },
                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    orderable: false
                },
            ]
        });

        $(document).on('click', '.deleteBtn', function() {
            $('#deletePostModal #postId').val($(this).attr('data-id'));
            $('#deletePostModal').modal('show');
        });

        $(document).on('click', '.confirmBtn', function() {

            $.ajax({
                url: '/api/posts/' + $('#postId').val(),
                method: 'DELETE',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.success) {
                        $('.alert-success').text(data.message).show();
                        postTbl.ajax.reload()
                       
                    } else {
                        $('.alert-danger').text(data.message).show();

                    }

                    $('#deletePostModal').modal('hide');

                }
            })

        });
    });

        
    //---- View Post Info ----//

$(document).ready(function(){
        $.ajax({
            url: '/api/posts/' + $('#postId').val(),
            method: 'GET',
            success: function(data){
                if(data.success){
                    $('.title').text(data.post.title);
                    $('.content').text(data.post.content);
                    $('.description').text(data.post.description);
                    $('.author').text(data.post.user.name);
                    data.post.comments.forEach(function(comment) {
                        const date = new Date(comment.created_at);
                        const format_date = date.getDate() + '/' + (date.getMonth() + 1) +'/' + date.getFullYear();
                        $('.comments').append('<div class="alert alert-secondary d-flex justify-content-between""><div>'+comment.body+'</div><div class="text-info">'+comment.user.name+'</div></div><p style="text-align:right">'+format_date +'</p>')

                    });
                }else{
                    $('.card-info').text(data.message);
                }

                $('.loader').hide();
                $('.card-info').show();
            }
        });

        $('.commentBtn').on('click', function(){
            $.ajax({
                url: '/api/posts/' + $('#postId').val() + '/comment',
                method: 'POST',
                data: {'_token': $('meta[name="csrf-token"]').attr('content'), 'comment': $('#leaveComment').val()},
                success: function(data){
                    if(data.success){
                        $('.comments').append('<div class="alert alert-secondary">'+data.comment.body+'</div>')
                        $('#leaveComment').val('')
                    }else{
                        $('.alert-danger').text(data.message).show()
                    }
                }
            })
        })
    }); 



</script>
