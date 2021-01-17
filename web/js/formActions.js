
$(document).ready( function () {
    

    $('.datatable').DataTable()

    $('#jsForm').on('beforeSubmit', function() {
        alert('a');
        var form = $(this);
        // return false if form still have some validation errors
        if (form.find('.has-error').length) 
        {
            return false;
        }
        $.ajax({
            url    : form.attr('action'),
            type   : 'post',
            data   : form.serialize(),
            success: function (response) 
            {

                console.log(response);
                alert('Registration Success')
            },
            error  : function () 
            {
                console.log('Internal Server Error.')
            }
        });
        return false;
    })

    $('.deleteRecord').on('click', function() {
        let _this = $(this);
        if(confirm('Are you sure you want to delete'))
        {
            $.ajax({
                url    : _this.attr('href'),
                type   : 'post',
                data   : {id : _this.attr('id')},
                success: function (response, code) 
                {   
                    let status = JSON.parse(response).status
                    switch(status) {
                        case 422:
                            alert(`Event cannot be deleted`);
                        break;
                        default:
                            alert('Event Successfully Deleted')
                            window.location.href = '/event'
                    }
                },
            });
            return false;
        }
        return false;
    }) 
} );
