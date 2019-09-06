@foreach ($fasilitas as $data_fas)
    @if ($data_fas == "tt"){{ 'checked' }}@endif
    @if ($data_fas == 'mb'){{ 'checked' }}@endif
    @if ($data_fas == 'lp'){{ 'checked' }}@endif
    @if ($data_fas == 'kamarmd'){{ 'checked' }}@endif
    @if ($data_fas == 'kamarml'){{ 'checked' }}@endif
    @if ($data_fas == 'dapur'){{ 'checked' }}@endif
    @if ($data_fas == 'rt'){{ 'checked' }}@endif
@endforeach