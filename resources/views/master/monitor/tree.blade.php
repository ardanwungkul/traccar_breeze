<ul>
    @foreach ($users as $item)
        <li>
            {{ $item->name }}
            <div class="user-details" data-user-id="{{ $item->id }}">
            </div>
        </li>
    @endforeach
</ul>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.user-details').each(function() {
            var userId = $(this).data('user-id');
            var userDetailsDiv = $(this);

            $.ajax({
                type: 'GET',
                url: `api/users/${userId}`,
                success: function(response) {
                    if (response.length > 0) {
                        userDetailsDiv.html(JSON.stringify(response));
                    }
                    // $.ajax({
                    //     type: 'GET',
                    //     url: '/tree',
                    //     data: {
                    //         'users': userId
                    //     },
                    //     success: function(treeHtml) {
                    //         userDetailsDiv.append(treeHtml);
                    //     },
                    //     error: function(error) {
                    //         console.log(error);
                    //     }
                    // });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
