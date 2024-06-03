<x-layout>
    <x-slot name="title">Profile</x-slot>
    <x-slot name="heading">Profile</x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Info</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <th>Full Name :</th>
                                    <td>{{ (Auth::user()->name) ? Auth::user()->name : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile :</th>
                                    <td>{{ (Auth::user()->mobile) ? Auth::user()->mobile : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>E-mail :</th>
                                    <td>{{ (Auth::user()->email) ? Auth::user()->email : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Age :</th>
                                    <td>{{ (Auth::user()->age) ? Auth::user()->age : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>
                                        @if(Auth::user()->gender == "M")
                                        Male
                                        @elseif (Auth::user()->gender == "F")
                                        Female
                                        @else
                                        -
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div>
    </div>
</x-layout>