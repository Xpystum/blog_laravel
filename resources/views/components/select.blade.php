@props(['name' => null , 'value' => null , 'options' => []])

<select name="{{ $name }}" {{ $attributes->class([

    'form-control' , 'form-select'

])  }}>

    <option value="" {{ old($name) ? '' : 'selected' }} hidden>Кто вы?</option>

    @foreach($options as $key => $_value)


        <option value="{{ $key }}" {{ (old($name) == $key || $value == $key) ? 'selected' : '' }} >

            {{ $_value }}

        </option>

    @endforeach

</select>
