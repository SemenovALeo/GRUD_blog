@props(['value'=>null,'options'=>[]])

<select {{$attributes->class([
    'form-control'
]) }}>
    @foreach($options as $key => $value)
        <option value="{{$key}}" {{($key == $value) ? 'selected' : null}}>
            {{$value}}
        </option>
    @endforeach
</select>
