@extends('backend.layouts.app')
@section('title', 'Data Home')
@section('link')
    <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/css/toastr.min.css') }}">
@endsection
@section('content')
    <!-- Breadcrumb -->
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Pengaturan Home</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Data Tampilan Home</h3>
                        <hr>
                        <div class="basic-form">
                            <form action="{{ route('home.action') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" required
                                            value="{{ $data->email }}"
                                            class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Nomor Telepon</label>
                                        <input type="text" name="phone" id="phone" required
                                            value="{{ $data->phone }}" minlength="8" maxlength="20"
                                            oninput="this.value = this.value.replace(/[^-0-9+() ]/g, '');"
                                            class="form-control @error('phone') is-invalid @enderror">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="twitter">Link Twitter</label>
                                        <input type="text" name="twitter" id="twitter" value="{{ $data->twitter }}"
                                            class="form-control @error('twitter') is-invalid @enderror">
                                        @error('twitter')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="facebook">Link Facebook</label>
                                        <input type="text" name="facebook" id="facebook" value="{{ $data->facebook }}"
                                            class="form-control @error('facebook') is-invalid @enderror">
                                        @error('facebook')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="instagram">Link Instagram</label>
                                        <input type="text" name="instagram" id="instagram"
                                            value="{{ $data->instagram }}"
                                            class="form-control @error('instagram') is-invalid @enderror">
                                        @error('instagram')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="linkedin">Link LinkedIn</label>
                                        <input type="text" name="linkedin" id="linkedin" value="{{ $data->linkedin }}"
                                            class="form-control @error('linkedin') is-invalid @enderror">
                                        @error('linkedin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="main_picture">Main Picture</label>
                                    <input type="hidden" name="oldmain_picture" value="{{ $data->main_picture }}">
                                    @if ($data->main_picture)
                                        <div class="text-center">
                                            <img src="{{ Storage::url($data->main_picture) }}"
                                                class="main_picture-preview img-fluid mb-3 col-sm-5">
                                        </div>
                                    @else
                                        <div class="text-center">
                                            <img class="main_picture-preview img-fluid mb-3 col-sm-5">
                                        </div>
                                    @endif
                                    <div class="custom-file">
                                        <input type="file" id="main_picture" name="main_picture"
                                            onchange="previewmain_picture()"
                                            class="custom-file-input form-control @error('main_picture') is-invalid @enderror">
                                        <label class="custom-file-label"></label>
                                        @error('main_picture')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="main_title">Judul Utama</label>
                                    <input type="text" name="main_title" id="main_title" required
                                        value="{{ $data->main_title }}"
                                        class="form-control @error('main_title') is-invalid @enderror">
                                    @error('main_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="main_subtitle">Main Subtitle</label>
                                    <textarea name="main_subtitle" id="main_subtitle" required
                                        class="form-control @error('main_subtitle') is-invalid @enderror">{{ $data->main_subtitle }}</textarea>
                                    @error('main_subtitle')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="title1">Judul Layanan 1</label>
                                        <input type="text" name="title1" id="title1" required
                                            value="{{ $data->title1 }}"
                                            class="form-control @error('title1') is-invalid @enderror">
                                        @error('title1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="subtitle1">Sub Judul Layanan 1</label>
                                        <textarea name="subtitle1" id="subtitle1" required class="form-control @error('subtitle1') is-invalid @enderror">{{ $data->subtitle1 }}</textarea>
                                        @error('subtitle1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="title2">Judul Layanan 2</label>
                                        <input type="text" name="title2" id="title2" required
                                            value="{{ $data->title2 }}"
                                            class="form-control @error('title2') is-invalid @enderror">
                                        @error('title2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="subtitle2">Sub Judul Layanan 2</label>
                                        <textarea name="subtitle2" id="subtitle2" required class="form-control @error('subtitle2') is-invalid @enderror">{{ $data->subtitle2 }}</textarea>
                                        @error('subtitle2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="title3">Judul Layanan 3</label>
                                        <input type="text" name="title3" id="title3" required
                                            value="{{ $data->title3 }}"
                                            class="form-control @error('title3') is-invalid @enderror">
                                        @error('title3')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="subtitle3">Sub Judul Layanan 3</label>
                                        <textarea name="subtitle3" id="subtitle3" required class="form-control @error('subtitle3') is-invalid @enderror">{{ $data->subtitle1 }}</textarea>
                                        @error('subtitle3')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="second_picture">Gambar Post</label>
                                    <input type="hidden" name="oldsecond_picture" value="{{ $data->second_picture }}">
                                    @if ($data->second_picture)
                                        <div class="text-center">
                                            <img src="{{ Storage::url($data->second_picture) }}"
                                                class="second_picture-preview img-fluid mb-3 col-sm-5">
                                        </div>
                                    @else
                                        <div class="text-center">
                                            <img class="second_picture-preview img-fluid mb-3 col-sm-5">
                                        </div>
                                    @endif
                                    <div class="custom-file">
                                        <input type="file" id="second_picture" name="second_picture"
                                            onchange="previewsecond_picture()"
                                            class="custom-file-input form-control @error('second_picture') is-invalid @enderror">
                                        <label class="custom-file-label"></label>
                                        @error('second_picture')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="second_title">Judul Post</label>
                                        <input type="text" name="second_title" id="second_title" required
                                            value="{{ $data->second_title }}"
                                            class="form-control @error('second_title') is-invalid @enderror">
                                        @error('second_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="second_subtitle">Sub Judul Post</label>
                                        <textarea name="second_subtitle" id="second_subtitle" required
                                            class="form-control @error('second_subtitle') is-invalid @enderror">{{ $data->second_subtitle }}</textarea>
                                        @error('second_subtitle')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="content1_picture">Gambar Layanan 1</label>
                                        <input type="hidden" name="oldcontent1_picture"
                                            value="{{ $data->content1_picture }}">
                                        @if ($data->content1_picture)
                                            <div class="text-center">
                                                <img src="{{ Storage::url($data->content1_picture) }}"
                                                    class="content1_picture-preview img-fluid mb-3 col-sm-5">
                                            </div>
                                        @else
                                            <div class="text-center">
                                                <img class="content1_picture-preview img-fluid mb-3 col-sm-5">
                                            </div>
                                        @endif
                                        <div class="custom-file">
                                            <input type="file" id="content1_picture" name="content1_picture"
                                                onchange="previewcontent1_picture()"
                                                class="custom-file-input form-control @error('content1_picture') is-invalid @enderror">
                                            <label class="custom-file-label"></label>
                                            @error('content1_picture')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="content1_title">Judul Layanan 1</label>
                                        <input type="text" name="content1_title" id="content1_title" required
                                            value="{{ $data->content1_title }}"
                                            class="form-control @error('content1_title') is-invalid @enderror">
                                        @error('content1_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="content1_subtitle">Sub Judul Layanan 1</label>
                                        <textarea name="content1_subtitle" id="content1_subtitle" required
                                            class="form-control @error('content1_subtitle') is-invalid @enderror">{{ $data->content1_subtitle }}</textarea>
                                        @error('content1_subtitle')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="content2_picture">Gambar Layanan 2</label>
                                        <input type="hidden" name="oldcontent2_picture"
                                            value="{{ $data->content2_picture }}">
                                        @if ($data->content2_picture)
                                            <div class="text-center">
                                                <img src="{{ Storage::url($data->content2_picture) }}"
                                                    class="content2_picture-preview img-fluid mb-3 col-sm-5">
                                            </div>
                                        @else
                                            <div class="text-center">
                                                <img class="content2_picture-preview img-fluid mb-3 col-sm-5">
                                            </div>
                                        @endif
                                        <div class="custom-file">
                                            <input type="file" id="content2_picture" name="content2_picture"
                                                onchange="previewcontent2_picture()"
                                                class="custom-file-input form-control @error('content2_picture') is-invalid @enderror">
                                            <label class="custom-file-label"></label>
                                            @error('content2_picture')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="content2_title">Judul Layanan 2</label>
                                        <input type="text" name="content2_title" id="content2_title" required
                                            value="{{ $data->content2_title }}"
                                            class="form-control @error('content2_title') is-invalid @enderror">
                                        @error('content2_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="content2_subtitle">Sub Judul Layanan 2</label>
                                        <textarea name="content2_subtitle" id="content2_subtitle" required
                                            class="form-control @error('content2_subtitle') is-invalid @enderror">{{ $data->content2_subtitle }}</textarea>
                                        @error('content2_subtitle')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="content3_picture">Gambar Layanan 3</label>
                                        <input type="hidden" name="oldcontent3_picture"
                                            value="{{ $data->content3_picture }}">
                                        @if ($data->content3_picture)
                                            <div class="text-center">
                                                <img src="{{ Storage::url($data->content3_picture) }}"
                                                    class="content3_picture-preview img-fluid mb-3 col-sm-5">
                                            </div>
                                        @else
                                            <div class="text-center">
                                                <img class="content3_picture-preview img-fluid mb-3 col-sm-5">
                                            </div>
                                        @endif
                                        <div class="custom-file">
                                            <input type="file" id="content3_picture" name="content3_picture"
                                                onchange="previewcontent3_picture()"
                                                class="custom-file-input form-control @error('content3_picture') is-invalid @enderror">
                                            <label class="custom-file-label"></label>
                                            @error('content3_picture')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="content3_title">Judul Layanan 3</label>
                                        <input type="text" name="content3_title" id="content3_title" required
                                            value="{{ $data->content3_title }}"
                                            class="form-control @error('content3_title') is-invalid @enderror">
                                        @error('content3_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="content3_subtitle">Sub Judul Layanan 3</label>
                                        <textarea name="content3_subtitle" id="content3_subtitle" required
                                            class="form-control @error('content3_subtitle') is-invalid @enderror">{{ $data->content3_subtitle }}</textarea>
                                        @error('content3_subtitle')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('backend/plugins/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/toastr/js/toastr.init.js') }}"></script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @elseif (Session::has('error'))
            toastr.error("{{ Session::get('error') }}")
        @endif
    </script>
    <script>
        function previewmain_picture() {
            const main_picture = document.querySelector('#main_picture');
            const main_picturePreview = document.querySelector('.main_picture-preview');

            main_picturePreview.style.display = 'block';
            main_picturePreview.style.margin = 'auto';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(main_picture.files[0])

            oFReader.onload = function(oFREvent) {
                main_picturePreview.src = oFREvent.target.result;
            }
        }

        function previewsecond_picture() {
            const second_picture = document.querySelector('#second_picture');
            const second_picturePreview = document.querySelector('.second_picture-preview');

            second_picturePreview.style.display = 'block';
            second_picturePreview.style.margin = 'auto';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(second_picture.files[0])

            oFReader.onload = function(oFREvent) {
                second_picturePreview.src = oFREvent.target.result;
            }
        }

        function previewcontent1_picture() {
            const content1_picture = document.querySelector('#content1_picture');
            const content1_picturePreview = document.querySelector('.content1_picture-preview');

            content1_picturePreview.style.display = 'block';
            content1_picturePreview.style.margin = 'auto';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(content1_picture.files[0])

            oFReader.onload = function(oFREvent) {
                content1_picturePreview.src = oFREvent.target.result;
            }
        }

        function previewcontent2_picture() {
            const content2_picture = document.querySelector('#content2_picture');
            const content2_picturePreview = document.querySelector('.content2_picture-preview');

            content2_picturePreview.style.display = 'block';
            content2_picturePreview.style.margin = 'auto';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(content2_picture.files[0])

            oFReader.onload = function(oFREvent) {
                content2_picturePreview.src = oFREvent.target.result;
            }
        }

        function previewcontent3_picture() {
            const content3_picture = document.querySelector('#content3_picture');
            const content3_picturePreview = document.querySelector('.content3_picture-preview');

            content3_picturePreview.style.display = 'block';
            content3_picturePreview.style.margin = 'auto';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(content3_picture.files[0])

            oFReader.onload = function(oFREvent) {
                content3_picturePreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
