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
        $('#ticketModal form')[0].reset();
        $('.js-example-basic-multiple').val(null).trigger('change');
        $('.modal-title').html("<i class='fa fa-plus'></i> ایجاد تیکت");
        $('#action').val('createTicket');
        $('#save').val('ثبت تیکت');

    });

    $('#createDebitTicket').click(function(){
        $('#debitModal').modal('show');
        $('#debitModal form')[0].reset();
        $('.js-example-basic-multiple').val(null).trigger('change');
        $('.modal-title').html("<i class='fa fa-plus'></i> اخطار بدهی");
        $('#action-debit').val('createDebitTicket');
        $('#save-debit').val('ثبت اخطار بدهی');

    });
    // select2
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({ width: '100%' });
    });

    if($('#listTickets').length) {
        // Setup - add a text input to each footer cell
        $('#listTickets tfoot  th').each(function () {
            var title = $(this).text();
            $(this).html('<div class="input-group mb-3"><input class=" form-control " dir="ltr" style="font-size: 11pt; font-family: \'B Koodak\' "   placeholder="🔎 ' + title + '" /></div>');
        });

        var ticketData = $('#listTickets').DataTable({

            "processing": true,
            "fixedHeader": true,
            "serverSide": true,
            "pageLength": 10,
            "scrollX": true,
            "order" : [],
            "searching": true,
            "orderCellsTop": true,
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
                {
                    "targets": [ 1 ],
                    "visible": false
                },
                { className: "aseman-rtl", "targets": [ 5 ] }
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
                ["10 رکورد", "25 رکورد", "50 رکورد", "100 رکورد", "200 رکورد", "تمام موارد"]
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

            rowCallback: function( row, data ) {
                if ( data[1] == "0" ) {
                    $( row).addClass('bolded');
                }
            },

        });
        // Apply the search
        ticketData.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change clear', function () {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
            // Click
        $('#listTickets tbody').on('click',
            'tr td:nth-child(1),td:nth-child(2),td:nth-child(3),td:nth-child(4),td:nth-child(5),td:nth-child(6),td:nth-child(7)',
            function () {
            var data = ticketData.row( this ).data();
            window.location = "ticket?id="+data[2];
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

        $(document).on('submit','#debitForm', function(event){
            event.preventDefault();
            $('#save-debit').attr('disabled','disabled');
            var formDataDebit = $(this).serialize();
            $.ajax({
                url:"process",
                method:"POST",
                data:formDataDebit,
                success:function(data){
                    $('#debitForm')[0].reset();
                    $('#debitModal').modal('hide');
                    $('#save-debit').attr('disabled', false);
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
                    $('.modal-title').html("<i class='fa fa-pencil'></i> ویرایش تیکت");
                    $('#action').val('updateTicket');
                    $('#save').val('Save Ticket');
                }
            })
        });
        $(document).on('click', '.delete', function(){
            var ticketId = $(this).attr("id");
            var action = "closeTicket";
            if(confirm("مطمئن هستید که می خواهید این تیکت را ببندید؟")) {
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