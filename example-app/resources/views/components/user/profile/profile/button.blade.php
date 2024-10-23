@props([
    'mobile' => false,
    'pc' => false,
    'attr' => '',
    'url' => '',
    'itsme' => false,
])

@props([
    '_mobile' => $mobile ? 'user-button-mobile' : '',
    '_pc' => $pc ? 'user-button-pc' : '',
    '_disabled' => $itsme ? 'disabled' : '',
    '_onclick' => $url ? 'onclick=buttonOpenURL("' . $url . '")' : '',
])

<button type="button" class="{{ $_mobile }} {{ $_pc }}" {{ $attr }} {{ $_onclick }}
    {{ $_disabled }}>
    {{ $slot }}
</button>
