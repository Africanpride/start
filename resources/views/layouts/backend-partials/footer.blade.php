  <!-- Footer -->
  <footer class="footer">
      All Rights Reserved. © {{ now()->year }} <a href="{{ config('app.url') }}"> -
          {{ config('app.name') }} </a>
  </footer>

  <!-- End Footer -->
  </div>
  <!-- End wrapper -->
   {{-- <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
   <script src="  {{ asset('/backend/assets/plugins/toastr/toastr.min.js') }}"></script>
   <script src="  {{ asset('/backend/assets/plugins/toastr/toastr.js') }}"></script>
   <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= --> --}}

  <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
  <script src="{{ asset('/backend/assets/js/app.js') }}"></script>
  <script src="{{ asset('/backend/assets/js/jquery.min.js') }}"></script>
  <script src=" {{ asset('/backend/assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src=" {{ asset('/backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}">
  </script>
  <script src="{{ asset('/backend/assets/js/script.js') }}"></script>
  <script src="{{ asset('/backend/assets/js/app.js') }}"></script>
  <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->

  {{-- <script src="  {{ asset('public/js/app.js') }}"></script> --}}

  <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
  <script src="  {{ asset('/backend/assets/plugins/apex/apexcharts.min.js') }}"></script>
  <script src="  {{ asset('/backend/assets/plugins/apex/custom-apexcharts.js') }}"></script>
  <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->

  <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
  <script src="  {{ asset('/backend/assets/plugins/dropzone/dropzone.min.js') }}"></script>
  <script src="  {{ asset('/backend/assets/plugins/dropzone/dropzone.custom.js') }}"></script>
  <script src="  {{ asset('/backend/assets/plugins/dropzone/dropzone.new.js') }}"></script>

     <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
     <script src=" {{ asset('/backend/assets/plugins/jquery-repeater/repeater.min.js ' ) }}"></script>
     <script src=" {{ asset('/backend/assets/plugins/jquery-repeater/custom-repeater.js ' ) }}"></script>
     <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->

     <script src="{{ asset('/backend/assets/js/custom.project.management.js') }}"></script>
     <script id="dsq-count-scr" src="//sktaeroshutter.disqus.com/count.js" async></script>

       <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
   <script src=" {{ asset('/backend/assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
   <script src=" {{ asset('/backend/assets/plugins/sweetalert2/sweetalerts.js') }}"></script>
   <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->

  <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
  @stack('modals')

  @livewireScripts

  @stack('scripts')

  {{-- Select2 --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
<script src="https://cdn.tiny.cloud/1/thd22130oevp2gpc0tmr02w6v9g1wi5pn06lnbm6dm78g0bj/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  var editor_config = {
    path_absolute : "/",
    selector: '#full-editor',
    relative_urls: false,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table directionality",
      "emoticons template paste textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media emoticons",
    file_picker_callback : function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };

  tinymce.init(editor_config);
</script>

  </body>

  </html>
