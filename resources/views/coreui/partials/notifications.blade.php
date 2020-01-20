@if(session()->has('success'))
    <script type="text/javascript">
        $.toast({
            title: '{{session('success')}}',
            type: 'success',
            delay: 5000
        });
    </script>
@endif
@if(session()->has('warning'))
    <script type="text/javascript">
        $.toast({
            title: '{{session('warning')}}',
            type: 'warning',
            delay: 5000
        });
    </script>
@endif
@if(session()->has('error'))
    <script type="text/javascript">
        $.toast({
            title: '{{session('error')}}',
            type: 'error',
            delay: 5000
        });
    </script>
@endif
@if($errors->any())
    <script type="text/javascript">
        @foreach($errors->all() as $error)
        $.toast({
            title: '{{$error}}',
            type: 'error',
            delay: 5000
        });
        @endforeach
    </script>
@endif

