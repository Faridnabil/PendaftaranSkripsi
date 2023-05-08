@extends('template')

@section('tittle')
    Pendaftaran Skripsi atau Tugas Akhir
@endsection

@section('konten')
    <a type="Button" class="btn btn-primary" href="pengajuan">Status Pengajuan </a>
    <a type="Button" class="btn btn-inverse-primary" href="daftarPengajuan"> Daftar Pengajuan </a>
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
                                            <label class="badge {{$item->status == 1 ? 'badge-success' : 'badge-warning'}}">
                                                {{$item->status == 1 ? 'Completed' : 'In Progress'}} </label>
                                        </td>
                                        <td>
                                            <a type="button" href="{{ $item->file }}" download
                                                class="btn-sm btn-inverse-info btn-rounded m-lg-1" data-toggle="tooltip"
                                                data-placement="top" title="Download File">
                                                <i class="mdi mdi-format-vertical-align-bottom"></i>
                                            </a>

                                            @if (auth()->user()->level == 'admin')
                                                <a type="button" href="/editPengajuan/{{ $item->id }}"
                                                    class="btn-sm btn-inverse-dark btn-rounded m-lg-1" data-toggle="tooltip"
                                                    data-placement="top" title="Edit">
                                                    <i class="mdi mdi-border-color"></i>
                                                </a>
                                                <a type="button" href="/hapusPengajuan/{{ $item->id }}"
                                                    class="btn-sm btn-inverse-danger btn-rounded m-lg-1"
                                                    data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            @endif
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
