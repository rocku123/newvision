<script>
$('#userPaymentForm').on('submit', function (e) {
        e.preventDefault();
//        var data = $(this).serialize();
        //alert(window.location.href);return false;
        $.ajax({
            url: '<?php echo base_url('admin/master/add_userPayment_act'); ?>',
            type: 'POST',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function () {
                $('.saveaction').html('Please wait..');
                $('.saveaction').attr('disabled', true);
            },
            success: function (result) {
                if (result.success) {
                    alert(result.message,'success');
                    window.location = window.location.href+'/'+result.id;
                } else {
                    alert(result.message);
                }
            },
            error: function () {
               alert('UserPayment response error');
            }

        });
    });
    
    $('.btnaction').on('click', function () {
        var button =  $(this).val();
        $('#action').val(button);
    });
    $('#UpdateuserPaymentForm').on('submit', function (e) {
        e.preventDefault();
//        var data = $(this).serialize();
        
//        alert(Quotation);return false;
        //if(confirm(message)){
            $.ajax({
                url: '<?php echo base_url('admin/master/update_userPayment_act'); ?>',
                type: 'POST',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function () {
                    $('.saveaction').attr('disabled', true);
                },
                success: function (result) {
                    if (result.success) {
                        alert(result.message);
                        window.location = "<?=base_url() ?>admin/master/userPayment";
                        
                    } else {
                        alert(result.message);
                    }
                },
                error: function () {
                    Notification('userPayment response error');
                }

            });
       // }
    });
    
</script>
