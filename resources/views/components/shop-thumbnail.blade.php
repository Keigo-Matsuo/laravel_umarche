<div>
    @if(empty($filename))
        <img src="{{ asset('images/no_image.jpg') }}" alt="No Image">
    @else
        <img src="{{ asset('storage/shops/' . $filename) }}" alt="Shop Image">
    @endif
</div>