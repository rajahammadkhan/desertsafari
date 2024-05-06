@extends('cms.layouts.masterpage')
@section('title', 'Vehicles')
@section('top-styles')

    <link rel="stylesheet" type="text/css" href="{{ url('') }}/plugins/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/forms/switches.css">
<link href="{{ url('') }}/assets/css/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('') }}/assets/css/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />


<style>
.widget-content-area {
    padding: 0px;
}
thead.datatable {
    background: #0e1726;
}
.table > thead > tr > th {
    color: #ffffff;
}
</style>
@endsection
@section('header')
    @parent
@endsection
@section('leftside')
    @parent
@endsection
@section('content')
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="overlay"></div>
    <div class="cs-overlay"></div>
    <div class="search-overlay"></div>
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content ">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <!-- <li class="breadcrumb-item"> All Vehicles </li> -->
                        <li class="breadcrumb-item active" aria-current="page">Sell List</li>
                    </ol>

                    <div class="widget-content widget-content-area border-tab" style="border: none;">
                                <div class="tab-content mb-4" id="border-tabsContent" style="border: none;">
                                    <div class="tab-pane fade show active" id="border-home" role="tabpanel" aria-labelledby="border-home-tab" style="padding: 0px;">
                                        <form id="date-form-download">
                                            @csrf
                                            <div class="widget-content widget-content-area" style="border: none;">
                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        <label for="select_status">Select Order Status <span class="text-danger"> * </span></label>
                                                        <select class="form-control basic" id="select_status" name="status" required>
                                                            <option selected disabled>Select Order Status</option>      
                                                            <option value="All">All</option> 
                                                            <option value="Approved">Approved</option> 
                                                            <option value="Pending">Pending</option> 
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12" style="justify-content: right;display: flex;">
                                                        <button type="submit" class="btn btn-danger mb-2 mr-4 ml-3 mt-2"> Fetch Data</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- <p>Total Data Count: <span id="data-count">0</span></p> -->

                                        <table id="datatable" class="table table-bordered table-hover table-condensed mb-4" width="100%" cellspacing="0"
                            cellpadding="0">
                            <thead class="datatable">
                                <tr>
                                    <th class="no-sort text-center" width="5%">S.No</th>
                                    <th>Order No</th>
                                    <th>Name</th>
                                    <th>Number</th>
                                    <th>Email</th>
                                    <th>Amount</th>
                                    <th>Received By</th>
                                    <th>Order Status</th>
                                    <th>Date</th>
                                   <th class="no-sort text-center" width="8%">Actions</th>

                                </tr>
                            </thead>
                        </table>
                                    </div>
                                </div>
                            </div>
                    <!-- <div class="widget-content widget-content-area border-tab">
                        <div class="tab-content mb-4" id="border-tabsContent" style="border: none;">
                                    <div class="tab-pane fade show active" id="border-home" role="tabpanel" aria-labelledby="border-home-tab" style="padding: 0px;">
                        <form id="date-form-download">
                                            @csrf
                                            <div class="widget-content widget-content-area" style="border: none;">
                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        <label for="select_status">Select Status <span class="text-danger"> * </span></label>
                                                        <select class="form-control basic" id="select_status" name="status" required>
                                                            <option selected disabled>Select Status</option>      
                                                            <option value="All">All</option> 
                                                            <option value="Approved">Approved</option> 
                                                            <option value="Pending">Pending</option> 
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12" style="justify-content: right;display: flex;">
                                                        <button type="submit" class="btn btn-danger mb-2 mr-4 ml-3 mt-2"> Fetch Data</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <p>Total Data Count: <span id="data-count">0</span></p>
                                    </div>
                                </div>
                        <br>
                        
                        <table id="datatable" class="table table-bordered table-hover table-condensed mb-4" width="100%" cellspacing="0"
                            cellpadding="0">
                            <thead class="datatable">
                                <tr>
                                    <th class="no-sort text-center" width="5%">S.No</th>
                                    <th>Order No</th>
                                    <th>Name</th>
                                    <th>Number</th>
                                    <th>Email</th>
                                    <th>Amount</th>
                                    <th>Received By</th>
                                    <th>Order Status</th>
                                    <th>Date</th>
                                   <th class="no-sort text-center" width="8%">Actions</th>

                                </tr>
                            </thead>
                        </table>
                        <br>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->
@endsection
@section('bottom-mid-scripts')
<!-- Required datatable js -->
<!-- <script>
$(document).ready(function() {
    var dataTable = $('#data-table').DataTable({
        processing: true,
        responsive: true,
        lengthMenu: [
            [30, 6000, 8000, -1],
            [30, 6000, 8000, 'All'],
        ],
        
    });

    function formatDate(dateString) {
    const date = new Date(dateString);
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0'); // Month is 0-indexed
    const day = String(date.getDate()).padStart(2, '0');

    return `${year}-${month}-${day}`;
}

    $('#date-form-download').submit(function(e) {
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
                dataTable.clear().destroy();

                // Reinitialize the DataTable with the updated data
                dataTable = $('#data-table').DataTable({
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
                                            dataTable.row($row).remove().draw();
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
                    dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [
                        'excel', 'pdf', 'print'
                    ],
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
                    dataTable.row.add([
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
                });


            },
            error: function(xhr, status, error) {
                console.log(error); // Log the error for debugging purposes
            }
        });
    });

    $(document).on('click', '.delete-transaction', function() {
        var transactionId = $(this).data('id');
        
        if (confirm('Are you sure you want to delete this transaction?')) {
            $.ajax({
                url: '{{ url('deleteTransaction') }}', // Replace with your delete route URL
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: transactionId,
                },
                success: function(response) {
                    // Reload the DataTable or update it as needed
                    // For example: dataTable.ajax.reload();
                },
                error: function(xhr, status, error) {
                    console.log(error); // Log the error for debugging purposes
                }
            });
        }
    });
});
</script> -->

<script src="{{ url('') }}/plugins/select2/select2.min.js"></script>
<script src="{{ url('') }}/plugins/select2/custom-select2.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/sc-2.0.7/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/sc-2.0.7/datatables.min.js"></script>

<script src="{{ url('') }}/assets/js/datatables/axios.min.js"></script>
@endsection
@section('bottom-bot-scripts')
@include('cms.store_purchase.includes.store_purchase-js')
@endsection
