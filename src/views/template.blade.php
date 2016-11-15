<table id="{{ $id }}" class="{{ $class }}">
    <colgroup>
        @for ($i = 0; $i < count($columns); $i++)
        <col class="con{{ $i }}" />
        @endfor
    </colgroup>
    <thead>
    <tr>
        @foreach($columns as $i => $c)
        <th align="center" valign="middle" class="head{{ $i }}">{{ $c }}</th>
        @endforeach

    </tr>
    <!-- comment footer -->
    @if(Request::is('admin/mainvoice*') || Request::is('admin/mapayment*') || Request::is('admin/iainvoice*'))
            <tr>
                @foreach($columns as $i => $c)
            <th align="center" valign="middle" class="head{{ $i }}">
                @if(!str_contains(strtolower($c),'action'))
    @if(str_contains(strtolower($c),'date') )
            <div class="input-append date" data-form="datepicker" data-date="" data-date-format="yyyy-mm-dd" >
                <input style="width: 100px" id="{{$c}}" name="date_from" data-form="datepicker" class="grd-white" data-form="" size="16" type="text" value="" data-date-format="yyyy-mm-dd"  data-validation-format="yyyy-mm-dd" > <span class="add-on"><i class="icon-th"></i></span> </div>
                    @else
            <input type="text" style="width:80px" name="{{$c}}" value="{{$c}}" class="search_init">
                    @endif
    @endif
            </th>
        @endforeach
            </tr>
            @endif

    </thead>
    <tbody>
    @foreach($data as $d)
    <tr>
        @foreach($d as $dd)
        <td>{{ $dd }}</td>
        @endforeach
    </tr>
    @endforeach
    </tbody>
    <!-- comment footer
    @if(Request::is('admin/mainvoice*'))
    <tfoot>
    <tr>
        @foreach($columns as $i => $c)
            <th align="center" valign="middle" class="head{{ $i }}">
                @if(!str_contains(strtolower($c),'action'))
                @if(str_contains(strtolower($c),'date') )
                        <div class="input-append date" data-form="datepicker" data-date="" data-date-format="yyyy-mm-dd" >
                            <input style="width: 100px" id="{{$c}}" name="{{$c}}" data-form="datepicker" class="grd-white" data-form="" size="16" type="text" value="" data-date-format="yyyy-mm-dd"  data-validation-format="yyyy-mm-dd" > <span class="add-on"><i class="icon-th"></i></span> </div>
                    @else
                <input type="text" style="width:120px" name="{{$c}}" value="{{$c}}" class="search_init">
                    @endif
                    @endif
            </th>
        @endforeach
    </tr>
    </tfoot>
    @endif
            -->
</table>

@if (!$noScript)
    @include('datatable::javascript', array('id' => $id, 'options' => $options, 'callbacks' =>  $callbacks))
@endif
