@extends('layouts.app', ['activePage' => 'roles', 'activeButton' => 'roles', 'title' => env('app_name'), 'navName' => 'Role Management'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Role Management') }}</h3>
                                    
                                </div>
                                @role('admin')
                                <div class="col-4 text-right">
                                    <a href=" {{ route('roles.create') }}" class="btn btn-sm btn-default">{{ __('Add Role') }}</a>
                                   
                                </div>
                                @endrole
                                
                            </div>
                        </div>

                        <div class="col-12 mt-2">
                            @include('alerts.success')
                            @include('alerts.errors')
                        </div>

                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover " id="roles" style="width:100%;">
                                <thead>
                                    <th>{{ __('Name') }}</th>
                                    
                                    <th>{{ __('Actions') }}</th>
                                </thead>
                                
                                <tbody>
                                     
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            
                                            <td>{{$role->name}}</td>
                                            
                                            <td class="d-flex">
                                                @role('admin')
                                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-link btn-warning edit d-inline-block"><i class="fa fa-edit"></i></a>
                                                  
                                                    <form class="d-inline-block" action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <a class="btn btn-link btn-danger " onclick="confirm('{{ __('Are you sure you want to delete this role?') }}') ? this.parentElement.submit() : ''"s><i class="fa fa-times"></i></a>
                                                    </form>
                                                @endrole    
                                                    
                                             
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#roles').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }

            });


            var table = $('#roles').DataTable();

            // Delete a record
            table.on('click', '.remove', function(e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });
        });
    </script>
@endpush