@foreach($cart as $item)
    <div class="d-flex align-items-center" data-id="{{ $item['packet']->p_id }}" data-pd_id="{{ $item['packet']->pd_id }}">
        <span class="pnames px-2">{{ $item['packet']->p_title }}</span>
        <div class="text-center fw-bold" style="float: right;">
            <span class="ms-1" id="item-count"> x {{ $item['count'] }}</span>
        </div>
        <span class="fw-bold ms-auto item-price">€ {{ number_format( (intval($item['count']) * intval($item['packet']->pd_list_price)), 2, ',', '.') }}</span>
    </div>
@endforeach