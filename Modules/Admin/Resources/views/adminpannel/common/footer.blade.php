<!-- plugins:js -->
<script src="{{ asset('theme/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('theme/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('theme/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('theme/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('theme/js/off-canvas.js') }}"></script>
<script src="{{ asset('theme/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('theme/js/template.js') }}"></script>
<script src="{{ asset('theme/js/settings.js') }}"></script>
<script src="{{ asset('theme/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('theme/js/dashboard.js') }}"></script>
<script src="{{ asset('theme/js/Chart.roundedBarCharts.js') }}"></script>
<!-- End custom js for this page-->

  <script src="{{asset('theme/jquery.min.js')}}"></script>
  <script src="{{asset('theme/bootstrap.min.js')}}"></script>

  <script src="{{asset('theme/jquery.validate.min.js')}}"></script>
  <script src="{{asset('theme/additional-methods.min.js')}}"></script>

  <script src="https://cdn.tiny.cloud/1/d5xkm37lhhdhglxdlbmt0eg9ug9mkwhcne5zrfikmlq7qxoi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


  <script>


    tinymce.init({
            selector : '.editor-tinymce',
            height: 250,
            directionality : "ltr",
            plugins : 'advlist autolink lists link charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table contextmenu paste code image codesample',
            toolbar : 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image codesample',

            images_upload_url : "{{ route('save_tinymce_image') }}",
            automatic_uploads : false,
            relative_urls : false,

            images_upload_handler : function(blobInfo, success, failure) {
                var xhr, formData;

                xhr = new XMLHttpRequest();


                xhr.withCredentials = false;
                xhr.open('POST', "{{ route('save_tinymce_image') }}",true);

                var generateToken = '{{ csrf_token() }}';
                xhr.setRequestHeader("X-CSRF-Token", generateToken);

                xhr.onload = function(data) {

                    var json;

                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.file_path != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.file_path);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);
            },
        });
    </script>
