<script>
    jQuery(document).ready(function(){
        // dynamic table
        var oTable = jQuery('#{{ $id }}').dataTable({
            "sPaginationType": "simple_numbers",
            "bProcessing": false,
        @foreach ($options as $k => $o)
        {{ json_encode($k) }}: {{ json_encode($o) }},
        @endforeach
        @foreach ($callbacks as $k => $o)
        {{ json_encode($k) }}: {{ $o }},
        @endforeach
    });

        var asInitVals = new Array();
        $("thead input").change( function () {
            /* Filter on the column (the index) of this element */
            oTable.fnFilter( this.value, $("thead input").index(this) );
        } );
//datepicker
        $("thead input").on('changeDate', function () {
            /* Filter on the column (the index) of this element */
            oTable.fnFilter( this.value, $("thead input").index(this) );
        } );

        /*
         * Support functions to provide a little bit of 'user friendlyness' to the textboxes in
         * the footer
         */
        $("thead input").each( function (i) {
            asInitVals[i] = this.value;
        } );

        $("thead input").focus( function () {
            if ( this.className == "search_init" )
            {
                this.className = "";
                this.value = "";
            }
        } );

        $("thead input").blur( function (i) {
            if ( this.value == "" )
            {
                this.className = "search_init";
                this.value = asInitVals[$("thead input").index(this)];
            }
        } );
        // custom values are available via $values array
    });
</script>