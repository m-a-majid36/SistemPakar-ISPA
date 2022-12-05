@extends('backend.layouts.app')
@section('title', 'Edit Penyakit')
@section('content')
    <!-- Breadcrumb -->
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('symptom.index') }}">Penyakit</a></li>
                <li class="breadcrumb-item active">Edit Penyakit</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Edit Penyakit</h3>
                        <a href="{{ route('symptom.index') }}" class="btn btn-info"><i
                                class="fas fa-angle-double-left"></i>&nbsp; {{ 'Kembali' }}</a>
                        <hr>
                        <form class="basic-form" action="{{ route('symptom.update', ['symptom' => $symptom->id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name" required placeholder="Nama Penyakit"
                                    autofocus class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') ? old('name') : $symptom->name }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" id="description" required placeholder="Deskripsi Penyakit"
                                    class="form-control @error('description') is-invalid @enderror">{{ old('description') ? old('description') : $symptom->description }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row mb-3">
                                <div id="accordion-three" class="accordion col-12">
                                    <div class="card-header">
                                        <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne1"
                                            aria-expanded="false" aria-controls="collapseOne1">
                                            <i class="fa" aria-hidden="true"></i> Gejala
                                        </h5>
                                    </div>
                                    <div id="collapseOne1" class="collapse" data-parent="#accordion-three">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" width="1">Pilih</th>
                                                            <th>Gejala</th>
                                                            <th class="text-center" width="200">
                                                                Nilai<br>(Gunakan . untuk desimal)
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($diseases as $disease)
                                                            <tr>
                                                                <th style="vertical-align: middle">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <input type="checkbox"
                                                                                {{ $disease->value ? 'checked' : null }}
                                                                                data-id="{{ $disease->id }}"
                                                                                class="disease-enable">
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <td>{{ $disease->name }}</td>
                                                                <td style="vertical-align: middle">
                                                                    <input type="text" required="false"
                                                                        name="diseases[{{ $disease->id }}]"
                                                                        data-id="{{ $disease->id }}"
                                                                        {{ $disease->value ? null : 'disabled' }}
                                                                        value="{{ $disease->value ?? null }}"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
                                                                        class="disease-score form-control">
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            @error('diseases')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div id="accordion-three" class="accordion col-lg-6 mb-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo2"
                                                aria-expanded="false" aria-controls="collapseTwo2">
                                                <i class="fa" aria-hidden="true"></i> Penyebab
                                            </h5>
                                        </div>
                                        <div id="collapseTwo2" class="collapse" data-parent="#accordion-three">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" width="1">Pilih</th>
                                                                <th>Penyebab</th>
                                                                <th class="text-center">Kategori</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($reasons as $reason)
                                                                <tr>
                                                                    <th style="vertical-align: middle">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox"
                                                                                    {{ $reason->value ? 'checked' : null }}
                                                                                    name="reason[{{ $reason->id }}]"
                                                                                    id="reason[{{ $reason->id }}]"
                                                                                    value="{{ $reason->id }}">
                                                                            </div>
                                                                        </div>
                                                                    </th>
                                                                    <td>{{ $reason->name }}</td>
                                                                    <td class="text-center">
                                                                        @if ($reason->category == 'B')
                                                                            <span
                                                                                class="label gradient-6 text-white rounded">Bakteri</span>
                                                                        @elseif ($reason->category == 'V')
                                                                            <span
                                                                                class="label gradient-7 rounded">Virus</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                @error('reasons[]')
                                                                    <div class="invalid-feedback">{{ $message }}
                                                                    </div>
                                                                @enderror
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="accordion-three" class="accordion col-lg-6 mb-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0 collapsed" data-toggle="collapse"
                                                data-target="#collapseThree3" aria-expanded="false"
                                                aria-controls="collapseThree3"><i class="fa" aria-hidden="true"></i>
                                                Perawatan</h5>
                                        </div>
                                        <div id="collapseThree3" class="collapse" data-parent="#accordion-three">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" width="1">Pilih</th>
                                                                <th>Perawatan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($treatments as $treatment)
                                                                <tr>
                                                                    <th style="vertical-align: middle">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">
                                                                                <input type="checkbox"
                                                                                    {{ $treatment->value ? 'checked' : null }}
                                                                                    name="treatment[{{ $treatment->id }}]"
                                                                                    id="treatment[{{ $treatment->id }}]"
                                                                                    value="{{ $treatment->id }}">
                                                                            </div>
                                                                        </div>
                                                                    </th>
                                                                    <td>{{ $treatment->name }}</td>
                                                                </tr>
                                                                @error('treatment[]')
                                                                    <div class="invalid-feedback">{{ $message }}
                                                                    </div>
                                                                @enderror
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Ubah Penyakit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(".disease-enable").on('click', function() {
                let id = $(this).attr('data-id')
                let enabled = $(this).is(":checked")
                $('.disease-score[data-id="' + id + '"]').attr('disabled', !enabled)
                $('.disease-score[data-id="' + id + '"]').val(null)

                if (enabled) {
                    $('.disease-score[data-id="' + id + '"]').setAttribute("required", "");
                } else {
                    $('.disease-score[data-id="' + id + '"]').removeAttribute("required");
                }
            });
        });
    </script>
@endsection
