<script src="/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<script src="/js/jquery.slimscroll.js"></script>
<script src="/js/feather.js"></script>
<script src="/js/waves.js"></script>
<script src="/plugins/bower_components/raphael/raphael-min.js"></script>
<script src="/plugins/bower_components/morrisjs/morris.js"></script>
<script src="/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="/plugins/bower_components/peity/jquery.peity.min.js"></script>
<script src="/plugins/bower_components/peity/jquery.peity.init.js"></script>
<script src="/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
<script src="/js/custom.min.js"></script>
<script src="/js/dashboard1.js"></script>
<script src="js/jasny-bootstrap.js"></script>
<script src="js/mask.js"></script>
<script src="/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<script src="/plugins/bower_components/html5-editor/wysihtml5-0.3.0.js"></script>
<script src="/plugins/bower_components/html5-editor/bootstrap-wysihtml5.js"></script>
<script src="/plugins/bower_components/dropzone-master/dist/dropzone.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<script>

    feather.replace()

    jQuery('.mydatepicker').datepicker();

    $(document).ready(function () {
        var customTemplates = {
            custombuttons: function(customOptions) {
                var size = (customOptions.options && customOptions.options.size) ? ' btn-'+customOptions.options.size : '';
                return "<li>" +
                    // "<div class='btn-group'>" +
                    // // "<a class='btn btn-default" + size + "' data-wysihtml5-command='insertHTML' data-wysihtml5-command-value='' title='CTRL+B' tabindex='-1'>upload </a>" +
                    // "<span class='btn-file' '> <i  style = 'line-height:46.5px;'  class='fa fa-file'></i><input type='file' name='uplode_image_file'> </span>" +
                    // "</div>" +
                    "</li>";
            },
        };
        $.fn.wysihtml5.defaultOptions.custombuttons = true;

        $('.textarea_editor').wysihtml5({
            'custombuttons': true, // not necessary due to above but included for completeness.
            'emphasis': true,
            'size': 'sm', // default: none, other options are xs, sm, lg
            
        
            
            parserRules: {
                tags: {
                    strong: {
                        rename_tag: "b"
                    },
                    em: {
                        rename_tag: "i"
                    },
                    i: {},
                    b: {}
                }
            },

            customTemplates: customTemplates
        });
        // $('.textarea_editor').wysihtml5();
        // $.FroalaEditor.DefineIcon('insert', {NAME: 'plus'});
        // $.FroalaEditor.RegisterCommand('insert', {
        //     title: 'Insert HTML',
        //     focus: true,
        //     undo: true,
        //     refreshAfterCallback: true,
        //     callback: function () {
        //     this.html.insert('My New HTML');
        //     }
        // });
        // $('.textarea_editor').froalaEditor({
        // // Add the custom buttons in the toolbarButtons list, after the separator.
        //     toolbarButtons: ['insert']
        // })
    });

</script>
