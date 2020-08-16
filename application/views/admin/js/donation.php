<script>
$('#filterForm').on('submit', function (e) {
        e.preventDefault();
//        var data = $(this).serialize();
        //alert(window.location.href);return false;
        $.ajax({
            url: '<?php echo base_url('admin/donation/filter'); ?>',
            type: 'POST',
            data: new FormData(this),
            dataType: 'html',
            contentType: false,
            cache: false,
            processData:false,
            success: function (result) {
                $("#filterdata1").html(result);
                
            },
            error: function () {
               alert('Donation response error');
            }

        });
    });
$('#donationForm').on('submit', function (e) {
        e.preventDefault();
//        var data = $(this).serialize();
        //alert(window.location.href);return false;
        $.ajax({
            url: '<?php echo base_url('admin/donation/add_donation_act'); ?>',
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
                    window.location = window.location.href;
                } else {
                    alert(result.message);
                }
            },
            error: function () {
               alert('Donation response error');
            }

        });
    });
    
    $('.btnaction').on('click', function () {
        var button =  $(this).val();
        $('#action').val(button);
    });
    $('#UpdatedonationForm').on('submit', function (e) {
        e.preventDefault();
//        var data = $(this).serialize();
        
//        alert(Quotation);return false;
        //if(confirm(message)){
            $.ajax({
                url: '<?php echo base_url('admin/donation/update_donation_act'); ?>',
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
                        window.location = "<?=base_url() ?>admin/donation/donate";
                        
                    } else {
                        alert(result.message);
                    }
                },
                error: function () {
                    Notification('Donation response error');
                }

            });
       // }
    });



    // For User Donation Script 


    $('#userfilterForm').on('submit', function (e) {
        e.preventDefault();
//        var data = $(this).serialize();
        //alert(window.location.href);return false;
        $.ajax({
            url: '<?php echo base_url('admin/donation/userfilter'); ?>',
            type: 'POST',
            data: new FormData(this),
            dataType: 'html',
            contentType: false,
            cache: false,
            processData:false,
            success: function (result) {
                $("#userfilterdata").html(result);
                
            },
            error: function () {
               alert('Donation response error');
            }

        });
    });
$('#userDonationForm').on('submit', function (e) {
        e.preventDefault();
//        var data = $(this).serialize();
        //alert(window.location.href);return false;
        $.ajax({
            url: '<?php echo base_url('admin/donation/add_userdonation_act'); ?>',
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
                    window.location = window.location.href;
                } else {
                    alert(result.message);
                }
            },
            error: function () {
               alert('Donation response error');
            }

        });
    });
    
    $('.btnaction').on('click', function () {
        var button =  $(this).val();
        $('#action').val(button);
    });
    $('#UpdateuserDonationForm').on('submit', function (e) {
        e.preventDefault();
//        var data = $(this).serialize();
        
//        alert(Quotation);return false;
        //if(confirm(message)){
            $.ajax({
                url: '<?php echo base_url('admin/donation/update_userdonation_act'); ?>',
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
                        window.location = "<?=base_url() ?>admin/donation/userDonation";
                        
                    } else {
                        alert(result.message);
                    }
                },
                error: function () {
                    Notification('Donation response error');
                }

            });
       // }
    });
    
</script>
