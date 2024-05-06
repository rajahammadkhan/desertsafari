<script type="text/javascript">
    $(document).ready(function() {
    
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        lengthMenu: [
            [25, 50, 100, -1],
            [25, 50, 100, 'All'],
        ],
        ajax: "{{ route('stock_purchase.datatable') }}",
        "columns": [{
                "data": "id",
                "defaultContent": ""
            },
            {
                "data": "order_number",
                "defaultContent": ""
            },
            {
                "data": "client_name",
                "defaultContent": ""
            },
            {
                "data": "client_number",
                "defaultContent": ""
            },
            {
                "data": "client_email",
                "defaultContent": ""
            },
            {
                "data": "amount",
                "defaultContent": ""
            },
            {
                "data": "received_by",
                "defaultContent": ""
            },
            {
                "data": "order_status",
                "defaultContent": ""
            },
            
            {
                "data": "created_at",
                "defaultContent": ""
            },
            {
                "data": "id",
                "defaultContent": ""
            },

             
        ],
        "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            },
            {
                "targets": 0,
                "render": function(data, type, row, meta) {
                    return meta.row + 1;
                },
            },
            {
              "targets": 8,
              "render": function(data, type, row, meta) {


                let f = new Date(data);
                // let a = f.formatToParts(data);
                const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                let month = months[f.getMonth()];
                return  f.getDate()+'-'+month+'-'+f.getFullYear()  ;
              },
              
            },
            {
                "targets": 9,
                "render": function(data, type, row, meta) {

                    var edit = "{{ route('stock_purchase.show', [':id']) }}";
                    edit = edit.replace(':id', data);


                    return `<div class="text-center">
                              <a href="javascript:void(0);" class="email" data-toggle="tooltip" data-placement="top" title="email" data-id="`+ data + `">
                               <svg width="20" height="20" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0)matrix(1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.9600000000000002"></g><g id="SVGRepo_iconCarrier"> <path d="M15 18L17 20L21 16M11 19H6.2C5.0799 19 4.51984 19 4.09202 18.782C3.71569 18.5903 3.40973 18.2843 3.21799 17.908C3 17.4802 3 16.9201 3 15.8V8.2C3 7.0799 3 6.51984 3.21799 6.09202C3.40973 5.71569 3.71569 5.40973 4.09202 5.21799C4.51984 5 5.0799 5 6.2 5H17.8C18.9201 5 19.4802 5 19.908 5.21799C20.2843 5.40973 20.5903 5.71569 20.782 6.09202C21 6.51984 21 7.0799 21 8.2V12M20.6067 8.26229L15.5499 11.6335C14.2669 12.4888 13.6254 12.9165 12.932 13.0827C12.3192 13.2295 11.6804 13.2295 11.0677 13.0827C10.3743 12.9165 9.73279 12.4888 8.44975 11.6335L3.14746 8.09863" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                              </a>

                              <a href="` + edit + `"  data-toggle="tooltip" data-placement="top" title="view">
                                <svg width="30" height="30" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                  <path fill="none" stroke="#294159" stroke-width="2" d="M12,17 C9.27272727,17 6,14.2222222 6,12 C6,9.77777778 9.27272727,7 12,7 C14.7272727,7 18,9.77777778 18,12 C18,14.2222222 14.7272727,17 12,17 Z M11,12 C11,12.55225 11.44775,13 12,13 C12.55225,13 13,12.55225 13,12 C13,11.44775 12.55225,11 12,11 C11.44775,11 11,11.44775 11,12 Z"/>
                                </svg>
                              </a> 
                          
                              <a href="javascript:void(0);" class="delete" data-toggle="tooltip" data-placement="top" title="Delete" data-id="`+ data + `">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                              </a>


                            </div>`;
                },
            },
        ],
        "drawCallback": function(settings) {

        $('.delete').click(function () {
          var deleteId = $(this).data('id');
          var $this = $(this);

          swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4fa7f3',
            cancelButtonColor: '#d57171',
            confirmButtonText: 'Yes, delete it!'
          }).then(function (result) {
            if (result.value) {
            axios
              .post('{{route("deleteTransaction")}}', {
                _method: 'delete',
                _token: '{{csrf_token()}}',
                deleteId: deleteId,
              })
              .then(function (response) {

                swal(
                  'Deleted!',
                  'Our Service  has been deleted.',
                  'success'
                )

                table.draw();
              })
              .catch(function (error) {
                console.log(error);
                swal(
                  'Failed!',
                  error.response.data.error,
                  'error'
                )
              });
            }
          })
        });

        $('.email').click(function () {
          var emailId = $(this).data('id');
          var $this = $(this);

          swal({
            title: 'Send Email!',
            type: 'success',
            showCancelButton: true,
            confirmButtonColor: '#4fa7f3',
            cancelButtonColor: '#d57171',
            confirmButtonText: 'Yes, Send it!'
          }).then(function (result) {
            if (result.value) {
            axios
              .post('{{route("sendemail")}}', {
                _method: 'post',
                _token: '{{csrf_token()}}',
                emailId: emailId,
              })
              .then(function (response) {

                swal(
                  'Send!',
                  'Email Send Successfully.',
                  'success'
                )

                table.draw();
              })
              .catch(function (error) {
                console.log(error);
                swal(
                  'Failed!',
                  error.response.data.error,
                  'error'
                )
              });
            }
          })
        });
      },
        //scrollX:true,
    });
$('#date-form-download').submit(function(e) {
    function formatDate(dateString) {
        const date = new Date(dateString);
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0'); // Month is 0-indexed
        const day = String(date.getDate()).padStart(2, '0');

        return `${year}-${month}-${day}`;
    }
        e.preventDefault();

        var status = $('#select_status').val();
        var campUsed = $('#select_used').val();

        // Display an error message or perform any desired action
        if (status === null) {
          alert('Please select a status');
          return;
        }

        if (campUsed === null) {
          alert('Please select a Used/Unused');
          return;
        }

        $.ajax({
            url: '{{url('getDataDownloadBetweenDates') }}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                status: status,
                used: campUsed,
            },
            success: function(response) {

                var transactions = response.transactions;
                var count = response.count;

                $('#data-count').text(count);

                // Destroy the existing DataTable instance
                table.clear().destroy();

                // Reinitialize the DataTable with the updated data
                table = $('#datatable').DataTable({
                    processing: true,
                    responsive: true,
                    fixedHeader: true,
                    deferLoading: 57,
                    lengthMenu: [
                        [30, 6000, 8000, -1],
                        [30, 6000, 8000, 'All'],
                    ],
                    drawCallback: function(settings) {
                        $('.delete').click(function() {
                            var deleteId = $(this).data('id');
                            var $row = $(this).closest('tr'); // Get the row element
                            var $this = $(this);

                            swal({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#4fa7f3',
                                cancelButtonColor: '#d57171',
                                confirmButtonText: 'Yes, delete it!'
                            }).then(function(result) {
                                if (result.value) {
                                    axios
                                        .post('{{ route("stock_purchase.destroy") }}', {
                                            _method: 'delete',
                                            _token: '{{ csrf_token() }}',
                                            id: deleteId,
                                        })
                                        .then(function(response) {
                                            swal(
                                                'Deleted!',
                                                'Our Service has been deleted.',
                                                'success'
                                            );

                                            // Remove the row from DataTable on successful delete
                                            table.row($row).remove().draw();
                                        })
                                        .catch(function(error) {
                                            console.log(error);
                                            swal(
                                                'Failed!',
                                                error.response.data.error,
                                                'error'
                                            );
                                        });
                                }
                            });
                        });
                    },
                    // dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                    //     "<'row'<'col-sm-12'tr>>" +
                    //     "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    // buttons: [
                    //     'excel', 'pdf', 'print'
                    // ],
                });

                // Add the updated data to the DataTable
                $.each(transactions, function(index, transaction) {
                    var editUrl = "{{ route('stock_purchase.show', ':id') }}";
                        editUrl = editUrl.replace(':id', transaction.id);

                    var editLink = '<div class="text-center"><a href="' + editUrl + '" data-toggle="tooltip" data-placement="top" title="View">' +
                                    '<svg width="30" height="30" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">' +
                                    '<path fill="none" stroke="#294159" stroke-width="2" d="M12,17 C9.27272727,17 6,14.2222222 6,12 C6,9.77777778 9.27272727,7 12,7 C14.7272727,7 18,9.77777778 18,12 C18,14.2222222 14.7272727,17 12,17 Z M11,12 C11,12.55225 11.44775,13 12,13 C12.55225,13 13,12.55225 13,12 C13,11.44775 12.55225,11 12,11 C11.44775,11 11,11.44775 11,12 Z"/>' +
                                    '</svg>' +
                                    '</a>';
                    var deleteButton = '<a href="javascript:void(0);" class="delete" data-toggle="tooltip" data-placement="top" title="Delete" data-id="' + transaction.id + '">' +
                                        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger">' +
                                        '<circle cx="12" cy="12" r="10"></circle>' +
                                        '<line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>' +
                                      '</a> </div>';
                    var combinedContent = editLink + ' ' + deleteButton;
                    table.row.add([
                      index+1,
                        transaction.order_number,
                        transaction.client_name,
                        transaction.client_number,
                        transaction.client_email,
                        transaction.amount,
                        transaction.received_by,
                        transaction.order_status,
                        formatDate(transaction.created_at),
                        combinedContent, // Add the edit link here
                    ]).draw();
                    $('.delete').click(function () {
                      var deleteId = $(this).data('id');
                      var $this = $(this);

                      swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#4fa7f3',
                        cancelButtonColor: '#d57171',
                        confirmButtonText: 'Yes, delete it!'
                      }).then(function (result) {
                        if (result.value) {
                        axios
                          .post('{{route("deleteTransaction")}}', {
                            _method: 'delete',
                            _token: '{{csrf_token()}}',
                            deleteId: deleteId,
                          })
                          .then(function (response) {

                            swal(
                              'Deleted!',
                              'Our Service  has been deleted.',
                              'success'
                            )

                            table.draw();
                          })
                          .catch(function (error) {
                            console.log(error);
                            swal(
                              'Failed!',
                              error.response.data.error,
                              'error'
                            )
                          });
                        }
                      })
                    });
                });


            },
            error: function(xhr, status, error) {
                console.log(error); // Log the error for debugging purposes
            }
        });
    });

    // $(document).on('click', '.delete-transaction', function() {
    //     var transactionId = $(this).data('id');

    //             console.log(transactionId, 'aa');
        
    //     if (confirm('Are you sure you want to delete this transaction?')) {
    //         $.ajax({
    //             url: '{{ url('deleteTransaction') }}', // Replace with your delete route URL
    //             type: 'DELETE',
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             data: {
    //                 _token: $('meta[name="csrf-token"]').attr('content'),
    //                 id: transactionId,
    //             },
    //             success: function(response) {
    //                 // Reload the DataTable or update it as needed
    //                 // For example: dataTable.ajax.reload();
    //             },
    //             error: function(xhr, status, error) {
    //                 console.log(error); // Log the error for debugging purposes
    //             }
    //         });
    //     }
    // });
    
    
    });
    </script>