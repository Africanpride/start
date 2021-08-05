  <!-- Footer -->
  <footer class="footer">
      All Rights Reserved. © {{ now()->year }} <a href="{{ config('app.url') }}"> -
          {{ config('app.name') }} </a>
  </footer>

  <!-- End Footer -->
  </div>
  <!-- End wrapper -->

<!-- data toggle correction -->
<script>
    $(document).ready(function(){
    $('.dropdown-toggle').dropdown()
});
</script>

  <!-- ======= Larapex Charts======= -->
  <script src="{{ asset('/vendor/larapex-charts/apexchart.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


  <!-- ======= SELECT2 ======= -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script type="text/javascript">
      $('.js-example-basic-multiple').select2({
          placeholder: 'Click to Choose a Category',
          allowClear: true,
          theme: 'bootstrap4',
          class: 'theme-input-style input-wrap d-flex align-items-center flex-wrap w-100',
          // tags: true,
          tokenSeparators: ['/', ',', ';', " "]
      });
  </script>

  <!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
  <script src="{{ asset('/backend/assets/js/app.js') }}"></script>
  <script src="{{ asset('/backend/assets/js/jquery.min.js') }}"></script>

  <script src=" {{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"') }}"></script>
  {{-- <script src=" {{ asset('/backend/assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
  <script
      src=" {{ asset('/backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}">
  </script>
  <script src="{{ asset('/backend/assets/js/script.js') }}"></script>

  <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
  <script src="  {{ asset('/backend/assets/plugins/dropzone/dropzone.min.js') }}"></script>
  <script src="  {{ asset('/backend/assets/plugins/dropzone/dropzone.custom.js') }}">
  </script>
  <script src="  {{ asset('/backend/assets/plugins/dropzone/dropzone.new.js') }}"></script>

  <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
  {{-- <script
      src=" {{ asset('/backend/assets/plugins/jquery-repeater/repeater.min.js ' ) }}">
  </script>
  <script
      src=" {{ asset('/backend/assets/plugins/jquery-repeater/custom-repeater.js ' ) }}">
  </script> --}}

  <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
  <script src="{{ asset('/backend/assets/js/custom.project.management.js') }}"></script>
  <script id="dsq-count-scr" src="//sktaeroshutter.disqus.com/count.js" async></script>

  <!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
  <script src=" {{ asset('/backend/assets/plugins/sweetalert2/sweetalert2.all.min.js') }}">
  </script>
  <script src=" {{ asset('/backend/assets/plugins/sweetalert2/sweetalerts.js') }}"></script>
  <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->

  <!-- ======= End BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->
  @stack('modals')

  @livewireScripts

      @stack('scripts')

      <script src="https://cdn.tiny.cloud/1/thd22130oevp2gpc0tmr02w6v9g1wi5pn06lnbm6dm78g0bj/tinymce/5/tinymce.min.js"
          referrerpolicy="origin"></script>

      <script>
          var editor_config = {
              path_absolute: "/",
              selector: '.full-editor',
              relative_urls: false,
              plugins: [
                  "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                  "searchreplace wordcount visualblocks visualchars code fullscreen",
                  "insertdatetime media nonbreaking save table directionality",
                  "emoticons template paste textpattern"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media emoticons",
              file_picker_callback: function (callback, value, meta) {
                  var x = window.innerWidth || document.documentElement.clientWidth || document
                      .getElementsByTagName('body')[0].clientWidth;
                  var y = window.innerHeight || document.documentElement.clientHeight || document
                      .getElementsByTagName('body')[0].clientHeight;

                  var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                  if (meta.filetype == 'image') {
                      cmsURL = cmsURL + "&type=Images";
                  } else {
                      cmsURL = cmsURL + "&type=Files";
                  }

                  tinyMCE.activeEditor.windowManager.openUrl({
                      url: cmsURL,
                      height : "480",
                      title: 'Filemanager',
                      width: x * 0.8,
                      height: y * 3.8,
                      resizable: "yes",
                      close_previous: "no",
                      onMessage: (api, message) => {
                          callback(message.content);
                      }
                  });
              }
          };

          tinymce.init(editor_config);


    </script>
<script>
  // myDropzone is the configuration for the element that has an id attribute
  // with the value my-dropzone (or myDropzone)

  Dropzone.options.myDropzone = {
    paramName: "file",
    // uploadMultiple: true,
    maxFilesize: 12, // MB
    acceptedFiles: ".jpeg,.jpg,.png,.gif,.svg",
    // addRemoveLinks: true,
    timeout: 50000,
    ignoreHiddenFiles: true,
    capture: "camera",
    init: function() {
      this.on("addedfile", function(file) {

        // Create the remove button
        var removeButton = Dropzone.createElement('<button class="btn primary m-2 delete-cursor"><i class="icofont-ui-delete pr-1"></i> Delete</button>');



        // Capture the Dropzone instance as closure.
        var _this = this;

        // Listen to the click event
        removeButton.addEventListener("click", function(e) {
          // Make sure the button click doesn't submit the form:
          e.preventDefault();
          e.stopPropagation();

          // Remove the file preview.
          _this.removeFile(file);
          // If you want to the delete the file on the server as well,
          // you can do the AJAX request here.
        });

        // Add the button to the file preview element.
        file.previewElement.appendChild(removeButton);
      });

    }
  };
</script>


      </body>

      </html>
