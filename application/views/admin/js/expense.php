<script>
$('#filterForm').on('submit', function (e) {
        e.preventDefault();
//        var data = $(this).serialize();
        //alert(window.location.href);return false;
        $.ajax({
            url: '<?php echo base_url('admin/expense/filter'); ?>',
            type: 'POST',
            data: new FormData(this),
            dataType: 'html',
            contentType: false,
            cache: false,
            processData:false,
            success: function (result) {
                $("#filterdata").html(result);
                
            },
            error: function () {
               alert('Expense response error');
            }

        });
    });
$('#expenseForm').on('submit', function (e) {
        e.preventDefault();
//        var data = $(this).serialize();
        //alert(window.location.href);return false;
        $.ajax({
            url: '<?php echo base_url('admin/expense/add_expense_act'); ?>',
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
               alert('Expense response error');
            }

        });
    });
    
    $('.btnaction').on('click', function () {
        var button =  $(this).val();
        $('#action').val(button);
    });
    $('#UpdateExpenseForm').on('submit', function (e) {
        e.preventDefault();
//        var data = $(this).serialize();
        
//        alert(Quotation);return false;
        //if(confirm(message)){
            $.ajax({
                url: '<?php echo base_url('admin/expense/update_expense_act'); ?>',
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
                        window.location = "<?=base_url() ?>admin/expense/expense";
                        
                    } else {
                        alert(result.message);
                    }
                },
                error: function () {
                    Notification('Expense response error');
                }

            });
       // }
    });

    </script>