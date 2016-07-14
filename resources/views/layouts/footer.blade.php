<!-- Google Analytics:  -->
<!-- Important javascript libs(put in all pages) -->
<!-- Load pace first -->
<script src="{{ asset('assets/plugins/core/pace/pace.min.js') }}"></script>
<!-- Bootstrap plugins -->
<script src="{{ asset('assets/js/bootstrap/bootstrap.js') }}"></script>
<!-- Core plugins ( not remove ) -->
<script src="{{ asset('assets/js/libs/modernizr.custom.js') }}"></script>
<!-- Handle responsive view functions -->
<script src="{{ asset('assets/js/jRespond.min.js') }}"></script>
<!-- Custom scroll for sidebars,tables and etc. -->
<script src="{{ asset('assets/plugins/core/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/plugins/core/slimscroll/jquery.slimscroll.horizontal.min.js') }}"></script>
<!-- Remove click delay in touch -->
<script src="{{ asset('assets/plugins/core/fastclick/fastclick.js') }}"></script>
<!-- Increase jquery animation speed -->
<script src="{{ asset('assets/plugins/core/velocity/jquery.velocity.min.js') }}"></script>
<!-- Quick search plugin (fast search for many widgets) -->
<script src="{{ asset('assets/plugins/core/quicksearch/jquery.quicksearch.js') }}"></script>
<!-- Bootbox fast bootstrap modals -->
<script src="{{ asset('assets/plugins/ui/bootbox/bootbox.js') }}"></script>
<!-- Other plugins ( load only nessesary plugins for every page) -->
<script src="{{ asset('assets/plugins/charts/sparklines/jquery.sparkline.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dynamic.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/ecollection.js') }}"></script>
{{--    Color Picker --}}
<!-- Google Analytics:  -->
<script src="{{ asset('assets/js/chosen.jquery.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/plugins/charts/chartjs/Chart.js') }}"></script>

<!-- Other plugins ( load only nessesary plugins for every page) -->
<script src="{{ asset('assets/plugins/forms/bootstrap-filestyle/bootstrap-filestyle.js') }}"></script>
<script src="{{ asset('assets/plugins/forms/autosize/jquery.autosize.js') }}"></script>
<script src="{{ asset('assets/plugins/forms/maxlength/bootstrap-maxlength.js') }}"></script>
<script src="{{ asset('assets/plugins/forms/checkall/jquery.checkAll.js') }}"></script>
<script type="text/javascript">
    var config = {
        '.chosen-select'           : {},
        '.chosen-select-deselect'  : {allow_single_deselect:true},
        '.chosen-select-no-single' : {disable_search_threshold:10},
        '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
        '.chosen-select-width'     : {width:"100%"}
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
</script>
</body>
</html>