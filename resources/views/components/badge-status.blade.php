@php
$config = [
'Menunggu' => ['bg' => 'bg-gold/20 text-gold', 'icon' => 'fa-clock'],
'Proses' => ['bg' => 'bg-brown/20 text-brown', 'icon' => 'fa-arrows-spin'],
'Selesai' => ['bg' => 'bg-green-100 text-green-700', 'icon' => 'fa-circle-check'],
];
$c = $config[$status] ?? ['bg' => 'bg-light-brown/30 text-navy', 'icon' => 'fa-question'];
@endphp
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium {{ $c['bg'] }}">
    <i class="fa-solid {{ $c['icon'] }}"></i>
    {{ $status }}
</span>