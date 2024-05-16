<!-- Add this line to include the moment.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" id="notificationDropdown">
    <div id="notif">
        <li class="dropdown-item">

        </li>
    </div>
</ul>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: '/notifications', // Sesuaikan dengan URL Anda
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#notif').empty();
                $.each(response, function(index, message) {
                    var notificationHtml =
                        '<a href="/product" class="dropdown-item text-dark rounded-0 border-bottom border-light py-1 px-2">' +
                        '<div class="d-flex justify-content-start align-items-center notification">' +
                        '<div>' +
                        '<small class="text-muted ms-2">' + moment(message.created_at)
                        .fromNow() + '</small>' +
                        '<p class="mb-0">' + message.message + '</p>' +
                        '</div>' +
                        '</div>' +
                        '</a>';
                    $('#notif').append(notificationHtml);
                });
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    });
</script>
