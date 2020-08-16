<script>
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#userForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});

$('#userForm').on('submit', function (e) {
        e.preventDefault();
//        var data = $(this).serialize();
        //alert(window.location.href);return false;
        $.ajax({
            url: '<?php echo base_url('admin/main/add_user_act'); ?>',
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
                
               alert('User response error');
            }

        });
    });
    
    $('.btnaction').on('click', function () {
        var button =  $(this).val();
        $('#action').val(button);
    });
    $('#UpdateuserForm').on('submit', function (e) {
        e.preventDefault();
//        var data = $(this).serialize();
        
//        alert(Quotation);return false;
        //if(confirm(message)){
            $.ajax({
                url: '<?php echo base_url('admin/main/update_jobcard_act'); ?>',
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
                        
                    } else {
                        alert(result.message);
                    }
                },
                error: function () {
                    Notification('jobcard response error');
                }

            });
       // }
    });


    // Imam Payment Script

    $('#paymentForm').on('submit', function (e) {
        e.preventDefault();
//        var data = $(this).serialize();
        //alert(window.location.href);return false;
        $.ajax({
            url: '<?php echo base_url('admin/main/add_imampayment_act'); ?>',
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
               alert('Imaam Payment response error');
            }

        });
    });

    $('#userId').on('change', function (e) {
        e.preventDefault();
        var userId = $('#userId').val();
        

        $.ajax({
            url: '<?php echo base_url('admin/main/getUserAmount'); ?>',
            type: 'POST',
            data: {user_id:userId},
            dataType: 'json',
            success: function (result) {
                if (result.success) {
                  $('#FixAmount').val(result.amount);
                   
                } else {
                    alert(result.message);
                }
            },
            error: function () {
               alert('User response error');
            }

        });
    });



    $('#filterForm').on('submit', function (e) {
        e.preventDefault();
//        var data = $(this).serialize();
        //alert(window.location.href);return false;
        $.ajax({
            url: '<?php echo base_url('admin/main/filterImaampayment'); ?>',
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
               alert('Imaam Payment response error');
            }

        });
    });

    
    
</script>
