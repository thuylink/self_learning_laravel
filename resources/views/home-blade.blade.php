<h1>Home Page Unicode</h1>
<h2>
    <?php //echo  $welcome
    ?>

    {{-- {{$welcome }} --}}
    <?php //echo request()->keyword
    ?>
    {{-- {{request()->keyword}} --}}
    {{-- có thể sử dụng toán tử 3 ngôi như sau --}}
    {{ !empty(request()->keyword) ? request()->keyword : 'nothing' }}
    <div class="container">
        {{-- {!!$content!!} --}}
        {!! !empty($content) ? $content : 'no content' !!}
    </div>
</h2>
{{-- @php
    $message = 'OK';
@endphp --}}
@include('parts.notice')

{{-- @for ($i = 1; $i < 10; $i++)
<p> item : {{$i}}</p>
@endfor --}}


{{-- @while ($index < 5)
    <p> index: {{ $index }} </p>
    <?php //$index++
    ?>
    @php
        $index += 2;
    @endphp
@endwhile --}}


{{-- @foreach ($array as $key => $item)
<p> {{$item}} - {{$key}}</p>
@endforeach --}}

{{-- forelse là bản nâng cấp của foreach, ktra xem mảng rỗng không --}}
{{-- @forelse ($array as $key => $item)
    <p> {{ $key }} => {{ $item }}
    @empty
    <p> Empty </p>
@endforelse --}}

{{-- @if ($number >= 10)
    <p> more than 10 </p>
@endif --}}

{{-- @if ($number == 10)
    equal to 10
@else
    different from 10
@endif --}}

{{-- @if ($number < 9)
    less than 10
@elseif ($number == 10)
    more than 30
@else
    nooo
@endif --}}

{{-- <script>
hi, @{{ name }}
</script> --}}

@verbatim
    <script>
        hi, {{ name }}
        hi, {{ age }}
    </script>
@endverbatim
