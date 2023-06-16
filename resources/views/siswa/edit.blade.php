@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content center">
      <div class="col-md-12">
        @include('layouts/_flash')
        <div class="card">
          <div class="card-header">
            Data Siswa
          </div>
          <div class="card-body">
            <form action="{{ route('siswa.update', $siswa->id) }}" method="post">
              @csrf
              @method('put')
              <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $siswa->name }}">
                @error('nama')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3">
              <label class="form-label">Nomor Induk Siswa</label>
              <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ $siswa->nis }}">
              @error('nis')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Jenis Kelamin</label>
              <div class="form-check">
                <input type="radio" class="form-check-input @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" value="Laki-Laki" @if ($siswa->jenis_kelamin == 'Laki-Laki') checked @endif>
                <label class="form-check-label">Laki-Laki</label>
              </div>
              <div class="form-check">
                <input type="radio" class="form-check-input @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" value="Perempuan" @if ($siswa->jenis_kelamin == 'Perempuan') checked @endif>
                <label class="form-check-label">Perempuan</label>
              </div>
              @error('jenis_kelamin')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Agama</label>
              <select name="agama" class="form-select @error('agama') is-invalid @enderror">
                <option >Pilih Salah Satu</option>
                <option value="Islam" {{ $siswa->agama == 'Islam'? 'selected' : ''}}>Islam</option>
                <option value="Kristen" {{ $siswa->agama == 'Kristen' ? 'selected' : ''}}>Kristen</option>
                <option value="Budha" {{ $siswa->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                <option value="Hindu" {{ $siswa->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                <option value="Khatolik" {{ $siswa->agama == 'Khatolik' ? 'selected' : ''}}>Khatolik</option>
              </select>
              @error('agama')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{ $siswa->tgl_lahir }}">
              @error('tgl_lahir')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label">Alamat</label>
              <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat">{{ $siswa->alamat }}</textarea>
              @error('alamat')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="mb-3">
              <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Save</button>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection