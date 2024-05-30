<x-admin.layout>
    <x-slot name="title">Issuance Of Marriage Registration Certificate / विवाह नोंदणी प्रमाणपत्र देणे</x-slot>
    <x-slot name="heading">Issuance Of Marriage Registration Certificate / विवाह नोंदणी प्रमाणपत्र देणे</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}



    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('marriage-registration.create') }}" class="btn btn-primary">Add <i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Applicant Name</th>
                                    <th>Applicant Mobile</th>
                                    <th>Applicant Email</th>
                                    <th>Applicant Aadhar</th>
                                    <th>Applicant Pancard</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr align="center">
                                    <td colspan="7">No Data Found</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-admin.layout>


