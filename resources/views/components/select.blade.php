@props(['value' => null , 'options' => []])

<select {{ $attributes->class([

    'form-control' , 'form-select'

])  }}>

    @foreach($options as $key => $_value)    

        <option value="{{ $key }}" {{ ($key == $value) ? 'selected' : null }}>
            
            {{ $_value }}

        </option>

    @endforeach

</select>
