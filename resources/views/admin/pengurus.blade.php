@extends('layouts.admin')

@section('konten')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Pengurus</h1>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
@endif

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <button type="button" class="btn btn-primary shadow" data-toggle="modal" data-target="#tambah">Tambah Data</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table dataTable table-bordered" id="myTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Bidang</th>
                        <th>Jabatan</th>
                        <th>Periode</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengurus as $pgr)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pgr->nama }}</td>
                        <td>{{ $pgr->nim }}</td>
                        <td>{{ $pgr->bidang }}</td>
                        <td>{{ $pgr->jabatan }}</td>
                        <td>{{ $pgr->periode }}</td>
                        <td><img src="{{ asset('assets/img/team/'.$pgr->foto) }}" alt="" width="50"></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary shadow" data-toggle="modal" data-target="#edit{{ $pgr->id }}"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-sm btn-danger shadow" data-toggle="modal" data-target="#hapus{{ $pgr->id }}"><i class="fa fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal tambah data-->
<div class="modal fade" id="tambah" tabindex="-1" aria-hidden="true" id="staticBackdrop" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modelHeading">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('tambahanggota') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="nama" >Nama</label>
                        <input type="text" class="form-control required" id="nama" name="nama" placeholder="Masukan Nama" value=""  minlength="2" required="">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="nim" >NIM</label>
                        <input type="text" class="form-control required" id="nim" name="nim" placeholder="Masukan NIM" value=""  minlength="9"  required="">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="bidang">Bidang</label>
                        <input type="text" class="form-control required" id="bidang" name="bidang" placeholder="Masukan Bidang" value=""  minlength="2"  required="">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control required" id="jabatan" name="jabatan" placeholder="Masukan Jabatan" value=""  minlength="2"  required="">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="periode" >Periode</label>
                        <input type="text" class="form-control required" id="periode" name="periode" placeholder="Masukan periode" value=""  minlength="2" required="">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control required" id="foto" placeholder="Pilih Foto" value="" required>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" value="create">Simpan</button>
            </div>
        </form>
    </div>
    </div>
</div>

@endsection

{{-- @section('script')
<script>
        $('#bidang').change(function(){
        var kabID = $(this).val();
        if(kabID){
            $.ajax({
            type:"GET",
            url:"/carijabatan/"+kabID,
            dataType: 'JSON',
            success:function(res){
                if(res){
                    $("#jabatan").empty();
                    $("#jabatan").append('<option>---Pilih Jabatan---</option>');
                    $.each(res,function(jabatan){
                        $("#jabatan").append('<option value="'+jabatan+'">'+jabatan+'</option>');
                    });
                }else{
                $("#jabatan").empty();
                }
            }
            });
        }else{
            $("#jabatan").empty();
        }
    });
</script>
@endsection --}}
