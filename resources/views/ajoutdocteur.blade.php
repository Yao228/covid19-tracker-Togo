@extends('layouts.vertical')


@section('css')
<!-- plugin css -->
{{-- <link href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" /> --}}
<link href="{{ URL::asset('assets/libs/smartwizard/smartwizard.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/smartwizard/smart_wizard_theme_arrows.min.css') }}" rel="stylesheet" type="text/css" />
  {{-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}
<link href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">COVID19 TOGO</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cas suspects</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row">
        <div class="col-12">
            <div class="row page-title align-items-center">
                <div class="col-sm-9 col-xl-9">
                    <h4 class="mb-1 mt-0">Contributeurs</h4>
                </div>
                <div class="col-sm-3 col-xl-3">
                   <!-- Large modal -->
                   <button type="button" id="addNewDoctor"  class="btn btn-primary btn-block" data-toggle="modal" data-target="#bs-example-modal-lg">Ajouter un contributeur</button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
    
                    <table class="table table-striped dt-responsive nowrap data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nom</th>
                                <th>Centre de santé</th>
                                <th>E-mail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
    <!--  Modal content for the above example -->
    <div class="modal fade" id="ajaxModel" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelHeading"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="doctorForm" name="doctorForm">
                                <input type="hidden" name="doctor_id" id="doctor_id">
                                <div class="form-group">
                                    <label class="form-control-label">Nom du médecin</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="user"></i>
                                            </span>
                                        </div>
                                        <input type="text"
                                            name="name" value="{{ old('name')}}"
                                            class="form-control @if($errors->has('name')) is-invalid @endif"
                                            id="name" placeholder="Nom complet " />
        
                                        @if($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label class="form-control-label">Centre de santé du médecin</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="home"></i>
                                            </span>
                                        </div>
                                        <input type="text"
                                            name="hopital" value="{{ old('hopital')}}"
                                            class="form-control @if($errors->has('hopital')) is-invalid @endif"
                                            id="hopital" placeholder="Centre de santé" />
        
                                        @if($errors->has('hopital'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('hopital') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label class="form-control-label">Adresse e-mail du médecin</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-dual" data-feather="mail"></i>
                                            </span>
                                        </div>
                                        <input type="email"
                                            name="email" value="{{ old('email')}}"
                                            class="form-control @if($errors->has('email')) is-invalid @endif"
                                            id="email" placeholder="Adresse e-mail" />
        
                                        @if($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" value="create"  id="saveBtn" type="submit">Ajouter le contributeur</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<!--  Modal content for the above example -->

@endsection

@section('script')
<!-- datatable js -->
{{-- <script src="{{ URL::asset('assets/libs/datatables/datatables.min.js') }}"></script> --}}

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
@endsection

@section('script-bottom')
<!-- Datatables init -->
{{-- <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>--}}
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="{{ URL::asset('assets/libs/smartwizard/smartwizard.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/form-wizard.init.js') }}"></script>

<script type="text/javascript">
        $(function () {
           
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });
          
          
          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              language: {
                    "url": "{{ URL::asset('assets/i18n/French.json') }}"
                },
              ajax: "{{ route('addDoctor.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'name', name: 'name'},
                  {data: 'hopital', name: 'hopital'},
                  {data: 'email', name: 'email'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          }); 

           
          $('#addNewDoctor').click(function () {
              $('#saveBtn').val("create-product");
              $('#doctor_id').val('');
              $('#doctorForm').trigger("reset");
              $('#modelHeading').html("Ajouter un nouveau contributeur");
              $('#ajaxModel').modal('show');
          });

          
          $('body').on('click', '.editDoctor', function () {
            var patient_id = $(this).data('id');
            $.get("{{ route('addDoctor.index') }}" +'/' + patient_id +'/edit', function (data) {
                $('#modelHeading').html("Modifier ce cas");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel').modal('show');
                $('#doctorId').val(data.id);
                $('#name').val(data.name);
                $('#hopital').val(data.hopital);
                $('#email').val(data.email);
            })
         });
          
          $('#saveBtn').click(function (e) {
              e.preventDefault();
              $(this).html('Envoi...');
          
              $.ajax({
                data: $('#doctorForm').serialize(),
                url: "{{ route('addDoctor.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
           
                    $('#doctorForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
               
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Sauvegarder les modifications');
                }
            });
          });
          
          $('body').on('click', '.deleteDoctor', function () {
           
              var doctor_id = $(this).data("id");
              confirm("Voulez-vous vraiment supprimer !");
            
              $.ajax({
                  type: "DELETE",
                  url: "{{ route('addDoctor.store') }}"+'/'+doctor_id,
                  success: function (data) {
                      table.draw();
                  },
                  error: function (data) {
                      console.log('Error:', data);
                  }
              });
          });
           
        });
      </script>
@endsection

