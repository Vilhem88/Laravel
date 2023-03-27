<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="//code.jquery.com/jquery.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.js"></script>
<script>
    $(function() {

        // rendering data from the database //
        let postTable = $('#postsTbl').DataTable({
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
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'content',
                    name: 'content'
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
                }
            ]
        })

        // button delete ///

        $(document).on('click', '.deleteBtn', function() {
            // on click on the delete button find the post with the specified id //
            $('#deletePostModal #postId').val($(this).attr('data-id'));
            // now show the modal
            $('#deletePostModal').modal('show')
        })

        // add listener on confirm button next we are registering an API end point (route and method)//

        $(document).on('click', '.confirmBtn', function() {
            $.ajax({

                url: '/api/posts/' + $('#postId').val(),
                method: 'DELETE',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {

                    if (data.success) {
                        $('.alert-success').text(data.message).show()
                        postTable.ajax.reload()
                    } else {
                        $('.alert-danger').text(data.message).show()
                    }

                    $('#deletePostModal').modal('hide');
                }
            })
        })

        // opening the posts in own window ///
        $(document).ready(function() {

            $.ajax({
                url: '/api/posts/' + $('#postId').val(),
                method: 'GET',
                success: function(data) {
                    if (data.success) {
                        $('.title').text(data.post.title);
                        $('.content').text(data.post.content);
                        $('.description').text(data.post.description);
                        $('.author').text(data.post.user.name);

                        // rendering the comments

                        data.post.comments.forEach(function(comment) {
                            const date = new Date(comment.created_at);
                            const format_date = date.getDate() + '/' + (date
                                .getMonth() + 1) + '/' + date.getFullYear();
                            $('.comments').append(
                                '<div class="alert alert-secondary d-flex justify-content-between""><div>' +
                                comment.body + '</div><div class="text-info">' +
                                comment.user.name +
                                '</div></div><p style="text-align:right">' +
                                format_date + '</p>')


                        })

                    } else {

                        $('.card-info').text(data.message).show();
                    }

                    $('.loader').hide();
                    $('.card-info').show();
                }
            })

        })

        // adding a comment //

        $('.commentBtn').on('click', function() {

            $.ajax({

                url: '/api/posts/' + $('#postId').val() + '/comment',
                method: 'POST',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'comment': $('#leaveComment').val()
                },
                success: function(data) {
                    if (data.success) {

                        $('.comments').append(
                            '<div class="alert alert-secondary">' + data
                            .comment.body + '</div')
                        $('#leaveComment').val('')
                    } else {
                        $('.alert-danger').text(data.message).show()
                    }
                }


            })
        })

    });
</script>
