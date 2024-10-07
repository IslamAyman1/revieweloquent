<form action="{{route('validation.store')}}" method="post">
    @method('POST')
    @csrf  
    Login Page<br>
    <input type="email" value="{{old('email')}}" name="email" class="@error('email') is-invalid @enderror"  placeholder="enter your email"><br>
    @error('email')
    <p>{{$message}}</p>
    @enderror
    <input type="password" name="password" value="{{old('password')}}" class="@error('password') is-invalid @enderror"   placeholder="enter your password"><br>
    @error('password')
    <p>{{$message}}</p>
    @enderror
    <input type="submit" value="submit">
</form>
    <!-- @if($errors->any())
    @foreach($errors->all() as $error)
        <h1>{{$error}}</h1>
        @endforeach
    @endif -->