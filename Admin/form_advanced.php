<?php
$title  ="Load Entry";
$_csheet= 0;
$_cjava = 1;
$_sheet = 0;
$_script= "D";
include'Config.php';
require'sconfig.php';
require'usrctrl.php';
require'images/rec.php'; ?>
<?php require("Template/header.php"); ?>
<!---------body.php---------------->

<?php require("Template/body.php"); ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form advanced</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
        
             


            </div>




               

              

                <!-- image cropping -->
                <div class="container cropper">
                  <div class="row">
                    <div class="col-md-9">
                      <div class="img-container">
                        <img id="image" src="images/picture2.jpg" alt="Picture">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="docs-preview clearfix">
                        <div class="img-preview preview-lg"></div>
                        <div class="img-preview preview-md"></div>
                        <div class="img-preview preview-sm"></div>
                        <div class="img-preview preview-xs"></div>
                      </div>

                      <div class="docs-data">
                        <div class="input-group input-group-sm">
                          <label class="input-group-addon" for="dataX">X</label>
                          <input type="text" class="form-control" id="dataX" placeholder="x">
                          <span class="input-group-addon">px</span>
                        </div>
                        <div class="input-group input-group-sm">
                          <label class="input-group-addon" for="dataY">Y</label>
                          <input type="text" class="form-control" id="dataY" placeholder="y">
                          <span class="input-group-addon">px</span>
                        </div>
                        <div class="input-group input-group-sm">
                          <label class="input-group-addon" for="dataWidth">Width</label>
                          <input type="text" class="form-control" id="dataWidth" placeholder="width">
                          <span class="input-group-addon">px</span>
                        </div>
                        <div class="input-group input-group-sm">
                          <label class="input-group-addon" for="dataHeight">Height</label>
                          <input type="text" class="form-control" id="dataHeight" placeholder="height">
                          <span class="input-group-addon">px</span>
                        </div>
                        <div class="input-group input-group-sm">
                          <label class="input-group-addon" for="dataRotate">Rotate</label>
                          <input type="text" class="form-control" id="dataRotate" placeholder="rotate">
                          <span class="input-group-addon">deg</span>
                        </div>
                        <div class="input-group input-group-sm">
                          <label class="input-group-addon" for="dataScaleX">ScaleX</label>
                          <input type="text" class="form-control" id="dataScaleX" placeholder="scaleX">
                        </div>
                        <div class="input-group input-group-sm">
                          <label class="input-group-addon" for="dataScaleY">ScaleY</label>
                          <input type="text" class="form-control" id="dataScaleY" placeholder="scaleY">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9 docs-buttons">
                      <!-- <h3 class="page-header">Toolbar:</h3> -->
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="move" title="Move">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setDragMode&quot;, &quot;move&quot;)">
                            <span class="fa fa-arrows"></span>
                          </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="crop" title="Crop">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setDragMode&quot;, &quot;crop&quot;)">
                            <span class="fa fa-crop"></span>
                          </span>
                        </button>
                      </div>

                      <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;zoom&quot;, 0.1)">
                            <span class="fa fa-search-plus"></span>
                          </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;zoom&quot;, -0.1)">
                            <span class="fa fa-search-minus"></span>
                          </span>
                        </button>
                      </div>

                      <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Move Left">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;move&quot;, -10, 0)">
                            <span class="fa fa-arrow-left"></span>
                          </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Move Right">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;move&quot;, 10, 0)">
                            <span class="fa fa-arrow-right"></span>
                          </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Move Up">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;move&quot;, 0, -10)">
                            <span class="fa fa-arrow-up"></span>
                          </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Move Down">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;move&quot;, 0, 10)">
                            <span class="fa fa-arrow-down"></span>
                          </span>
                        </button>
                      </div>

                      <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;rotate&quot;, -45)">
                            <span class="fa fa-rotate-left"></span>
                          </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;rotate&quot;, 45)">
                            <span class="fa fa-rotate-right"></span>
                          </span>
                        </button>
                      </div>

                      <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Flip Horizontal">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;scaleX&quot;, -1)">
                            <span class="fa fa-arrows-h"></span>
                          </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Flip Vertical">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;scaleY&quot;, -1)">
                            <span class="fa fa-arrows-v"></span>
                          </span>
                        </button>
                      </div>

                      <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="crop" title="Crop">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;crop&quot;)">
                            <span class="fa fa-check"></span>
                          </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="clear" title="Clear">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;clear&quot;)">
                            <span class="fa fa-remove"></span>
                          </span>
                        </button>
                      </div>

                      <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="disable" title="Disable">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;disable&quot;)">
                            <span class="fa fa-lock"></span>
                          </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="enable" title="Enable">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;enable&quot;)">
                            <span class="fa fa-unlock"></span>
                          </span>
                        </button>
                      </div>

                      <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-method="reset" title="Reset">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;reset&quot;)">
                            <span class="fa fa-refresh"></span>
                          </span>
                        </button>
                        <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
                          <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
                          <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">
                            <span class="fa fa-upload"></span>
                          </span>
                        </label>
                        <button type="button" class="btn btn-primary" data-method="destroy" title="Destroy">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;destroy&quot;)">
                            <span class="fa fa-power-off"></span>
                          </span>
                        </button>
                      </div>

                      <div class="btn-group btn-group-crop">
                        <button type="button" class="btn btn-primary" data-method="getCroppedCanvas">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getCroppedCanvas&quot;)">
                            Get Cropped Canvas
                          </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 160, &quot;height&quot;: 90 }">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getCroppedCanvas&quot;, { width: 160, height: 90 })">
                            160&times;90
                          </span>
                        </button>
                        <button type="button" class="btn btn-primary" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 320, &quot;height&quot;: 180 }">
                          <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getCroppedCanvas&quot;, { width: 320, height: 180 })">
                            320&times;180
                          </span>
                        </button>
                      </div>

                      <!-- Show the cropped image in modal -->
                      <div class="modal fade docs-cropped" id="getCroppedCanvasModal" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="getCroppedCanvasTitle">Cropped</h4>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.png">Download</a>
                            </div>
                          </div>
                        </div>
                      </div><!-- /.modal -->

                      <button type="button" class="btn btn-primary" data-method="getData" data-option data-target="#putData">
                        <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getData&quot;)">
                          Get Data
                        </span>
                      </button>
                      <button type="button" class="btn btn-primary" data-method="setData" data-target="#putData">
                        <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setData&quot;, data)">
                          Set Data
                        </span>
                      </button>
                      <button type="button" class="btn btn-primary" data-method="getContainerData" data-option data-target="#putData">
                        <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getContainerData&quot;)">
                          Get Container Data
                        </span>
                      </button>
                      <button type="button" class="btn btn-primary" data-method="getImageData" data-option data-target="#putData">
                        <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getImageData&quot;)">
                          Get Image Data
                        </span>
                      </button>
                      <button type="button" class="btn btn-primary" data-method="getCanvasData" data-option data-target="#putData">
                        <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getCanvasData&quot;)">
                          Get Canvas Data
                        </span>
                      </button>
                      <button type="button" class="btn btn-primary" data-method="setCanvasData" data-target="#putData">
                        <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setCanvasData&quot;, data)">
                          Set Canvas Data
                        </span>
                      </button>
                      <button type="button" class="btn btn-primary" data-method="getCropBoxData" data-option data-target="#putData">
                        <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;getCropBoxData&quot;)">
                          Get Crop Box Data
                        </span>
                      </button>
                      <button type="button" class="btn btn-primary" data-method="setCropBoxData" data-target="#putData">
                        <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setCropBoxData&quot;, data)">
                          Set Crop Box Data
                        </span>
                      </button>
                      <button type="button" class="btn btn-primary" data-method="moveTo" data-option="0">
                        <span class="docs-tooltip" data-toggle="tooltip" title="cropper.moveTo(0)">
                          0,0
                        </span>
                      </button>
                      <button type="button" class="btn btn-primary" data-method="zoomTo" data-option="1">
                        <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoomTo(1)">
                          100%
                        </span>
                      </button>
                      <button type="button" class="btn btn-primary" data-method="rotateTo" data-option="180">
                        <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotateTo(180)">
                          180°
                        </span>
                      </button>
                      <input type="text" class="form-control" id="putData" placeholder="Get data to here or set data with this value">
                    </div><!-- /.docs-buttons -->

                    <div class="col-md-3 docs-toggles">
                      <!-- <h3 class="page-header">Toggles:</h3> -->
                      <div class="btn-group btn-group-justified" data-toggle="buttons">
                        <label class="btn btn-primary active">
                          <input type="radio" class="sr-only" id="aspectRatio0" name="aspectRatio" value="1.7777777777777777">
                          <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 16 / 9">
                            16:9
                          </span>
                        </label>
                        <label class="btn btn-primary">
                          <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.3333333333333333">
                          <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 4 / 3">
                            4:3
                          </span>
                        </label>
                        <label class="btn btn-primary">
                          <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1">
                          <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 1 / 1">
                            1:1
                          </span>
                        </label>
                        <label class="btn btn-primary">
                          <input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="0.6666666666666666">
                          <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 2 / 3">
                            2:3
                          </span>
                        </label>
                        <label class="btn btn-primary">
                          <input type="radio" class="sr-only" id="aspectRatio4" name="aspectRatio" value="NaN">
                          <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: NaN">
                            Free
                          </span>
                        </label>
                      </div>

                      <div class="btn-group btn-group-justified" data-toggle="buttons">
                        <label class="btn btn-primary active">
                          <input type="radio" class="sr-only" id="viewMode0" name="viewMode" value="0" checked>
                          <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 0">
                            VM0
                          </span>
                        </label>
                        <label class="btn btn-primary">
                          <input type="radio" class="sr-only" id="viewMode1" name="viewMode" value="1">
                          <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 1">
                            VM1
                          </span>
                        </label>
                        <label class="btn btn-primary">
                          <input type="radio" class="sr-only" id="viewMode2" name="viewMode" value="2">
                          <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 2">
                            VM2
                          </span>
                        </label>
                        <label class="btn btn-primary">
                          <input type="radio" class="sr-only" id="viewMode3" name="viewMode" value="3">
                          <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 3">
                            VM3
                          </span>
                        </label>
                      </div>

                      <div class="dropdown dropup docs-options">
                        <button type="button" class="btn btn-primary btn-block dropdown-toggle" id="toggleOptions" data-toggle="dropdown" aria-expanded="true">
                          Toggle Options
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="toggleOptions" role="menu">
                          <li role="presentation">
                            <label class="checkbox-inline">
                              <input type="checkbox" name="responsive" checked>
                              responsive
                            </label>
                          </li>
                          <li role="presentation">
                            <label class="checkbox-inline">
                              <input type="checkbox" name="restore" checked>
                              restore
                            </label>
                          </li>
                          <li role="presentation">
                            <label class="checkbox-inline">
                              <input type="checkbox" name="checkCrossOrigin" checked>
                              checkCrossOrigin
                            </label>
                          </li>
                          <li role="presentation">
                            <label class="checkbox-inline">
                              <input type="checkbox" name="checkOrientation" checked>
                              checkOrientation
                            </label>
                          </li>

                          <li role="presentation">
                            <label class="checkbox-inline">
                              <input type="checkbox" name="modal" checked>
                              modal
                            </label>
                          </li>
                          <li role="presentation">
                            <label class="checkbox-inline">
                              <input type="checkbox" name="guides" checked>
                              guides
                            </label>
                          </li>
                          <li role="presentation">
                            <label class="checkbox-inline">
                              <input type="checkbox" name="center" checked>
                              center
                            </label>
                          </li>
                          <li role="presentation">
                            <label class="checkbox-inline">
                              <input type="checkbox" name="highlight" checked>
                              highlight
                            </label>
                          </li>
                          <li role="presentation">
                            <label class="checkbox-inline">
                              <input type="checkbox" name="background" checked>
                              background
                            </label>
                          </li>

                          <li role="presentation">
                            <label class="checkbox-inline">
                              <input type="checkbox" name="autoCrop" checked>
                              autoCrop
                            </label>
                          </li>
                          <li role="presentation">
                            <label class="checkbox-inline">
                              <input type="checkbox" name="movable" checked>
                              movable
                            </label>
                          </li>
                          <li role="presentation">
                            <label class="checkbox-inline">
                              <input type="checkbox" name="rotatable" checked>
                              rotatable
                            </label>
                          </li>
                          <li role="presentation">
                            <label class="checkbox-inline">
                              <input type="checkbox" name="scalable" checked>
                              scalable
                            </label>
                          </li>
                          <li role="presentation">
                            <label class="checkbox-inline">
                              <input type="checkbox" name="zoomable" checked>
                              zoomable
                            </label>
                          </li>
                          <li role="presentation">
                            <label class="checkbox-inline">
                              <input type="checkbox" name="zoomOnTouch" checked>
                              zoomOnTouch
                            </label>
                          </li>
                          <li role="presentation">
                            <label class="checkbox-inline">
                              <input type="checkbox" name="zoomOnWheel" checked>
                              zoomOnWheel
                            </label>
                          </li>
                          <li role="presentation">
                            <label class="checkbox-inline">
                              <input type="checkbox" name="cropBoxMovable" checked>
                              cropBoxMovable
                            </label>
                          </li>
                          <li role="presentation">
                            <label class="checkbox-inline">
                              <input type="checkbox" name="cropBoxResizable" checked>
                              cropBoxResizable
                            </label>
                          </li>
                          <li role="presentation">
                            <label class="checkbox-inline">
                              <input type="checkbox" name="toggleDragModeOnDblclick" checked>
                              toggleDragModeOnDblclick
                            </label>
                          </li>
                        </ul>
                      </div><!-- /.dropdown -->

                      <a class="btn btn-default btn-block" data-toggle="tooltip" href="https://fengyuanchen.github.io/cropperjs" title="Cropper without jQuery">Cropper.js</a>

                    </div><!-- /.docs-toggles -->
                  </div>
                </div>
                <!-- /image cropping -->
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
           <?php require("Template/footer.php"); ?>

    <!-- bootstrap-daterangepicker -->
    <script>
      $(document).ready(function() {
        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange_right span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        };

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2015',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'right',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };

        $('#reportrange_right span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

        $('#reportrange_right').daterangepicker(optionSet1, cb);

        $('#reportrange_right').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange_right').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange_right').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange_right').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });

        $('#options1').click(function() {
          $('#reportrange_right').data('daterangepicker').setOptions(optionSet1, cb);
        });

        $('#options2').click(function() {
          $('#reportrange_right').data('daterangepicker').setOptions(optionSet2, cb);
        });

        $('#destroy').click(function() {
          $('#reportrange_right').data('daterangepicker').remove();
        });

      });
    </script>

    <script>
      $(document).ready(function() {
        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        };

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2015',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });
        $('#options1').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
          $('#reportrange').data('daterangepicker').remove();
        });
      });
    </script>

    <script>
      $(document).ready(function() {
        $('#single_cal1').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_1"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal2').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_2"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal3').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_3"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal4').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>

    <script>
      $(document).ready(function() {
        $('#reservation').daterangepicker(null, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->

    <!-- Ion.RangeSlider -->
    <script>
      $(document).ready(function() {
        $("#range_27").ionRangeSlider({
          type: "double",
          min: 1000000,
          max: 2000000,
          grid: true,
          force_edges: true
        });
        $("#range").ionRangeSlider({
          hide_min_max: true,
          keyboard: true,
          min: 0,
          max: 5000,
          from: 1000,
          to: 4000,
          type: 'double',
          step: 1,
          prefix: "$",
          grid: true
        });
        $("#range_25").ionRangeSlider({
          type: "double",
          min: 1000000,
          max: 2000000,
          grid: true
        });
        $("#range_26").ionRangeSlider({
          type: "double",
          min: 0,
          max: 10000,
          step: 500,
          grid: true,
          grid_snap: true
        });
        $("#range_31").ionRangeSlider({
          type: "double",
          min: 0,
          max: 100,
          from: 30,
          to: 70,
          from_fixed: true
        });
        $(".range_min_max").ionRangeSlider({
          type: "double",
          min: 0,
          max: 100,
          from: 30,
          to: 70,
          max_interval: 50
        });
        $(".range_time24").ionRangeSlider({
          min: +moment().subtract(12, "hours").format("X"),
          max: +moment().format("X"),
          from: +moment().subtract(6, "hours").format("X"),
          grid: true,
          force_edges: true,
          prettify: function(num) {
            var m = moment(num, "X");
            return m.format("Do MMMM, HH:mm");
          }
        });
      });
    </script>
    <!-- /Ion.RangeSlider -->

    <!-- Bootstrap Colorpicker -->
    <script>
      $(document).ready(function() {
        $('.demo1').colorpicker();
        $('.demo2').colorpicker();

        $('#demo_forceformat').colorpicker({
            format: 'rgba',
            horizontal: true
        });

        $('#demo_forceformat3').colorpicker({
            format: 'rgba',
        });

        $('.demo-auto').colorpicker();
      });
    </script>
    <!-- /Bootstrap Colorpicker -->

    <!-- jquery.inputmask -->
    <script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>
    <!-- /jquery.inputmask -->

    <!-- jQuery Knob -->
    <script>
      $(function($) {

        $(".knob").knob({
          change: function(value) {
            //console.log("change : " + value);
          },
          release: function(value) {
            //console.log(this.$.attr('value'));
            console.log("release : " + value);
          },
          cancel: function() {
            console.log("cancel : ", this);
          },
          /*format : function (value) {
           return value + '%';
           },*/
          draw: function() {

            // "tron" case
            if (this.$.data('skin') == 'tron') {

              this.cursorExt = 0.3;

              var a = this.arc(this.cv) // Arc
                ,
                pa // Previous arc
                , r = 1;

              this.g.lineWidth = this.lineWidth;

              if (this.o.displayPrevious) {
                pa = this.arc(this.v);
                this.g.beginPath();
                this.g.strokeStyle = this.pColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
                this.g.stroke();
              }

              this.g.beginPath();
              this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
              this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
              this.g.stroke();

              this.g.lineWidth = 2;
              this.g.beginPath();
              this.g.strokeStyle = this.o.fgColor;
              this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
              this.g.stroke();

              return false;
            }
          }
        });

        // Example of infinite knob, iPod click wheel
        var v, up = 0,
          down = 0,
          i = 0,
          $idir = $("div.idir"),
          $ival = $("div.ival"),
          incr = function() {
            i++;
            $idir.show().html("+").fadeOut();
            $ival.html(i);
          },
          decr = function() {
            i--;
            $idir.show().html("-").fadeOut();
            $ival.html(i);
          };
        $("input.infinite").knob({
          min: 0,
          max: 20,
          stopper: false,
          change: function() {
            if (v > this.cv) {
              if (up) {
                decr();
                up = 0;
              } else {
                up = 1;
                down = 0;
              }
            } else {
              if (v < this.cv) {
                if (down) {
                  incr();
                  down = 0;
                } else {
                  down = 1;
                  up = 0;
                }
              }
            }
            v = this.cv;
          }
        });
      });
    </script>
    <!-- /jQuery Knob -->

    <!-- Cropper -->
    <script>
      $(document).ready(function() {
        var $image = $('#image');
        var $download = $('#download');
        var $dataX = $('#dataX');
        var $dataY = $('#dataY');
        var $dataHeight = $('#dataHeight');
        var $dataWidth = $('#dataWidth');
        var $dataRotate = $('#dataRotate');
        var $dataScaleX = $('#dataScaleX');
        var $dataScaleY = $('#dataScaleY');
        var options = {
              aspectRatio: 16 / 9,
              preview: '.img-preview',
              crop: function (e) {
                $dataX.val(Math.round(e.x));
                $dataY.val(Math.round(e.y));
                $dataHeight.val(Math.round(e.height));
                $dataWidth.val(Math.round(e.width));
                $dataRotate.val(e.rotate);
                $dataScaleX.val(e.scaleX);
                $dataScaleY.val(e.scaleY);
              }
            };


        // Tooltip
        $('[data-toggle="tooltip"]').tooltip();


        // Cropper
        $image.on({
          'build.cropper': function (e) {
            console.log(e.type);
          },
          'built.cropper': function (e) {
            console.log(e.type);
          },
          'cropstart.cropper': function (e) {
            console.log(e.type, e.action);
          },
          'cropmove.cropper': function (e) {
            console.log(e.type, e.action);
          },
          'cropend.cropper': function (e) {
            console.log(e.type, e.action);
          },
          'crop.cropper': function (e) {
            console.log(e.type, e.x, e.y, e.width, e.height, e.rotate, e.scaleX, e.scaleY);
          },
          'zoom.cropper': function (e) {
            console.log(e.type, e.ratio);
          }
        }).cropper(options);


        // Buttons
        if (!$.isFunction(document.createElement('canvas').getContext)) {
          $('button[data-method="getCroppedCanvas"]').prop('disabled', true);
        }

        if (typeof document.createElement('cropper').style.transition === 'undefined') {
          $('button[data-method="rotate"]').prop('disabled', true);
          $('button[data-method="scale"]').prop('disabled', true);
        }


        // Download
        if (typeof $download[0].download === 'undefined') {
          $download.addClass('disabled');
        }


        // Options
        $('.docs-toggles').on('change', 'input', function () {
          var $this = $(this);
          var name = $this.attr('name');
          var type = $this.prop('type');
          var cropBoxData;
          var canvasData;

          if (!$image.data('cropper')) {
            return;
          }

          if (type === 'checkbox') {
            options[name] = $this.prop('checked');
            cropBoxData = $image.cropper('getCropBoxData');
            canvasData = $image.cropper('getCanvasData');

            options.built = function () {
              $image.cropper('setCropBoxData', cropBoxData);
              $image.cropper('setCanvasData', canvasData);
            };
          } else if (type === 'radio') {
            options[name] = $this.val();
          }

          $image.cropper('destroy').cropper(options);
        });


        // Methods
        $('.docs-buttons').on('click', '[data-method]', function () {
          var $this = $(this);
          var data = $this.data();
          var $target;
          var result;

          if ($this.prop('disabled') || $this.hasClass('disabled')) {
            return;
          }

          if ($image.data('cropper') && data.method) {
            data = $.extend({}, data); // Clone a new one

            if (typeof data.target !== 'undefined') {
              $target = $(data.target);

              if (typeof data.option === 'undefined') {
                try {
                  data.option = JSON.parse($target.val());
                } catch (e) {
                  console.log(e.message);
                }
              }
            }

            result = $image.cropper(data.method, data.option, data.secondOption);

            switch (data.method) {
              case 'scaleX':
              case 'scaleY':
                $(this).data('option', -data.option);
                break;

              case 'getCroppedCanvas':
                if (result) {

                  // Bootstrap's Modal
                  $('#getCroppedCanvasModal').modal().find('.modal-body').html(result);

                  if (!$download.hasClass('disabled')) {
                    $download.attr('href', result.toDataURL());
                  }
                }

                break;
            }

            if ($.isPlainObject(result) && $target) {
              try {
                $target.val(JSON.stringify(result));
              } catch (e) {
                console.log(e.message);
              }
            }

          }
        });

        // Keyboard
        $(document.body).on('keydown', function (e) {
          if (!$image.data('cropper') || this.scrollTop > 300) {
            return;
          }

          switch (e.which) {
            case 37:
              e.preventDefault();
              $image.cropper('move', -1, 0);
              break;

            case 38:
              e.preventDefault();
              $image.cropper('move', 0, -1);
              break;

            case 39:
              e.preventDefault();
              $image.cropper('move', 1, 0);
              break;

            case 40:
              e.preventDefault();
              $image.cropper('move', 0, 1);
              break;
          }
        });

        // Import image
        var $inputImage = $('#inputImage');
        var URL = window.URL || window.webkitURL;
        var blobURL;

        if (URL) {
          $inputImage.change(function () {
            var files = this.files;
            var file;

            if (!$image.data('cropper')) {
              return;
            }

            if (files && files.length) {
              file = files[0];

              if (/^image\/\w+$/.test(file.type)) {
                blobURL = URL.createObjectURL(file);
                $image.one('built.cropper', function () {

                  // Revoke when load complete
                  URL.revokeObjectURL(blobURL);
                }).cropper('reset').cropper('replace', blobURL);
                $inputImage.val('');
              } else {
                window.alert('Please choose an image file.');
              }
            }
          });
        } else {
          $inputImage.prop('disabled', true).parent().addClass('disabled');
        }
      });
    </script>
    <!-- /Cropper -->
  </body>
</html>