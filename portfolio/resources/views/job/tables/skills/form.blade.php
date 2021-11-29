<fieldset>

    <legend>@lang('table.skill')</legend>
    <label >
        <span>@lang('table.kind')</span>
<?php
    $path='/skill_kinds';
    $model = \App\Skill_kind::class;
    $fieldName = 'kind_id';//_id';//Name';
    $id = $item->kind_id;
?>
{{view('common.tables.layouts.popup-field',compact('path','model','fieldName','id'))}}
    </label>

    <label >
        <span>@lang('table.name')</span>
        <input type="text" name="name" value="{{$item->name}}">
    </label>

</fieldset>