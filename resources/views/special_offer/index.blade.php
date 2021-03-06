@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    @include('flash::message')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Special Offers</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-offset-8 col-sm-3">
                                        <div class="pull-right">
                                            <a href="{{ route('special_offers.create') }}" class="btn btn-block btn-success">Create Special Offer</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="table-responsive m-t-40">
                                    <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" id="special_offer_table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Doscount</th>
                                                <th>Expiration</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#special_offer_table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "processing": true,
                "serverSide": true,
                "language": {
                    "processing": "Processing Request"
                },
                "ajax":{
                    url :"{{ route('all_special_offer') }}", // json datasource
                    type: "get"
                },
                searchDelay: 350,
                "lengthMenu": [[10, 25, 50, 100, 200, 500], [10, 25, 50, 100, 200, 500]],
                aoColumns: [

                    { data: 'name', name:'name' },
                    { data: 'discount', name: 'discount' },
                    { data: 'expiration', name: 'expiration' }

                ]
            });
        });
    </script>
@endsection
