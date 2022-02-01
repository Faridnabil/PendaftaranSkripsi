@extends('template')

@section('tittle')
    Pendaftaran Skripsi atau Tugas Akhir
@endsection

@section('konten')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Pengajuan</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        ID Pengajuan
                                    </th>
                                    <th>
                                        NIM
                                    </th>
                                    <th>
                                        Judul Proposal
                                    </th>
                                    <th>
                                        File Proposal
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($viewMhs as $item)
                                    <tr>
                                        <td>
                                            {{ $item->id }}
                                        </td>
                                        <td>
                                            {{ $item->nim }}
                                        </td>
                                        <td>
                                            {{ $item->judul_proposal }}
                                        </td>
                                        <td>
                                            @empty($item->file)
                                                <label class="badge badge-danger">Tidak ada</label>
                                            @else
                                                <label class="badge badge-success">Ada</label>
                                            @endempty
                                        </td>
                                        <td>
                                            <label
                                                class="badge {{ $item->status == 1 ? 'badge-success' : 'badge-warning' }}">
                                                {{ $item->status == 1 ? 'Completed' : 'In Progress' }}
                                            </label>
                                        </td>
                                        <td>
                                            <a type="button" href="{{ $item->file }}" download
                                                class="btn-sm btn-inverse-info btn-rounded m-lg-1" data-toggle="tooltip"
                                                data-placement="top" title="Download File">
                                                <i class="mdi mdi-format-vertical-align-bottom"></i>
                                            </a>

                                            <a type="button" href="{{url('/updateStatusTolak',$item->status)}}" class="btn-sm btn-inverse-danger btn-rounded m-lg-1"
                                                data-toggle="tooltip" data-placement="top" title="Tolak" id="tolak">
                                                <i class="mdi mdi-close"></i>
                                            </a>

                                            <a type="button" href="{{url('/updateStatusTerima',$item->status)}}" class="btn-sm btn-inverse-success btn-rounded m-lg-1"
                                                data-toggle="tooltip" data-placement="top" title="Terima" id="terima">
                                                <i class="mdi mdi-check"></i>
                                        </td>
                                    </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <footer class="footer">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                        Faridnabil</a>2021</span>
                </div>
            </div>
        </div>
    </footer>
@endsection
