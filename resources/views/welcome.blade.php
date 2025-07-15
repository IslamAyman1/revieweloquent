<form action="{{ route('product.store') }}" method="POST">
    @csrf
    Store Product <br>
    <input type="text" name="productName" placeholder="Product Name"><br>
    <input type="number" name="productStock" placeholder="Product Stock"><br>
    <input type="submit" value="submit">
</form>
@foreach ($products as $product )
<p>{{ $product->productName }}</p>
<p>{{ $product->productStock }}</p>
<img src="{{ asset('storage/' . $product->qr) }}" alt="qr" />

@endforeach
@php
$ip = request()->ip();
$response = Http::accept('application/json')->get("http://ip-api.com/json/{$ip}")
@endphp
{{ strtolower($response) }}
<select name="email" id="getPhone">
    @forelse(App\Models\User::get() as $user)
    <option value="{{ $user->email }}">{{ $user->email }}</option>
    @empty
    <h1>no data</h1>
    @endforelse
</select>
<select name="phone" id="phone" style="display: none;"></select>
<details>
    <summary>test</summary>
    <p>hi</p>
    <p>hi2</p>
    <p>hi3</p>
    <p>hi4</p>
</details>
<p>asdg</p>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).on('change', '#getPhone', function() {
        var email = $(this).val()
        var url = "{{ route('user.phone' , ':email') }}"
        url = url.replace(':email', email)
        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                if (response.status == 'success') {
                    $('#phone').show()
                    $('#phone').empty();
                    $('#phone').append(`<option>${response.data}</option>`)
                    //  alert(response.data)
                }
            },
            error: function(error) {
                console.log(error);
            }
        })
    })
</script>