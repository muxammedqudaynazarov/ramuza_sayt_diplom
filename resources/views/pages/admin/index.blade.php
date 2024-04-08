@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4>
                        Meniń profil maǵlıwmatlarım
                    </h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr style="background-color: #eee">
                            <th>MAǴLÍWMAT TÚRI</th>
                            <th>MAǴLÍWMAT</th>
                        </tr>
                        </thead>
                        <tr>
                            <th>F.I.O.</th>
                            <td>{{ auth()->user()->name }}</td>
                        </tr>
                        <tr>
                            <th>Elektron pochta</th>
                            <td>{{ auth()->user()->email }}</td>
                        </tr>
                        <tr>
                            <th>Roli</th>
                            <td>Student</td>
                        </tr>
                        <tr>
                            <th>Fakulteti</th>
                            <td>{{ auth()->user()->faculty_id }}</td>
                        </tr>
                        <tr>
                            <th>Tálim baǵdarı</th>
                            <td>{{ auth()->user()->speciality_id }}</td>
                        </tr>
                        <tr>
                            <th>Topari</th>
                            <td>{{ auth()->user()->group_id }}</td>
                        </tr>
                        <tr>
                            <th>Kurs</th>
                            <td>{{ auth()->user()->course_id }}</td>
                        </tr>
                        <tr>
                            <th>Telefon nomeri</th>
                            <td>{{ auth()->user()->phone }}</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
