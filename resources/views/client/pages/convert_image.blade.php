@extends('client.layout.master')

@section('style-extend')
    <style>
        .form-group {
            background: #fff;
            box-shadow: 0 1px 1px darkgrey;
            display: flex;
            padding: 10px;
            border: 1px solid rgba(0, 0, 0, .06);
        }

        .remove-image {
            background: transparent;
            color: #c64141;
        }

        .modal {
            top: 100px;
        }

        .modal-body {
            display: flex;
            justify-content: left;
        }

        .image-container {
            border: 1px solid rgba(0, 0, 0, .06);
            border-radius: 5px;
            box-shadow: 0 1px 1px darkgrey;
            padding: 10px;
        }

        .image-container img {
            height: 50%;
            object-fit: scale-down;
        }

        .text-image-name {
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    <div class="hero-meta hero-title-post mt-5 mb-1 text-center">
        <h1>{{ __('common.lbl_convert_image_to_webp_nav') }}</h1>
        <h2>{{ __('home.lbl_desciption') }}</h2>
        <br>
    </div>
    <div class="container mt-5" style="min-height: 48vh">
        <h3><b>{{ __('image.lbl_select_image') }}</b></h3>
        <hr>
        <form id="convertImageForm" enctype="multipart/form-data">
            @csrf
            <div id="more-file"></div>
            <hr>
            <div class="">
                <button type="button" class="btn btn-secondary mr-1 mb-1" id="addImage">
                    <i class="fas fa-file-upload mr-1"></i>{{ __('image.btn_add_more_file') }}
                </button>
                <button type="button" class="btn btn-primary mr-1 mb-1" id="convertToWebP">
                    <i class="fa fa-fw fa-sync-alt mr-1"></i>{{ __('image.btn_convert') }}
                </button>
                <button type="button" class="btn btn-success btn-download mr-1 mb-1" id="download-result">
                    <i class="fa fas fa-solid fa-download mr-1"></i>{{ __('image.btn_download') }}
                </button>
            </div>
        </form>
    </div>

    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Converted Images</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script-extend')
    <script>
        $(document).ready(function () {
            const downloadResultButton = $('#download-result')
            downloadResultButton.hide();

            $('#addImage').click(function () {
                appendInput();
            });
            appendInput();

            $(document).on('click', '.remove-image', function () {
                $(this).parent().remove();
            });

            function appendInput() {
                var inputWrapper = $('<div class="form-group"></div>');
                var inputFile = $('<input type="file" required class="form-control-file mt-2" name="image[]" accept="image/*">');
                var removeButton = $('<button type="button" class="btn remove-image ml-2"><i class="fa fa-times"></i></button>');
                inputWrapper.append(inputFile);
                inputWrapper.append(removeButton);
                $('#more-file').append(inputWrapper);
            }

            $('#convertToWebP').click(function () {
                var formData = new FormData($('#convertImageForm')[0]);
                $.ajax({
                    url: "{{ route('convert_image_to_webp') }}",
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.error) {
                            alert('Error: ' + response.error + ' Pls try again other images!');
                        } else {
                            showDownloadButtonAndModal();
                            showImages(response.images);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                        alert('Error: Unable to connect to server. Pls try again other images!');
                    }
                });
            });

            function showDownloadButtonAndModal() {
                downloadResultButton.show();
                downloadResultButton.click(function () {
                    $('#imageModal').modal('show');
                });
            }

            function showImages(images) {
                var modalBody = $('#imageModal .modal-body');
                modalBody.empty();
                images.forEach(function (image) {
                    var img = $('<img>').attr('src', image.path).addClass('img-fluid mb-3');
                    var name = $('<p>').text('Name: ' + image.name).addClass('text-truncate text-image-name');
                    var downloadButton = $('<a>').attr('href', image.path).attr('download', image.name).addClass('btn btn-success').text('Download');
                    var imageContainer = $('<div>').addClass('col-md-3').append(img, name, downloadButton).addClass('image-container mb-3');
                    modalBody.append(imageContainer);
                });
                $('#imageModal').modal('show');
            }
        });
    </script>
@endsection
