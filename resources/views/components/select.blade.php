@props(['name' => null , 'value' => null , 'options' => []])

<select name="{{ $name }}" {{ $attributes->class([

    'form-control' , 'form-select'

])  }}>

    @foreach($options as $key => $_value)

        <option value="" disabled selected hidden>Кто вы?</option>
        
        <option value="{{ $key }}" {{ ($key == $value) ? 'selected' : null }}>

            {{ $_value }}

        </option>

    @endforeach

</select>
