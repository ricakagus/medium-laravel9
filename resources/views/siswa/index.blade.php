@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        @include('layouts/_flash')
        <div class="card">
          <div class="card-header">
            Data siswa
            <a href="{{ route('siswa.create') }}" class="btn btn-sm btn-primary" style="float: right">Tambah Data</a>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <div class="table align-middle" id="dataTabel">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach ($siswa as $data)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->nis }}</td>
                    <td>{{ $data->jenis_kelamin }}</td>
                    <td>{{ $data->agama }}</td>
                    <td>{{ date('d M Y', strtotime($data->tgl_lahir)) }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>
                      <form action="{{ route('siswa.destroy', $data->id) }} method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('siswa.edit', $data->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                        ||
                        <a href="{{ route('siswa.show', $data->id) }}" class="btn btn-sm btn-outline-warning">Show</a>
                        ||
                        <button class="btn btn-sm btn-outline-danger" type="submit" onclick="return confirm('Apakah anda yakin?')">Delete</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection