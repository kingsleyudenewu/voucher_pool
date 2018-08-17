@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Voucher Management</div>
                        <div class="card-body">
                            <div class="table-responsive m-t-40">
                                <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" id="voucher_table">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Recipient</th>
                                            <th>Special Offer</th>
                                            <th>Expiration</th>
                                            <th>Date Used</th>
                                            <th>Discount</th>
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
            $('#voucher_table').DataTable({
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
                    url :"{{ route('allVoucher') }}", // json datasource
                    type: "get"
                },
                searchDelay: 350,
                "lengthMenu": [[10, 25, 50, 100, 200, 500], [10, 25, 50, 100, 200, 500]],
                aoColumns: [

                    { data: 'code', name:'code' },
                    { data: 'recipient_name', name: 'recipient_name' },
                    { data: 'special_offer_name', name: 'special_offer_name' },
                    { data: 'expiration', name: 'expiration' },
                    { data: 'date_used', name: 'date_used' },
                    { data: 'discount', name: 'discount' }
                ]
            });
        });
    </script>
@endsection
