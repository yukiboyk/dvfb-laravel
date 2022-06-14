@if($errors->any() || session('error') || session('success'))
  @push('css')
  <link rel="stylesheet" href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css') }}">
  
  @endpush
    @push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script>
            @if(Session::has('success'))
            Swal.fire({
                 title: 'Thành Công',
                 text: "{{ session('success') }}",
                 icon: 'success',
                 showCancelButton: true,
                 confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                 cancelButtonClass: 'btn btn-danger w-xs mt-2',
                 buttonsStyling: false,
                 showCloseButton: true
                         });
            @endif

            @if(Session::has('error'))
            Swal.fire({
                 title: 'Thất bại',
                 text: "{{ session('error') }}",
                 icon: 'error',
                 showCancelButton: true,
                 confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                 cancelButtonClass: 'btn btn-danger w-xs mt-2',
                 buttonsStyling: false,
                 showCloseButton: true
                         });
            @endif
        </script>
    @endpush
@endif