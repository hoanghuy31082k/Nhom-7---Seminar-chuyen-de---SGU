<section class="d-flex stats-card">
    @php
        $number = count($data);
        $col = 12 / count($data)
    @endphp
    @for ($i=0;$i<$number;$i++)
        <div class="items fl-ht-{{ $col }} fl-vt-12 fl-mb-12">
            <div class="item">
                <h4>{{ $data[$i]['name'] }}</h4>
                <span style="color: {{ isset($data[$i]['color']) ? $data[$i]['color'] : '#000' }}">{{ $data[$i]['count'] }}</span>    
            </div>
        </div>
    @endfor
</section>