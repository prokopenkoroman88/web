<span class="date-input">
<?php
/*

$item->when == $item->attributes['when'] == $item->getAttribute('when')

$dataField

->item
->fieldName





oninput=" document.forms[0].elements['when'].value = document.forms[0].elements['when_date'].value +' '+document.forms[0].elements['when_time'].value; "
 oninput=" document.forms[0].elements['when'].value = document.forms[0].elements['when_date'].value +' '+document.forms[0].elements['when_time'].value; "
--}}*/

$item = $dataField['item'];
$fieldName = $dataField['fieldName'];
$fieldLabel = $dataField['fieldLabel'] ?? 'table.'.$fieldName;
?>
    <label>
        <span>@lang($fieldLabel)</span>
        <input type="hidden" name="{{$fieldName}}" value="{{$item->attributes[$fieldName]}}">
        <input type="date" name="{{$fieldName}}_date" value="{{$item->attributes[$fieldName.'Date']}}">
        <input type="time" name="{{$fieldName}}_time" value="{{$item->attributes[$fieldName.'Time']}}">
    </label>
{{-- 
    <label >
        <span>@lang('table.when')</span>
        <input type="hidden" name="when" value="{{$item->when}}">
        <input type="date" name="when_date" value="{{$item->whenDate}}" oninput=" document.forms[0].elements['when'].value = document.forms[0].elements['when_date'].value +' '+document.forms[0].elements['when_time'].value; ">
        <input type="time" name="when_time" value="{{$item->whenTime}}" oninput=" document.forms[0].elements['when'].value = document.forms[0].elements['when_date'].value +' '+document.forms[0].elements['when_time'].value; ">
    </label>
 --}}
</span>