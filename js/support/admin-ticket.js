$(document).ready(function() {
    $(document).on('submit','#ticketReply', function(event){
        event.preventDefault();
        $('#reply').attr('disabled','disabled');
        var formData = $(this).serialize();
        $.ajax({
            url:"process",
            method:"POST",
            data:formData,
            success:function(data){
                $('#ticketReply')[0].reset();
                $('#reply').attr('disabled', false);
                location.reload();
            }
        })
    });
    $('#createTicket').click(function(){
        $('#ticketModal').modal('show');
        $('#ticketForm')[0].reset();
        $('.modal-title').html("<i class='fa fa-plus'></i> ایجاد تیکت");
        $('#action').val('createTicket');
        $('#save').val('ثبت تیکت');
    });

    if($('#listTickets').length) {
        var ticketData = $('#listTickets').DataTable({
            "lengthChange": false,
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
                url:"process",
                type:"POST",
                data:{action:'listTicket'},
                dataType:"json"
            },
            "columnDefs":[
                {
                    // "targets":[0, 6, 7, 8, 9],
                    // "orderable":false,
                },
            ],
            dom: "Bfrtip",
            language: {
                buttons: {
                    pageLength: {
                        _: " نمایش %d رکورد ▼",
                        className: "fa fa-caret-down"
                    }
                },
                "sEmptyTable": "هیچ داده ای در جدول وجود ندارد",
                "sInfo": "نمایش _START_ تا _END_ از _TOTAL_ رکورد",
                "sInfoEmpty": "نمایش 0 تا 0 از 0 رکورد",
                "sInfoFiltered": "(فیلتر شده از _MAX_ رکورد)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "نمایش _MENU_ رکورد",
                "sLoadingRecords": "در حال بارگزاری...",
                "sProcessing": "در حال پردازش...",
                "sSearch": "جستجو:",
                "sZeroRecords": "رکوردی با این مشخصات پیدا نشد",
                "oPaginate": {
                    "sFirst": "ابتدا",
                    "sLast": "انتها",
                    "sNext": "بعدی",
                    "sPrevious": "قبلی"
                },
                "oAria": {
                    "sSortAscending": ": فعال سازی نمایش به صورت صعودی",
                    "sSortDescending": ": فعال سازی نمایش به صورت نزولی"
                }

            },
            lengthMenu: [
                [10, 25, 50, 100, 200, -1],
                ["10 رکورد", "25 رکورد", "50 رکورد", "100 رکورد", "200 رکورد", "all"]
            ],
            buttons: [
                {
                    extend: "pageLength",
                    className: "btn-sm  alert-info  "
                },
                {
                    extend: "copy",
                    text: "کپی",
                    className: "btn-sm"
                },
                {
                    extend: "csv",
                    text: "فایل CSV",
                    className: "btn-sm"
                },
                {
                    extend: "excel",
                    text: "اکسل",
                    className: "btn-sm"
                },
                {
                    extend: "pdfHtml5",
                    text: "فایل PDF",
                    className: "btn-sm",
                    download: "open"
                },
                {
                    extend: "print",
                    text: "چاپ",
                    className: "btn-sm"
                },
            ],

        });

        $('#listTickets tbody').on('click', 'tr', function () {
            var data = ticketData.row( this ).data();
            window.location = "ticket?id="+data[1];
        } );

        $(document).on('submit','#ticketForm', function(event){
            event.preventDefault();
            $('#save').attr('disabled','disabled');
            var formData = $(this).serialize();
            $.ajax({
                url:"process",
                method:"POST",
                data:formData,
                success:function(data){
                    $('#ticketForm')[0].reset();
                    $('#ticketModal').modal('hide');
                    $('#save').attr('disabled', false);
                    ticketData.ajax.reload();
                }
            })
        });
        $(document).on('click', '.update', function(){
            var ticketId = $(this).attr("id");
            var action = 'getTicketDetails';
            $.ajax({
                url:'process',
                method:"POST",
                data:{ticketId:ticketId, action:action},
                dataType:"json",
                success:function(data){
                    $('#ticketModal').modal('show');
                    $('#ticketId').val(data.id);
                    $('#subject').val(data.title);
                    $('#message').val(data.init_msg);
                    if(data.gender == '0') {
                        $('#open').prop("checked", true);
                    } else if(data.gender == '1') {
                        $('#close').prop("checked", true);
                    }
                    $('.modal-title').html("<i class='fa fa-plus'></i> Edit Ticket");
                    $('#action').val('updateTicket');
                    $('#save').val('Save Ticket');
                }
            })
        });
        $(document).on('click', '.delete', function(){
            var ticketId = $(this).attr("id");
            var action = "closeTicket";
            if(confirm("Are you sure you want to close this ticket?")) {
                $.ajax({
                    url:"process",
                    method:"POST",
                    data:{ticketId:ticketId, action:action},
                    success:function(data) {
                        ticketData.ajax.reload();
                    }
                })
            } else {
                return false;
            }
        });
    }
});