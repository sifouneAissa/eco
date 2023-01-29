@php
    $section = null;
    if($show_in_dash){
        $section = array_filter(config('default.show_in_dash_sections'),fn ($item) => $item['id'] === $show_in_dash);
        $section = array_shift($section);
    }
@endphp

{{$desc}} @if($section)<span class="badge-primary rounded p-1"> {{$section['name']}}</span> @endif
