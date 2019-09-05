<label class="{{ $class ?? null }}">
    <span>{{ $label ?? $input ?? "ERRO" }}</span>
    {!! Form::checkbox($input, '1' ?? false) !!}
</label>