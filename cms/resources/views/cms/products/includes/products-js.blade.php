<script type="text/javascript">
    $(document).ready(function() {
    
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('product.datatable') }}",
        "columns": [{
                "data": "id",
                "defaultContent": ""
            },
            {
                "data": "name",
                "defaultContent": ""
            },
            {
                "data": "price",
                "defaultContent": ""
            },
            
            {
                "data": "created_at",
                "defaultContent": ""
            },
            @if(auth()->user()->can('Listings-update') || auth()->user()->can('Listings-delete'))
            {
                "data": "id",
                "defaultContent": ""
            },
            @endif
            @if(auth()->user()->user_type == 0)
            {
                "data": "published",
                "defaultContent": ""
            },
            {
                "data": "is_best_selling",
                "defaultContent": ""
            },
            {
                "data": "is_polular",
                "defaultContent": ""
            },
            {
                "data": "is_new_arrival",
                "defaultContent": ""
            },
            {
                "data": "status",
                "defaultContent": ""
            },
            @endif


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
              "targets": 3,
              "render": function(data, type, row, meta) {
                
                let f = new Date(data);
                // let a = f.formatToParts(data);
                const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                let month = months[f.getMonth()];
                return  f.getDate()+'-'+month+'-'+f.getFullYear()  ;
              },
            },
            
            @if(auth()->user()->can('Listings-update') || auth()->user()->can('Listings-delete'))
            {
                "targets": 4,
                "render": function(data, type, row, meta) {

                    var edit = "{{ route('product.edit', [':id']) }}";
                    edit = edit.replace(':id', data);


                    return `<div class="text-center">
                            
                            @can('Listings-delete')
                          <a href="javascript:void(0);" class="delete" data-toggle="tooltip" data-placement="top" title="Delete" data-id="`+ data + `">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                          </a></div>
                          @endcan`;
                },
            },
            @endif
            @if(auth()->user()->user_type == 0)


                {
                    "targets": 5,
                    "render": function(data, type, row, meta) {
                      
                      var checked = data == '1' ? 'checked' : null;
                        return `
                        <div class="text-center">
                          
                            <label class="switch s-icons s-outline  s-outline-success  mt-3">
                              <input class="publish" id="publish" type="checkbox"  ` + checked + ` value="` + row.id + `">
                              <span class="slider round"></span>
                            </label>
                          
                        </div>
                        `;
                    },
                },

                {
                    "targets": 6,
                    "render": function(data, type, row, meta) {
                      
                      var checked = data == '1' ? 'checked' : null;
                        return `
                        <div class="text-center">
                          
                            <label class="switch s-icons s-outline  s-outline-success  mt-3">
                              <input class="is_best_selling" id="is_best_selling" type="checkbox"  ` + checked + ` value="` + row.id + `">
                              <span class="slider round"></span>
                            </label>
                          
                        </div>
                        `;
                    },
                },

                {
                    "targets": 7,
                    "render": function(data, type, row, meta) {
                      
                      var checked = data == '1' ? 'checked' : null;
                        return `
                        <div class="text-center">
                          
                            <label class="switch s-icons s-outline  s-outline-success  mt-3">
                              <input class="is_polular" id="is_polular" type="checkbox"  ` + checked + ` value="` + row.id + `">
                              <span class="slider round"></span>
                            </label>
                          
                        </div>
                        `;
                    },
                },

                {
                    "targets": 8,
                    "render": function(data, type, row, meta) {
                      
                      var checked = data == '1' ? 'checked' : null;
                        return `
                        <div class="text-center">
                          
                            <label class="switch s-icons s-outline  s-outline-success  mt-3">
                              <input class="is_new_arrival" id="is_new_arrival" type="checkbox"  ` + checked + ` value="` + row.id + `">
                              <span class="slider round"></span>
                            </label>
                          
                        </div>
                        `;
                    },
                },

                {
                    "targets": 9,
                    "render": function(data, type, row, meta) {
                      
                      var checked = data == '1' ? 'checked' : null;
                        return `
                        <div class="text-center">
                          
                            <label class="switch s-icons s-outline  s-outline-success  mt-3">
                              <input class="status" id="status" type="checkbox"  ` + checked + ` value="` + row.id + `">
                              <span class="slider round"></span>
                            </label>
                          
                        </div>
                        `;
                    },
                },

            @endif
        ],
        "drawCallback": function(settings) {

          $('.publish').change(function () {
            var $this = $(this);
            var id = $this.val();
            var publish = this.checked;
            if (publish) {
              publish = 1;
            } else {
              publish = 0;
            }

            axios
              .post('{{route("product.publish")}}', {
                _token: '{{csrf_token()}}',
                _method: 'patch',
                id: id,
                publish: publish,
              })
              .then(function (responsive) {
                console.log(responsive);

              })
              .catch(function (error) {
                console.log(error);
              });
          });

          $('.is_best_selling').change(function () {
            var $this = $(this);
            var id = $this.val();
            var is_best_selling = this.checked;
            if (is_best_selling) {
              is_best_selling = 1;
            } else {
              is_best_selling = 0;
            }

            axios
              .post('{{route("product.best_selling")}}', {
                _token: '{{csrf_token()}}',
                _method: 'patch',
                id: id,
                is_best_selling: is_best_selling,
              })
              .then(function (responsive) {
                console.log(responsive);

              })
              .catch(function (error) {
                console.log(error);
              });
          });

          $('.is_polular').change(function () {
            var $this = $(this);
            var id = $this.val();
            var is_polular = this.checked;
            if (is_polular) {
              is_polular = 1;
            } else {
              is_polular = 0;
            }

            axios
              .post('{{route("product.popular")}}', {
                _token: '{{csrf_token()}}',
                _method: 'patch',
                id: id,
                is_polular: is_polular,
              })
              .then(function (responsive) {
                console.log(responsive);

              })
              .catch(function (error) {
                console.log(error);
              });
          });

          $('.is_new_arrival').change(function () {
            var $this = $(this);
            var id = $this.val();
            var is_new_arrival = this.checked;
            if (is_new_arrival) {
              is_new_arrival = 1;
            } else {
              is_new_arrival = 0;
            }

            axios
              .post('{{route("product.arrival")}}', {
                _token: '{{csrf_token()}}',
                _method: 'patch',
                id: id,
                is_new_arrival: is_new_arrival,
              })
              .then(function (responsive) {
                console.log(responsive);

              })
              .catch(function (error) {
                console.log(error);
              });
          });

          $('.status').change(function () {
            var $this = $(this);
            var id = $this.val();
            var status = this.checked;
            if (status) {
              status = 1;
            } else {
              status = 0;
            }

            axios
              .post('{{route("product.status")}}', {
                _token: '{{csrf_token()}}',
                _method: 'patch',
                id: id,
                status: status,
              })
              .then(function (responsive) {
                console.log(responsive);

              })
              .catch(function (error) {
                console.log(error);
              });
          });

          $('.is_featured').change(function () {
            var $this = $(this);
            var id = $this.val();
            
            var is_featured = this.checked;

            if (is_featured) {
              is_featured = 1;
            } else {
              is_featured = 0;
            }

            axios
              .post('{{route("product.featured")}}', {
                _token: '{{csrf_token()}}',
                _method: 'patch',
                id: id,
                is_featured: is_featured,
              })
              .then(function (responsive) {
                console.log(responsive);

              })
              .catch(function (error) {
                console.log(error);
              });
          });

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
                .post('{{route("product.destroy")}}', {
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
      },
        //scrollX:true,
    });
    
    });
    
    </script>