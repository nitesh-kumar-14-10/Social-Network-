<script>
        $(document).ready(function() {
            $('#sendSmsBtn').click(function() {
                var phone_no = $('#phone_no').val();
                $.ajax({
                    url: 'otpgeneration.php',
                    type: 'POST',
                    data: {phone_no: phone_no},
                    success: function(data) {
                        alert(data);
                    }
                });
            });
        });
    </script>
